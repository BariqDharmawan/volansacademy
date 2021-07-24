<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'date_form_pm', 'no_form_pm', 'division_id', 'producttype_id', 'customer_id', 'pef_date', 'pef_no', 'start_date', 'end_date', 'spk_pks', 'range_spk', 'amount_exclude_ppn', 'owner', 'manager', 'terms_of_payment', 'description', 'is_closed', 'notes',
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
	
	public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
	
	public function division()
    {
        return $this->belongsTo(Division::class);
    }
	
	public function producttype()
    {
        return $this->belongsTo(Producttype::class);
    }
	
	public function projectowner()
    {
        return $this->belongsTo(User::class, 'owner', 'id');
    }
	
	public function projectmanager()
    {
        return $this->belongsTo(User::class, 'manager', 'id');
    }
	
	public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
