<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table = "menu";
    // public function Loai()
    // {
    // 	return $this-> hasMany('App\Models\loai','idMenu','id');
    // }
    public function Loai()
    {
    	return $this-> hasMany('App\Models\loai','idMenu','id');
    }
}
