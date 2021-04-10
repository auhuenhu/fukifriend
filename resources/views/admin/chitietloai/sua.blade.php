
        @extends('admin.layout.index')
        @section ('content')
        <!-- Page Content -->
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">CHI TIẾT LOẠI
                                    <small>{{$chitietloai->tenloaichitiet}}</small>
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
                                <form action="admin/chitietloai/sua/{{$chitietloai->id}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
                                
                                     
        
                                    <div class="form-group">
                                        <label>Tên chi tiết loại</label>
                                        <input class="form-control" value="{{$chitietloai->tenloaichitiet}}" name="TenChiTietLoai"  />
                                    </div>
        
                                        <div class="form-group">
                                           
                                        <label> Loại </label>
                                       
                                        <select class="form-control select "  name="MaLoai" id="Loai" >
                                     @foreach($loai as $l)
                                             <option 
                                            @if($chitietloai->loai->id == $l->id)
                                            {{'selected'}}
                                            @endif
        
                                            value="{{$l->id}}">{{$l->tenloai}}</option>
                                         
        
                                           @endforeach
                                        </select>
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
        <script>
            $(document).ready(function() {
              $('#Loai').change(function(){
        
        
                var idLoai = $(this).val(); // id của loại
                
                
               
                $.get("admin/ajax/loai/"+idLoai,function(data){ // truyền id sang ajaxController 
        
                     $('#LoaiChiTiet').html(data);
                });
              });
            });
        </script>
        
        
        
        
        
        
        
        @endsection
        
        
        