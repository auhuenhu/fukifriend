@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
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
                        <form action="admin/loai/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          
                            <div class="form-group">
                                <label> Tên sản phẩm</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên thể loại" />
                            </div>
                            <div class="form-group">
                                <label> Menu </label>

                                <select class="form-control"  name="Menu" id="Menu">
                            @foreach($menu as $me)

                                    <option value="{{$me->id}}">{{$me->tenmenu}}</option>
                                   @endforeach
                                </select>
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