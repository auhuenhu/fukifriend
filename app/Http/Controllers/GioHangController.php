<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Cart;
use App\Models\menu;
use App\Models\hoadon;
use App\Models\chitiethd;
use Carbon\Carbon;
use Illuminate\Support\Arr;






session_start();
class GioHangController extends Controller
{
	public function __construct(Request $re)
	{
		$menu = menu::all();
       
		
		view()->share('menu',$menu);
	}
       public function showcart()
     {
     	//Cart::destroy();
        return view('frontend.cart');
     }
     public function savecart(Request $re)
     {

     	$id = $re->id;
        
     	
        $this->validate($re,
        [
            'soluong'=> 'required|numeric|integer',
        ],
        [
            'soluong.required' => 'Số lượng không được để trống',
            'soluong.numeric' => 'Số lượng phải là số',
            'soluong.integer' => 'Số lượng phải là số nguyên',


        ]);
        $sl = $re->soluong;
     	$dd = $re->dacdiem;
     	$info = DB::table('sanpham')->where('id',$id)->first();
     	$data['id'] = $info->id;
     	$data['qty'] = $sl;
     	$data['name'] = $info->tensp;
     	$data['price'] = $info->gia;
     	$data['weight'] = $info->gia;
     	$data['options']['image'] = $info->hinh;
     	$data['options']['dacdiem']=$dd;
        $data['options']['soluong']= $info->dacdiem;

     	

     $decode = json_decode($info->dacdiem);

   	
    foreach ($decode as $value) 

    	if($dd==$value->name)
    	{
    		if($re->soluong > $value->sl)
    		{
    			  return redirect('frontend/sanpham/'.$id)->with('thongbao','Sản phẩm vượt quá tồn kho');
    		}
    	}
    	
     	Cart::add($data);

        Session::put('data',$data);
       
     	return Redirect::to('/frontend/cart');

     }

     public function updateCart(Request $re)
     {
        
     	$rowId = $re->rowId;
     	$qtyTempt = $re->qtyTempt;
        $dacdiem = $re->dacdiem;
        $soluongkho = json_decode($re->sl) ;
        foreach ($soluongkho as $value) 
        {
            if($value->name==$dacdiem)
             {

                if($qtyTempt > $value->sl)
                {
                    return redirect('frontend/cart/')->with('thongbao','Sản phẩm vượt quá tồn kho');
                }
                else
                {
                    Cart::update($rowId,$qtyTempt);
                     return Redirect::to('/frontend/cart');
                }
            }

        }
      }
     public function deleteItemCart($rowId)
     {
     	Cart::update($rowId,0);
     		return Redirect::to('/frontend/cart');
     }
    public function getpayment()
    {
        return view('frontend.infopayment');
    }
     public function insertHD(Request $re)
     {

       $hoadon = new hoadon;
       
        $content = Cart::content();
        $idmaxHD =  DB::table('hoadon')->orderBy('id', 'desc')->first();
        $idmaxCTHD =  DB::table('chitiethd')->orderBy('id', 'desc')->first();
        $thongbao = ['hoten'=>$re->hoten,'sdt'=>$re->sdt,'email'=>$re->email,'ghichu'=>$re->ghichu,'tongtien'=>$re->tongtien,'thnahtoan'=>$re->radiott,'vanchuyen'=>$re->radio];

    
          $this->validate($re,
            [
                'hoten' => 'required|min:2|max:50',
                'email' => 'required|email',
                'sdt' => 'required|min:10|max:10',
                'diachi' => 'required',
                
            ],

            [
                'hoten.required' => 'Bạn chưa nhập tên họ và tên',
                'hoten.min' => 'Tên sản phẩm tối thiểu 2 ký tự',
                'hoten.max' => 'Tên sản phẩm tối đa 50 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Không đúng định dạng email',
                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.min' => 'Số điện thoại phải 10 chữ số',
                'sdt.max' => 'Số điện thoại phải 10 chữ số',
                'diachi.integer' => 'Bạn chưa nhập địa chỉ',
            

            ]);
        $hd = DB::table('hoadon')->orderBy('id', 'desc')->first();

        $hoadon->id = $hd->id+1;
        $hoadon->tenkh = $re->hoten ;
        $hoadon->diachi = $re->diachi ;
        $hoadon->sdt= $re->sdt;
        $hoadon->email = $re->email ;
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $hoadon->ngaymua = $date;
        $hoadon->ghichu = $re->ghichu;
        $hoadon->tongtien = $re->tongtien;
        $hoadon->thanhtoan = $re->radiott;
        $hoadon->vanchuyen  = $re->radio;
       $hoadon->save();
        
        $hd = DB::table('hoadon')->orderBy('id', 'desc')->first();

         foreach ($content as $value) {
         $cthd = new chitiethd;
          $ct = DB::table('chitiethd')->orderBy('id', 'desc')->first();
         $cthd->id =  $ct->id+1;
        $cthd->idHoaDon =  $hd->id;
        $cthd->tensp = $value->name;
        $cthd->idSP =  $value->id;
        $cthd->dacdiem = $value->options->dacdiem;
        $cthd->gia =  $value->price;
        $cthd->soluong=$value->qty;
     
       $cthd->save();
        $sanpham = DB::table('sanpham')->where('id',$value->id)->get();
        foreach ($sanpham as $val) {
         $dacdiem =json_decode($val->dacdiem,true);

         $content = Cart::content();
           foreach ($dacdiem as $key => $value) {
             foreach ($content as $data) {


               if($value['name']==$data->options->dacdiem)
               {
                    $value['sl'] = $value['sl']-$data->qty;
                   
                   
                    $replace = array($key=>['name' => $value['name'],'sl'=>$value['sl']]);
                   


                    $dacdiemmoi = array_replace($dacdiem,$replace);
                 
                   

                  DB::table('sanpham')->where('id', $val->id)->update(['dacdiem' => $dacdiemmoi ]);   
                 
              
               

     }


    }
}


     }
    }


         Cart::destroy();
       return view('frontend.thongbao',['hoten'=>$re->hoten,'sdt'=>$re->sdt,'email'=>$re->email,'ghichu'=>$re->ghichu,'tongtien'=>$re->tongtien,'thanhtoan'=>$re->radiott,'vanchuyen'=>$re->radio,'diachi'=>$re->diachi,'sohd'=>$hd->id]);
     



 }
}






   
      
    

 


        


