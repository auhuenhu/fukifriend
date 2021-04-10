	@extends('master')
@section('content')

<div class="row">
    <div class="col-md-6" style="border-right: 2px dotted #ededed">
      <div  class="col-md-1"></div>

      <div  class="col-md-9">
        
          <p style="font-size: 50px;font-weight: bold;text-align: center;height: 150px;border-bottom-width: 30px;">Tạo tài khoản</p>

        <div style="border-bottom: 4px solid #000;width: 80px;margin-left: 50px;"></div>
        
      </div>


      <div  class="col-md-2"></div>

      
    </div>
<div class="col-md-6">     
  <form action="{{URL::to('/frontend/dangky')}}" method="post" class="beta-form-checkout">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row" style="margin: 20px 20px;">
            <div class="col-md-2"></div>
            <div class="col-md-8" >
              @if(count($errors)>0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}
            @endforeach

          </div>
          @endif
          @if(Session::has('thanhcong'))
          <div class="alert alert-success"><h2>{{Session::get('thanhcong')}}</h2></div>
          @endif
              <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 10px;margin-top: 30px;padding-left: 20px;" type="text" name="fullname" placeholder="Nguyễn Văn A" required>
              <input style="margin-bottom:15px;width: 18px;height: 18px" type="radio" name="rdbGender" checked="checked"  value="Nam" > <span style="" >Nam</span>
                <input style="margin-bottom:15px;width: 18px;height: 18px" type="radio" name="rdbGender" value="Nữ"><span > Nữ</span>
               <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 20px;padding-left: 20px;" type="email" name="email" placeholder="abc@xyz.com" required>
              <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 20px;padding-left: 20px;" type="text" name="phone" placeholder="0908135246" required>
               <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 20px;padding-left: 20px;"  type="password" name="password" placeholder="Mật khẩu"  required>
                <input style="width: 345px;height: 53px;background: #ededed;border: none;margin-bottom: 20px;padding-left: 20px;" type="password" name="re_password" placeholder="Nhập lại mật khẩu" required>
              <button style="margin-top: 20px;padding: 18px 30px;font-weight: bold;color: #fff;background: #F7BD33" type="submit" >ĐĂNG KÝ</button>
             
             
             
              
            </div>
            <div class="col-md-2"></div>

        </div>
      </form>

</div>
</div>



	@endsection
