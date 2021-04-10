<div class="row " >
    <div class="col-md-4 text-left" style="height: 183px;"> 
        
    </div>
    <div class="col-md-4 text-center img-responsive " style="margin-top: 20px;" ><a href="{{URL::to('frontend')}}"><img src="image/logo.jpg"></a></div>
    <div class="col-md-4"></div>
</div>
<div class="row text-right" style="margin: -80px 30px 0 0;">
    <a href="frontend/cart"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-bag" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/></svg></a>

     @if(Auth::check())
    
        
             <a href=""><svg width="28px" height="28px" style="margin-right: 4px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
            
        <span>{{Auth::user()->ten}} </span>

             

       
     
         <!--   <a href=""><svg width="28px" height="28px" style="margin-right: 4px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
   
        <span>{{Auth::user()->ten}} </span> -->

       

        <a href="frontend/dangxuat"><i style="font-size: 33px;" class="fa fa-sign-out" aria-hidden="true"></i></a>
        @else


      <a href="{{URL::to('/frontend/dangnhap')}}"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/><path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/></svg></a>

    @endif

    <form action=" {{URL::to('/frontend/search')}}" method="get">
        <input type="text"  name="txtSearch" id="txtSearch" placeholder="Tìm kiếm" autocomplete="off" style="height: 33px;padding-left: 20px;border: 1px solid #000;border-radius: 8px; " >
        
        <button type="submit" style="margin: 3px 0 3px 0;border: none;padding: 2px;" ><span class="glyphicon glyphicon-search "></span></button>
    </form>
</div>

<nav style="background:#F7BD33; ">
    <ul>
        @foreach($menu as $m)
            <li class="col-md-2 text-center" style="float: left" ><a  href="frontend/collection/{{$m->id}}" >{{ $m->tenmenu }} <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                <!-- menu con sổ xuống cấp 1 -->
                <ul style="border-top: 2px solid #000;" > 
                    @foreach($m->loai as $l)
                    @if($l->tenloai != "Mặc định" )
                               <li><a href="frontend/menu/{{ $m->id }}/{{ $l->id }}">{{ $l->tenloai }}</a>
                            @endif

                    
                        <ul>
                            @foreach($l->chitietloai as $ctl)
                            @if($ctl->tenloaichitiet != "Mặc định" )
                                <li><a href="frontend/menu/{{ $m->id }}/{{ $l->id }}/{{ $ctl->id }}"> {{ $ctl->tenloaichitiet }}</a></li>
                            @endif
                             @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </li>
        @endforeach 
    </ul>
</nav>

