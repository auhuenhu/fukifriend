@extends('master')
@section ('content')
<div class="row" style="margin-top: 10px;">   
<h5 class="text-center" style="font-weight: bold;" >Tìm được {{count($pro)  }} sản phẩm theo từ khóa: <span style="color: red">{{$search}}</span> </h5>
@foreach($pro as $sp) 
    <div class="col-md-3">
        <div class="thumbnail">
            <img href="frontend/sanpham/{{ $sp->id }}" src="image/{{ $sp->hinh }}"  height="200px">           
                   <a href="frontend/sanpham/{{ $sp->id }}" style="font-weight: bold"> {{ $sp->tensp}} </a>
                   <h5> {{ number_format($sp->gia, 0) }}đ  </h5>  
        </div>
    </div>
    @endforeach
   
    
   

           
</div>    

</div> 
        <div class="row text-right" style= " font-size: 20px;"><br>{{ $pro->links()}} </div>     
@endsection

