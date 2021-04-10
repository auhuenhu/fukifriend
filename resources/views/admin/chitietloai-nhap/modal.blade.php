<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Xóa loại sản phẩm</h5>
         
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
              <label >Tên loại</label>
              <input type="text" class="form-control" name="tenloai1" id="tenloai1">
              <input type="hidden" class="form-control" name="idloai" id="idloai">
  
          </div>
          <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
               <button id="Edit1" type="button" class="btn btn-primary">Sửa</button>
          </div>
         </form>
  
         
        </div>
        
      </div>
    </div>
  </div>