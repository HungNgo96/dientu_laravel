<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use App\Notifications\InvoicePaid;
class Donhang extends Model
{
    
    protected $table ='donhang';
    protected $fillable =['id','id_user','tongtien','trangthai','ngaydat'];
    public $timestamps = false;
    public function chitietdonhang(){
        return $this->hasMany('App\Chitietdonhang','id_donhang','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
    public function trahang(){
        return $this->hasOne('App\Trahang','id_donhang','id');
     }
    public function giaohang(){
        return $this->hasOne('App\Giaohang','id_donhang','id');
      }
}
