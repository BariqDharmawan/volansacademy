<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    
    protected $fillable = [
        'subclass_id', 'user_id', 'qty', 'selected'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
	public function subclass()
    {
        return $this->belongsTo(Subclass::class, 'subclass_id', 'id');
    }
}
