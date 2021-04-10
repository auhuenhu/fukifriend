@extends('admin.layout.index')
@section ('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col-lg-12 -->
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
                         @if(session('thongbao1'))
                        <div class="alert alert-danger">

                            {{session('thongbao1')}}
                        </div>

                        @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                           
                            <div class="form-group">
                                <label>Họ tên </label>
                                <input class="form-control" name="name" placeholder="Nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính </label><br>
                                <label class="radio-inline">
                                    <input name="gioitinh"  value="Nam" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gioitinh" value="Nữ"  type="radio">Nữ
                                </label>
                               
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" type="email" name="email" placeholder="abc@xyz.com" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại </label>
                                <input class="form-control" type="text" maxlength="10" name="sdt" placeholder="Số điện thoại 10 chữ số" />
                            </div>
                            <div class="form-group">
                                <label> Password </label>
                                <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu" />
                            </div>
                             <div class="form-group">
                                <label>Nhập lại Password </label>
                                <input class="form-control" name="passwordagain" type="password" placeholder="Nhập lại mật khẩu" />
                            </div>
                            
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"  type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" checked="" type="radio">Thường
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Thêm</button>
                            <button type="reset" class="btn btn-default"> Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection