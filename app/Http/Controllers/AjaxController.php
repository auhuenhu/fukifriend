<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chitietloai;
use App\Models\loai;


class AjaxController extends Controller
{
    public function getCTL($idLoai)
    {
        $chitietloai = chitietloai::where('idLoai',$idLoai)->get(); // tìm chi tiết loại có idLoai đó và trả về route

        foreach($chitietloai as $ctl)
        {
        	
          		  echo " <option value='".$ctl->id."'>".$ctl->tenloaichitiet."</option> ";

        }


    }
    // public function getMENU($idLoai)
    // {
    //     $loai = loai::where('id',$idLoai)->get(); 
    //     foreach($chitietloai as $ctl)
    //     {
        	
    //       		  echo " <option value='".$ctl->id."'>".$ctl->tenloaichitiet."</option> ";

    //     }


    // }
}
