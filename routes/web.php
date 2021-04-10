<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoaiController;
use App\Http\Controllers\ChiTietLoaiController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\InfoPaymentController;
use App\Http\Controllers\FBController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/admin/dangnhap',[UserController::class,'getDangNhapAdmin']);
Route::post('/admin/dangnhap',[UserController::class,'postDangNhapAdmin']);
Route::get('/admin/dangxuat',[UserController::class,'getDangXuatAdmin']);


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){ 
	

	Route::group(['prefix'=>'loai'],function(){

		Route::get('/danhsach',[LoaiController::class,'getDanhSach']);
		Route::get('/sua/{id}',[LoaiController::class,'getSua']);
		Route::post('/sua/{id}',[LoaiController::class,'postSua']);	
		Route::get('them',[LoaiController::class,'getThem']);
		Route::post('them',[LoaiController::class,'postThem']);
		Route::get('/xoa/{id}',[LoaiController::class,'getXoa']);
	});
  
	
	Route::group(['prefix'=>'user'],function(){
		
		Route::get('danhsach',[UserController::class,'getDanhSach']);
		Route::get('sua/{id}',[UserController::class,'getSua']);
		Route::post('sua/{id}',[UserController::class,'postSua']);
		Route::get('them',[UserController::class,'getThem']);
		Route::post('them',[UserController::class,'postThem']);
		Route::get('xoa/{id}',[UserController::class,'getXoa']);
	});
	
	Route::group(['prefix'=>'chitietloai'],function(){

		Route::get('danhsach',[ChiTietLoaiController::class,'getDanhSach']);
		Route::get('sua/{id}',[ChiTietLoaiController::class,'getSua']);
		Route::post('sua/{id}',[ChiTietLoaiController::class,'postSua']);
		Route::get('them',[ChiTietLoaiController::class,'getThem']);
		Route::post('them',[ChiTietLoaiController::class,'postThem']);
		Route::get('xoa/{id}',[ChiTietLoaiController::class,'getXoa']);
	});

	Route::group(['prefix'=>'sanpham'],function(){

		Route::get('danhsach',[SanPhamController::class,'getDanhSach']);
		Route::get('sua/{id}',[SanPhamController::class,'getSua']);
		Route::post('sua/{id}',[SanPhamController::class,'postSua']);
		Route::get('them',[SanPhamController::class,'getThem']);
		Route::post('them',[SanPhamController::class,'postThem']);
		Route::delete('xoa/{id}',[SanPhamController::class,'getXoa']);
			


	});

	

	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach',[HoaDonController::class,'getDanhSach']);
		Route::get('sua/{id}',[HoaDonController::class,'getSua']);
		Route::post('sua/{id}',[HoaDonController::class,'postSua']);
		Route::get('them',[HoaDonController::class,'getThem']);
		Route::post('them',[HoaDonController::class,'postThem']);
		Route::get('xoa/{id}',[HoaDonController::class,'getXoa']);
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loai/{idLoai}',[AjaxController::class,'getCTL']);
	});
	
});
Route::group(['prefix'=>'frontend'],function(){ 
	
     Route::get('/',[PagesController::class,'getNew'],[GioHangController::class,'savecart']);

	 Route::get('menu/{id}/{idloai}',[PagesController::class,'getSanPhamTheoLoai']);
	 Route::get('menu/{id}/{idloai}/{idCTL}',[PagesController::class,'getSPChiTietLoai']);
	 Route::get('collection/{idMenu}',[PagesController::class,'getSPMenu']);
	 Route::get('/sanpham/{idSP}',[PagesController::class,'getSP']);
	 Route::get('/search',[PagesController::class,'getSearch']);
  
	


	 Route::get('/dangnhap',[PagesController::class,'getLogin']);
	 Route::post('/dangnhap',[PagesController::class,'postLogin']);
	 Route::get('/dangky',[PagesController::class,'getSignup']);
	 Route::post('/dangky',[PagesController::class,'postSignup']);
	 Route::get('/dangxuat',[PagesController::class,'getLogOut']);

	 Route::get('/cart',[GioHangController::class,'showcart']);
	 Route::post('/cart',[GioHangController::class,'savecart']);
	 Route::get('/deleteItemsCart/{rowId}',[GioHangController::class,'deleteItemCart']);
	 Route::post('/updateCart',[GioHangController::class,'updateCart']);
	 Route::get('/payment',[GioHangController::class,'getpayment']);
	 Route::post('/payment',[GioHangController::class,'insertHD'],[GioHangController::class,'savecart']);


	 Route::get('/login', function(){
	 	return view('frontend.login');
	 });

 Route::get('/thongbao', function () {
    return view('frontend.thongbao');
});
 Route::get('/nhap', function () {
    return view('frontend.nhap');
});


});
 Route::get('/nhaptable', function () {
    return view('admin.nhap');
});
 
Route::get('facebook', [FBController::class, 'redirectToFacebook'])->name('loginFacebook');

Route::get('facebook/callback', [FBController::class, 'facebookSignin'])->name('redirectFacebook');