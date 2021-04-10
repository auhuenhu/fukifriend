@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Danh sách </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">

                            {{session('thongbao')}}
                        </div>

                        @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>SL sản phẩm</th>
                                <th>Ngày mua</th>                               
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach($hoadon as $hd)
                            
                            <tr class="odd gradeX" align="center">
                                <td>{{$hd->id}}</td>
                                <td align="left">{{$hd->tenkh}}</td>   
                                <td>{{$hd->email}}</td>
                                <td>{{$hd->diachi}}</td>
                                <td>{{$hd->sdt}}</td>
                                <td>
                            @foreach($slsp as $s)
                            @if($s->idHoaDon == $hd->id)
                           {{$s->soluong}}


                          @endif
                            @endforeach







                                </td>
                                <td>{{$hd->ngaymua}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/sua/{{$hd->id}}">Sửa</a></td>
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