<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    use HasFactory;
    public $timestamps = false;
	
    protected $table = "loai";
   
    // public function ChiTietLoai()
    // {
    // 	return $this-> hasMany('App\Models\chitietloai','idLoai','id');
    // }
    public function ChiTietLoai()
    {
    	return $this-> hasMany('App\Models\chitietloai','idLoai','id');
    }
    // public function Menu()
    // {
    // 	return $this-> belongsTo('App\Models\menu','id','id');
    // }
    public function Menu()
    {
    	return $this-> belongsTo('App\Models\menu','idMenu','id');
    }
    public function SanPham()
    {
        return $this-> hasManyThrough('App\Models\sanpham','App\Models\chitietloai','idLoai','idLoaiChiTiet');
    }
    
}
