<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subclass extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id', 'name', 'description', 'icon', 'inactive', 'facilities', 'periode', 'price', 'price_discount', 'external_link',
		'banner', 'detail_info_program', 'detail_biaya_program', 'garansi_program', 'garansi_program_2', 'gambar_profesi_1', 'gambar_profesi_2', 'banner_konfirmasi', 'fasilitas_program', 'fasilitas_bimbel', 'lokasi_belajar', 'banner_alumni', 'video_alumni_testi_1', 'video_alumni_testi_2', 'thumbnail_video_alumni_testi_1', 'thumbnail_video_alumni_testi_2', 'banner_tagline', 'banner_slider_foto_alumni', 'gambar_aktifitas_belajar', 'banner_slider_chat_alumni', 'banner_closing', 'sub_name', 'daftar_sekarang_1', 'daftar_sekarang_2', 'daftar_sekarang_3', 'expired_date', 'expired_time', 'konsultasi', 'daftar_sekarang_1_warna_button', 'daftar_sekarang_1_warna', 'daftar_sekarang_1_font', 'daftar_sekarang_1_link', 'daftar_sekarang_2_warna_button', 'daftar_sekarang_2_warna', 'daftar_sekarang_2_font', 'daftar_sekarang_2_link', 'daftar_sekarang_3_warna_button', 'daftar_sekarang_3_warna', 'daftar_sekarang_3_font', 'daftar_sekarang_3_link', 'konsultasi_warna_button', 'konsultasi_warna', 'konsultasi_font', 'konsultasi_link', 'm_banner', 'm_detail_info_program', 'm_detail_biaya_program', 'm_garansi_program', 'm_gambar_profesi_1', 'm_gambar_profesi_2', 'm_banner_konfirmasi', 'm_fasilitas_program', 'm_fasilitas_bimbel', 'm_lokasi_belajar', 'm_banner_alumni', 'm_thumbnail_video_alumni_testi_1', 'm_thumbnail_video_alumni_testi_2', 'm_banner_tagline', 'm_banner_slider_foto_alumni', 'm_gambar_aktifitas_belajar', 'm_banner_slider_chat_alumni', 'm_banner_closing'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
	
	public function clas()
    {
        return $this->belongsTo(Clas::class, 'class_id', 'id');
    }
	
	public function orders()
    {
        return $this->hasMany(Order::class, 'subclass_id', 'id');
    }
	
	public function photos()
    {
        return $this->hasMany(Photo::class, 'subclass_id', 'id');
    }
	
	public function chats()
    {
        return $this->hasMany(Chat::class, 'subclass_id', 'id');
    }
}
