@extends('master')
@section ('content')
{{$ctl}}


    <div class="row" style="margin-top: 30px;">
         @foreach($ctl as $ct)
           @foreach ($ct->sanpham as $sp)
    <div class="col-md-3">
        <div class="thumbnail">
           <a href="frontend/sanpham/{{ $sp->id }}"> <img  src="image/{{ $sp->hinh }}"  height="200px">   </a>        
                   <a href="frontend/sanpham/{{ $sp->id }}" style="font-weight: bold"> {{ $sp->tensp }} </a>
                   <h5> {{ number_format($sp->gia, 0) }}đ  </h5>  
        </div>
    </div>
            @endforeach
            @endforeach 
    </div>  
                                                             
@endsection