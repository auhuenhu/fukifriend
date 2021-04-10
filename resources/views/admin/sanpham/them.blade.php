
        @extends('admin.layout.index')
        @section ('content')
        <!-- Page Content -->
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">SẢN PHẨM
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
                                <form action="admin/sanpham/them" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        
                                
                                     
        
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input class="form-control" name="Ten" placeholder="Nhập tên sản phẩm" />
                                    </div>
                                    
        
                                    
        <!-- <input type="button" class="add-row" value="Thêm hàng"> -->
    <input type="text" class="dacdiem" id="DacDiem" placeholder="Đặc điểm">
     <input type="text" class="sl"  id="SoLuong" placeholder="Số lượng">  
  <button type="button" class="add-row">Thêm hàng</button>

    <table style="border: 1px solid #000">
        <thead>
            <tr>
                <th>Đặc điểm</th>
                <th>Số lượng</th>

                
            </tr>

        </thead>
        <tbody>
          
            
     


        </tbody>
    </table>
 
    <button type="button" class="delete-row">Xóa hàng</button>
        
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input class="form-control" name="Gia" placeholder="Giá sản phẩm" />
                                       
                                    </div>
        
                                        <div class="form-group">
                                        <label>Loại </label>
        
                                        <select class="form-control"  name="MaLoai" id="Loai">
                                    @foreach($loai as $l)
        
                                            <option value="{{$l->id}}">{{$l->menu->tenmenu}}-{{$l->tenloai}}</option>
                                           @endforeach
                                        </select>
                                        </div>
        
                                         <div class="form-group">
                                        <label>Tên loại chi tiết </label>
        
                                        <select class="form-control"  name="TenLoaiChiTiet" id="TenLoaiChiTiet">
                                    @foreach($chitietloai as $ctl)
        
                                            <option value="{{$ctl->id}}">{{$ctl->loai->tenloai}}-{{$ctl->tenloaichitiet}}</option>
                                           @endforeach
                                        </select>
                                        </div>
        
                                        <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="MoTa" id="MoTa" class="form-control ckeditor" rows="3"></textarea>
                                        </div>
        
                                        
                                        
                                    
                                        <div class="form-group">
                                        <label>Hình</label>
                                        <input  class="form-control" type="file" name="Hinh">
                                        
                                        </div>
        
                                    <button type="submit" id="them" class="btn btn-default"> Thêm</button>
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
        <script>
            $(document).ready(function() {
              $('#Loai').change(function(){ //Bắt sự kiện Loại thay đổi
                var idLoai = $(this).val(); // id của loại
                // alert(idLoai);
               
                $.get("admin/ajax/loai/"+idLoai,function(data){ // truyền id sang ajaxController 
        
                    //alert(data);
                     $('#TenLoaiChiTiet').html(data);
                });
              });
            });
        </script>
        <script type="text/javascript">
    //         var arr = [];
    // $(document).ready(function(){

    //     $(".add-row").click(function(){
             

    //         var dacdiem = $("#DacDiem").val();
    //         var soluong = $("#SoLuong").val();
    //         var markup = "<tr><td name='dacdiem' class='dd' >" + dacdiem + "</td><td name='sl'>" + soluong + "</td></tr>";
    //        $("table tbody").append(markup);



    //         $("#them").click(function(e){
      

    //     // e.preventDefault();
    //     //  arr.push({"name" : dacdiem, "sl" : soluong});
         

    //     });

      
//      var data = {
//                                          "_token" : $('input[name=_token]').val(),
//                                         "arr": arr ,
//                                   };

//         $.ajax({
//           //    headers: {
//           // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           // },
//          type: "get",
//         url :'admin/sanpham/them' ,
//         data: data,
         
       
// });


     

//       $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });
//       arr.push({"name" : dacdiem, "sl" : soluong})
     
//        $.ajax({
//         type: "post",
//         url : "admin/sanpham/them",
        
//         data:  arr,
//         });
      
      //console.log(arr);


 // cells.forEach(function(cell) {

 //             console.log(cell.value);
 //         });
 // console.log(cells);

//  var length = cells.length;
// console.log(length);
// for (var i = 0; i < length; i++) {
   
  
//     console.log(cells[i].innerHTML); 
//      // var id = $(this).closest("tr").find('.dd').value;
 
 

// }


         



// });

//               $(".delete-row").click(function(){
//             $("table tbody ").find('input[name="record"]').each(function(){
//                 if($(this).is(":checked")){
//                     $(this).parents("tr").remove();
//                 }
//             });
//         });
// });

</script>

 @endsection 
        
    