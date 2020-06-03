<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\InvoicePaid;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','vaitro','diachi','ten','sdt', 'provider', 'provider_id','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    public function donhang(){
        return $this->hasMany('App\Donhang','id_user','id');
    }
    public function sanphamloi(){
        return $this->hasMany('App\Sanphamloi','id_user','id');
    }
    public function trahang(){
        return $this->hasMany('App\Trahang','id_user','id');
    }
}
