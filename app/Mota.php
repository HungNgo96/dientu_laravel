<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mota extends Model
{
    protected $table='mota';
    protected $fillable=['id','id_sanpham','mota1','hinhanh1','mota2','hinhanh2','mota3','hinhanh3'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
}
