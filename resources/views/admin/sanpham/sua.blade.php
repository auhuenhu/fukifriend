
        @extends('admin.layout.index')
@section ('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SẢN PHẨM
                            <small>{{$sanpham->tensp}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        
                             

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" value="{{$sanpham->tensp}}" name="Ten" placeholder="Nhập tên sản phẩm" />
                            </div>

                            <div class="form-group">
                                <label>Đặc điểm</label>
                                <input class="form-control" value="{{$sanpham->dacdiem}}" name="DacDiem" placeholder="Màu sắc,kiểu dáng,..." />

                               
                            </div>

                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" value="{{$sanpham->gia}}" name="Gia" placeholder="Giá sản phẩm" />
                               
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input  class="form-control" value="{{$sanpham->soluong}}" name="SoLuong" placeholder="Số lượng sản phẩm" />
                               
                            </div>
                                <!-- <div class="form-group">
                                    <label>Change</label>
                                <input id="change" type="checkbox" name="change">
                                    
                                </div> -->
                                <div class="form-group">
                                   
                                <label> Loại </label>
                               
                                <select class="form-control select "  name="MaLoai" id="Loai" >
                             @foreach($loai as $l)

                                 


                                     <option 
                                    @if($sanpham->chitietloai->loai->id == $l->id)
                                    {{'selected'}}
                                    @endif

                                    value="{{$l->id}}">{{$l->tenloai}}</option>
                                 

                                   @endforeach
                                </select>
                                </div>

                                 <div class="form-group">
                                <label>Tên loại chi tiết </label>

                                <select class="form-control change"  name="TenLoaiChiTiet" id="LoaiChiTiet">
                            @foreach($chitietloai as $ctl)

                                     <option 
                                    @if($sanpham->idLoaiChiTiet== $ctl->id)
                                    {{'selected'}}
                                    @endif

                                    value="{{$ctl->id}}">{{$ctl->tenloaichitiet}}</option>
                                   @endforeach
                                </select>

                               
                                </div>

                                <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="MoTa" id="MoTa" class="form-control ckeditor" rows="3">{{$sanpham->mota}}</textarea>
                                </div>

                                
                                
                            
                                <div class="form-group">
                               <label>Hình</label>
                                <p>
                                <img width="200px" src="upload/img/{{$sanpham->hinh}}">
                                </p>
                                <input  class="form-control" type="file" name="Hinh">
                                
                                </div>

                            <button type="submit" class="btn btn-default"> Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section ('script')



<!-- <script>
    $(document).ready(function(){
       $('#change').change(function() {
           if($(this).is(":checked"))
           {
                $('#Loai').removeAttr('disabled');
                $('#LoaiChiTiet').removeAttr('disabled');

           }
           else
           {
                $('#Loai').attr('disabled','');
                $('#LoaiChiTiet').attr('disabled','');

           }
       });
    });
</script> -->
{{-- <script>
    $(document).ready(function() {
      $('#Loai').change(function(){


        var idLoai = $(this).val(); // id của loại
        
        
       
        $.get("admin/ajax/loai/"+idLoai,function(data){ // truyền id sang ajaxController 

             $('#LoaiChiTiet').html(data);
        });
      });
    });
</script> --}}







@endsection


