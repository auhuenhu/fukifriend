@extends('admin.layout.index')
@section ('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại
                            <small>{{$loai->tenloai}}</small>
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
                        
                        <form action="admin/loai/sua/{{$loai->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            
                            <div class="form-group">
                                <label>Tên loại</label>
                                <input class="form-control"  name="Ten"  value="{{$loai->tenloai}}" />
                            </div>
                            
                            <div class="form-group">
                                <label> Menu </label>
                               
                                <select class="form-control select "  name="Menu" id="Menu" >
                                   @foreach ($menu as $m )
                                       
                                   
                                    <option 
                                    @if ($loai->idMenu == $m->id)
                                        {{ 'selected' }}
                                    @endif
                                  

                                   value="{{$m->id}}">{{$m->tenmenu}}</option>
                                

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

