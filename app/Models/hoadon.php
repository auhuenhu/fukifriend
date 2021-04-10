<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $table = "hoadon";
    // public function ChiTietHoaDon()
    // {
    // 	return $this-> hasMany('App\Models\chitiethd','id','id');
    // }
     public function ChiTietHoaDon()
    {
    	return $this-> hasMany('App\Models\chitiethd','idHoaDon','id');
    }
   
}
