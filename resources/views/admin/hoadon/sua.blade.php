@extends('admin.layout.index')
@section ('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>{{$hoadon->id}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/hoadon/sua/{{$hoadon->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            
                            <div class="form-group">
                                <label>Tên người nhận</label>
                                <input class="form-control" name="tenkh"  value="{{$hoadon->tenkh}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" disabled="" value="{{$hoadon->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="diachi"  value="{{$hoadon->diachi}}" />
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" name="sdt"  value="{{$hoadon->sdt}}" />
                            </div>
                            <div class="form-group">
                                <label>Ngày mua</label>
                                <input class="form-control" name="ngaymua" disabled="" value="{{$hoadon->ngaymua}}" />
                            </div>
                           
                            
                            <button type="submit" class="btn btn-default"> Sửa</button>
                           
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection