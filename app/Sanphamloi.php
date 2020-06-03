<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanphamloi extends Model
{
    protected $table ='sanphamloi';
    protected $fillable =['id','id_user','id_sanpham','tensp','tinhtrang','ngayloi'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
