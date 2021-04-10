
@extends('master')
@section('content')
<ol class="breadcrumb">
  <li><a href="{{URL::to('frontend/')}}">TRANG CHỦ</a></li>
  <li><a href="#">{{$sp->chitietloai->loai->menu->tenmenu}}</a></li>
  <li class="active">{{$sp->tensp}}</li>
</ol>
<div class="row">
    <form action="frontend/cart" method="post">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
         <input type="hidden" name="id" value="{{$sp->id}}">
         

    <div class="col-md-7" >
        <img name="hinh" href="" src="image/{{ $sp->hinh }}" style="height: 560px; width:600px;margin: 20px 0px 10px 80px ">
    </div>
    <div class="col-md-5" >
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

       
        <div class="row" style="border-bottom:  1px dotted #777">
             <h4 style="font-weight: bold; font-family: inherit;margin-top: 20px;"> {{ $sp->tensp }} </h4>
             <h6 style="color: #a3a5a7 ;"> SKU: {{$sp->id}}</h6>
        </div>
        <div class="row" style="border-bottom:  1px dotted #777">
             <h4 style="font-weight: bold;"> {{ number_format($sp->gia,0)}}đ</h4>
        </div>

         <div class="row">
        @foreach ($sanpham->dacdiem as $s )
       
        <br>
       <!--  <div class="col-md-1"> <input style="width: 20px; height: 20px;" type="radio" checked="checked" name="dacdiem" value="{{ $s->name }}"></div> -->

         
         <!--   <span style="font-weight: bold;padding-left: 20px;">{{ $s->name }}</span> -->

        
            <input style="width: 20px; height: 20px;"  onmouseenter="fun()" id="radio" type="radio" checked="checked"  name="dacdiem" value="{{$s->name}}"> 
            <input type="hidden" id="slkho" name="slkho" value="{{$s->sl}}">
          
             <span style="font-weight: bold;padding-left: 20px;">{{ $s->name }}</span>
          
             <span  style="font-size: 12px;">[ Còn : <?php if($s->sl==0) echo "Hết hàng"; else echo $s->sl ?>  ]</span>
           
        
        
      
            @endforeach
            </div>
       
         
        <input min="1" name="soluong" autocomplete="off" type="number" value="1" style="width: 50px;text-align: center;margin:15px 0px" ><br>
        <button type="submit" style="background: #73c9e2;width: 500px;height: 50px;">THÊM VÀO GIỎ</button>
        <div style="margin-top: 20px;">
            {!!$sp->mota!!} 
        </div>
      
    </div>
         
</form>
</div>
 
@endsection 


<script>
 function fun() {
    var val = $("#slkho").val();
    if(val==0)
    {

     document.getElementById("radio").disabled = true;
    }
 }
  
</script>
