@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Danh sách </small>
                        </h1>
                    </div>
                </div>

                    <!-- /.col-lg-12 -->
                    <div class="row">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>LOẠI</th>
                                <th>MENU</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loai as $l)
                            <tr class="odd gradeX" align="center">
                                <td>{{$l->id}}</td>
                                <td align="left">{{$l->tenloai}} </td>   
                                <td>{{$l->menu->tenmenu}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loai/xoa/{{$l->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loai/sua/{{$l->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection