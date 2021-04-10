@extends('master')
@section('content')
<div class="row">
    @if(session('thongbao'))
        {{session('thongbao')}}
    @endif
</div>
	<div class="row" style="margin-top: 30px;">   


       @foreach($me->loai as $l) 
       @foreach($l->chitietloai as $ctl) 
       @foreach($ctl->sanpham as $sp) 



      
    <div class="col-md-3">
        <div class="thumbnail">
            <a href="frontend/sanpham/{{ $sp->id }}"><img href="frontend/sanpham/{{ $sp->id }}" src="image/{{ $sp->hinh }}"  height="200px">    </a>       
                   <a style="float: left;padding-top: 5px;" href="frontend/sanpham/{{ $sp->id }}" style="font-weight: bold"> {{ $sp->tensp}} </a>
                   <br>

                   <h5 style="text-align: left;"> {{ number_format($sp->gia, 0) }}đ  </h5>  
        </div>
    </div>
  
    @endforeach
    @endforeach
    @endforeach

           
</div>     
@endsection