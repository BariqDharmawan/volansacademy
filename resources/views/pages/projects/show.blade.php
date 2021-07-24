@extends('layouts.admin')
@section('title', 'Detail Project')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Detail Project {{$project->nama}}</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-icon-split">
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
                        <strong>Nama:</strong>
                        {{ $project->nama }}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer:</strong>
                        {{ $project->customer->name }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Division:</strong>
                        {{ $project->division->name }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project Owner:</strong>
                        {{ $project->projectowner->name }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project Manager:</strong>
                        {{ $project->projectmanager->name }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Form PM:</strong>
						{{ $project->date_form_pm }}
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>No Form PM:</strong>
                        {{ $project->no_form_pm }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Type:</strong>
                        {{ $project->producttype->name }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Tanggal Pelaksanaan (PEF):</strong>
						{{ $project->pef_date }}
					  
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Mulai:</strong>
						{{ $project->start_date }}
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Tanggal Akhir:</strong>
						{{ $project->end_date }}
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>PEF No:</strong>
                        {{ $project->pef_no }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>SPK / PKS:</strong> 
                        {{ $project->spk_pks }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Jangka Waktu PKS/SPK/PO:</strong>
						{{ $project->range_spk }}
					  
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nilai (excl. PPN):</strong>
						{{ number_format($project->amount_exclude_ppn) }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tahapan Pembayaran:</strong>
						{{ $project->terms_of_payment }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
						{{ $project->description }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Catatan:</strong>
						{{ $project->notes }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Closed:</strong>
						@if($project->is_closed)
							Yes
						@else
							No
						@endif
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    
</div>
@endsection
