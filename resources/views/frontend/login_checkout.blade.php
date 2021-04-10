 @extends('master')
@section('content')
<form action="{{URL::to('/frontend/dangnhap')}}" method="post" class="beta-form-checkout">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row" style="margin: 40px 20px;">
            <div class="col-md-2"></div>
            <div class="col-md-8" >
              <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 20px;margin-top: 60;px;padding-left: 20px;" type="email" name="email" placeholder="Email" required>
              <input style="width: 345px;height: 53px;background: #ededed;border: none;padding-left: 20px;" type="password" name="password" placeholder="Mật khẩu" required>
              <div class="row">
              
                <div class="col-md-7" style="padding: 0px;">
                   <button style="margin-top: 20px;padding: 18px 30px;font-weight: bold;color: #fff;background: #F7BD33" type="submit" >ĐĂNG NHẬP</button>
                </div>
                <div class="col-md-5" style="margin-top: 30px;padding-left: 0px;"> <span style="font-weight: bold;">Quên mật khẩu?</span> <br> <span style="color: #C2B8B8">hoặc</span>  <a style="font-weight: bold;" href="{{URL::to('/frontend/dangky')}}">Đăng ký</a> </div>


                  

              </div>
             
              
            </div>
            <div class="col-md-2"></div>

        </div>
      </form>
@endsection