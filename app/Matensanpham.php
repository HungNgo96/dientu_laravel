<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matensanpham extends Model
{
    protected $table='matensanpham';
    protected $fillable=['id','tenmasanpham'];
    public $timestamps = false;
    public function sanpham(){
        return $this->hasMany('App\Sanpham','id_matensanpham','id');
    }
}
