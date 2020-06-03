@extends('masteradmin')
@section('title','Dashboard')
@section('page','Dashboard')
@section('icon',"../public/icon/home.png")
@section('script')
{{--  <script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>  --}}
<script src="{{asset('public/admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('public/admin/dist/js/pages/dashboard.js')}}"></script>
@endsection
@section('content')
<!-- Main content -->
    @php
        $user = App\User::where('level',1)->get()->count();
        $tongluotxemsanpham = App\Sanpham::select('luotxem')->sum('luotxem');
        $tongtien_donhang_trongngay = App\Donhang::where('trangthai',3)->whereDate('ngaydat',\Carbon\Carbon::now())->sum('tongtien');
        $tongtien_donhang_trongtuan = App\Donhang::where('trangthai',3)->whereBetween('ngaydat',[\Carbon\Carbon::now()->startOfWeek(),\Carbon\Carbon::now()->endOfWeek()])->sum('tongtien');
        $tongtien_donhang_trongthang = App\Donhang::where('trangthai',3)->whereMonth('ngaydat',\Carbon\Carbon::now()->month)->sum('tongtien');
        $tongtien_donhang_trongnam = App\Donhang::where('trangthai',3)->whereYear('ngaydat',\Carbon\Carbon::now()->year)->sum('tongtien');
        $chitietdonhang = App\Chitietdonhang::with('donhang','sanpham')->orderBy('id','DESC')->take(7)->get();
        $chitietkhuyenmai = App\Chitietkhuyenmai::with('sanpham','khuyenmai')->take(4)->get();
        $sanpham = App\Sanpham::with('cauhinhmaytinh','cauhinhdienthoai')->take(4)->orderBy('id','DESC')->get();
        $countsoluong = App\Soluongsanpham::all()->sum('tongsoluong');
        $countsoluongchitiet = App\Chitietdonhang::all()->sum('soluong');
        $tongdonhang = App\Donhang::all()->count();
       
        $tongdonhangthanhcong = App\Donhang::where('trangthai',3)->count();
        $tongdonhangchoduyet = App\Donhang::where('trangthai',0)->count();
        $tongdonhangdaduyet = App\Donhang::where('trangthai',1)->count();
        $tongdonhangdanggiao = App\Donhang::where('trangthai',2)->count();

        
    @endphp
    <dashboard
    :tongtrongthang = "{{$tongtien_donhang_trongthang}}"
    :tongtrongtuan = '{{$tongtien_donhang_trongtuan}}'
    :tongkhachhang='{{$user}}'
    :tongluotxem = '{{$tongluotxemsanpham}}'
    listkhachhang = "{{route('admin.khachhang.list')}}"
    :tongtienngay = '{{$tongtien_donhang_trongngay}}'
    :tongtiennam = '{{$tongtien_donhang_trongnam}}'
    :chitietdonhang = '{{$chitietdonhang}}'
    :chitietkhuyenmai ='{{$chitietkhuyenmai}}'
    :sanpham = '{{$sanpham}}'
    :countsoluong ="{{$countsoluong}}"
    :countsoluongchitiet = "{{$countsoluongchitiet}}"
    :tongdonhang ="{{$tongdonhang}}"
    :tongdonhangthanhcong ="{{$tongdonhangthanhcong}}"
    :tongdonhangchoduyet = "{{$tongdonhangchoduyet}}"
    :tongdonhangdaduyet = "{{$tongdonhangdaduyet}}"
    :tongdonhangdanggiao = "{{$tongdonhangdanggiao}}"
    assetmaytinh={{asset('public/image/maytinh/')}} 
    assetdienthoai={{asset( 'public/image/dienthoai/')}}
    
    ></dashboard>

<!-- /.content -->


@endsection