@extends('master') 
@section('title') {{$chitietsanpham->tensp}}
@endsection
 
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/shop/shop-details.css')}}">

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
            <li><a href="{{route('giaodien.sanpham.sanpham')}}">Sản phẩm</a></li>
            <li class="active">Chi tiết sản phẩm</li>
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
      <div class="product-details">
        <div class="row">
          <div class="col-md-6">
            <div class="item-gallery vertical">
              <div class="tabs">
                <div role="tabpanel" class="tabpanel">

                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="item1">
                      @if($chitietsanpham->id_matensanpham ==1)
                      <img width="551px" height="400px" src="{{'../../public/image/maytinh/'.$chitietsanpham->hinhanh}}" alt="Product Image">                      
                      @else
                      <img width="551px" height="400px" src="{{'../../public/image/dienthoai/'.$chitietsanpham->hinhanh}}" alt="Product Image">                      
                      @endif
                    </div>

                  </div>
                  
                  <!-- /.tab-content -->
                </div>
              </div>
              <!-- /.item-gallery -->
            </div>
          </div>
          {{--  {{dd($chitietsanpham)}}  --}}
          <div class="col-md-6">
            <div class="about-product">
              <h3 class="item-title">{{$chitietsanpham->tensp}}</h3>
              <div class="item-price">
                <div class="current-price">
                    @if($chitietsanpham->chitietkhuyenmai->count() > 0 && $chitietsanpham->chitietkhuyenmai[0]->trangthai ==0)
            
                    <div class="item-price ">
                      <span
                        class="price" style="color:red"
                      >{{number_format($chitietsanpham->chitietkhuyenmai[0]->dongia_giamgia)}} VND</span>
                    </div>
                    <div class="previous-price">
                      <span class="currency"></span>
                      <!-- /.currency -->
                      {{-- {{($chitietsanpham->chitietkhuyenmai[0]->trangthai)}} --}}
                      <span class="price" > {{number_format($chitietsanpham->dongia)}}VND</span>
                      <!-- /.price -->
                    </div>
                    @else
                    <div class="item-price " style="color:red">
                      <span
                        class="price"
                      >{{number_format($chitietsanpham->dongia)}} VND</span>
                    </div>
                    @endif
                </div>
                <!-- /.current-price -->
               
              </div>
              <!-- /.item-price -->

             


              <p class="description">
                @if($chitietsanpham->id_matensanpham == 1)
                <div class="widget widget_meta" >
                  <span class="meta-id">CPU : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhmaytinh->cpu}}</span></span><br>
                  <span class="meta-id">RAM : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhmaytinh->ram}}</span></span><br>
                  <span class="meta-id">Bộ nhớ : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhmaytinh->bonho}}</span></span><br>
                  <span class="meta-id">Hệ điều hành : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhmaytinh->hdh}}</span></span><br>
                </div>
                @else 
                <div class="widget widget_meta">
                    <span class="meta-id">CPU : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhdienthoai->cpu}}</span></span><br>
                    <span class="meta-id">RAM : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhdienthoai->ram}}</span></span><br>
                    <span class="meta-id">Bộ nhớ : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhdienthoai->bonho}}</span></span><br>
                    <span class="meta-id">Hệ điều hành : <span class="meta-about" style="color:blue">{{$chitietsanpham->cauhinhdienthoai->hdh}}</span></span><br>
                  </div>
                @endif
              </p>
              <!-- /.short-description -->
              {{--  {{(}}---{{$chitietsanpham->chitietkhuyenmai}}  --}}
              @if($chitietsanpham->soluongsanpham->soluongcon > 0)
              <cartchitiet :chitietsanpham="{{$chitietsanpham}}"
                            :cart="cart"
                            sosanh="{{route('giaodien.sanpham.sosanhsanpham',$chitietsanpham->id)}}"
              >

              </cartchitiet>
              @else 
              <h1 style="color:red"> Tạm hết </h1>
              @endif



              {{--  <div class="product-social">

                <a href="#"><i class="ti-facebook"></i></a>

              </div>  --}}
              <!-- /.product-social -->
            </div>
            <!-- /.about-product -->
          </div>
        </div>
        <div class="clearfix"></div>

        <div class="product-tabs">
          <div class="tabs">
            <div role="tabpanel">

              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="false">Giới thiệu</a></li>
                <li role="presentation" class=""><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="true">Cáu hình </a></li>
                <li role="presentation" class=""><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" aria-expanded="true">Bình luận </a></li>
              </ul>

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                  <p class="description">
                    @if($chitietsanpham->id_matensanpham == 2)
                    <strong>{{$chitietsanpham->mota->mota1}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-dienthoai/'.($chitietsanpham->mota->hinhanh1)}}" />
                    <br><br>
                    <strong>{{$chitietsanpham->mota->mota2}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-dienthoai/'.($chitietsanpham->mota->hinhanh2)}}" />
                    <br><br>
                    <strong>{{$chitietsanpham->mota->mota3}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-dienthoai/'.($chitietsanpham->mota->hinhanh3)}}" />
                    <br><br> @else
                    <strong>{{$chitietsanpham->mota->mota1}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-maytinh/'.($chitietsanpham->mota->hinhanh1)}}" />
                    <br><br>
                    <strong>{{$chitietsanpham->mota->mota2}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-maytinh/'.($chitietsanpham->mota->hinhanh2)}}" />
                    <br><br>
                    <strong>{{$chitietsanpham->mota->mota3}}</strong>
                    <br><br>
                    <img src="{{'../../public/image/mota-maytinh/'.($chitietsanpham->mota->hinhanh3)}}" />
                    <br><br> @endif
                  </p>
                  <!-- /.description -->

                </div>
                <!-- /.tab-pane -->

                <div role="tabpanel" class="tab-pane fade " id="tab2">

                  <div id="specification" class="tab-content active" style="display: block;">
                    <table class="table">
                      @if($chitietsanpham->id_matensanpham == 2)
                      <tbody>
                        <tr>
                          <td>Màn hình</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->manhinh}}</b></td>
                        </tr>
                        <tr>
                          <td>Hệ điều hành</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->hdh}}</b></td>
                        </tr>
                        <tr>
                          <td>Camera</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->camera}}</b></td>
                        </tr>
                        <tr>
                          <td>CPU</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->cpu}}</b></td>
                        </tr>
                        <tr>
                          <td>Ram</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->ram}}</b></td>
                        </tr>
                        <tr>
                          <td>Bộ nhớ</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->bonho}}</b></td>
                        </tr>
                        <tr>
                          <td>Pin</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->pin}}</b></td>
                        </tr>
                        <tr>
                          <td>Thông tin khác</td>
                          <td><b>{{$chitietsanpham->cauhinhdienthoai->thongtinkhac}}</b></td>
                        </tr>
                      </tbody>
                      @else
                      <tbody>
                        <tr>
                          <td>Màn hình</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->manhinh}}</b></td>
                        </tr>
                        <tr>
                          <td>Hệ điều hành</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->hdh}}</b></td>
                        </tr>
                        <tr>
                          <td>Cổng kết nối</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->congketnoi}}</b></td>
                        </tr>
                        <tr>
                          <td>VGA</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->vga}}</b></td>
                        </tr>
                        <tr>
                          <td>CPU</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->cpu}}</b></td>
                        </tr>
                        <tr>
                          <td>Ram</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->ram}}</b></td>
                        </tr>
                        <tr>
                          <td>Bộ nhớ</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->bonho}}</b></td>
                        </tr>
                        <tr>
                          <td>Pin</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->pin}}</b></td>
                        </tr>
                        <tr>
                          <td>Thông tin khác</td>
                          <td><b>{{$chitietsanpham->cauhinhmaytinh->thongtinkhac}}</b></td>
                        </tr>
                      </tbody>
                      @endif
                    </table>
                  </div>

                </div>
                <!-- /.tab-pane -->

                <div role="tabpanel" class="tab-pane fade" id="tab3">
                  <div class="fb-comments" data-href="{{Request::url()}}" data-width="800" data-numposts="5"></div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.tab-panel -->
          </div>
          <!-- /.tabs -->
        </div>
        <!-- /.product-tabs -->
      </div>
      <!-- /.product-details -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.shop-contents -->

<section class="related-products text-center">
  <div class="section-padding">
    <div class="container">
      <div class="section-top text-center">
        <h2 class="section-title">Sản phẩm liên quan<span></span></h2>
      </div>
      <!-- /.section-top -->

      <div id="related-slider" class="related-slider">
          @php
          $data = Carbon\Carbon::now();
          @endphp
       @foreach($sanphamlienquan as $item) 
       @php
       $time_item = Carbon\Carbon::parse($item->ngaytao);
       $time =  $time_item->diffInDays($data);
       @endphp
       @if($chitietsanpham->id != $item->id)
        <div class="item">
          <a class="fancybox" href="{{'../../public/image/maytinh/'.$item->hinhanh}}">
            <div>
              @if($item->id_matensanpham == 2)
              <a href="{{route('giaodien.sanpham.chitiet',$item->id)}}"><img height="255px" width="255px" src="{{'../../public/image/dienthoai/'.$item->hinhanh}}" alt="{{$item->tensp}}"></a>
                @if($item->chitietkhuyenmai->count() > 0)
                <span class="ribbon sale">Khuyến mãi</span>
                @elseif($time <=30 && $item->soluongsanpham->soluongcon != 0)
                <span class="ribbon new">Mới</span>
                @elseif($item->soluongsanpham->soluongcon == 0)
                <span class="ribbon sale">Tạm hết</span>
                @endif

              @else
                <a href="{{route('giaodien.sanpham.chitiet',$item->id)}}"><img  height="255px" width="255px" src="{{'../../public/image/maytinh/'.$item->hinhanh}}" alt="{{$item->tensp}}"></a>
                @if($item->chitietkhuyenmai->count() > 0 && $item->chitietkhuyenmai[0]->trangthai == 0)
                <span class="ribbon sale">Khuyến mãi</span>
                @elseif($time >=30 && $item->soluongsanpham->soluongcon != 0)
                <span class="ribbon new">Mới</span>
                @elseif($item->soluongsanpham->soluongcon == 0)
                <span class="ribbon sale">Tạm hết</span>
                @endif              
              @endif
            </div>
          </a>
          <div class="item-details">
            <h3 class="item-title"><a href="#">{{$item->tensp}}</a></h3>
            <!-- /.item-title -->
            @if($item->chitietkhuyenmai->count() > 0 && $item->chitietkhuyenmai[0]->trangthai ==0)
            
            <div class="item-price ">
              <span
                class="price"
              >{{number_format($item->chitietkhuyenmai[0]->dongia_giamgia)}} VND</span>
            </div>
            <div class="previous-price">
              <span class="currency"></span>
              <!-- /.currency -->
              {{-- {{($item->chitietkhuyenmai[0]->trangthai)}} --}}
              <span class="price"> {{number_format($item->dongia)}}VND</span>
              <!-- /.price -->
            </div>
            @else
            <div class="item-price ">
              <span
                class="price"
              >{{number_format($item->dongia)}} VND</span>
            </div>
            @endif
            <!-- /.item-price -->
            <cart-san-pham-lien-quan
            :sanphamlienquan="{{$item}}"
            >

            </cart-san-pham-lien-quan>
           
            <!-- /.btn -->
          </div>
        </div>
        @endif 
        @endforeach 
      </div>
      <!-- /#related-slider -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
  
</section>
<!-- /.related-products -->
@endsection