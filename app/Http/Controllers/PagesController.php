<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\loai;
use App\Models\chitietloai;
use App\Models\sanpham;
use Illuminate\Pagination\Paginater;
use App\Models\user;
use App\Models\khachhang;
use App\Models\chitiethd;


use Auth;


use DB;


class PagesController extends Controller
{
	public function __construct()
	{
		$menu = menu::all();
		view()->share('menu',$menu);
        if(Auth::check())
        {
            view()->share('user',Auth::user());
        }

	}
    public function getNew()
    {    
 
       $menu = menu::all();
	   $loai = loai::all();
	   $sanphammoi = sanpham::orderByRaw('(ngaynhap)desc')->take(8)->get();
       //$best = chitiethd::orderByRaw('(soluong)desc')->select('idSP')->take(4)->get();
       $best = DB::table('chitiethd')->join('sanpham', 'idSP', '=', 'sanpham.id')->orderBy('idSP', 'desc')->take(4)->get();

        return view('frontend.index',['menu'=>$menu,'loai'=>$loai,'sanphammoi'=>$sanphammoi,'best'=>$best]);

     
      

    }
    public function getSPMenu($id)
    {
      $me = menu::find($id);
        return view('frontend.allpro',['me'=>$me]);
    }
	
	public function getSanPhamTheoLoai($id, $idLoai)
	{
		$loai = loai::where('id',$idLoai)->get();
		return view('frontend.menu1',['loai'=>$loai]);

	}
	public function getSPChiTietLoai($id,$idLoai,$idCTL)
	{
		
		$ctl = chitietloai::where('id',$idCTL)->get();
		return view('frontend.menu2',['ctl'=>$ctl]);
	}
	 public function getSP($id)
	{
		$sp = sanpham::find($id);
		$sanpham = json_decode($sp);	
		
		return view('frontend.sanpham',['sanpham'=>$sanpham,'sp'=>$sp]);

	}
	public function getLogin()
	{
		return view('frontend.dangnhap');
	}
	  public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email.',
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Vui lòng nhập password từ 6-20 ký tự.',
                'password.max'=>'Vui lòng nhập password từ 6-20 ký tự.'
            ]
        );
        $credentials= array('email'=>$req ->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect('frontend/index');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->back();
    }
	public function getSignup(){
        return view('frontend.dangky');
    }
     public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:12',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email.',
                'email.unique'=>'Email đã có người sử dụng.',
                'password.required'=>'Vui lòng nhập password',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Vui lòng nhập password từ 6-12 ký tự.',
                'password.max'=>'Vui lòng nhập password từ 6-12 ký tự.',
                'fullname.required'=>'Vui lòng nhập tên',
                're_password.required'=>'Vui lòng nhập lại password.'

            ]);
        $user= new user();
        $user->ten=$req->fullname;
        $user->email=$req->email;
        $user->password= bcrypt($req ->password);
        $user->sdt=$req->phone;
        $user->gioitinh = $req->rdbGender;
        $user->quyen = 0;
      
       
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
        
    }

	public function getSearch(Request $request)
	{
	$search =  $request->input('txtSearch');
        if($search!=""){
            $pro = sanpham::where(function ($query) use ($search)
            {
                $query->where('tensp', 'like', '%'.$search.'%')
                    ->orWhere('gia', 'like', '%'.$search.'%');
            })
            ->paginate(2);
           
            $pro->appends(['txtSearch' => $search]);
        }
        else {
             $pro = sanpham::paginate(4);
            return redirect('frontend'); 
        }
        return view('frontend.search')->with(['pro'=> $pro,'search'=>$search]);
    }
}
