<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use DB;


class UserController extends Controller
{
    public function getDanhSach()
    {
    	$user = user::all();
    	return view('admin.user.danhsach',['user'=>$user]);

    }
    public function getSua($id)
    {
     $user = user::find($id);
     return view('admin.user.sua',['user'=> $user]);
    }
      public function postSua(Request $re,$id)
    {
       $this->validate($re,
    		[
    			'name' => 'required|min:3',
                  'sdt' => 'required|numeric',
    		],

    		[
    			'name.required' => 'Bạn chưa nhập tên người dùng',
    			'name.min' => 'Ten ít nhất 3 ký tự',
                   'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.numeric' =>'Số điện thoại phải là số',
    		]);
       $user =  user::find($id);
    	$user->ten= $re->name;
    	
        $user->gioitinh = $re->gioitinh;
         $a = DB::table('users')->where('sdt',  $re->sdt)->get();
         foreach ($a as  $value) {
             
             if($re->email == $value->email)
             {
                return redirect('admin/user/sua/'.$id)->with('thongbao1','Email này đã đăng kí tài khoản!');
             }
         }
        $user->sdt=$re->sdt;
        $user->email= $re->email;
    	$user->quyen= $re->quyen;
        $user->password= bcrypt($re->password) ;
        $user->facebook_id ="";

    	if($re->changepassword=='on')
    	{
    		$this->validate($re,
    		[
    			'password' => 'required|min:8|max:25',
    			'passwordagain' => 'required|same:password',
              
    		],

    		[
    			'password.min' => 'Mật khẩu ít nhất 8 ký tự',
    			'password.max' => 'Mật khẩu tối đa 25 ký tự',
    			'password.required' => 'Bạn chưa nhập password',
    			'passwordagain.same' => 'Mật khẩu nhập lại không trùng khớp', 
    			'passwordagain.required' => 'Bạn chưa nhập lại password',
                
    		]);
    	}
    	$user->save();
    	return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa user thành công');
    }
    public function getThem()
    {
    	
    	return view('admin.user.them');
    }
     public function postThem(Request $re)
	{
    	$this->validate($re,
    		[
    			'name' => 'required|min:6',
    			'email'=> 'required|email|unique:users,email',
    			'password' => 'required|min:8|max:25',
    			'passwordagain' => 'required|same:password',
                'sdt' => 'required|numeric',
    		],

    		[
    			'name.required' => 'Bạn chưa nhập tên người dùng',
    			'name.min' => 'Tên ít nhất 6 ký tự',

    			'email.required' => 'Bạn chưa nhập email',
                'email.unique' => 'Email này đã đăng kí tài khoản!',

    			'password.min' => 'Mật khẩu ít nhất 8 ký tự',
    			'password.max' => 'Mật khẩu tối đa 25 ký tự',
    			'password.required' => 'Bạn chưa nhập password',

    			'passwordagain.same' => 'Mật khẩu nhập lại không trùng khớp', 
    			'passwordagain.required' => 'Bạn chưa nhập lại password',

                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.numeric' =>'Số điện thoại phải là số',

    		]);
    	$user = new user;
    	$user->ten= $re->name;
        $user->sdt= $re->sdt;
    	$user->email= $re->email;
    	$user->password= bcrypt($re->password);
        $user->gioitinh = $re->gioitinh;
    	$user->quyen= $re->quyen;
        $user->facebook_id ="";
    	$user->save();

    	return redirect('admin/user/them')->with('thongbao','Bạn đã thêm user thành công');

    }
    public function getXoa($id)
    {
        $user = user::find($id);
        
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa user thành công');
    }
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $re)
     {
            $this->validate($re,
        [
            'email'=> 'required',
            'password' => 'required|min:3|max:32',
        ],

        [
            'email.required' => 'Bạn chưa nhập email',
            'password.min' => 'password 3->32',
            'password.max' => 'password 3->100',
            'password.required' => 'Bạn chưa nhập password',
        ]);

       //echo $re->password;
       
        if(Auth::attempt(['email'=>$re->email, 'password'=>$re->password  ]))
        {

            return redirect('admin/loai/danhsach');
        }
        else 
        {
         
           
             return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }

    
    }
     public function getDangXuatAdmin(){
        Auth::logout();
        return redirect()->back();
    }
    
}
