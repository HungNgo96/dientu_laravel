<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    protected $table = 'hinhanh';
    protected $fillable = ['id', 'id_sanpham', 'tenhinh'];
    public $timestamps = false;
}
