
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
     <base href="{{asset('')}}"> 
   <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
 <!-- jQuery -->
 <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Metis Menu Plugin JavaScript -->
 <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>
 <!-- Custom Theme JavaScript -->
 <script src="admin_asset/dist/js/sb-admin-2.js"></script>
 <!-- DataTables JavaScript -->
 <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
 <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
 <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<link href="{{ asset('css/csschung.css')}}" rel="stylesheet">
    <title>FUKI</title>
    <style>
      
    </style>
	
</head>
<body id="myPage">    
      <div class="container-fluid">
      	   @if(count($errors) > 0 )
             <div class="alert alert-danger">
                 @foreach($errors->all () as $err)
                    {{$err}} <br>
            
                 @endforeach
            </div>
        @endif
       
	<div class="col-md-7 " style="padding-left:10px;border-right: 1px dotted #737373;border-left: 1px dotted #737373">
		<div style="margin-left: 60px;">
			<h1> FUKI FRIENDS </h1>
		<h5><a href="frontend/cart">Giỏ hàng</a></h5>
		<h4>Thông tin giao hàng </h4>
		<h5 style="color: #737373">Bạn đã có tài khoản? <a href="dangky.php">Đăng ký</a> để tiếp tục mua hàng</h5> 
		</div>
			<form method="post" action="frontend/payment"  style="margin-top: 10px;padding-left: 10px;margin-left: 50px;">
				<div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input id="hoten" style="width: 600px;height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="hoten" maxlength="30"  placeholder="Tên người nhận" value="" >					
			<input id="email" style="width: 600px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;" type="text" name="email"  placeholder=" Email tài khoản">
			<div class="row" style="width: 600px;">
			<div class="col-md-8" style="padding:10px 0px;" >
				<input id="diachi" style="width: 396px; height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="diachi"  placeholder=" Địa chỉ người nhận">	
			</div>
			<div class="col-md-4"style="padding:10px 0px;">
				<input id="sdt" style="width: 199px;height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="sdt"  placeholder=" Số điện thoại  "  maxlength="10">
			</div>		
			</div>
				<input id="ghichu" style="width: 600px;height: 40px;border-radius: 7px;border: 1px solid #737373;"  type="text" name="ghichu"  placeholder="Ghi chú">
			<div style="border:1px solid #737373 ; border-radius: 5px;margin-top: 20px;width: 600px;" >
				<div style="margin-left: 20px;margin-right: 20px;">
			<input style="width: 18px;height: 18px;margin-top: 10px; margin-bottom: 15px" type="radio" name="radio" checked="checked" value="Giao tận nơi"> Giao tận nơi <br>
			<!-- <input style="width: 18px;height: 18px;margin-top: 10px;" type="radio" name="radio" id="nhantaishop"  value="Nhận tại cửa hàng"> Nhận tại cửa hàng <br>
			<p style="color: red;font-weight: bold;padding-left: 20px;">FUKI sẽ giữ đơn cho bạn trong vòng 24 giờ.</p> -->
		</div>
	</div>
</div>
			<h4>Phương thức vận chuyển </h4>
		<div style="border:1px solid #737373 ; border-radius: 5px;margin-top: 20px;width: 600px;padding: 15px 35px;color: red;font-weight: bold;">
			Phí vận chuyển đồng giá 20,000đ
		</div>
		<h4>Phương thức thanh toán </h4>
		<div style="border:1px solid #737373 ; border-radius: 5px;margin:20px 0px;width: 600px">
              <!--   <input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott" id="tienmat" value="Thanh toán tiền mặt tại cửa hàng"> Thanh toán tiền mặt tại cửa hàng <br> -->
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott" checked="checked" id="cod"  value="Thanh toán khi giao hàng (COD)"> Thanh toán khi giao hàng (COD) <br>
		
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott" id="ck" value="Chuyển khoản qua ngân hàng"> Chuyển khoản qua ngân hàng <br>
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott" id="momo" value="Thanh toán qua ví MoMo"> Thanh toán qua ví MoMo <br>
		</div>
		<input style="width: 140px;height: 45px;color: #000;font-size: 13px;background: #F7BD33 ;border: none;border-radius: 10px;float: right;margin-right: 105px;" type="submit" id="hoantatdonhang" name="hoantatdonhang" value="Hoàn tất đơn hàng"> 
			
		<h5 style="margin-left: 60px;"><a href="frontend/cart">Giỏ hàng</a></h5>
		</div>
	<div class="col-md-5">
       
		<?php $content = Cart::content();
		foreach ($content as $value) {
			?>
        <input type="hidden" name="id" value="{{$value->id}}">
		<input type="hidden" name="name" id="name" value="{{$value->name}}">
        <div class="row" style="margin-top: 10px;margin-bottom: 25px;">
      

         <div class="col-md-2" style="margin-left: 25px;" >

             <div style="width:80px;height:80px;" ><span style="margin-left:  67px;position: relative;" class="badge ">{{$value->qty}}</span><img  style="width: 80px; height: 80px;position: absolute;margin-top:  -10px;border-radius: 10px;" src = "image/{{$value->options->image}}"> </div>
          
        </div>
        <div class="col-md-5">
            <h5 >{{$value->name}}</h5>
            <input type="hidden" name="dacdiem" value="{{$value->options->dacdiem}}">
            <h6 style="color: #777">{{$value->options->dacdiem}}</h6>

        </div>
        <div class="col-md-4 text-right" >
            <input type="hidden" name="gia" value="{{$value->price}}">
            <input type="hidden" name="sl" value="{{$value->qty}}">

            <h5 style="margin-top: 30px;"> {{number_format( $value->price*$value->qty)}}đ</h5>
        </div>
        </div>
        
			
		
			  
			<?php

		}


		$ship = number_format(20000) ;
		?>

        <div class="row" style="border-top: 1px dotted #777;margin-left: 13px;">

             <div class="col-md-5" >
                  <p style="margin-top: 10px">Tổng sản phẩm</p>
                   <p>Tạm tính</p>
                  <p>Phí vận chuyển</p>

                 
             </div>
             <div class="col-md-7 text-right "  style="padding-right: 15px;">
                 <p>{{Cart::count()}}</p>
                 <h4>{{Cart::subtotal()}}đ</h4>
                 <h4><?php echo $ship ?>đ</h4>
       
             </div>

	</div>
     <div class="row" style="border-top: 1px dotted #777;margin-left: 13px;">
                <?php $total = number_format(Cart::subtotalShip())  ?>
                <div class="col-md-5"> <p style="margin-top: 13px;">Tổng cộng</p></div>
                  <div class="col-md-7 text-right "  style="padding-right: 15px;">
        <input type="hidden" name="tongtien" value="{{Cart::subtotalShip()}}">
        <h4 style="font-weight: bold;" >  {{$total}}đ </h4>

             </div>


        </div>
</div>
</form>
</body>
</html>



@section('script')
<script>
    function check()
    {
         // if(document.getElementById("nhantaishop").checked == true)
         // {
         //    alert('hi');
         // }
           var val = $("radio").val();
           alert(val);
    // if(val==0)
    // {

    //  document.getElementById("radio").disabled = true;
    // }
    }
    //$(document).ready(function(){
       

           // {
           //      // $('tienmat').removeAttr('disabled');
           //      // $('ck').removeAttr('disabled');
           //      // $('momo').removeAttr('disabled');
           // $('tienmat').attr('disabled','');
           // //      $('ck').attr('disabled','');
           // //      $('momo').attr('disabled','');




           // }
           // else
           // {
           //      $('tienmat').attr('disabled','');
           //      $('ck').attr('disabled','');
           //      $('momo').attr('disabled','');



           // }

       
   // });


  
</script>
@endsection