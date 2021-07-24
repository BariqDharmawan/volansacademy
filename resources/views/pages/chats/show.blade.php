@extends('layouts.admin')
@section('title', 'Detail Sub Class')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Detail Sub Class {{$chat->name}}</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('classes.subclasses.chat', [$subclass->id]) }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $chat->name }}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Chat:</strong>
						@if ($chat->chat != null)
                        <br>
                        <img src="{{ url('/subclasschatalumni/'.$chat->id.'/'.$chat->chat) }}" alt="Gambar" width="400px">
                        <br>
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
