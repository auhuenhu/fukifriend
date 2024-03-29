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
 <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<link href="{{ asset('css/csschung.css')}}" rel="stylesheet">
    <link href="{{ asset('css/css-master.css')}}" rel="stylesheet">

    <title>FUKI</title>
    
    
	
</head>
<body id="myPage">    
        @include('header')
        @yield('content')
        @include ('footer')
        @yield('script')
</body>
</html>

<script>
    $(document).ready(function () {
        $(window).scroll(function () {
           $(".slideamin").each(function () {
               var pos = $(this).offset().top;
               var winTop = $(window).scrollTop();
               if(pos < winTop+400)
               {
                $(this).addClass("slide");
               }
               
           });
        });
    })
</script>
