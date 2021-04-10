@extends('admin.layout.index')
@section ('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Họ tên </label>
                                <input class="form-control" value="{{$user->ten}}" name="name" placeholder="Nhập tên" />
                            </div>
                             <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gioitinh" type="radio" value="Nam" @if($user->gioitinh == 'Nam') {{"checked"}} @endif > Nam
                                       
                                </label>
                                <label class="radio-inline">
                                    <input name="gioitinh" type="radio" value="Nữ" @if($user->gioitinh == 'Nữ') {{"checked"}} @endif> Nữ
                                    
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" type="email" value="{{$user->email}}" name="email" readonly="" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại </label>
                                <input class="form-control" type="text" value="{{$user->sdt}}" maxlength="10" name="sdt"  />
                            </div>
                            <div class="form-group">
                                <input id="changepassword" type="checkbox" name="changepassword">
                                <label> Đổi mật khẩu </label>
                                <input class="form-control password "  name="password" class="password" type="password" disabled="" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                
                                <label> Nhập lại mật khẩu </label>
                                <input class="form-control password "  name="repassword" class="repassword" type="password" disabled="" placeholder="Nhập lại mật khẩu" />
                            </div>
                            
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" type="radio" @if($user->quyen == 1) {{"checked"}} @endif  > Admin
                                      
                                </label>
                                
                                    <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio" @if($user->quyen == 0) {{"checked"}} @endif > Thường
                                      
                               
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Sửa</button>
                            <button type="reset" class="btn btn-default"> Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
       $('#changepassword').change(function() {
           if($(this).is(":checked"))
           {
                $('.password').removeAttr('disabled');
                $('.repassword').removeAttr('disabled');

           }
           else
           {
                $('.password').attr('disabled','');
                $('.repassword').attr('disabled','');

           }
       });
    });
</script>
@endsection

