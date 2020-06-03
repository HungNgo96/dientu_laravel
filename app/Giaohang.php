<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaohang extends Model
{
    protected $table ='giaohang';
    protected $fillable =['id','id_donhang','id_nhanvien','ngaygiao','trangthai'];
    public $timestamps = false;
    public function donhang(){
    	return $this->belongsTo('App\Donhang','id_donhang','id');
    }
    public function nhanviengiaohang(){
    	return $this->belongsTo('App\Nhanviengiaohang','id_nhanvien','id');
    }
}
