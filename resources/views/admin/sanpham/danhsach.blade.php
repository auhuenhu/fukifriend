@extends('admin.layout.index')
@section ('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SẢN PHẨM
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">

                            {{session('thongbao')}}
                        </div>

                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>

                            <tr align="center">
                                <th>Hình</th>
                                <th>ID</th>
                                <th >Tên</th>
                                <th style="width: 90px;">Đặc điểm </th>
                                <th >Mô tả</th>
                                <th>Loại</th>
                                <th>Loại chi tiết </th>
                                <th>Giá </th>
                              
                                <th>Ngày nhập </th>
                                <th>Xóa </th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($sanpham as $sp)
                           


                           
                            <tr class="odd gradeX" align="center">
                        <meta name="csrf-token" content="{{ csrf_token() }}">

                           <input type="hidden" class="id" value="{{$sp->id}}">

                                <td>
                                    <img width="100px" src="image/{{$sp->hinh}}">
                                </td>
                                <td>{{$sp->id}}</td>
                                <td>{{$sp->tensp}}</td>
                               
                               <td style="text-align: left;">

                                    @foreach($sp->dacdiem as $k=>$dd)
                                     {{$dd->name}} -  {{$dd->sl}}<br>
                                     @endforeach
                                   
                                </td>  
                              
                               
                                <td>{{$sp->mota}}</td>   
                              
                                <td>{{$sp->idLoai}}</td>
                              
                                

                               
                                <td>{{$sp->idLoaiChiTiet}}</td>
                                <td>{{ number_format($sp->gia, 0) }}đ</td>
                               
                                <td>{{$sp->ngaynhap}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/sanpham/xoa/{{$sp->id}}" class="delete">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Sửa</a></td>
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

        @section('script')

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
             $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });                
                 $('.delete').click(function(e){
              e.preventDefault();
              var idsp = $(this).closest("tr").find('.id').val();
              // alert(idsp);
 
                              swal({
                                   title: "Bạn muốn xóa sản phẩm này?",
                                   
                                   icon: "warning",
                                   buttons: true,
                                   dangerMode: true,
                                 })

                             .then((willDelete) => {
                               if (willDelete) {
 
                                  var data = {
                                         "_token" : $('input[name=_token]').val(),
                                         "id": idsp ,
                                     };
 
                                 $.ajax({
                                         type:'delete',
 
                                         url:'admin/sanpham/xoa/' +idsp ,
                                         data:data,
                                         success: function(response) {
                                                         swal(response.status, {
                                                         icon: "success",
                                             })
                                                         .then((result) => {
                                                             location.reload();
                                             });
 
                                         }
                                 });
                               } 
                             });
             
            });
         });
 
        </script>
        @endsection


