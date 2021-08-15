@extends('layouts.admin')
@section('title', 'Edit blog')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Edit Blog</h1>
    </div>

    {!! Form::model($blog, ['method' => 'PATCH','route' => ['blogs.update', $blog->id], 'files' => true]) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">{{ __('Kembali') }}</span>
            </a>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{ __('Perbarui') }}</span>
            </button>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan data yang anda masukkan.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        {!! Form::textArea('title', null, array('placeholder' => 'Judul','class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi singkat:</strong>
                        {!! Form::text('short_description', null, array('placeholder' => 'uraian pengantar','class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bodi:</strong>
                        {!! Form::textArea('body', null, array('placeholder' => 'isi','class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>featured image:</strong>
						{!! Form::file('featured_image') !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>file:</strong>
						{!! Form::file('file') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
@push('scripts')
<script src="{{ url('AdminLTE/plugins/summernote/summernote.min.js')}}"></script>
<script type="text/javascript">
	$('textarea[name="body"]').summernote({
		lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
		toolbar: [
		  ['style', ['style']],
		  ['font', ['bold', 'italic', 'underline', 'clear', 'fontsize', 'superscript', 'subscript', 'strikethrough']],
		  ['fontname', ['fontname']],
		  ['color', ['forecolor', 'backcolor']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['height', ['height']],
		  ['table', ['table']],
		  ['insert', ['link', 'picture', 'video']],
		  ['view', ['fullscreen', 'codeview', 'help']],
		],
		height : 200,
	});
	$('textarea[name="title"]').summernote({
		toolbar: [
		  ['style', ['style']],
		  ['font', ['bold', 'italic', 'underline', 'clear', 'fontsize', 'superscript', 'subscript', 'strikethrough']],
		  ['fontname', ['fontname']],
		  ['color', ['forecolor', 'backcolor']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['table', ['table']],
		  ['insert', ['link', 'picture', 'video']],
		  ['view', ['fullscreen', 'codeview', 'help']],
		],
		height : 50
	});
</script>
@endpush
@push('styles')
<!-- summernote -->
<link href="{{ url('AdminLTE/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush