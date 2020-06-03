<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]>     <html class="no-js" lang=""> <!<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <link rel="icon" href="{{asset('public/icon/icon_dienthoai_laptop.ico')}}" type="image/gif" >
  
  <title>@yield('title')</title>
  <meta name="description" content="Shopaholic - e-Commerce HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
   
  

  <link rel="stylesheet" type="text/css" href="{{asset('public/layout/assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/layout/assets/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/layout/assets/css/et-line-icons.css')}}">

  <link rel="stylesheet" href="{{asset('public/layout/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/themes.css')}}">
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/home/home-11.css')}}"> {{-- list-shop --}}
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/shop/shop.css')}}"> {{-- contact --}}
  <link rel="stylesheet" href="{{asset('public/layout/assets/css/pages/contact.css')}}">

  {{--  dataTable  --}}
  <link rel="stylesheet" href="{{asset('public/DataTables/datatables.css')}}">
  
  

  <!--[if lte IE 7]><script src="lte-ie7.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="{{asset('public/layout/assets/js/vendor/html5-3.6-respond-1.4.2.min.js')}}"></script><![endif]-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style type="text/css" media="screen">
    .img_listsp {
      width: 300px;
      height: 280px;
    }
  
    .img_listspA {
      width: 270px;
      height: 318px;
    }
    .align-mid{
      height:75px; 
      vertical-align:middle !important;
    }
  </style>
</head>


<body>
    <div id="app">
    @yield('header') {{--
    @include('layout.header') --}} {{--header--}} 
    @yield('page')
    @yield('content') 
    
    @yield('banner') {{--
    @include('layout.banner')
    --}} {{--banner--}} 
    @yield('featured') {{--
    @include('layout.featured') --}} {{--featured--}} 
    @yield('otherbanner') {{--
    @include('layout.otherbanner') --}} {{--other-banners--}} 
    @yield('toprate') {{--
    @include('layout.toprate') --}} {{--top-rated--}}
    @yield('logo') {{--
    @include('layout.logo') --}} {{--logo--}} 
    @yield('footer') {{--
    @include('layout.footer') --}} {{--footer--}}
    </div>



  <div id="scroll-to-top" class="scroll-to-top">
    <i class="fa fa-angle-double-up"></i>
  </div>
  
  

  
  <script src="{{asset('public/js/app.js')}}"></script>
  
  <script src="{{asset('public/layout/assets/js/plugins.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/main.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/bootstrap-rating.min.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/jquery.lwtCountdown-1.0.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/bootstrap-rating.min.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/main.js')}}"></script>
  <script src="{{asset('public/layout/assets/js/gmap3.min.js')}}"></script>
  <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
  {{-- my-js --}}
  <script src="{{asset('public/layout/js/myjs.js')}}"></script>
  {{--  dataTable  --}}
  <script charset="utf8" src="{{asset('public/DataTables/datatables.js')}}"></script>
  {{--  doc-chat  --}}
  <script src="https://dochat.vn/code.js?id=9181226092749943763"></script>

  {{--  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  --}}
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  {{--  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>  --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=353265685446702&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  </script>
</body>

</html>