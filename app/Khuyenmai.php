<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    protected $table ='khuyenmai';
    protected $fillable =['id','tenkhuyenmai','hinhthuc','noidung','ngaybatdau','ngayketthuc'];
    public $timestamps = false;
    public function chitietkhuyenmai(){
        return $this->hasMany('App\Chitietkhuyenmai','id_khuyenmai','id');
    }
}
