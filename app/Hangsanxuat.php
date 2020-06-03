<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hangsanxuat extends Model
{
    protected $table = 'hangsanxuat';
    protected $fillable = ['id', 'tenhangsanxuat', 'logo'];
    public $timestamps = false;
    public function sanpham()
    {
        return $this->hasMany('App\Sanpham', 'id_hangsanxuat', 'id');
    }
    public function dongsanpham(){
        return $this->hasMany('App\Dongsanpham','id_hangsanxuat','id');
    }
}
