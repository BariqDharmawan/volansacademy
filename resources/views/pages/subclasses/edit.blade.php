@extends('layouts.admin')
@section('title', 'Edit Sub Class')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Edit Sub Class {{$subclass->name}}</h1>
    </div>

	{!! Form::model($subclass, ['method' => 'PATCH','route' => ['classes.subclasses.update', $class->id, $subclass->id], 'files' => true]) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('classes.show', $class->id) }}" class="btn btn-secondary btn-icon-split">
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
                        {!! Form::text('name', null, array('placeholder' => 'Judul','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sub Judul:</strong>
                        {!! Form::text('sub_name', null, array('placeholder' => 'Sub Judul','class' => 'form-control')) !!}
                    </div>
                </div>
                <!--div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! Form::textArea('description', null, array('placeholder' => 'Description','class' => 'form-control', 'rows' => 3)) !!}
                    </div>
                </div-->
				<!--div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Facilities:</strong>
                        {!! Form::textArea('facilities', null, array('placeholder' => 'Facilities','class' => 'form-control', 'rows' => 3)) !!}
                    </div>
                </div-->
				
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {!! Form::number('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Price Discount:</strong>
                        {!! Form::number('price_discount', null, array('placeholder' => 'Jika price discount diisi maka harga yang dibayar oleh peserta adalah harga ini','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<!--div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Periode:</strong>

					  <div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						  </span>
						</div>
						<input type="text" value="<?php //echo $subclass->periode ?>" name="periode" readonly="readonly" style="background:white !important" class="form-control float-right" id="periode">
					  </div>
					</div>
				</div-->
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Icon: {{$subclass->icon}}</strong>
                        {!! Form::file('icon', null, array('placeholder' => 'Icon','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Inactive:</strong>
                        {!! Form::checkbox('inactive', 1, $subclass->inactive) !!}
                    </div>
                </div>
                {!! Form::hidden('external_link', ''); !!}
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner: {{$subclass->banner}}</strong>
                        {!! Form::file('banner', null, array('class' => 'form-control')) !!}
						@if($subclass->banner)
							{!! Form::checkbox('remove_banner', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Info Program: {{$subclass->detail_info_program}}</strong>
                        {!! Form::file('detail_info_program', null, array('class' => 'form-control')) !!}
						@if($subclass->detail_info_program)
							{!! Form::checkbox('remove_detail_info_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Biaya Program: {{$subclass->detail_biaya_program}}</strong>
                        {!! Form::file('detail_biaya_program', null, array('class' => 'form-control')) !!}
						@if($subclass->detail_biaya_program)
							{!! Form::checkbox('remove_detail_biaya_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Garansi Program: {{$subclass->garansi_program}}</strong>
                        {!! Form::file('garansi_program', null, array('class' => 'form-control')) !!}
						@if($subclass->garansi_program)
							{!! Form::checkbox('remove_garansi_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 1: {{$subclass->gambar_profesi_1}}</strong>
                        {!! Form::file('gambar_profesi_1', null, array('class' => 'form-control')) !!}
						@if($subclass->gambar_profesi_1)
							{!! Form::checkbox('remove_gambar_profesi_1', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 2: {{$subclass->gambar_profesi_2}}</strong>
                        {!! Form::file('gambar_profesi_2', null, array('class' => 'form-control')) !!}
						@if($subclass->gambar_profesi_2)
							{!! Form::checkbox('remove_gambar_profesi_2', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Konfirmasi: {{$subclass->banner_konfirmasi}}</strong>
                        {!! Form::file('banner_konfirmasi', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_konfirmasi)
							{!! Form::checkbox('remove_banner_konfirmasi', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 1 (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_1', null, array('placeholder' => 'Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Link DAFTAR SEKARANG 1:</strong>
                        {!! Form::text('daftar_sekarang_1_link', null, array('placeholder' => 'Link Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_1_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_1_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_1_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>TOMBOL KONSULTASI  (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('konsultasi', null, array('placeholder' => 'Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Link konsultasi:</strong>
                        {!! Form::text('konsultasi_link', null, array('placeholder' => 'Link Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('konsultasi_font', null, array('placeholder' => 'Ukuran Font Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('konsultasi_warna', null, array('placeholder' => 'Warna Font Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('konsultasi_warna_button', null, array('placeholder' => 'Warna Button Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Program: {{$subclass->fasilitas_program}}</strong>
                        {!! Form::file('fasilitas_program', null, array('class' => 'form-control')) !!}
						@if($subclass->fasilitas_program)
							{!! Form::checkbox('remove_fasilitas_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Bimbel: {{$subclass->fasilitas_bimbel}}</strong>
                        {!! Form::file('fasilitas_bimbel', null, array('class' => 'form-control')) !!}
						@if($subclass->fasilitas_bimbel)
							{!! Form::checkbox('remove_fasilitas_bimbel', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lokasi Belajar: {{$subclass->lokasi_belajar}}</strong>
                        {!! Form::file('lokasi_belajar', null, array('class' => 'form-control')) !!}
						@if($subclass->lokasi_belajar)
							{!! Form::checkbox('remove_lokasi_belajar', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Alumni: {{$subclass->banner_alumni}}</strong>
                        {!! Form::file('banner_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_alumni)
							{!! Form::checkbox('remove_banner_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 1: {{$subclass->thumbnail_video_alumni_testi_1}}</strong>
                        {!! Form::file('thumbnail_video_alumni_testi_1', null, array('class' => 'form-control')) !!}
						@if($subclass->thumbnail_video_alumni_testi_1)
							{!! Form::checkbox('remove_thumbnail_video_alumni_testi_1', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Video Testi Alumni 1 (youtube):</strong>
                        {!! Form::text('video_alumni_testi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 2: {{$subclass->thumbnail_video_alumni_testi_2}}</strong>
                        {!! Form::file('thumbnail_video_alumni_testi_2', null, array('class' => 'form-control')) !!}
						@if($subclass->thumbnail_video_alumni_testi_2)
							{!! Form::checkbox('remove_thumbnail_video_alumni_testi_2', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Video Testi Alumni 2 (youtube):</strong>
                        {!! Form::text('video_alumni_testi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 2 (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_2', null, array('placeholder' => 'Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Link DAFTAR SEKARANG 2:</strong>
                        {!! Form::text('daftar_sekarang_2_link', null, array('placeholder' => 'Link Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_2_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_2_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_2_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Tagline: {{$subclass->banner_tagline}}</strong>
                        {!! Form::file('banner_tagline', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_tagline)
							{!! Form::checkbox('remove_banner_tagline', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Foto Alumni: {{$subclass->banner_slider_foto_alumni}}</strong>
                        {!! Form::file('banner_slider_foto_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_slider_foto_alumni)
							{!! Form::checkbox('remove_banner_slider_foto_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Aktifitas Belajar: {{$subclass->gambar_aktifitas_belajar}}</strong>
                        {!! Form::file('gambar_aktifitas_belajar', null, array('class' => 'form-control')) !!}
						@if($subclass->gambar_aktifitas_belajar)
							{!! Form::checkbox('remove_gambar_aktifitas_belajar', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Chat Alumni: {{$subclass->banner_slider_chat_alumni}}</strong>
                        {!! Form::file('banner_slider_chat_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_slider_chat_alumni)
							{!! Form::checkbox('remove_banner_slider_chat_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Closing: {{$subclass->banner_closing}}</strong>
                        {!! Form::file('banner_closing', null, array('class' => 'form-control')) !!}
						@if($subclass->banner_closing)
							{!! Form::checkbox('remove_banner_closing', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Closing Tanggal :</strong>
                        {!! Form::date('expired_date', null, array('placeholder' => 'Ditutup pada','class'
                        => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Pukul :</strong>
                        {!! Form::time('expired_time', null, array('placeholder' => 'Jam','class'
                        => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Closing Warna Font (HEX):</strong>
                        {!! Form::text('expired_color', null, array('placeholder' => 'Warna font timer','class'
                        => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 3 (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_3', null, array('placeholder' => 'Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Link DAFTAR SEKARANG 1:</strong>
                        {!! Form::text('daftar_sekarang_3_link', null, array('placeholder' => 'Link Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_3_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_3_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_3_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="card shadow mb-3">
		<div class="card-header">BANNER UNTUK TAMPILAN MOBILE (SMARTPHONE)</div>
		<div class="card-body">
            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner @if($subclass->m_banner)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner)
							{!! Form::checkbox('remove_m_banner', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Info Program  @if($subclass->m_detail_info_program)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_detail_info_program) }}">View</a>@endif:</strong>
                        {!! Form::file('m_detail_info_program', null, array('class' => 'form-control')) !!}
						@if($subclass->m_detail_info_program)
							{!! Form::checkbox('remove_m_detail_info_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Biaya Program @if($subclass->m_detail_biaya_program)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_detail_biaya_program) }}">View</a>@endif:</strong>
                        {!! Form::file('m_detail_biaya_program', null, array('class' => 'form-control')) !!}
						@if($subclass->m_detail_biaya_program)
							{!! Form::checkbox('remove_m_detail_biaya_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Garansi Program @if($subclass->m_garansi_program)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_garansi_program) }}">View</a>@endif:</strong>
                        {!! Form::file('m_garansi_program', null, array('class' => 'form-control')) !!}
						@if($subclass->m_garansi_program)
							{!! Form::checkbox('remove_m_garansi_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 1 @if($subclass->m_gambar_profesi_1)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_profesi_1) }}">View</a>@endif:</strong>
                        {!! Form::file('m_gambar_profesi_1', null, array('class' => 'form-control')) !!}
						@if($subclass->m_gambar_profesi_1)
							{!! Form::checkbox('remove_m_gambar_profesi_1', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 2 @if($subclass->m_gambar_profesi_2)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_profesi_2) }}">View</a>@endif:</strong>
                        {!! Form::file('m_gambar_profesi_2', null, array('class' => 'form-control')) !!}
						@if($subclass->m_gambar_profesi_2)
							{!! Form::checkbox('remove_m_gambar_profesi_2', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Konfirmasi @if($subclass->m_banner_konfirmasi)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_konfirmasi) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_konfirmasi', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_konfirmasi)
							{!! Form::checkbox('remove_m_banner_konfirmasi', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Program @if($subclass->m_fasilitas_program)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_fasilitas_program) }}">View</a>@endif:</strong>
                        {!! Form::file('m_fasilitas_program', null, array('class' => 'form-control')) !!}
						@if($subclass->m_fasilitas_program)
							{!! Form::checkbox('remove_m_fasilitas_program', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Bimbel @if($subclass->m_fasilitas_bimbel)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_fasilitas_bimbel) }}">View</a>@endif:</strong>
                        {!! Form::file('m_fasilitas_bimbel', null, array('class' => 'form-control')) !!}
						@if($subclass->m_fasilitas_bimbel)
							{!! Form::checkbox('remove_m_fasilitas_bimbel', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lokasi Belajar @if($subclass->m_lokasi_belajar)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_lokasi_belajar) }}">View</a>@endif:</strong>
                        {!! Form::file('m_lokasi_belajar', null, array('class' => 'form-control')) !!}
						@if($subclass->m_lokasi_belajar)
							{!! Form::checkbox('remove_m_lokasi_belajar', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Alumni @if($subclass->m_banner_alumni)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_alumni) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_alumni)
							{!! Form::checkbox('remove_m_banner_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 1 @if($subclass->m_thumbnail_video_alumni_testi_1)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_1) }}">View</a>@endif:</strong>
                        {!! Form::file('m_thumbnail_video_alumni_testi_1', null, array('class' => 'form-control')) !!}
						@if($subclass->m_thumbnail_video_alumni_testi_1)
							{!! Form::checkbox('remove_m_thumbnail_video_alumni_testi_1', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 2 @if($subclass->m_thumbnail_video_alumni_testi_2)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_2) }}">View</a>@endif:</strong>
                        {!! Form::file('m_thumbnail_video_alumni_testi_2', null, array('class' => 'form-control')) !!}
						@if($subclass->m_thumbnail_video_alumni_testi_2)
							{!! Form::checkbox('remove_m_thumbnail_video_alumni_testi_2', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Tagline @if($subclass->m_banner_tagline)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_tagline) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_tagline', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_tagline)
							{!! Form::checkbox('remove_m_banner_tagline', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Foto Alumni @if($subclass->m_banner_slider_foto_alumni)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_slider_foto_alumni) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_slider_foto_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_slider_foto_alumni)
							{!! Form::checkbox('remove_m_banner_slider_foto_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Aktifitas Belajar @if($subclass->m_gambar_aktifitas_belajar)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_aktifitas_belajar) }}">View</a>@endif:</strong>
                        {!! Form::file('m_gambar_aktifitas_belajar', null, array('class' => 'form-control')) !!}
						@if($subclass->m_gambar_aktifitas_belajar)
							{!! Form::checkbox('remove_m_gambar_aktifitas_belajar', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Chat Alumni @if($subclass->m_banner_slider_chat_alumni)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_slider_chat_alumni) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_slider_chat_alumni', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_slider_chat_alumni)
							{!! Form::checkbox('remove_m_banner_slider_chat_alumni', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Closing @if($subclass->m_banner_closing)<a href="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_closing) }}">View</a>@endif:</strong>
                        {!! Form::file('m_banner_closing', null, array('class' => 'form-control')) !!}
						@if($subclass->m_banner_closing)
							{!! Form::checkbox('remove_m_banner_closing', 1, false) !!}
							<strong>Remove </strong>
						@endif
                    </div>
                </div>
			</div>
		</div>
	</div>
    {!! Form::close() !!}
@endsection
@push('scripts')
<script src="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
		//Date range picker
		$('#periode').daterangepicker({
			autoUpdateInput: false,
			  locale: {
				  cancelLabel: 'Clear',
				  format: 'DD-MM-YYYY'
			  },
			ignoreReadonly: true,
		});
		
		$('input[name="periode"]').on('apply.daterangepicker', function(ev, picker) {
			  $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		  });

		  $('input[name="periode"]').on('cancel.daterangepicker', function(ev, picker) {
			  $(this).val('');
		  });
		  
		
		  
	});
</script>
@endpush
@push('styles')
<!-- summernote -->
<link href="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush