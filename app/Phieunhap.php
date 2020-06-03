<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    protected $table ='phieunhap';
    protected $fillable =['id','id_sanpham','gianhap','soluong','ngaynhap'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
}
