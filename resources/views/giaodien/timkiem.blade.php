@extends('master') 
@section('title'){{$search}}
@endsection
 
@section('header')
  @include('layout.header')
@endsection


@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<section class="page-name-sec page-name-sec-01">
  <div class="section-padding">
    <div class="container">
     
      <!-- /.page-title -->

      <div class="row">
        <div class="col-sm-7">
          <p class="description">

          </p>
          <!-- /.description -->
        </div>

        <div class="col-sm-5">
          <ol class="breadcrumb text-right">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="active">Sản phẩm</li>

          </ol>
          <!-- /.breadcrumb -->
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.page-name-sec -->

<section class="shop-contents">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="product-filter">
          <div class="col-md-6">
            <div class="filter-view">
              <ul role="tablist">
              </ul>
            </div>
            <!-- /.filter-view -->
            
            
            <span class="filter-text">Kết quả tìm thầy {{count($ketqua)}}</span>
            
          </div>
          {{--  //sapxep  --}}
          <div class="col-md-4 text-right">
                <span class="filter-text" >Từ khoá tìm kiếm : {{$search}}</span>
          </div>
          <div class="col-md-2 text-right">

          </div>
           {{--  end sapxep  --}}
        </div>
        {{--
        <!-- /.product-filter -->--}}
      </div>

      <div class="shop-products">
        <div class="tab-content">
            @include('giaodien.sanpham.menuleft')
         @if(count($ketqua)>0)
          <div role="tabpanel" class="tab-pane fade text-center active in" id="grid">
            @php
            $data = Carbon\Carbon::now();
            @endphp
            @foreach($ketqua as $item)
            @php
            $time_item = Carbon\Carbon::parse($item->ngaytao);
            $time =  $time_item->diffInDays($data);
            @endphp
              <div class="col-sm-3">
                <sanpham :item="{{$item}}" 
                link="{{route('giaodien.sanpham.chitiet',$item->id)}}"
                assetmaytinh={{asset('public/image/maytinh/')}} 
                assetdienthoai={{asset( 'public/image/dienthoai/')}}
                sosanh = "{{route('giaodien.sanpham.sosanhsanpham',$item->id)}}"
                :time ="{{$time}}"
                >
                </sanpham>   
             </div>
            @endforeach
            
          </div>
          @else
          <div class="col-sm-9" style="text-align:center">Không tìm thấy kết quả !</div>
          @endif

          {{-- <div role="tabpanel" class="tab-pane fade  text-left" id="list">
            @foreach($sanpham as $item)
            <div class="item media">
              <div class="item-thumbnail media-left">
                @if($item->id_matensanpham ==1)
                <img src="{{'../public/image/maytinh/'.$item->hinhanh}}" alt="Item Thumbnail"> 
                @else
                <img src="{{'../public/image/dienthoai/'.$item->hinhanh}}" alt="Item Thumbnail">
                 @endif
              </div>
              <!-- /.item-image -->

              <div class="item-content media-body">
                <h3 class="item-title"><a href="#">{{$item->tensp}}</a></h3>
                <!-- /.item-title -->

                <div class="item-price">
                  <div class="current-price"><span class="currency">$</span><span class="price">{{number_format($item->dongia)}}</span></div>
                  <!-- /.current-price -->
                </div>
                <!-- /.item-price -->

                <p class="description">
                  {{$item->mota->mota1}}
                </p>
                <!-- /.description -->

                <div class="item-bottom">
                  <div class="buttons">
                    <button class="add-to-cart">Thêm giỏ hàng<i class="fa fa-shopping-cart"></i></button>
                     @if($item->id_matensanpham==1)
                    <a class="fancybox" href="{{'../public/image/maytinh/'.$item->hinhanh}}"><i class="fa fa-search"></i></a>                   
                     @else
                    <a class="fancybox" href="{{'../public/image/dienthoai/'.$item->hinhanh}}"><i class="fa fa-search"></i></a>                    
                    @endif
                    <button class="compare"><i class="fa fa-exchange"></i></button>
                  </div>
                 
                  <!-- /.buttons -->
                </div>
                
                <!-- /.item-bottom -->
              </div>
             
            </div>
            
            <!-- /.item -->
             @endforeach
          </div> --}}
          
          <!-- /.tab-pane -->
        </div>
        
        <!-- /.tab-content -->
      </div>
      <!-- /.shop-products -->

      <div class="pagination pagination-02 text-center">
       
          {{-- {{dd($ketqua)}} --}}
         {{-- @if($ketqua->currentPage() != 1)
        <a href="{!! str_replace('/?','?',$ketqua->appends(['sort' => $sort])->url($ketqua->currentPage() -1))!!}" class="prev"><i class="ti-angle-double-left"></i></a>        
        @endif 
        @for($i = 1; $i <= $ketqua->lastPage(); $i=$i+1)
        <a href="{!! str_replace('/?','?',$ketqua->appends(['sort' => $sort])->url($i))!!}" class="{!! ($ketqua->currentPage() == $i)? 'active' :''!!}">{!!$i!!}</a>
        @endfor 
         @if($ketqua->currentPage() != $ketqua->lastPage())
          <a href="{!! str_replace('/?','?',$ketqua->appends(['sort' => $sort])->url($ketqua->currentPage() + 1))!!}" class="next"><i class="ti-angle-double-right"></i></a> 
         @endif --}}
           {{-- {{$ketqua->appends(['sort' => $sort])->links()}}  --}}
      </div>
      <!-- /.pagination -->

    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.shop-contents -->
@endsection