<!DOCTYPE html>
<html lang="vn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phiếu giao {{$donhang->id}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body onload="window.print();window.close();">
    <div style="text-align:justify; margin-left: 200px" >
        <h3>Công ty Hirolap</h3>
        <h4>Đường 180 Cao Lỗ Quận 8</h4>
        <h4>Điện thoại:0903 984 976</h4>
    </div>
    <div style="text-align:center">
        <h1>Phiếu giao hàng</h1>
        <h5 style="margin-left:250px">Mã phiếu:{{$donhang->id}}</h5>

    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-2">


            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Tên cửa hàng:Hirolap</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Tên khách hàng:{{$donhang->user->name}}</p>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <p>Nơi giao hàng:{{$donhang->user->diachi}}</p>
                    </div>

                </div> --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>Địa chỉ giao:{{$donhang->user->diachi}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Điện thoại khách hàng:{{$donhang->user->sdt}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Nhân viên giao hàng: {{$giaohang->nhanviengiaohang->tennv}}</p>
                    </div>
                    <div class="col-sm-6">
                            <p>SĐT Nhân viên: {{$giaohang->nhanviengiaohang->sdt}}</p>
                        </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table" border="1">
                            <tr>
                                <td>STT</td>
                                <td>Sản phẩm</td>
                                <td>Đơn vị tính</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                            </tr>
                            @php
                                $stt=1;
                                
                                $time = Carbon\Carbon::now();
                            @endphp
                            
                            @foreach($chitietdonhang as $item)
                            @php
                            $sanpham = App\Sanpham::with('chitietkhuyenmai')->where('id',$item->sanpham->id)->first()->toArray();
                            
                            @endphp
                            <tr>
                                <td>{{$stt++}}</td>
                                <td>{{$item->sanpham->tensp}}</td>
                                <td>VND</td>
                                <td>{{$item->soluong}}</td>
                                
                               
                                
                                @if(count($sanpham['chitietkhuyenmai']) > 0 && $sanpham['chitietkhuyenmai']['0']['trangthai'] ==0)
                                <td>{{number_format($sanpham['chitietkhuyenmai']['0']['dongia_giamgia']) }}</td>
                                @else 
                                <td>{{number_format($item->dongia) }}</td>
                                @endif
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Tổng tiền</td>
                                <td>{{number_format($donhang->tongtien)}} VND</td>

                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-7"></div>
                    <div class="col-sm-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         Ngày {{$time->day}} tháng {{$time->month}} năm {{$time->year}}</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4" style="text-align:center">
                        Người người nhận
                        <br>
                        <p style="text-align:center">Kí tên</p>
                    </div>
                    <div class="col-sm-4" style="text-align:center">
                        
                    </div>
                    <div class="col-sm-4" style="text-align:center">
                        Người giao hàng
                        <br>
                        <p style="text-align:center">Kí tên</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-2">
            </div>

        </div>
    </div>
</body>

</html>