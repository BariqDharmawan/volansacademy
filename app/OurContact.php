<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurContact extends Model
{
    protected $fillable = ['name', 'value', 'platform', 'link', 'is_address'];

    public function scopeIsAddress($query, $isAddress)
    {
        return $query->where('is_address', $isAddress);
    }
}
