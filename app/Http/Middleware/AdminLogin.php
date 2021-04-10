<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AdminLogin 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //ktra user có đang đăng nhập ko 
        if(Auth::check())
        {
            $user = Auth::user(); //lay user
            
            if(Auth::user()->quyen == 1)
            {
            return $next($request);

            }
            else
            {

                return redirect('admin/dangnhap')->with('thongbao','Bạn không được phép truy cập trang Admin');
            }

        }
        else
        {
            return redirect('admin/dangnhap');
        }
    }
}
