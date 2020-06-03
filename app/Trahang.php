<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trahang extends Model
{
    protected $table ='trahang';
    protected $fillable =['id','id_user','id_sanpham','id_donhang','noidung','tinhtrang','ngaytra','soluong'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
    public function donhang(){
        return $this->belongsTo('App\Donhang','id_donhang','id');
    }
}
