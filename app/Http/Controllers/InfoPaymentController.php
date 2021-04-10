<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Models\menu;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\chitiethd;
use App\Models\hoadon;
use Carbon\Carbon;


// session_start();

class InfoPaymentController extends Controller
{
	// public function __construct()
	// {
	// 	$menu = menu::all();
	// 	view()->share('menu',$menu);
	// }
 //    public function getpayment()
 //    {
 //    	return view('frontend.infopayment');
 //    }
 //    public function insertHD(Request $re)
 //    {
 //    	$hoadon = new hoadon;
 //    // 	// $chitiethd = new chitiethd;
 //    	$this->validate($re,
 //    		[
 //    			'hoten' => 'required|min:2|max:50',
 //    			'email' => 'required|email',
 //    			'sdt' => 'required|integer|min:10|max:10',
 //    			'diachi' => 'required',
    			

 //    		],

 //    		[
 //    			'hoten.required' => 'Bạn chưa nhập tên họ và tên',
 //    			'hoten.min' => 'Tên sản phẩm tối thiểu 2 ký tự',
 //    			'hoten.max' => 'Tên sản phẩm tối đa 50 ký tự',
 //    			'email.required' => 'Bạn chưa nhập email',
 //    			'email.email' => 'Không đúng định dạng email',
 //    			'sdt.required' => 'Bạn chưa nhập số điện thoại',
 //    			'sdt.min' => 'Số điện thoại phải 10 chữ số',
 //    			'sdt.max' => 'Số điện thoại phải 10 chữ số',
 //    			'diachi.integer' => 'Bạn chưa nhập địa chỉ',
    		

 //    		]);

 //    	$hoadon->tenkh = $re->hoten ;
 //    	$hoadon->diachi = $re->diachi ;
 //    	$hoadon->sdt= $re->sdt;
 //    	$hoadon->email = $re->email ;
 //    	$date = Carbon::now('Asia/Ho_Chi_Minh');
 //    	$hoadon->ngaymua = $date;
 //    	$hoadon->ghichu = $re->ghichu;
 //    	$hoadon->save();

    	
 //    }
    


    
}
