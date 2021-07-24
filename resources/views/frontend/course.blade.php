@extends('layouts.frontend')
@section('title', 'Home')
@push('styles')
<link rel="stylesheet" href="{{ url('frontend/edumark/css/swiper-bundle.min.css') }}">
@endpush
@section('content')
	<input type="hidden" id="subclass_id" value="{{ $subclass->id }}">
    <!-- bradcam_area_start -->
	<div class="courses_details_landing " style="background-image:none !important">
		<div class="container-fluid p-0 d-none d-lg-block">
			@if($subclass->banner != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner) }}" style="width:100%;">
				</div>
			</div>
			@endif
			<div class="row no-gutters">
				
				<div class="col-md-6">
					@if($subclass->detail_info_program != "")
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->detail_info_program) }}" style="width:98.77%;margin-top:1.23vw;margin-right:1.23%">
					@endif
				</div>
				
				
				<div class="col-md-6">
					<div class="row no-gutters">
						<div class="col-md-12">
							@if($subclass->detail_biaya_program != "")
							<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->detail_biaya_program) }}" style="width:100%;margin-top:1.23vw;margin-left:1.23%;vertical-align:top">
							@endif
						</div>
						<div class="col-md-12">
							@if($subclass->garansi_program != "")
							<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->garansi_program) }}" style="width:100%;margin-top:1.23vw;margin-left:1.23%;vertical-align:bottom">
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-6">
					@if($subclass->gambar_profesi_1 != "")
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->gambar_profesi_1) }}" style="width:80%;margin-top:1.23vw;margin-right:1.23%;float:right">
					@endif
				</div>
				
				<div class="col-md-6">
					@if($subclass->gambar_profesi_2 != "")
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->gambar_profesi_2) }}" style="width:80%;margin-top:1.23vw;margin-left:1.23%;float:left">
					@endif
				</div>
			</div>
			@if($subclass->banner_konfirmasi != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_konfirmasi) }}" style="width:100%; margin-top:1.23vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->daftar_sekarang_1)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:75%; height: 9.225vw; background-color: {{$subclass->daftar_sekarang_1_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_1_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_1_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_1 !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->konsultasi)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button class="btn" onclick="location.href='{{$subclass->konsultasi_link}}';" style="{{$subclass->konsultasi_warna_button}}; width:50%; height: 7.38vw; background-color: green; font-weight: bold; color:{{$subclass->konsultasi_warna}} ; font-size: {{$subclass->konsultasi_font}}vw;margin-top:1.23vw;;border-radius:100px">{!! $subclass->konsultasi !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->fasilitas_program != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->fasilitas_program) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->fasilitas_bimbel != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->fasilitas_bimbel) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->lokasi_belajar != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->lokasi_belajar) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->banner_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_alumni) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			<div class="row no-gutters">
				@if($subclass->thumbnail_video_alumni_testi_1)
				<div class="col-md-6" >
					@if($subclass->video_alumni_testi_1)
					<img id="img_video_alumni_testi_1" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_1)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-right:2%;width:98%;opacity:0'>
					
					<iframe
						 id="iframe_video_alumni_testi_1"
						class="banner-sub-program"
					  width="98%"
					  scrolling="no" 
					  frameborder="0"
					  src="{{ $subclass->video_alumni_testi_1 }}"
					  style="margin-top:1.25vw;margin-right:2%;height: 98%; width: 98%;position:absolute;left:0;"
					  srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img{position:absolute;width:100%;margin:auto}span{position:absolute;width:100%;top:0;bottom:0;margin:auto;height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href={{$subclass->video_alumni_testi_1}}?autoplay=1><img src={{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_1)}} class='banner-sub-program' style=''><span>▶</span></a>"
					  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					  allowfullscreen
					></iframe>
					@elseif($subclass->thumbnail_video_alumni_testi_1)
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_1)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-right:2%;width:98%'>
					@endif
					<!--img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->video_alumni_testi_1) }}" style="width:98%;margin-top:1.25vw;margin-right:2%;"-->
					
				</div>
				@endif
				@if($subclass->thumbnail_video_alumni_testi_2)
				<div class="col-md-6" >
					
					@if($subclass->video_alumni_testi_2)
					<img id="img_video_alumni_testi_2" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_2)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-left:2%;width:98%;opacity:0'>
					<iframe
						id="iframe_video_alumni_testi_2"
						class="banner-sub-program"
					  width="98%"
					  scrolling="no" 
					  src="{{ $subclass->video_alumni_testi_2 }}"
					  style="margin-top:1.25vw;margin-left:2%;height: 98%; width: 98%;position:absolute;right:0;"
					  srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img{position:absolute;width:100%;margin:auto}span{position:absolute;width:100%;top:0;bottom:0;margin:auto;height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href={{$subclass->video_alumni_testi_2}}?autoplay=1><img src={{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_2)}} class='banner-sub-program' style=''><span>▶</span></a>"
					  frameborder="0"
					  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					  allowfullscreen
					  
					></iframe>
					@elseif($subclass->thumbnail_video_alumni_testi_2)
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_2)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-left:2%;width:98%'>
					@endif
					<!--img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_2) }}" style="width:98%;margin-top:1.25vw;margin-left:2%"-->
					
				</div>
				@endif
			</div>
			@if($subclass->daftar_sekarang_2)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:75%; height: 9.225vw; background-color: {{$subclass->daftar_sekarang_2_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_2_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_2_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_2 !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->banner_tagline != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_tagline) }}" style="width:100%;margin-top:1.25vw;">
				</div>
			</div>
			@endif
			@if($subclass->banner_slider_foto_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12" style="margin-top:1.25vw;">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_slider_foto_alumni)}}" style="width:100%">
					@if($subclass->photos->count() > 0)
					<div class="swiper-container swiper-container1 text-center" style="max-height:100%;width:90%;position:absolute;bottom:0;margin-left:5%; margin-right: 5%">
						<div class="swiper-wrapper"  >
							@foreach($subclass->photos as $photo)
								<div class="swiper-slide">
									<img src="{{ url('subclassphotoalumni/'.$photo->id.'/'.$photo->photo)}}" style="width:83.5%">
								</div>
							@endforeach
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination swiper-pagination1"></div>
						
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-next1"></div>
					<div class="swiper-button-prev swiper-button-prev1"></div>
					@endif
				</div>
			</div>
			@endif
			@if($subclass->gambar_aktifitas_belajar != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->gambar_aktifitas_belajar) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->banner_slider_chat_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12" style="margin-top:1.25vw;">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_slider_chat_alumni)}}" style="width:100%">
					@if($subclass->chats->count() > 0)
					<div class="swiper-container swiper-container2 text-center" style="max-height:100%;width:90%;position:absolute;bottom:0;margin-left:5%; margin-right: 5%">
						<div class="swiper-wrapper"  >
							@foreach($subclass->chats as $chat)
								<div class="swiper-slide">
									<img src="{{ url('subclasschatalumni/'.$chat->id.'/'.$chat->chat)}}" style="width:83.5%;max-height:100%;min-height:100%">
								</div>
							@endforeach
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination swiper-pagination2"></div>
						
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-next2"></div>
					<div class="swiper-button-prev swiper-button-prev2"></div>
					@endif
				</div>
			</div>
			@endif
			@if($subclass->banner_closing != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->banner_closing) }}" style="width:100%;margin-top:1.25vw;">
					<div id="countdown" style="position:absolute;margin:auto;top:80%;bottom:0;text-align:center;width:100%;font-weight:bold;font-size:4vw;">
						
					</div>					
				</div>
			</div>
			@endif
			@if( $subclass->daftar_sekarang_3)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:75%; height: 9.225vw; background-color: {{$subclass->daftar_sekarang_3_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_3_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_3_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_3 !!}</button>
				</div>
			</div>
			@endif
		</div>
		<div class="container-fluid p-0 d-block d-lg-none">
			@if($subclass->m_banner != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner) }}" style="width:100%;">
				</div>
			</div>
			@endif
			@if($subclass->m_detail_info_program != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_detail_info_program) }}" style="width:100%;margin-top:1.23vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_detail_biaya_program != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_detail_biaya_program) }}" style="width:100%;margin-top:1.23vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_garansi_program != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_garansi_program) }}" style="width:100%;margin-top:1.23vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_gambar_profesi_1 != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_profesi_1) }}" style="width:100%;margin-top:1.23vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_gambar_profesi_2 != "")
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_profesi_2) }}" style="width:100%;margin-top:1.23vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_banner_konfirmasi != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_konfirmasi) }}" style="width:100%; margin-top:1.23vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->daftar_sekarang_1)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:66vw; height: 16vw; background-color: {{$subclass->daftar_sekarang_1_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_1_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_1_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_1 !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->konsultasi)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button class="btn" onclick="location.href='{{$subclass->konsultasi_link}}';" style="{{$subclass->konsultasi_warna_button}}; width:66vw; height: 16vw; background-color: green; font-weight: bold; color:{{$subclass->konsultasi_warna}} ; font-size: {{$subclass->konsultasi_font}}vw;margin-top:1.23vw;;border-radius:100px">{!! $subclass->konsultasi !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->m_fasilitas_program != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_fasilitas_program) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->m_fasilitas_bimbel != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_fasilitas_bimbel) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->m_lokasi_belajar != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_lokasi_belajar) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->m_banner_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_alumni) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			<div class="row no-gutters">
				@if($subclass->m_thumbnail_video_alumni_testi_1)
				<div class="col-md-6" >
					@if($subclass->video_alumni_testi_1)
					<img id="m_img_video_alumni_testi_1" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_1)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-right:2%;width:98%;opacity:0'>
					
					<iframe
						 id="m_iframe_video_alumni_testi_1"
						class="banner-sub-program"
					  width="98%"
					  scrolling="no" 
					  frameborder="0"
					  src="{{ $subclass->video_alumni_testi_1 }}"
					  style="margin-top:1.25vw;margin-right:2%;height: 98%; width: 98%;position:absolute;left:0;"
					  srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img{position:absolute;width:100%;margin:auto}span{position:absolute;width:100%;top:0;bottom:0;margin:auto;height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href={{$subclass->video_alumni_testi_1}}?autoplay=1><img src={{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_1)}} class='banner-sub-program' style=''><span>▶</span></a>"
					  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					  allowfullscreen
					></iframe>
					@elseif($subclass->m_thumbnail_video_alumni_testi_1)
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_1)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-right:2%;width:98%'>
					@endif
					<!--img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->video_alumni_testi_1) }}" style="width:98%;margin-top:1.25vw;margin-right:2%;"-->
					
				</div>
				@endif
				@if($subclass->m_thumbnail_video_alumni_testi_2)
				<div class="col-md-6" >
					
					@if($subclass->video_alumni_testi_2)
					<img id="m_img_video_alumni_testi_2" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_2)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-left:2%;width:98%;opacity:0'>
					<iframe
						id="m_iframe_video_alumni_testi_2"
						class="banner-sub-program"
					  width="98%"
					  scrolling="no" 
					  src="{{ $subclass->video_alumni_testi_2 }}"
					  style="margin-top:1.25vw;margin-left:2%;height: 98%; width: 98%;position:absolute;right:0;"
					  srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img{position:absolute;width:100%;margin:auto}span{position:absolute;width:100%;top:0;bottom:0;margin:auto;height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href={{$subclass->video_alumni_testi_2}}?autoplay=1><img src={{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_2)}} class='banner-sub-program' style=''><span>▶</span></a>"
					  frameborder="0"
					  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					  allowfullscreen
					  
					></iframe>
					@elseif($subclass->m_thumbnail_video_alumni_testi_2)
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_thumbnail_video_alumni_testi_2)}}" class='banner-sub-program' style='margin-top:1.25vw;margin-left:2%;width:98%'>
					@endif
					<!--img class="banner-sub-program" src="{{ url('subclass/'.$subclass->id.'/'.$subclass->thumbnail_video_alumni_testi_2) }}" style="width:98%;margin-top:1.25vw;margin-left:2%"-->
					
				</div>
				@endif
			</div>
			@if($subclass->daftar_sekarang_2)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:66vw; height: 16vw; background-color: {{$subclass->daftar_sekarang_2_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_2_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_2_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_2 !!}</button>
				</div>
			</div>
			@endif
			@if($subclass->m_banner_tagline != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_tagline) }}" style="width:100%;margin-top:1.25vw;">
				</div>
			</div>
			@endif
			@if($subclass->m_banner_slider_foto_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12" style="margin-top:1.25vw;">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_slider_foto_alumni)}}" style="width:100%">
					@if($subclass->photos->count() > 0)
					<div class="swiper-container m-swiper-container1 text-center" style="max-height:100%;width:100%;position:absolute;bottom:0;margin: auto">
						<div class="swiper-wrapper"  >
							@foreach($subclass->photos as $photo)
								<div class="swiper-slide">
									<img src="{{ url('subclassphotoalumni/'.$photo->id.'/'.$photo->photo)}}" style="width:83.5%">
								</div>
							@endforeach
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination m-swiper-pagination1"></div>
						
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next m-swiper-button-next1"></div>
					<div class="swiper-button-prev m-swiper-button-prev1"></div>
					@endif
				</div>
			</div>
			@endif
			@if($subclass->m_gambar_aktifitas_belajar != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_gambar_aktifitas_belajar) }}" style="width:100%;margin-top:1.25vw;">
					
				</div>
			</div>
			@endif
			@if($subclass->m_banner_slider_chat_alumni != "")
			<div class="row no-gutters">
				<div class="col-md-12" style="margin-top:1.25vw;">
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_slider_chat_alumni)}}" style="width:100%">
					@if($subclass->chats->count() > 0)
					<div class="swiper-container m-swiper-container2 text-center" style="max-height:100%;width:90%;position:absolute;bottom:0;margin-left:5%; margin-right: 5%">
						<div class="swiper-wrapper"  >
							@foreach($subclass->chats as $chat)
								<div class="swiper-slide">
									<img src="{{ url('subclasschatalumni/'.$chat->id.'/'.$chat->chat)}}" style="width:83.5%;max-height:100%;min-height:100%">
								</div>
							@endforeach
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination m-swiper-pagination2"></div>
						
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next m-swiper-button-next2"></div>
					<div class="swiper-button-prev m-swiper-button-prev2"></div>
					@endif
				</div>
			</div>
			@endif
			@if($subclass->m_banner_closing != "")
			<div class="row no-gutters">
				<div class="col-md-12">
					
					<img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->m_banner_closing) }}" style="width:100%;margin-top:1.25vw;">
					<div id="m-countdown" style="position:absolute;margin:auto;top:80%;bottom:0;text-align:center;width:100%;font-weight:bold;font-size:5vw;">
						
					</div>					
				</div>
			</div>
			@endif
			@if( $subclass->daftar_sekarang_3)
			<div class="row no-gutters text-center">
				<div class="col-md-12">
					<button @auth class="btn" onclick="addToCart();" @else href="#login-form" class="btn login popup-with-form" @endauth style="width:66vw; height: 16vw; background-color: {{$subclass->daftar_sekarang_3_warna_button}}; font-weight: bold; font-size:{{$subclass->daftar_sekarang_3_font}}vw;padding-top:1.25vw;margin-top:1.23vw;color:{{$subclass->daftar_sekarang_3_warna}};border-radius:100px">{!! $subclass->daftar_sekarang_3 !!}</button>
				</div>
			</div>
			@endif
		</div>
		
	</div>
@endsection

@section('component')
    
    <!-- subscribe_newsletter_Start -->
    <!--div class="subscribe_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Volans</h3>
                        <p>Daftarkan emailmu untuk mendapatkan soal dan pembahasan materi UTBK-SBMPTN secara gratis dari Volans Education</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4>Masukkan email kamu di bawah ini :</h4>
                        <form action="{{ route('subscribersstore') }}" class="newsletter_form">
                            <input type="text" name="email" required placeholder="Enter your mail">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--
    <!-- subscribe_newsletter_end -->

    <!-- our_latest_blog_start -->
    <!--div class="our_latest_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Kabar Terbaru Seleksi Kampus</h3>
                    </div>
                </div>
            </div>
		</div>
            <div class="swiper-container swiper-container3 text-center" style="width:80%">
			<div class="swiper-wrapper"  >
				@foreach($blogs as $blog)
				<div class="swiper-slide">
					<div class="thumb" style="width:100%;height:200px;background: url({{url('blog/'.$blog->featured_image)}}); background-size:cover">
						
					</div>
					<div class="content_blog">
						<div class="date">
							<p>{{ date('d/m/Y', strtotime($blog->created_at)) }}</p>
						</div>
						<div class="blog_meta">
							<h3><a href="{{ url('article/'.$blog->id) }}">{{ strip_tags($blog->title) }}</a></h3>
						</div>
						<p class="blog_text" style="margin-bottom:50px">
							{{ $blog->short_description }}
						</p>
					</div>
				</div>
				@endforeach
			</div>
			
			<div class="swiper-pagination swiper-pagination3"></div>
			<div class="swiper-button-next swiper-button-next3"></div>
			<div class="swiper-button-prev swiper-button-prev3"></div>
		  </div>
    </div-->
    <!-- our_latest_blog_end -->

@endsection

@section('component')
    <!-- form itself end-->
    <form id="buy-form" class="white-popup-block mfp-hide popup-form" method="POST" action="{{ route('buy') }}">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Buy Course</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
							<!--span style="color:white">Email: </span><input type="email" id="email" name="email" title="Isi email pengguna lain jika hendak membeli course untuk pengguna lain" placeholder="Isi email pengguna lain jika hendak membeli course untuk pengguna lain"-->
                        </div>
						<div class="col-xl-6 col-md-6">
							<span style="color:white">Kupon: <input type="text" id="discount" name="discount" placeholder="Isi dengan kupon untuk mendapat potongan harga" title="Isi dengan kupon untuk mendapat potongan harga">
                        </div>
						<div class="col-xl-6 col-md-6">
							<button type="button" id="cekkupon" class="boxed_btn_orange">Gunakan kupon</button>
                        </div>
						<input type="hidden" id="subclass" name="subclass" value="{{ $subclass->id }}">
						<input type="hidden" id="coupon" name="coupon" value="">
                        <div class="col-xl-6" style="color:white">
                            @if($subclass->price_discount > 0)
								Harga : <span id="harga">{{ $subclass->price_discount }}</span>
							@else
								Harga : <span id="harga">{{ $subclass->price }}</span>
							@endif
                        </div>
						<div class="col-xl-6" style="color:white">
                            Potongan : <span id="potongan">0</span>
                        </div>
						<div class="col-xl-12" style="color:white">
                            Total : <span id="total">@if($subclass->price_discount > 0)
								{{ $subclass->price_discount }}
							@else
								{{ $subclass->price }}
							@endif</span>
                        </div>
						<div class="col-xl-12">
                            <button type="button" id="buycourse" class="boxed_btn_orange">Buy Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->
@endsection

@push('scripts')
<script src="@if(env('APP_ENV') != 'production'){{ env('MIDTRANS_ENDPOINT_SANDBOX') }} @else {{ env('MIDTRANS_ENDPOINT_PRD') }} @endif" data-client-key="@if(env('APP_ENV') != 'production'){{ env('MIDTRANS_CLIENT_KEY_SANDBOX') }} @else {{ env('MIDTRANS_CLIENT_KEY_PRD') }} @endif" ></script>
<script>
	function addToCart(){
		$.ajax({
			url: "{{ route('addToCart') }}",
			dataType: "JSON",
			data: {
				'_token': "{{ csrf_token() }}",
				'subclass_id': $("#subclass_id").val(),
			},
			method: "POST",
			success: function(response){
				//jika error
				if(response.success != true){
					swal("Gagal!", response.message, "error");
				}else{
					swal("Sukses!", response.message, "success");
				}
			},
			error:function(response){
				swal("Error!", "Server error!", "error");
			}
		});

	}
	$(function () {
		
		// Set the date we're counting down to
		var countDownDate = new Date("<?php echo $subclass->expired_date ?> <?php echo $subclass->expired_time ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  document.getElementById("countdown").innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik ";
		  
		  document.getElementById("m-countdown").innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik ";

		  // If the count down is finished, write some text
		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdown").innerHTML = "EXPIRED";
			document.getElementById("m-countdown").innerHTML = "EXPIRED";
		  }
		}, 1000);
		
		var elmnt = document.getElementById("img_video_alumni_testi_2");
		document.getElementById("iframe_video_alumni_testi_2").style.height = elmnt.offsetHeight+"px";
		
		var elmnt = document.getElementById("m_img_video_alumni_testi_2");
		document.getElementById("m_iframe_video_alumni_testi_2").style.height = elmnt.offsetHeight+"px";
		
		var elmnt = document.getElementById("img_video_alumni_testi_1");
		document.getElementById("iframe_video_alumni_testi_1").style.height = elmnt.offsetHeight+"px";
		
		var elmnt = document.getElementById("m_img_video_alumni_testi_1");
		document.getElementById("m_iframe_video_alumni_testi_1").style.height = elmnt.offsetHeight+"px";
		
		$('#cekkupon').click(function(){
			$.post("/cekkupon", {kupon: $("#discount").val(), _token: "{{ csrf_token() }}",}, function(data, status){
					if(data != "0"){
						alert('berhasil menggunakan kupon');
						$("#potongan").html(data);
						var finalprice = parseInt($("#harga").html()) - parseInt($("#potongan").html()); 
						$("#total").html(finalprice);
						$("#coupon").val($("#discount").val());
					}else{
						alert('kupon tidak valid');
						$("#potongan").html(0);
						var finalprice = parseInt($("#harga").html()) - parseInt($("#potongan").html()); 
						$("#total").html(finalprice);
						$("#coupon").val("");
					}
			  });
		});

		
		$('#buycourse').click(function(){
			$.post("/buy", {discount: $("#potongan").html(), price: $("#harga").html(), subclass_id: $("#subclass").val(), email: $("#email").val(), coupon: $("#coupon").val(), _token: "{{ csrf_token() }}",}, function(data, status){
					if(data == "1"){
						alert('email tidak valid');
					}else if(data == "2"){
						alert('kesalahan sistem dalam menyimpan data, mohon kontak sistem administrator');
					}else if(data == "3"){
						alert('kesalahan sistem dalam menyiapkan token pembayaran, mohon kontak sistem administrator');
					}else if(data == "4"){
						alert('kesalahan sistem dalam menyimpan id pembelian, mohon kontak sistem administrator');
					}else{
						$(".mfp-close").click();
						snap.pay(data, {
						  // Optional
						  onSuccess: function(result){
								$.post("/updatetransactionid", {pdf_url: result.pdf_url, status: result.transaction_status, order_id: result.order_id, transaction_id: result.transaction_id, _token: "{{ csrf_token() }}",}, function(data, status){
									if(data == "1"){
										alert('kesalahan sistem dalam menyimpan id transaksi, mohon kontak sistem administrator');
										location.reload();
									}else{
										//alert(JSON.stringify(result, null, 2));
										alert(result.status_message);
										location.reload();
									}
								});
								
						  },
						  // Optional
						  onPending: function(result){
								$.post("/updatetransactionid", {pdf_url: result.pdf_url, status: result.transaction_status, order_id: result.order_id, transaction_id: result.transaction_id, _token: "{{ csrf_token() }}",}, function(data, status){
									if(data == "1"){
										alert('kesalahan sistem dalam menyimpan id transaksi, mohon kontak sistem administrator');
										location.reload();
									}else{
										//alert(JSON.stringify(result, null, 2));
										alert(result.status_message);
										location.reload();
									}
								});
								
						  },
						  // Optional
						  onError: function(result){
								alert(result.status_message);
								location.reload();
						  }
						});
					}
			  });
		});
	});
</script>

<script src="{{ url('frontend/edumark/css/swiper-bundle.min.js') }}"></script>
<script>

	@if($subclass->photos->count() > 0)
	
	var swiper = new Swiper('.swiper-container1', {
		autoHeight: true, //enable auto height
      slidesPerView: 4,
	  loop: true,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next1',
        prevEl: '.swiper-button-prev1',
      },
	  breakpoints: {
		1200: {
              slidesPerView: 4,
			  slidesPerGroup: 4,
           },
		800: {
			  slidesPerView: 2,
			  slidesPerGroup: 2,
		},
		300: {
			  slidesPerView: 1,
			  slidesPerGroup: 1,
		}
	  }
    });
	
	var swiper = new Swiper('.m-swiper-container1', {
		// autoHeight: true, //enable auto height
      slidesPerView: 1,
	  slidesPerColumn: 2,
	  spaceBetween: 30,
	  //loop: true,
      pagination: {
        el: '.m-swiper-pagination1',
        clickable: true,
      },
      navigation: {
        nextEl: '.m-swiper-button-next1',
        prevEl: '.m-swiper-button-prev1',
      }
    });
	
	@endif
	
	@if($subclass->chats->count() > 0)
	
	var swiper = new Swiper('.swiper-container2', {
		autoHeight: true, //enable auto height
      slidesPerView: 4,
	  loop: true,
      pagination: {
        el: '.swiper-pagination2',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2',
      },
	  breakpoints: {
		1200: {
              slidesPerView: 4,
			  slidesPerGroup: 4,
           },
		800: {
			  slidesPerView: 2,
			  slidesPerGroup: 2,
		},
		300: {
			  slidesPerView: 1,
			  slidesPerGroup: 1,
		}
	  }
    });
	
	var swiper = new Swiper('.m-swiper-container2', {
		autoHeight: true, //enable auto height
      slidesPerView: 4,
	  loop: true,
      pagination: {
        el: '.m-swiper-pagination2',
        clickable: true,
      },
      navigation: {
        nextEl: '.m-swiper-button-next2',
        prevEl: '.m-swiper-button-prev2',
      },
	  breakpoints: {
		1200: {
              slidesPerView: 4,
			  slidesPerGroup: 4,
           },
		800: {
			  slidesPerView: 2,
			  slidesPerGroup: 2,
		},
		300: {
			  slidesPerView: 1,
			  slidesPerGroup: 1,
		}
	  }
    });

	@endif
	
	
</script>
@endpush