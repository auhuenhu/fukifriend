<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>ADMIN FUKI</title>
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

   <link href="{{ asset('css/csschung.css')}}" rel="stylesheet">
</head>

<body>


    <div class="container-fluid">
      <div class="row">
       <div class="col-md-4"></div>
        <div class="  col-md-4 ">
                  <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0 )
                        <div class="alert alert-danger">
                            @foreach($errors->all () as $err)
                            {{$err}} <br>

                            @endforeach
                        </div>
                        @endif
                        
                        <form role="form" action="admin/dangnhap" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                @if(session('thongbao'))
                       

                            {{session('thongbao')}}
                       

                        @endif
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-md-4"></div>

      </div>
    </div>

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

</body>

</html>
