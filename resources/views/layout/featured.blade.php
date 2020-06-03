<section class="featured featured-11 text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top">
            <h2 class="section-title">Sản phẩm xem nhiều<span></span></h2>
          </div><!-- /.section-top -->

          <ul class="filter">
            <li><a class="active" href="#" data-filter="*">Tất cả</a></li>
            <li><a href="#" data-filter=".cat-1">Máy tính</a></li>
            <li><a href="#" data-filter=".cat-2">Điện thoai</a></li>
            {{--  <li><a href="#" data-filter=".cat-3">cat3</a></li>  --}}
          </ul>

          <div class="featured-sorting">
            @php
                $data = Carbon\Carbon::now();

            @endphp
            @foreach ($sanphamdecao as $item)
            @php
            $time_item = Carbon\Carbon::parse($item->ngaytao);
            $time =  $time_item->diffInDays($data);
            @endphp
            
           
            <san-pham-de-cao
            :sanphamdecao = "{{$item}}"
            assetmaytinh={{asset('public/image/maytinh/')}} 
            assetdienthoai={{asset( 'public/image/dienthoai/')}}
            :time ="{{$time}}"
            linkchitiet="{{route('giaodien.sanpham.chitiet',$item->id)}}"
            sosanh = "{{route('giaodien.sanpham.sosanhsanpham',$item->id)}}"
            >

            </san-pham-de-cao>
            @endforeach
                
             
            

          </div><!-- /.featured-sorting -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /.featured -->