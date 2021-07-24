@extends('layouts.admin')
@section('title', 'Detail Issue/Follow Up')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Detail Issue {{$issue->id}}</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('issues.index') }}" class="btn btn-secondary btn-icon-split">
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
                        <strong>Issue:</strong>
                        {{ $issue->issue }}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Project:</strong>
                        {{ $issue->project->nama }}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tanggal:</strong>
                        {{ date('d-m-Y', strtotime($issue->date)) }}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>File:</strong><br>
                        <?php 
						foreach (new DirectoryIterator(storage_path('app/public/issue/'.$issue->id.'/')) as $file) {
						  if ($file->isFile()) {
							  ?>
							  <a target="_blank" href="<?php echo url('storage/issue/'.$issue->id.'/'.$file->getFilename()); ?>"><?php echo $file->getFilename() ?></a><br>
							  <?php
						  }
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
