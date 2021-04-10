<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\chitietloai;
use App\Models\loai;
use Carbon\Carbon;
use DB;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
		// $loai = loai::all();
  //       dd($loai);
  //       //$sanpham = sanpham::all();
  //       //$dacdiem = json_decode(sanpham::select('dacdiem')->get()) ;
  //       //dd($dacdiem);
  //       // $sp = DB::table('sanpham')->select('dacdiem')->get();
       
  //       // $decode = json_decode($sp);

        
  //       $sanpham = json_decode(sanpham::all());
  //       //dd($sanpham);
       
  //       $spham = sanpham::all();
        
        
      
    // dd($sanpham);
       // dd(json_decode($sanpham));



       
     $sanpham = json_decode(sanpham::all());
    
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    
         
     
        
		
    }
     public function getThem()
    {
    	$chitietloai = chitietloai::all();
    	$loai = loai::all();
       
            	return view('admin.sanpham.them',['chitietloai'=>$chitietloai,'loai'=>$loai]);
    	
    }
  

     public function postThem(Request $re)
    
	{
     
  

    	$this->validate($re,
    		[
    			'Ten' => 'required|min:2|max:50',
    			
    			'Gia' => 'required|numeric|integer',
    			'MaLoai' => 'required',
    			'TenLoaiChiTiet' => 'required',
    			'Hinh' => 'required',

    		],

    		[
    			'Ten.required' => 'Bạn chưa nhập tên loại tin',
    			'Ten.min' => 'Tên sản phẩm tối thiểu 2 ký tự',
    			'Ten.max' => 'Tên sản phẩm tối đa 50 ký tự',
    			
    			'Gia.required' => 'Bạn chưa nhập giá',
    			'Gia.numeric' => 'Giá phải là số nguyên',
    			'Gia.integer' => 'Giá phải là số',
    			'MaLoai.required' => 'Bạn chưa chọn mã loại',
    			'TenLoaiChiTiet.required' => 'Bạn chưa chọn tên loại chi tiết',
                'Hinh.required' => 'Bạn chưa chọn hình'


    		]);
    	$sanpham = new sanpham;
     

        $a = DB::table('sanpham')->orderBy('id', 'desc')->first();
      
        $sanpham->id= ($a->id)+1;
    	$sanpham->tensp= $re->Ten;
    	$sanpham->dacdiem= 0;
    	$sanpham->mota= $re->MoTa;
    	
    	if($re->hasFile('Hinh'))
    	{	
    		$file = $re->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/sanpham/them')->with('thongbao','Sai định dạng file ');
    		}
    		$name= $file->getClientOriginalName();
    		$file->move('upload/img',$name);
    		$sanpham->Hinh =$name;

    	}

    	$sanpham->idLoai= $re->MaLoai;
    	$sanpham->idLoaiChiTiet= $re->TenLoaiChiTiet;
    	$sanpham->gia= $re->Gia;
    	$date = Carbon::now('Asia/Ho_Chi_Minh');
    	$sanpham->ngaynhap= $date;
    	$sanpham->save();
    	return redirect('admin/sanpham/them')->with('thongbao','Bạn đã thêm sản phẩm thành công');

    }
	public function getSua($id)
    {
        $sanpham = sanpham::find($id);
        $loai = loai::all();
        $chitietloai = chitietloai::all();
        return view('admin.sanpham.sua',['sanpham'=> $sanpham,'loai'=>$loai,'chitietloai'=>$chitietloai]);
    }

    public function postSua(Request $re,$id)
    {
 		 $sanpham = sanpham::find($id);
 		$this->validate($re,
    		[   		
    			'Ten' => 'required|min:2|max:50',
    			'DacDiem' => 'required|min:2',
    			'Gia' => 'required|numeric|integer',
    			'SoLuong' => 'required|numeric',
    			'MaLoai' => 'required',
    			'TenLoaiChiTiet' => 'required',  			
    		],

    		[
    			'Ten.required' => 'Bạn chưa nhập tên loại tin',
    			'Ten.min' => 'Tên sản phẩm tối thiểu 2 ký tự',
    			'Ten.max' => 'Tên sản phẩm tối đa 50 ký tự',
    			'DacDiem.required' => 'Bạn chưa nhập tiêu đề',
    			'DacDiem.min' => 'Đặc điểm sản phẩm tối thiểu 2 ký tự',
    			'Gia.required' => 'Bạn chưa nhập giá',
    			'Gia.numeric' => 'Giá phải là số nguyên',
    			'Gia.integer' => 'Giá phải là số',
    			'SoLuong.required' => 'Bạn chưa nhập số lượng',
    			'SoLuong.numeric' => 'Số lượng phải là số nguyên',
    			'SoLuong.integer' => 'Số lượng phải là số',
    			'MaLoai.required' => 'Bạn chưa chọn mã loại',
    			'TenLoaiChiTiet.required' => 'Bạn chưa chọn tên loại chi tiết',
    		]);
    	$sanpham->tensp= $re->Ten;
    	$sanpham->dacdiem= $re->DacDiem;
    	$sanpham->mota= $re->MoTa;
    	if($re->hasFile('Hinh'))
    	{	
    		$file = $re->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sai định dạng file ');
    		}
    		$name= $file->getClientOriginalName();
    		$file->move('upload/img',$name);
    		$sanpham->Hinh =$name;
    	}
    	$sanpham->idLoai= $re->MaLoai;
    	$sanpham->idLoaiChiTiet= $re->TenLoaiChiTiet;
    	$sanpham->gia= $re->Gia;
    	
    	$date = Carbon::now('Asia/Ho_Chi_Minh');
    	$sanpham->ngaynhap= $date;
    	$sanpham->save();
    	return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Bạn đã sửa sản phẩm thành công');
    }
    public function getXoa($id)
    {
    	$sanpham = sanpham::findOrFail($id) ;
        $sanpham->delete();   
        return response()->json(['status'=> 'Đã xóa thành công']);
    }
}

