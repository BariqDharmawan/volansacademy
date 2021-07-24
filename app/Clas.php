<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = "classes";
    protected $fillable = [
        'name', 'description', 'banner', 'inactive', 'external_link'
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
	
	public function subclasses()
    {
        return $this->hasMany(Subclass::class, 'class_id', 'id');
    }
}
