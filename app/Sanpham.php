<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = 'sanpham';
    protected $fillable = ['id', 'id_loaisanpham', 'id_matensanpham','id_hangsanxuat','tensp','dongia','hinhanh','baohanh'];
    public $timestamps = false;
    public function loaisanpham(){
        return $this->belongsTo('App\Loaisanpham','id_loaisanpham','id');
    }
    public function matensanpham(){
        return $this->belongsTo('App\Matensanpham','id_matensanpham','id');
    }
    public function hangsanxuat(){
        return $this->belongsTo('App\Hangsanxuat','id_hangsanxuat','id');
    }
    public function mota(){
        return $this->hasOne('App\Mota','id_sanpham','id');
    }
    public function luotxem(){
        return $this->hasOne('App\Luotxem','id_sanpham','id');
    }
    public function cauhinhdienthoai(){
        return $this->hasOne('App\Cauhinhdienthoai','id_sanpham','id');
    }
    public function cauhinhmaytinh(){
        return $this->hasOne('App\Cauhinhmaytinh','id_sanpham','id');
    }
    public function chitietkhuyenmai(){
        return $this->hasMany('App\Chitietkhuyenmai','id_sanpham','id');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\Chitietdonhang','id_sanpham','id');
    }
    public function sanphamloi(){
        return $this->hasMany('App\Sanphamloi','id_sanpham','id');
    }
    public function trahang(){
        return $this->hasMany('App\Trahang','id_sanpham','id');
    }
    public function soluongsanpham(){
        return $this->hasOne('App\Soluongsanpham','id_sanpham','id');
    }
    public function phieunhap(){
        return $this->hasMany('App\Phieunhap','id_sanpham','id');
    }
   
}
