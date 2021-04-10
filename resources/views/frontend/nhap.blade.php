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
<body>
	<div class="row" style="background: pink;">
	<div class="col-md-4"></div>
	<div class="col-md-4 text-center img-responsive">
		
			<a href="{{URL::to('frontend')}}"><img src="image/logo.jpg"></a>
		
		
	</div>
	<div class="col-md-4 text-md-center">
		<div class="row" style="background: green;height: 163px;">
			<div class="row">

        <div class="thumbnail text-center" style="line-height: 163px">
        	
             <a href=""><svg width="28px" height="28px" style="margin-right: 4px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
              <div class = "caption">
        <span>{{Auth::user()->ten}} </span>

             


        
    </div>
</div>
       
       
    		</div>    

		</div>
		</div>
	</div>


   
</body>
</html>
