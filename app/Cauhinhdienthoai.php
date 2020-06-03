<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cauhinhdienthoai extends Model
{
    protected $table ='cauhinhdienthoai';
    protected $fillable=['id','id_sanpham','manhinh','hdh','camera','cpu','ram','bonho','pin','thongtinkhac'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
}
