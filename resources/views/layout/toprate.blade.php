
<section class="top-rated bg-gray text-center">
    <div class="section-padding">
      <div class="container">
        <div class="section-top">
          <h2 class="section-title">Sản phẩm giảm giá<span></span></h2><!-- /.section-title -->
        </div><!-- /.section-top -->
        @php
            $sanphamsale = App\Sanpham::with('mota','soluongsanpham','chitietkhuyenmai')->get();
            
        @endphp
        <div class="row">
          <div class="top-rated-slider owl-carousel owl-theme">
            @foreach ($sanphamsale as $item)
           
              @if($item->chitietkhuyenmai->count() > 0 && $item->chitietkhuyenmai[0]->trangthai ==0)
              <san-pham-sale 
              :item="{{$item}}"
              link="{{route('giaodien.sanpham.chitiet',$item->id)}}"
              assetmaytinh={{asset( 'public/image/maytinh/')}} 
              assetdienthoai={{asset( 'public/image/dienthoai/')}}
              sosanh = "{{route('giaodien.sanpham.sosanhsanpham',$item->id)}}"
              >
              </san-pham-sale>
              @endif
            @endforeach

          </div><!-- /.top-rated-slider -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /.top-rated -->
  
 