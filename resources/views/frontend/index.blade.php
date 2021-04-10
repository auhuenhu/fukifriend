@extends('master')
@section('content')


<div class="row"><img src="image/banner.jpg" class="img-responsive" ></div>
<!-- Hang moi ve -->
<div id="hang-moi-ve">
<div class="col-1 slideamin" style="text-align: center;"><a href=""><h2>Hàng mới về 🍒</h2> </a>
	<div class="row slideamin " style="margin-top: 30px;">   
@foreach($sanphammoi as $spmoi) 
    <div class="col-md-3 ">
        <div class="thumbnail">
            <a href="frontend/sanpham/{{ $spmoi->id }}"><img href="frontend/sanpham/{{ $spmoi->id }}" src="image/{{ $spmoi->hinh }}"  height="200px">    </a>       
                   <a style="float: left;padding-top: 5px;" href="frontend/sanpham/{{ $spmoi->id }}" style="font-weight: bold"> {{ $spmoi->tensp}} </a>
                   <br>

                   <h5 style="text-align: left;"> {{ number_format($spmoi->gia, 0) }}đ  </h5>  
        </div>
    </div>
    @endforeach

   
           
</div>     

 </div>
</div>

<!-- Ban chay -->
<div class="slideamin" id="hang-ban-chay">
<div class="col-1 slideanim" style="text-align: center;"><a href=""><h2>Sản phẩm bán chạy 🍒</h2> </a> </div>
<div class="row slideamin " style="margin-top: 30px;">  
@foreach($best as $b) 







    <div class="col-md-3 ">
        <div class="thumbnail">
           <a href=""><img href="" src="image/{{$b->hinh}}"  height="200px">    </a>      
                   <a style="float: left;padding-top: 5px;" href="" style="font-weight: bold"> {{$b->tensp}} </a>
                   <br>

                   <h5 style="text-align: left;"> {{ number_format($b->gia, 0) }}đ   </h5>  
        </div>
    </div>
     
     @endforeach



    

   

           
</div>     

</div>
@endsection