<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietloai extends Model
{
    use HasFactory;
    public $timestamps = false;
	
    protected $table = "chitietloai";
   public function Loai()
   {
       return $this-> belongsTo('App\Models\loai','idLoai','id');
   }
//    public function SanPham()
//    {
//        return $this-> hasMany('App\Models\sanpham','idLoaiChiTiet','id');
//    }
public function SanPham()
{
    return $this-> hasMany('App\Models\sanpham','idLoaiChiTiet','id');
}
}
