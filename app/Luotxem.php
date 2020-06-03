<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luotxem extends Model
{
    protected $table='luotxem';
    protected $fillable=['id','id_sanpham','tongluotxem'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo('App\Sanpham','id_sanpham','id');
    }
}
