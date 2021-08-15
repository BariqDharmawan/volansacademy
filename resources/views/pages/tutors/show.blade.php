@extends('layouts.admin')
@section('title', 'Detail tutor')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">tutor</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('tutors.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bidang:</strong>
                        {{ $tutor->field }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $tutor->name }}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group">
                        <strong>Dari:</strong>
                        {{ $tutor->from }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        
    });
</script>
@endpush