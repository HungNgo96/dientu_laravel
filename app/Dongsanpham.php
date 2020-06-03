<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dongsanpham extends Model
{
    protected $table = 'dongsanpham';
    protected $fillable = ['id', 'tendongsanpham', 'id_hangsanxuat'];
    public $timestamps = false;
    public function hangsanxuat(){
        $this->belongsTo('App\Hangsanxuat','id_hangsanxuat','id');
    }
}
