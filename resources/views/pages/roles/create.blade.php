@extends('layouts.admin')
@section('title', 'Tambah Peran')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark font-weight-bold">Tambah Peran Baru</h1>
    </div>

    
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <button type="submit" class="btn btn-success btn-icon-split" form="add-role">
                <span class="icon">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Kirim</span>
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
        <form class="card-body" action="{{ route('roles.store') }}"
        method="POST" id="add-role">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <p>Password default tiap admin adalah: <b>kipasangin2021</b></p>
                </div> --}}
            </div>
        </form>
    </div>
@endsection