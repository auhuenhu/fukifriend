<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    public $timestamps = false;
    

    protected $table = "sanpham";
    protected $primaryKey = 'id';
    protected $casts = [
        'dacdiem' => 'array'
        
    ];
    // public function Loai()
    // {
    // 	return $this-> belongsTo('App\Models\loai','idLoai','id');
    // }
    // public function ChiTietLoai()
    // {
    // 	return $this-> belongsTo('App\Models\chitietloai','idLoaiChiTiet','id');
    // }
    public function ChiTietLoai()
    {
    	return $this-> belongsTo('App\Models\chitietloai','idLoaiChiTiet','id');
    }
    public function ChiTietHD()
    {
    	return $this-> hasMany('App\Models\chitiethd','idSP','id');
    }
    
}
