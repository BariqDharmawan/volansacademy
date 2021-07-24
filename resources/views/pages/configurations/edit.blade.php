@extends('layouts.admin')
@section('title', 'Edit configuration')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Edit configuration {{$configuration->title}}</h1>
    </div>

    {!! Form::model($configuration, ['method' => 'PATCH','route' => ['configurations.update', $configuration->id], 'files'=>true]) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('configurations.index') }}" class="btn btn-secondary btn-icon-split">
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
                        <strong>Nama:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control mb-2', 'readonly'=>true)) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Value:</strong>
						@if($configuration->type == 'image')
							{!! Form::file('value', null, array('class' => 'form-control mb-2')) !!}
						
							<img style="width:100%" src="{{asset('config/'.$configuration->value)}}"></img>
							
						@elseif($configuration->type == 'text')
							{!! Form::text('value', null, array('class' => 'form-control mb-2')) !!}
						@elseif($configuration->type == 'textarea')
							{!! Form::textArea('value', null, array('class' => 'form-control mb-2')) !!}
						@elseif($configuration->type == 'email')
							{!! Form::email('value', null, array('class' => 'form-control mb-2')) !!}
						@elseif($configuration->type == 'number')
							{!! Form::number('value', null, array('class' => 'form-control mb-2')) !!}
						@elseif($configuration->type == 'checkbox')
							{!! Form::checkbox('value', 1, $configuration->value) !!}
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<!-- Bootstrap summernote-->
<script src="{{ url('js/summernote-bs4.min.js')}}"></script>

<script type="text/javascript">
	$('textarea[name="value"]').summernote({
		height : 200,
		@if($configuration->name == 'free_features' || $configuration->name == 'ultimate_features' || $configuration->name == 'platinum_features') 
		callbacks: {
			onInit: function() {
				$("div.note-editor button.btn-codeview").click();
			}
		}
		@endif
	});
</script>
@endpush
@push('styles')
<!-- summernote -->
<link href="{{ url('css/summernote-bs4.css') }}" rel="stylesheet">

@endpush