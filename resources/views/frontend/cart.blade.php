
 @extends('master')
@section('content')
 <?php $content = Cart::content();  ?>
 
<H2 style="text-align: center;margin-bottom: 10px;font-weight: bold;color: #000" >Giỏ hàng của bạn</H2>
<h5 style="text-align: center;color: #777">Có {{Cart::count()}} sản phẩm trong giỏ hàng</h5>
  @if(count($errors) > 0 )
             <div class="alert alert-danger">
                 @foreach($errors->all () as $err)
                    {{$err}} <br>
            
                 @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif

  @foreach($content as $val)
 <div class="row">
     <div class="col-md-1"></div>
     <div class="col-md-10">
         <div class="col-md-2">
            <?php $id = $val->id ?>
            <a href="{{URL::to('frontend/sanpham/'.$id)}}"><img style="height: 120px;width: 120px;border-radius: 15px;" src="image/{{$val->options->image}}"></a>
         </div>
         <div class="col-md-8">
        
             <div>
                <a href="{{URL::to('frontend/sanpham/'.$id)}}"><strong style="font-size: 16px;">{{$val->name}}</strong></a>
               <p>{{$val->options->dacdiem}}</p>
             <p>  {{ number_format($val->price)}}đ</p>

             <form action="frontend/updateCart" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

             <input max="" min="1" name="qtyTempt" autocomplete="off" type="number" value="{{$val->qty}}" style="width: 50px;text-align: center;margin:15px 0px" >

             <input type="hidden" name="count" value="{{Cart::count()}}">
             <input type="hidden" name="rowId" value="{{$val->rowId}}">
             <input type="hidden" name="id" value="{{$val->id}}">
             <input type="hidden" name="sl" value="{{$val->options->soluong}}">
              <input type="hidden" name="dacdiem" value="{{$val->options->dacdiem}}">

           <!--  <input class="btn btn-info" type="submit" name="update" value="CẬP NHẬT"> --> <button type="submit" name="update" ><i data-toggle="tooltip"  data-placement="right" title="Cập nhật" style="font-size: 20px;" class="fa fa-refresh" aria-hidden="true" ></i></button>

           

            </form>
          
           
             </div>
         </div>
         <div class="col-md-2" >
           <a href="{{URL::to('frontend/deleteItemsCart/' .$val->rowId)}} "><i style="font-size: 20px;float: right;" class="fa fa-times" aria-hidden="true"></i></a> 
            <?php
            $tempt = $val->qty * $val->price;
            ?>
            <br>
            <span style="margin-top: 70px;font-size: 15px;font-weight: bold;float: right;"><?php echo number_format($tempt)."đ" ; ?></span>
             
            
         </div>

     </div>
     <div class="col-md-1"></div>

 
 </div>
 @endforeach
    <div class="row">
 <div class="col-md-6"></div>

     <div class="col-md-6" style="padding-right: 30px;" >
         <div class="row" style="float: right;"><span style="font-size: 16px">Tổng tiền: </span><span style="margin-right: 90px;font-size: 28px;font-weight: bold;">{{Cart::subtotal()}}đ</span>
         </div>
             <div class="row" style="float: right;margin-top: 20px;margin-right: 90px;">
              <button style="color: #000;background: #F7BD33;font-size: 14px;width: 180px;padding: 13px 0px;" type="submit">
                <i style="font-size: 13px;" class="fa fa-reply"></i>
                    <a style="color: #000" href="frontend"> TIẾP TỤC MUA HÀNG</a>  
            </button>
                
               <button  style="color: #000;background: #F7BD33;font-size: 14px;width: 200px;padding: 13px 0px;" type="button"
               @if(Cart::count()==0) {{"disabled"}} @endif><a href="frontend/payment" style="@if(Cart::count()==0) {{'pointer-events: none;cursor: default;'}} @endif"  >THANH TOÁN</a></button>
            </div>
    </form>
    </div>
</div>       
 @endsection
