@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết loại
                            <small>Danh sách </small>
                        </h1>
                    </div>
                    </div>
                    <div class="row">
                    <!-- /.col-lg-12 -->
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                
                                <th>Loại </th>
                                <th>Chi tiết loại </th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loai as $l)
                            @foreach ($l->chitietloai as $ctl )
                                
                            
                            <tr class="odd gradeX" align="center">
                                <td>{{$ctl->id}}</td>
                              
                                <td>{{$ctl->loai->tenloai}} </td>
                                <td>{{$ctl->tenloaichitiet}}</td>    
                                                      
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitietloai/xoa/{{$ctl->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitietloai/sua/{{$ctl->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        @endsection