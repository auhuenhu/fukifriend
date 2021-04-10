<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai;
use App\Models\chitietloai;
use App\Models\menu;
use DB;



class LoaiController extends Controller
{

    public function getDanhSach()
    {
        $loai = loai::all();
      
    	return view('admin.loai.danhsach',['loai'=>$loai]);
    }
  public function getThem()
    {
        $loai = loai::all();
        $menu = menu::all();
        return view('admin.loai.them',['loai'=>$loai,'menu'=>$menu]);
    }
                        
    public function postThem(Request $re)
    {

        $this->validate($re,
            [
                'Ten'=> 'required|min:2', 
            ],

            [
                'Ten.required' => 'Bạn chưa nhập tên sản phẩm',
                'Ten.min' => 'Tên sản phảm tối thiểu 2 ký tự',
            ]);

        $loai = new loai;
        $loai->tenloai = $re->Ten;
        $loai->idMenu = $re->Menu;

         $a = DB::table('loai')->where('tenloai',  $re->Ten)->get();
         foreach ($a as  $value) {
             
             if($re->Menu == $value->idMenu)
             {
                return redirect('admin/chitietloai/them')->with('thongbao1','Loại sản phẩm đã tồn tại trong menu!');
             }
         }
       
        $loai->save();
        return redirect('admin/loai/them')->with('thongbao','Bạn đã thêm loại sản phẩm thành công');

    }
        public function getXoa($id)
    {
        $loai = loai::find($id);
        
foreach ($loai->chitietloai as $value) {
   if($value->idLoai==$loai->id)
   {
     return redirect('admin/loai/danhsach')->with('thongbao1','Bạn không thể xóa loại sản phẩm này!');
   }
   else
   {
      $loai->delete();
        return redirect('admin/loai/danhsach')->with('thongbao','Bạn đã xóa loại sản phẩm thành công');
   }
}
    }

 public function getSua($id)
    {
        $loai = loai::find($id);
        $menu = menu::all();
        return view('admin.loai.sua',['loai'=> $loai,'menu'=>$menu]);
    }
    public function postSua(Request $re,$id)
    {
        $loai = loai::find($id);

        $this->validate($re,
            [
                'Ten'=> 'required|min:2',
            ],

            [
                'Ten.required' => 'Bạn chưa nhập tên sản phẩm',
                'Ten.min' => 'Tên sản phảm tối thiểu 2 ký tự',

            ]);

        $loai->tenloai = $re->Ten;
        $loai->idMenu = $re->Menu;
        $a = DB::table('loai')->where('tenloai',  $re->Ten)->get();
         foreach ($a as  $value) {
             
             if($re->Menu == $value->idMenu)
             {
                return redirect('admin/loai/sua/'.$id)->with('thongbao1','Loại sản phẩm đã tồn tại trong menu!');
             }
         }
        $loai->save();
        return redirect('admin/loai/sua/'.$id)->with('thongbao','Bạn đã sửa loại sản phẩm thành công');

    }
}