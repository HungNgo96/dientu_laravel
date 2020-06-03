@extends('master') 
@section('title') Danh sách máy tính
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
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Máy tính</li>
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
            

            <div class="category-select">

            </div>
            <span class="filter-text">Hiển thị {{$maytinh->firstItem()}}-{{$maytinh->lastItem()}} của {{$maytinh->total()}}</span>
          </div>
          <div class="col-md-6 text-right">
            <span>Sắp xếp theo:</span>
                  {{--  <a href="?page=&sort=new" title="Hàng mới nhất">Hàng mới nhất</a>  --}}
                  <a href="?sort=desc&page=" title="Giá tư cao đến thấp">Giá từ cao đến thấp</a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="?page=&sort=asc" title="Giá tư thâp đến cao">Giá từ thâp đến cao</a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="?page=&sort=name" title="tên A-Z">tên A-Z</a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="?page=&sort=namedesc" title="tên Z-A">tên Z-A</a>
          </div>
          <!-- /.col-md-6 -->
        </div>
        {{--
        <!-- /.product-filter -->--}}
      </div>

      <div class="shop-products">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade text-center active in" id="grid">
              @include('giaodien.sanpham.menuleft')
              @php
              $data = Carbon\Carbon::now();
              @endphp
            @foreach($maytinh as $item)
            @php
            $time_item = Carbon\Carbon::parse($item->ngaytao);
            $time =  $time_item->diffInDays($data);
            @endphp
            <div class="col-sm-3">
              <sanpham :item="{{$item}}" 
                link="{{route('giaodien.sanpham.chitiet',$item->id)}}"
                assetmaytinh={{asset( 'public/image/maytinh/')}} 
                assetdienthoai={{asset( 'public/image/dienthoai/')}}
                sosanh = "{{route('giaodien.sanpham.sosanhsanpham',$item->id)}}"
                :time ="{{$time}}"
                >
                </sanpham>
              <!-- /.item -->
            </div>
            @endforeach
          </div>
        </div>
        {{--
        <!-- /.tab-content -->--}}
      </div>{{--
      <!-- /.shop-products -->--}}

      <div class="pagination pagination-02 text-center">
        @if($maytinh->currentPage() != 1)
        <a href="{!! str_replace('/?','?',$maytinh->appends(['sort' => $sort])->url($maytinh->currentPage() -1))!!}" class="prev"><i class="ti-angle-double-left"></i></a>        
        @endif 
        @for($i = 1; $i <= $maytinh->lastPage(); $i=$i+1)
        <a href="{!! str_replace('/?','?',$maytinh->appends(['sort' => $sort])->url($i))!!}" class="{!! ($maytinh->currentPage() == $i)? 'active' :''!!}">{!!$i!!}</a>
        @endfor 
         @if($maytinh->currentPage() != $maytinh->lastPage())
          <a href="{!! str_replace('/?','?',$maytinh->appends(['sort' => $sort])->url($maytinh->currentPage() + 1))!!}" class="next"><i class="ti-angle-double-right"></i></a> 
         @endif
      </div>
      <!-- /.pagination -->

    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.shop-contents -->
@endsection