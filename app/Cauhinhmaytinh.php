<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cauhinhmaytinh extends Model
{
    protected $table ='cauhinhmaytinh';
    protected $fillable=['id','id_sanpham','manhinh','hdh','vga','congketnoi','cpu','ram','bonho','pin','thongtinkhac'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
}
