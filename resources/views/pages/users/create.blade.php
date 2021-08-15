@extends('layouts.admin')
@section('title', 'Tambah Pengguna')
@section('content')

    <x-head-page title="Tambah Pengguna Baru">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-success" form="add-user">
            <i class="fas fa-check"></i>
            <span class="text">Kirim</span>
        </button>
    </x-head-page>

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
            <form action="{{ route('users.store') }}" method="POST" id="add-user">
                @csrf
                <x-bootstrap-input label="Nama" name="name" />
                <x-bootstrap-input label="Email" name="email" />
                <x-bootstrap-input label="Kata Sandi" name="password" />
                <x-bootstrap-input label="Konfirmasi Kata Sandi" name="password_confirmation" />
                
                <div class="col-12">
                    <div class="form-group">
                        <strong>Peran:</strong>
                        <div class="row mx-0">
                            <x-bootstrap-radio label="Superadmin" id="role-superadmin" name="role_id" value="1" required />
                            <x-bootstrap-radio label="Admin" id="role-admin" name="role_id" value="2" required checked />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection