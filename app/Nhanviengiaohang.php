<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanviengiaohang extends Model
{
    protected $table ='nhanviengiaohang';
    protected $fillable =['id','tennv','gioitinh','sdt','diachi'];
    public $timestamps = false;
    public function giaohang(){
    	return $this->hasMany('App\Giaohang','id_nhanvien','id');
    }
}
