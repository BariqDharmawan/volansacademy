@extends('layouts.admin')
@section('title', 'Edit Chat Alumni Sub Class')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Edit Chat ALumni Sub Class {{$chat->name}}</h1>
    </div>

	{!! Form::model($chat, ['method' => 'PATCH','route' => ['subclasses.chats.update', [$subclass->id, $chat->id]], 'files' => true]) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('classes.subclasses.chat', $subclass->id) }}" class="btn btn-secondary btn-icon-split">
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
                        {!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
                    </div>
                </div>
                
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Chat:</strong>
                        {!! Form::file('chat', null, array('placeholder' => 'chat','class' => 'form-control')) !!}
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
		//Date range picker
		
		  
	});
</script>
@endpush