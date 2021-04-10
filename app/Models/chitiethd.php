<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethd extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $table = "chitiethd";
    protected $primaryKey = 'id';
    public function HoaDon()
   
    {
    	return $this-> belongsTo('App\Models\hoadon','idHoaDon','id');
    }
    public function SanPham()
   
    {
    	return $this-> hasMany('App\Models\sanpham','idSP','id');
    }
}
