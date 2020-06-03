<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    protected $table ='chitietdonhang';
    protected $fillable =['id','id_donhang','id_sanpham','soluong','dongia'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
    public function donhang(){
        return $this->belongsTo('App\Donhang','id_donhang','id');
    }
}
