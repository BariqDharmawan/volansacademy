<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'testimonial', 'name', 'from', 'image', 'warna', 'ukuran', 'alignment', 'ukuran_mobile'
    ];
}
