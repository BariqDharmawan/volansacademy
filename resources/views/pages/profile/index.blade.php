@extends('layouts.admin')
@section('title', 'Edit Profile')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Edit Profile {{$user->name}}</h1>
    </div>

    {!! Form::model($user, ['method' => 'POST','route' => ['profile.update']]) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
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

	@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
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
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Tempat Lahir:</strong>
                        {!! Form::text('place_of_birth', null, array('placeholder' => 'Tempat lahir','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Tanggal lahir:</strong>
                        {!! Form::date('date_of_birth', null, array('placeholder' => 'tanggal lahir','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Nomor Handphone (Whatsapp):</strong>
                        {!! Form::text('phone', null, array('placeholder' => 'Nomor handphone','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        {!! Form::select('jenis_kelamin', ['' => 'Pilih satu', 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], $user->jenis_kelamin, array('class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>ID Line:</strong>
                        {!! Form::text('line_id', null, array('placeholder' => 'ID LINE','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Instagram:</strong>
                        {!! Form::text('instagram_id', null, array('placeholder' => 'ID Instagram','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat lengkap:</strong>
                        {!! Form::textArea('domicili', null, array('placeholder' => 'Alamat sekarang','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        {{-- <strong>Sekolah/Universitas:</strong>
                        {!! Form::text('university', null, array(,'class' => 'form-control')) !!} --}}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Jurusan:</strong>
                        {!! Form::text('major', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' =>
                        'form-control','disabled'
                        => 'disabled')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kata Sandi (diisi jika ingin mengganti password pengguna):</strong>
                        {!! Form::password('password', array('placeholder' => 'Kata Sandi','class' => 'form-control'))
                        !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Konfirmasi Kata Sandi:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Konfirmasi Kata Sandi','class' =>
                        'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection