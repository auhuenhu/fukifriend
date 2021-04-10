@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết loại
                            <small>Thêm</small>
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
                         @if(session('thongbao1'))
                        <div class="alert alert-danger">

                            {{session('thongbao1')}}
                        </div>

                        @endif
                        <form action="admin/chitietloai/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                           <div class="form-group">
                                <label>Tên loại </label>

                                <select class="form-control"  name="TenLoai" id="Loai">
                            
                                   @foreach($loai as $l)

                                    <option value="{{$l->id}}">{{$l->menu->tenmenu}} --- {{$l->tenloai}}</option>
                                   @endforeach
                                </select>
                                </div>
                            <div class="form-group">
                                <label> Tên chi tiết loại</label>
                                <input class="form-control" name="TenChiTietLoai" placeholder="Nhập tên chi tiết loại" />
                                 
                            </div>

                               

                           
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

