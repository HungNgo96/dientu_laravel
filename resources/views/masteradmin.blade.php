<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="@yield('icon')" type="image/gif">
  <title>@yield('title')</title>

  

  <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{--
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet"> --}}

  

  



</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('home')}}" class="nav-link">Trang sản phẩm</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        @if(Auth::user()->level ==0)
        <!-- Notifications Dropdown Menu -->
        @php $user = App\User::findOrFail(1); 
        @endphp
        
          <notification :unread="{{$user->unreadNotifications}}" :userid="{{$user->id}}" assetthongbao={{asset( 'admin/xemthongbao/')}}
            thongbao="{{route('admin.xemthongbaodonhang')}}"
            xemtatca="{{route('admin.xemthongbaotatca')}}"
            ></notification>
        {{--  @include('admin.notification')  --}}
        @endif
      
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('admin.dashboard')}}" class="brand-link">
          <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light"></span>Hirolap</span>
        </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('admin.dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
            
          </div>
          <div class="info">
            <a  href="{{route('giaodien.getdangxuat')}}">   <i
              class="fa fa fa-sign-out"></i> </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        @php
            $user = Auth::user();
        @endphp
       
        <nav class="mt-2">
           
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
            @if($user->level==0)
            <li class="nav-item has-treeview ">
              <a href="{{route('admin.dashboard')}}" class="nav-link active">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Thống kê
                  </p>
                </a>

            </li>
            @endif
            @if($user->level==0 || $user->level == 3 ) 
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-envelope"></i>
                  <p>
                    Hỗ trợ khách hàng
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.chathotro')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Chat trực tiếp</p>
                    </a>
                </li>
              </ul>
            </li>
            @endif
            @if($user->level==0)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-group"></i>
                  <p>
                    Quản lý NV/KH
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('admin.getViewnhanvienquanly')}}" class="nav-link">
                        <i class="right fa fa-angle-right"> &nbsp;</i>
                          <p>Nhân viên quản lý</p>
                        </a>
                    </li>
                <li class="nav-item">
                  <a href="{{route('admin.khachhang.list')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Khách hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.nhanvien.list')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Nhân viên giao hàng</p>
                    </a>
                </li>
              </ul>
            </li>
            @endif
            @if($user->level==0 || $user->level == 5 ) 
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-bars"></i>
                  <p>
                    Quản lý SP/SPL/NSX
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                       <i class="left fa fa-angle-right right"> &nbsp;</i>
                        <p>
                          Quản lý sản phẩm
                         
                        </p>
                      </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{route('admin.sanpham.maytinh')}}" class="nav-link">
                            &nbsp;&nbsp;<i class="right fa fa-circle"> &nbsp;</i>
                                  <p>Quản lý máy tính</p>
                                </a>
                        </li>
                    <li class="nav-item">
                      <a href="{{route('admin.sanpham.dienthoai')}}" class="nav-link">
                        &nbsp;&nbsp;<i class="right fa fa-circle"> &nbsp;</i>
                              <p>Quản lý điện thoại</p>
                            </a>
                    </li>
                    
                  </ul>
                </li>
                
                <li class="nav-item">
                  <a href="{{route('admin.noidungkhuyenmai')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Quản lý nội dung KM</p>
                    </a>
                </li>  
                <li class="nav-item">
                  <a href="{{route('admin.khuyenmai')}}" class="nav-link">
                      <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Quản lý sản phẩm KM</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.sanphamloi')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Quản lý sản phẩm lỗi</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.hangsanxat')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                        <p>Quản lý hãng sản xuất</p>
                      </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.phieunhap')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                        <p>Quản lý phiếu nhập</p>
                      </a>
                </li>
              </ul>
            </li>
            @endif
            @if($user->level==0 || $user->level == 4 )
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    Quản lý đơn hàng
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.donhang.choduyet')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn hàng chờ duyệt</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.daduyet')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn hàng đã duyệt</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.danggiao')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn hàng đang giao</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.hoanthanh')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn hàng hoàn thành</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.dahuy')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn hàng đã huỷ</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.donhang.doitra')}}" class="nav-link">
                    <i class="right fa fa-angle-right"> &nbsp;</i>
                      <p>Ds đơn trả</p>
                    </a>
                </li>
              </ul>
            </li>
            @endif
          </ul>
          
        </nav>
        
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('pageheader')</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">@yield('page')</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      {{--
      <Maincontent> --}}
         @yield('content') 
         {{-- </Maincontent> --}}
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2018 
      <div class="float-right d-none d-sm-inline-block">
        <b>Hirolap</b> 
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

{{-- <!-- ./wrapper --> --}}

<script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>

<script type="text/javascript" src="{{asset('public/admin/dist/js/demo.js')}}"></script>

{{-- <!-- jQuery --> --}}
{{-- <!-- Datatable --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script> --}}
{{-- <!-- jQuery UI 1.11.4 --> --}}
<script src="{{asset('public/admin/js/jquery-ui.min.js')}}"></script>
{{-- <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> --}}
{{--  <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>  --}}
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
{{-- <!-- Bootstrap 4 --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- <!-- Morris.js charts --> --}}
<script type="text/javascript" src="{{asset('public/admin/js/raphael-min.js')}}"></script>
{{-- <script src="{{asset('public/admin/plugins/morris/morris.min.js')}}"></script> --}}
{{-- <!-- Sparkline --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
{{-- <!-- jvectormap --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
{{-- <!-- jQuery Knob Chart --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/knob/jquery.knob.js')}}"></script>
{{-- <!-- daterangepicker --> --}}
<script type="text/javascript" src="{{asset('public/admin/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
{{-- <!-- datepicker --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
{{-- <!-- Bootstrap WYSIHTML5 --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
{{-- <!-- Slimscroll --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
{{-- <!-- FastClick --> --}}
<script type="text/javascript" src="{{asset('public/admin/plugins/fastclick/fastclick.js')}}"></script>
{{-- <!-- AdminLTE App --> --}}
<script type="text/javascript" src="{{asset('public/admin/dist/js/adminlte.js')}}"></script>
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) --> --}}
{{-- <script src="{{asset('public/admin/dist/js/pages/dashboard.js')}}"></script> --}}
{{-- <!-- AdminLTE for demo purposes --> --}}

@yield('script')

  



</body>
</html>