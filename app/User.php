<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'whatsapp', 'line_id', 'instagram_id', 'place_of_birth', 'date_of_birth', 'address', 'domicili', 'university', 'school', 'class', 'major', 'semester', 'jenis_kelamin', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function uncomplete()
    {
		$user = auth()->user();
		if($user->name == "" || $user->phone == "" || $user->whatsapp == "" || $user->line_id == "" || $user->instagram_id == "" || $user->place_of_birth == "" || $user->date_of_birth == "" || $user->address == "" || $user->domicili == "" || $user->major == "" || $user->semester == "")
			return true;
		if($user->school == "" && $user->university == "")
			return true;
		if($user->school != "" && $user->class == "")
			return true;
        return false;
    }
	
	public function orders(){
		return $this->hasMany(Order::class, 'user_id', 'id');
	}

    public function carts(){
		return $this->hasMany(Cart::class);
	}

    public function pendingorders(){
		return $this->hasMany(Order::class)->where('status', '=', 'pending');
	}

    public function paidorders(){
		return $this->hasMany(Order::class)->where('status', '=', 'paid');
	}

    public function canceledorders(){
		return $this->hasMany(Order::class)->where('status', '=', 'canceled');
	}

    public function roles()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

}
