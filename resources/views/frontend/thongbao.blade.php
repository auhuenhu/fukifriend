    
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
   <style>
       table tr > td {width: 300px;}
     


   </style>
    <title>FUKI</title>
    <style>
      
    </style>
    
</head>
<body id="myPage">  
  
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center" > <h2> FUKI FRIENDS </h2>

        <h4> ĐẶT HÀNG THÀNH CÔNG </h4>
        <h5>MÃ ĐƠN HÀNG: {{$sohd}}</h5>
       
        
            
            
            
           
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                     <table style="text-align: center;border-collapse: collapse;width: 400px" border="1">
    <tr>
        <th colspan="3" class="text-center">THÔNG TIN ĐƠN HÀNG</th>
    </tr>
    <tr >
        <td>Họ tên</td>
        <td style="width: 1000px;text-align: left;">{{$hoten}}</td>
        
      
    </tr>
    <tr>
        <td>Email</td>
        <td  style="width: 1000px;text-align: left;" >{{$email}}</td>
        
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td  style="width: 1000px;text-align: left;" >{{$diachi}}</td>
       
    </tr>
     <tr>
        <td>SĐT</td>
        <td  style="width: 1000px;text-align: left;" >{{$sdt}}</td>
       
    </tr>
    <tr>
        <td>Ghi chú</td>
        <td  style="width: 1000px;text-align: left;" > @if($ghichu=="") {{"Không có"}} @else {{$ghichu}} @endif</td>
    </tr>
    <tr>
        <td>Vận chuyển</td>
        <td  style="width: 1000px;text-align: left;" >{{$vanchuyen}}</td>
       
    </tr>
     <tr>
        <td>Thanh toán</td>
        <td  style="width: 1000px;text-align: left;" >{{$thanhtoan}}</td>
       
    </tr>
    <tr>
        <td>Tổng cộng</td>
        <td  style="width: 600px;text-align: left;" >{{number_format($tongtien)}}đ</td>
    </tr>
     
</table>



                </div>
                <div class="col-md-4"></div>
                <div class="row text-center">
    <button style="margin-top: 20px;padding: 18px 30px;font-weight: bold;background: #F7BD33" type="submit" ><a style="list-style-type: none;text-decoration: none;color: #000" href="frontend/">TIẾP TỤC MUA HÀNG</a></button>
    <strong><h3>Cảm ơn bạn đã mua hàng!</h3></strong>
    <h5>Hotline hỗ trợ : 0968541805</h5>
</div>
                
            </div>
            <div class="col-md-1"></div>

            
        
    <div class="col-md-3"></div>
    

 
</div>
</div>


</body>
   