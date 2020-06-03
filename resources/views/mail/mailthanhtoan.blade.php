<!DOCTYPE html>

<html lang="en">

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">

</head>

<body style="margin: 0; padding: 0;">

	<table border="0" cellpadding="0" cellspacing="0" width="800" align="center" class="table">

		<td style="padding: 40px 0 30px 0;">
			<h2 align="center">Xác Nhận Đơn Hàng Của Bạn</h2>
			<!-- row1	 -->
			<p>Tên: <strong>{{$user['name']}}</strong></p>
			<p>Số điện thoại : {{$user['sdt']}}</p>
			<p>Địa chỉ: {{$user['diachi']}}</p>

			<p>Mã đơn hàng: {{$donhang->id}}</p>

		</td>
		</tr>
		<!-- row2 -->
		<tr>
			<td bgcolor="#70bbd9" style="padding: 40px 30px 40px 30px;">
				<table border="1" cellpadding="0" cellspacing="0" width="100%">
					<caption style="text-align:center">Thông tin đơn hàng</caption>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Giá tiền(<i>đã bao gồm VAT</i>)</th>
						<th scope="col">Số lượng</th>

					</tr>
					<?php $chitietdonhang = App\Chitietdonhang::where('id_donhang',$donhang->id)->get();$dem=1; ?> 
					@foreach($chitietdonhang as $item) 
					@php $sanpham = App\SanPham::where('id',$item->id_sanpham)->first(); 
					@endphp
					<tr>
						<td scope="row"><i>{{$dem++}}</i></td>
						<td scope="row"><i>{{$sanpham->tensp}}</i></td>
						<td><i>{{number_format($item->dongia)}} VND</i></td>
						<td><i>{{$item->soluong}}</i></td>
					</tr>
					@endforeach
					<tr>
						<td scope="row" colspan="3">Tổng tiền</td>
						<td><i> {{number_format($donhang->tongtien)}} VND</i></td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- row3 -->
		<tr>
			<td>
				<p>Phương thức giao hàng: <i><b>Giao hàng tận nhà</b></i></p>
				<h3><i>Cảm ơn bạn đã mua hàng tại Hirolap </i></h3>
				<p><i>Đơn hàng của bạn sẽ được nhân viên gọi xác nhận trong vòng 24h</i></p>
				<p><i>Hotline: 0903 984 976</i></p>
			</td>
		</tr>



	</table>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>
</body>

</html>