<div class="col-md-3">
        <aside class="sidebar">
          <div class="widget widget_search">
            <div class="widget-details">
              <form method="post" class="search-form" action="{{route('giaodien.sanpham.timkiem')}}">
                {{ csrf_field() }}
                <input type="text" class="form-control" placeholder="Tìm kiếm" name="tukhoa" title="Tìm kiếm" required="">
                <button type="submit" class="search-submit"></button>
              </form>
            </div><!-- /.widget-details -->
          </div><!--/.widget-->

          <div class="widget widget_categories">
            <h2 class="widget-title">Loại sản phẩm <span></span></h2><!-- /.widget-title -->
            <div class="widget-details">
              @php
                  $loaisanpham = App\Loaisanpham::all();
              @endphp
              <ul>
              @foreach ($loaisanpham as $item)
                @php
                    $count = App\Sanpham::where('id_loaisanpham',$item->id)->where('dongia','>',0)->count();
                @endphp
                <li><a href="{{route('giaodien.sanpham.loaisanpham',$item->id)}}">{{$item->tenloai}}<span class="count">{{$count}}</span></a></li>
              @endforeach
              </ul>
              
              
              
            </div><!-- /.widget-details -->
          </div><!--/.widget-->
          @php
          $sanphamphobien = App\Sanpham::with('mota','soluongsanpham','chitietkhuyenmai')->orderBy('luotxem','desc')->take(3)->get();
         
           @endphp
          
          <div class="widget widget_popular_post">
            <h2 class="widget-title">Sản phẩm phổ biến <span></span></h2><!-- /.widget-title -->
            <div class="widget-details">
             
              @foreach ($sanphamphobien as $item)
              <san-pham-pho-bien
              :item="{{$item}}"
              link="{{route('giaodien.sanpham.chitiet',$item->id)}}"
              assetmaytinh={{asset( 'public/image/maytinh/')}} 
              assetdienthoai={{asset( 'public/image/dienthoai/')}}
              sosanh = "{{route('giaodien.sanpham.sosanhsanpham',$item->id)}}"
              >
             </san-pham-pho-bien>
                {{-- <article class="post type-post media">
                  <div class="entry-thumbnail media-left">
                    @if($item->id_matensanpham == 1)
                    <a href="{{route('giaodien.sanpham.chitiet',$item->id)}}" ><img width="75px" height="75px" src="{{asset('public/image/maytinh/' .$item->hinhanh)}}" alt="{{$item->tensp}}"></a>
                    @else
                     <a href="{{route('giaodien.sanpham.chitiet',$item->id)}}" ><img  width="75px" height="75px" src="{{asset('public/image/dienthoai/'. $item->hinhanh)}}" alt="{{$item->tensp}}"></a>
                    @endif
                  </div><!--/.post-thumbnail-->

                  <div class="post-content media-body">
                    <br>
                    <h3 class="entry-title" ><a href="#">{{$item->tensp}}</a></h3>
                    <h3 class="entry-title"><span style="color:red">{{number_format($item->dongia)}} VND</span></h3>
                    
                  </div><!--/.post-content media-body-->
                </article> --}}
              @endforeach
             
             
            </div><!-- /.widget-details -->
          </div><!--/.widget-->


        

        </aside><!--/.sidebar-->
    </div>