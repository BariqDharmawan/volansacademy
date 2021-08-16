@extends('layouts.admin')
@section('title', 'Edit blog')
@section('content')
    <x-head-page title="Edit Blog {{ $blog->title }}">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-icon-split">
            <i class="fas fa-arrow-left"></i>
            <span class="text">{{ __('Kembali') }}</span>
        </a>
        <button type="submit" class="btn btn-success btn-icon-split" form="edit-blog">
            <i class="fas fa-check"></i>
            <span class="text">{{ __('Perbarui') }}</span>
        </button>
    </x-head-page>

    <div class="card shadow mb-3">
        <div class="card-body">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="row" enctype="multipart/form-data" id="edit-blog">
                @csrf @method('PUT')
                <x-bootstrap-input type="textarea" name="title" 
                label="Judul" value="{{ $blog->title }}" :is-textarea="true" required autofocus />
                
                <x-bootstrap-input type="textarea" name="short_description" 
                label="Deskripsi singkat" placeholder="uraian pengantar" 
                value="{{ $blog->short_description }}" :is-textarea="true" 
                required autofocus />

                <x-bootstrap-input type="textarea" name="body" 
                label="Bodi" placeholder="isi" 
                value="{{ $blog->body }}" :is-textarea="true" 
                required autofocus />

                <x-bootstrap-file name="featured_image" label="featured image" />
                
                <x-bootstrap-file name="file" label="file" />
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('AdminLTE/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script type="text/javascript">
    bsCustomFileInput.init();
    const toolbars = [
		  ['style', ['style']],
		  ['font', ['bold', 'italic', 'underline', 'clear', 'fontsize', 'superscript', 'subscript', 'strikethrough']],
		  ['fontname', ['fontname']],
		  ['color', ['forecolor', 'backcolor']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['height', ['height']],
		  ['table', ['table']],
		  ['insert', ['link', 'picture', 'video']],
		  ['view', ['fullscreen', 'codeview', 'help']],
	];
	$('textarea[name="body"]').summernote({
		lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
		toolbar: toolbars,
		height : 200,
	});
	$('textarea[name="title"]').summernote({
		toolbar: toolbars,
		height : 50
	});
</script>
@endpush