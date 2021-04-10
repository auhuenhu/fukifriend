@extends('admin.layout.index')
@section ('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <H2> DANH SÁCH SẢN PHẨM</H2>
            </div>
            <div class="col-md-2" style="padding-left: 60px;padding-top: 10px;">
                <button style="margin-right: 10px;" type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#ModalInsert"> Thêm</button>
            </div>
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
                                <th>ID</th>
                                <th>Tên chi tiết loại </th>
                                <th>Tên loại </th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitietloai as $ctl)
                            <tr class="odd gradeX" align="center">
                                <input type="hidden" class="id"  value="{{$ctl->id}}">
                                <td>{{$ctl->id}}</td>
                                <td>{{$ctl->tenloaichitiet}}</td>
                                <td>{{$ctl->loai->tenloai}} </td>                            
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="" class="delete">Xóa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="" class="edit">Sửa</a> </td>
                            <!-- Modal Thêm -->
                            <div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       
                                        <div class="modal-body">
                                            <form id="LoaiFormInsert" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label> Tên chi tiết loại</label>                                                 
                                                 <select class="form-control"  name="TenLoai" id="TenLoai">                                                       
                                                      @foreach ($loai as $l)                                                                                                              
                                                          <option value="{{ $l->id }}">{{ $l->tenloai }}</option>
                                                          @endforeach                          
                                                    </select>                                               
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="TenChiTietLoai" placeholder="Nhập tên chi tiết loại" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Xóa -->
                            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel1">Xóa chi tiết loại </h5>                                    
                                    </div>                               
                                    <form id="LoaiFormDelete" method="post" >
                                      @csrf
                                      <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                           <button id="Delete1" type="button" class="btn btn-primary">Xóa </button>
                                      </div>
                                     </form>
                              
                                  </div>
                                </div>
                              </div>
                              <!-- Modal Sửa -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Sửa loại sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
        <form id="LoaiFormEdit" method="post" >
            @csrf
            <div class="form-group">
            <label> Tên chi tiết loại</label>  
                                                
            <input class="form-control" id="TenLoaiSua" name="TenLoaiSua"  />                                        
            </div>
            <div class="form-group">
                
                <input class="form-control" id="TenChiTietLoai" name="TenChiTietLoai"  />
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
         </form>
        </div>
      </div>
    </div>
  </div>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>               
            </div>            
        </div>
@endsection

{{-- THÊM --}}
@section('script')
<script>
$(document).ready(function() {
  $('#LoaiFormInsert').on('submit',function (e) {
       e.preventDefault();
        

          $.ajax({
        type: "POST",
        url : "{{route('Chitietloai.add')}}",
         dataType: 'json',
         headers:{
        "X-CSRFToken": csrftoken}
 
        }
    }
}
</script>
<script> 
    $("#dataTables-example").on("click", ".delete", function(e){
        e.preventDefault();
        var idsp = $(this).closest("tr").find('.id').val();
        //alert(idsp);
        $('#modalDelete').modal('show');
        $('#Delete1').click(function(){
                var data = {
                                "_token" : $('input[name=_token]').val(),
                                "id": idsp ,
                        };
                         $.ajax({
                                type:'post',
                                url:'admin/chitietloai/xoa/' +idsp ,
                                data:data,
                                success: function(response) {
                                    location.reload();
                                }
                        });
            })
    });


</script>
<script>
    $("#dataTables-example").on("click", ".edit", function(e){
                 e.preventDefault();
                 var id = $(this).closest("tr").find('.id').val();
          //      alert(id);
           loadChiTiet(id);
  
});
    
               function loadChiTiet(idsp)
    {
        $.ajax({
                  type:'get',
                  dataType:'json',
                  url:'admin/chitietloai/sua/' +idsp ,
                    success: function(response) {
                        //  console.log(response);
                        //     $('#TenChiTietLoai').val(response.tenloaichitiet);                    
                        //     $('#TenLoaiSua').val(response.tenloai);                   
                             $('#modalEdit').modal('show');
                    }
                   
    
              })
             

            } 
</script>
@endsection