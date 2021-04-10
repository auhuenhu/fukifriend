<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoadon;
use App\Models\chitiethd;


use DB;

class HoaDonController extends Controller
{
    public function getDanhSach()
    {
        $hoadon = hoadon::all();
         $slsp = DB::table('chitiethd')->leftjoin('hoadon', 'idHoaDon', '=', 'hoadon.id')->get(); 
    
        // ->where('chitiethd.idHoaDon','hoadon.id')->select('soluong')->get();


        // ->where($chitiethd->idHoaDon,$hoadon->id)->select('soluong')->get();


      
    	return view('admin.hoadon.danhsach',['hoadon'=>$hoadon,'slsp'=>$slsp]);
    }
    public function getSua($id)
    { 
        $hoadon = hoadon::find($id);

    	return view('admin.hoadon.sua',['hoadon'=>$hoadon]);

    }
     public function postSua(Request $re,$id)
    { 
        $hoadon = hoadon::find($id);
        $hoadon->tenkh= $re->tenkh;
        $hoadon->sdt= $re->sdt;
        $hoadon->diachi = $re->diachi;
        $hoadon->save();

    	return redirect('admin/hoadon/sua/'.$id)->with('thongbao','Bạn đã sửa thông tin hóa đơn thành công!');

    }
}
