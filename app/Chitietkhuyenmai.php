<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietkhuyenmai extends Model
{
    protected $table = 'chitietkhuyenmai';
    protected $fillable = ['id', 'id_sanpham', 'id_khuyenmai'];
    public $timestamps = false;
    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham', 'id_sanpham', 'id');
    }
    public function khuyenmai()
    {
        return $this->belongsTo('App\Khuyenmai', 'id_khuyenmai', 'id');
    }
}
