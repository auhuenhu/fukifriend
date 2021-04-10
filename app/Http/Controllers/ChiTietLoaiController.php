<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\loai;
use App\Models\chitietloai;
use DB;

class ChiTietLoaiController extends Controller
{
   
    public function getDanhSach()
    {
        $loai = loai::all();

      
    	return view('admin.chitietloai.danhsach',['loai'=>$loai]);
    }
     public function getThem()
    {
        $loai = loai::all();
        $chitietloai = chitietloai::all();
      
        return view('admin.chitietloai.them',['loai'=>$loai,'chitietloai'=>$chitietloai]);
    }
                        
    public function postThem(Request $re)
    {

        $this->validate($re,
            [
                'TenChiTietLoai'=> 'required|min:2',
                'TenLoai'=> 'required',


               
            ],

            [
                'TenChiTietLoai.required' => 'Bạn chưa nhập tên chi tiết loại',
                'TenChiTietLoai.min' => 'Tên chi tiết loại tối thiểu 2 ký tự',
              


                'TenLoai.required' => 'Bạn chưa chọn tên loại',
             

                
            ]);

        $chitietloai = new chitietloai;
        $chitietloai->tenloaichitiet=$re->TenChiTietLoai;    
        $chitietloai->idLoai=$re->TenLoai;
        
         $a = DB::table('chitietloai')->where('tenloaichitiet', $re->TenChiTietLoai)->get();
         foreach ($a as  $value) {
             
             if($re->TenLoai == $value->idLoai)
             {
                return redirect('admin/chitietloai/them')->with('thongbao1','Chi tiết loại thuộc loại này đã tồn tại!');
             }
         }
       

   
      
        $chitietloai->save();
        return redirect('admin/chitietloai/them')->with('thongbao1','Bạn đã thêm chi tiết loại thành công');
        
        }
        

    

        public function getXoa($id)
    {
        $chitietloai = chitietloai::find($id);
        $a = DB::table('sanpham')->where('idLoaiChiTiet', $id)->get();
        foreach ($a as  $value)
        {
            if($chitietloai->id==$value->idLoaiChiTiet)
            {
                 return redirect('admin/chitietloai/danhsach')->with('thongbao1','Bạn không thể xóa loại sản phẩm này!');

            }
        }
        
       $chitietloai->delete();
        return redirect('admin/chitietloai/danhsach')->with('thongbao','Bạn đã xóa loại sản phẩm thành công');


    }

 public function getSua($id)
    {
        $chitietloai = chitietloai::find($id);
        $loai = loai::all();
      

        return view('admin.chitietloai.sua',['chitietloai'=> $chitietloai,'loai'=>$loai]);
    }
    public function postSua(Request $re,$id)
    {
 $chitietloai = chitietloai::find($id);

    $this->validate($re,
            [
                'TenChiTietLoai'=> 'required|min:2',
                'MaLoai'=> 'required',

            ],

            [
                'TenChiTietLoai.required' => 'Bạn chưa nhập tên chi tiết loại',
                'TenChiTietLoai.min' => 'Tên chi tiết loại tối thiểu 2 ký tự',
                'MaLoai.required' => 'Bạn chưa chọn tên loại',
             
            ]);

        $chitietloai->tenloaichitiet=$re->TenChiTietLoai;    
        $chitietloai->idLoai=$re->MaLoai;
          $a = DB::table('chitietloai')->where('tenloaichitiet', $re->TenChiTietLoai)->get();
         foreach ($a as  $value) {
             
             if($re->MaLoai == $value->idLoai)
             {
                return redirect('admin/chitietloai/sua/'.$id)->with('thongbao1','Chi tiết loại thuộc loại này đã tồn tại!');
             }
         }
        $chitietloai->save();
        return redirect('admin/chitietloai/sua/'.$id)->with('thongbao','Bạn đã sửa loại sản phẩm thành công');

    }
 
}
