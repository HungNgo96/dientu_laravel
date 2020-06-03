<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soluongsanpham extends Model
{
    protected $table ='soluongsanpham';
    protected $fillable =['id','id_sanpham','soluongcon','tongsoluong'];
    public $timestamps = false;
    public function sanpham(){
        return $this->belongsTo()('App\Sanpham','id_sanpham','id');
    }
}
