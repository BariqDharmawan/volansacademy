<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subclass_id', 'price', 'discount', 'user_id', 'for_account', 'coupon', 'status', 'orderid', 'transaction_id', 'pdf_url', 'expired_at'
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
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
	
	public function subclass()
    {
        return $this->belongsTo(Subclass::class, 'subclass_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(Order_detail::class);
    }
}
