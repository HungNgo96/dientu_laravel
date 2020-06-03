<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;


//test
Route::get('/test5', function () {
    $a="samsung";
    $data = App\Sanpham::where('tensp','like',"%{$a}%")->get();
    dd($data);
    // $tongtien_donhang_trongngay = App\Donhang::where('trangthai',3)->whereDay('ngaydat',\Carbon\Carbon::now()->day)->sum('tongtien');
    // echo  $tongtien_donhang_trongngay;
    // $a= Carbon\Carbon::now()->format('Y-m-d H:i:s');
    // echo $a;
    // $donhang = App\Donhang::with('chitietdonhang')->where('id',1)->get(); 
    // foreach($donhang as $item){
    //     echo "<pre>";
    //     echo $item->chitietdonhang;
    //     echo "</pre>";
    //     echo "<pre>";
    //     echo $item->id;
    //     echo "</pre>";
    //     // dd($item->id);
    //     foreach($item->chitietdonhang as $value){
    //         echo "<pre>";
    //         echo $value->dongia;
    //         echo "</pre>";
    //     }
    // }
//    echo \Carbon\Carbon::now()->startOfWeek();
//    echo "<br>";
//    echo  \Carbon\Carbon::now()->endOfWeek();


    // $a='aBc';
    // $b='Abc';
    // echo strtolower($a);
    // if($a===$b){
    //     echo "1";
    // }else{
    //     echo "2";
    // }

    // $sanpham = App\Sanpham::withCount('soluongsanpham')->where('id',22)->get();
    // dd($sanpham);
    // $data = Carbon\Carbon::parse('now'); 
    // echo $data;
    // return view('giaodien.sanpham.sosanh');
    // $search = "'";
    // $data = App\Sanpham::whereLike(['tensp','loaisanpham.tenloai','hangsanxuat.tenhangsanxuat','matensanpham.tenmasanpham'],$search)->get();
    // echo count($data);
    // foreach($data as $item){
    //     echo $item->tensp;
    // }

    // $hangsanxuat = App\Hangsanxuat::withCount('sanpham')->findOrFail(4);
    // echo $hangsanxuat->sanpham_count;
    // $donhang = App\Donhang::whereDate('ngaydat',\Carbon\Carbon::now())->sum('tongtien');
    // dd(\Carbon\Carbon::now()->year);
    // $a='Abc ASc';
    // echo  strtolower(trans($a));

});
//test
// Route::get('/', function () {
//     return view('giaodien.index');
// });
// Route::get('/a', function () {
//     return view('giaodien.giohang.giohang');
// });

Route::get('/test6', function () {
    $donhang = App\Chitietdonhang::findOrFail(5);
    $data = $donhang->donhang()->get();
    // 
    // foreach ($data as $item) {
    //     echo "<pre>";
    //     echo $item;
    //     echo "</pre>";
    // }
    // return view('admin.phieugiao.phieugiao');
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
});
Route::get('/test3', function () {
    $donhang = App\Chitietdonhang::findOrFail(5);
    $data = $donhang->donhang()->get();
    // $data = $donhang->chitietdonhang;
    $count = $data->count();
    foreach ($data as $item) {
        echo "<pre>";
        echo $item;
        echo "</pre>";
    }
    echo "<pre>";
    echo ($count);
    echo "</pre>";
});
Route::get('test4', function () {
    // $user = App\User::findOrFail(1)->first();
    // if(Auth::check()){
    // $usera = Auth::user();
    // dd($usera);}
    // $time = Carbon\Carbon::now();
    // $sanpham = App\Sanpham::findOrFail(2);
    // $data = $time->diffInDays($sanpham->ngaytao);
    // echo $data;
    $data = App\Sanpham::with('soluongsanpham','mota')->take(4)->get();
    $dataa = App\Sanpham::all();
    dd(array_chunk($data,2));
    // foreach($data->chunk(4) as $chunk){
        // echo "<pre>";
        // echo $item;
        // echo "</pre>";

        // echo "<ul>";
        // foreach($chunk as $item){
        //  $mota= App\Sanpham::findOrFail($item->id)->mota()->get();
        // $motaa =json_encode($mota,JSON_UNESCAPED_UNICODE);
        //     // var_dump($mota);
        //     foreach($mota as $item ){
        //         echo $item->id;
        //     }
        // // echo $mota;
        // echo "</br>";
        // // echo $item->id;
        // echo "</br>";
       
      
        // }
        // echo "</ul>";
       
         
       
   // }
    //  dd($data);
});





//code
Auth::routes();
Route::get('auth/{provider}', 'LoginController@redirectToProvider')->name('facebook');
Route::get('auth/{provider}/callback', 'LoginController@handleProviderCallback');
Route::get('/404',['as'=>'404','uses'=>'GiaoDienController@notfound']);
Route::get('/trangchu', ['as' => 'home', 'uses' => 'GiaoDienController@index']);
Route::get('/', ['as' => 'home', 'uses' => 'GiaoDienController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'GiaoDienController@index']);
Route::get('thongtin', ['as' => 'giaodien.thongtin', 'uses' => 'GiaoDienController@thongtin']);
Route::get('lienhe', ['as' => 'giaodien.lienhe', 'uses' => 'GiaoDienController@lienhe']);
Route::post('lienhe', ['as' => 'giaodien.postlienhe', 'uses' => 'GiaoDienController@guiMaillienhe']);
Route::get('thongtinnguoidung', ['as' => 'giaodien.thongtinnguoidung', function(){
    return view('thongtinnguoidung');
}])->middleware('auth');
Route::post('cap-nhat-thong-tin/{id}',['as'=>'giaodien.thongtin.capnhat','uses'=>'GiaoDienController@postCapnhatthongnguoidung']);
Route::post('doi-mat-khau/{id}',['as'=>'giaodien.thongtin.doimatkhau','uses'=>'GiaoDienController@postDoimatkhau']);
Route::post('huy-don-hang-nguoi-dung/{id}',['as'=>'giaodien.thongtin.huydonghang','uses'=>'GiaoDienController@postHuydonhang']);
Route::get('cho-duyet-nguoi-dung',['as'=>'giaodien.thongtin.choduyet','uses'=>'GiaoDienController@getChoduyetnguoidung']);
Route::get('huy-donhang-nguoidung',['as'=>'giaodien.thongtin.huy','uses'=>'GiaoDienController@getHuydonhangnguoidung']);

Route::group(['prefix' => 'giohang'], function () {
    Route::get('chitietgiohang', ['as' => 'giaodien.giohang.chitietgiohang', 'uses' => 'GiaoDienController@giohang']);
    Route::get('thanhtoan', ['as' => 'giaodien.giohang.thanhtoan', 'uses' => 'GiaoDienController@thanhtoan']);
    Route::get('dathangthanhcong', ['as' => 'giaodien.giohang.dathangthanhcong', 'uses' => 'GiaoDienController@getDathangthanhcong']);
    Route::get('giohang',['as' => 'giaodien.giohang.getthanhtoan', 'uses' => 'CartController@getCart']);
    Route::post('thanhtoan',['as'=>'giaodien.giohang.postthanhtoan','uses'=>'CartController@postThanhtoan']);
});



Route::group(['prefix' => 'sanpham'], function () {
    Route::get('tim-kiem-san-pham',['as'=>'giaodien.sanpham.timkiem','uses'=>'GiaoDienController@getTimkiem']);
    Route::post('tim-kiem',['as'=>'giaodien.sanpham.timkiem', 'uses'=>'GiaoDienController@timkiem']);
    Route::get('danhsachdienthoai', ['as' => 'giaodien.sanpham.danhsachdienthoai', 'uses'=>'GiaoDienController@getDanhsachdienthoai']);
    Route::get('danhsachmaytinh', ['as' => 'giaodien.sanpham.danhsachmaytinh', 'uses'=>'GiaoDienController@getDanhsachmaytinh']);
    Route::get('chitietsanpham/{id}', ['as' => 'giaodien.sanpham.chitiet', 'uses'=>'GiaoDienController@chitietsanpham']);
    Route::get('sanpham',['as'=>'giaodien.sanpham.sanpham','uses'=>'GiaoDienController@getSanpham']);
    Route::get('loaisanpham/{id}',['as'=>'giaodien.sanpham.loaisanpham','uses'=>'GiaoDienController@getLoaisanpham']);
    Route::get('hangsanxuat/{id}',['as'=>'giaodien.sanpham.hangsanxuat','uses'=>'GiaoDienController@getHangsanxuat']);
    Route::get('sanphambanner',['as'=>'giaodien.sanpham.sanphambanner','uses'=>'GiaoDienController@getSanphamBanner']);
    Route::get('sosanhsanpham/{id}',['as'=>'giaodien.sanpham.sosanhsanpham','uses'=>'GiaoDienController@sosanh']);
    Route::get('sosanh',['as'=>'giaodien.sanpham.sosanh','uses'=>'GiaoDienController@getSosanh']);
    Route::get('xoadata1',['as'=>'giaodien.sanpham.sosanh.xoadata1','uses'=>'GiaoDienController@xoadata1']);
    Route::get('xoadata2',['as'=>'giaodien.sanpham.sosanh.xoadata2','uses'=>'GiaoDienController@xoadata2']);
    Route::get('sanphamdecao',['as'=>'giaodien.sanpham.sanphamdecao','uses'=>'GiaoDienController@sanphamdecao']);
    
});
Route::get('dangnhap',['as'=>'giaodien.getdangnhap','uses'=>'LoginController@getDangnhap']);
Route::post('dangnhap',['as'=>'giaodien.postdangnhap','uses'=>'LoginController@postDangnhap']);
Route::get('dangky',['as'=>'giaodien.getdangky','uses'=>'LoginController@getDangky'])->middleware('guest');
Route::post('dangky',['as'=>'giaodien.postdangky','uses'=>'LoginController@postDangky']);
Route::get('dangxuat',['as'=>'giaodien.getdangxuat','uses'=>'LoginController@getDangxuat']);


//code ,'prefix' => 'admin','middleware'=>'AdminLogin'

Route::group(['prefix' => 'nhanvien','middleware'=>'Nhanvien'], function() {
    Route::get('nhanvien',['as'=>'nhanvien.nhanvien','uses'=>'NhanVienController@getNhanvien']);
   
    
});

Route::group(['prefix' => 'admin','middleware'=>'Admin'], function () {
    Route::get('thong-ke',['as'=>'admin.thongke','uses'=>'AdminController@getThongke']);
    Route::post('import-excel-phieu-nhap',['as'=>'admin.postexcelphieunhap','uses'=>'SanphamController@postExcelPhieunhap']);
    Route::post('them-phieu-nhap',['as'=>'admin.postphieunhap','uses'=>'SanphamController@postPhieunhap']);
    Route::get('lay-phieu-nhap',['as'=>'admin.getphieunhap','uses'=>'SanphamController@getPhieunhap']);
    Route::get('phieu-nhap',['as'=>'admin.phieunhap','uses'=>'SanphamController@getViewPhieunhap']);
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@getDashboard']);
    Route::get('xemthongbao/{id}', ['as' => 'admin.xemthongbao', 'uses' => 'AdminController@getThongbao']);
    Route::get('chat-ho-tro', ['as' => 'admin.chathotro', 'uses' => 'AdminController@getChathotro']);
    Route::get('quan-ly-khuyen-mai', ['as' => 'admin.khuyenmai', 'uses' => 'AdminController@getKhuyenmai']);
    Route::get('xemthongbaodonhang', ['as' => 'admin.xemthongbaodonhang', 'uses' => 'AdminController@getThongbaodonhang']);
    Route::get('xemthongbaodonhang/{id}', ['as' => 'admin.xemthongbaodonhangid', 'uses' => 'AdminController@getThongbaodonhangid']);
    Route::get('xem-tat-ca-thongbao', ['as' => 'admin.xemthongbaotatca', 'uses' => 'AdminController@getTatcathongbao']);
    Route::delete('xoa-thong-bao',['as'=>'admin.xoathongbaotatca', 'uses' => 'AdminController@deleteTatcathongbao']);
    Route::group(['prefix' => 'sanpham'], function () {
        Route::put('capnhat-noi-dung-khuyen-mai/{id}',['as'=>'admin.caphatnoidungkhuyenmai','uses'=>'SanphamController@putNoidungkhuyenmai']);
        Route::delete('xoa-noi-dung-khuyenmai/{id}',['as'=>'admin.xoanoidungkhuyenmai','uses'=>'SanphamController@deleteNoidungkhuyenmai']);
        Route::post('them-noi-dung-khuyenmai',['as'=>'admin.themnoidungkhuyenmai','uses'=>'SanphamController@postNoidungkhuyenmai']);
        Route::get('lay-noi-dung-khuyen-mai',['as'=>'admin.laynoidungkhuyenmai','uses'=>'SanPhamController@getNoidungkhuyenmai']);
        Route::get('noi-dung-khuyen-mai',['as'=>'admin.noidungkhuyenmai','uses'=>'SanPhamController@getViewnoidungkhuyenmai']);
        Route::delete('xoa-san-pham-khuyen-mai/{id}',['as'=>'admin.sanpham.postxoasanphamkhuyenmai','uses'=>'SanPhamController@postXoaSanphamkhuyenmai']);
        Route::post('them-san-pham-khuyen-mai/{id_sanpham}/{id_khuyenmai}',['as'=>'admin.sanpham.postthemsanphamkhuyenmai','uses'=>'SanPhamController@postThemSanphamkhuyenmai']);
        Route::post('san-pham-khuyen-mai/{id}',['as'=>'admin.sanpham.postsanphamkhuyenmai','uses'=>'SanPhamController@postCapNhatSanphamkhuyenmai']);
        Route::get('san-pham-khuyen-mai',['as'=>'admin.sanpham.sanphamkhuyenmai','uses'=>'SanPhamController@getSanphamkhuyenmai']);
        Route::get('san-pham-chua-khuyen-mai',['as'=>'admin.sanpham.sanphamchuakhuyenmai','uses'=>'SanPhamController@getSanphamchuakhuyenmai']);
        Route::get('dienthoai', ['as' => 'admin.sanpham.dienthoai', 'uses' => 'SanPhamController@getDanhsachdienthoai']);
        Route::get('sanphamdienthoai', ['as' => 'admin.sanpham.dienthoai.get', 'uses' => 'SanPhamController@indexdienthoai']);
        Route::post('sanphamdienthoai', ['as' => 'admin.sanpham.dienthoai.post', 'uses' => 'SanPhamController@storedienthoai']);
        Route::delete('sanphamdienthoai/{id}', ['as' => 'admin.sanpham.dienthoai.delete', 'uses' => 'SanPhamController@destroydienthoai']);
        Route::put('sanphamdienthoai/{id}', ['as' => 'admin.sanpham.dienthoai.update', 'uses' => 'SanPhamController@updatedienthoai']);
        //maytinh
        Route::get('maytinh', ['as' => 'admin.sanpham.maytinh', 'uses' => 'SanPhamController@getDanhsachmaytinh']);
        Route::get('sanphammaytinh', ['as' => 'admin.sanpham.maytinh.get', 'uses' => 'SanPhamController@indexmaytinh']);
        Route::post('sanphammaytinh', ['as' => 'admin.sanpham.maytinh.post', 'uses' => 'SanPhamController@storemaytinh']);
        Route::delete('sanphammaytinh/{id}', ['as' => 'admin.sanpham.maytinh.delete', 'uses' => 'SanPhamController@destroymaytinh']);
        Route::put('sanphammaytinh/{id}', ['as' => 'admin.sanpham.maytinh.update', 'uses' => 'SanPhamController@updatemaytinh']);
        Route::get('cauhinhmaytinh', ['as' => 'admin.sanpham.cauhinhmaytinh.get', 'uses' => 'CauhinhmaytinhController@index']);
        Route::post('cauhinhmaytinh', ['as' => 'admin.sanpham.cauhinhmaytinh.post', 'uses' => 'CauhinhmaytinhController@store']);
        Route::get('cauhinhdienthoai', ['as' => 'admin.sanpham.cauhinhdienthoai.get', 'uses' => 'CauhinhdienthoaiController@index']);
        Route::post('cauhinhdienthoai', ['as' => 'admin.sanpham.cauhinhdienthoai.post', 'uses' => 'CauhinhdienthoaiController@store']);
        Route::get('loaisanpham', ['as' => 'admin.sanpham.loaisanpham.get', 'uses' => 'LoaisanphamController@index']);
        Route::get('hangsanxuat', ['as' => 'admin.sanpham.hangsanxuat.get', 'uses' => 'HangsanxuatController@index']);
        Route::get('matensanpham', ['as' => 'admin.sanpham.matensanpham.get', 'uses' => 'MatensanphamController@index']);

    });

    Route::group(['prefix' => 'hangsanxuat'], function () {
        Route::get('danhsach', ['as' => 'admin.hangsanxat', 'uses' => 'HangsanxuatController@getDanhsachhangsanxuat']);
        Route::get('index', ['as' => 'admin.hangsanxat.index', 'uses' => 'HangsanxuatController@index']);
        Route::post('add', ['as' => 'admin.hangsanxat.store', 'uses' => 'HangsanxuatController@store']);
        Route::delete('delete/{id}', ['as' => 'admin.hangsanxat.destroy', 'uses' => 'HangsanxuatController@destroy']);
        Route::put('update/{id}', ['as' => 'admin.hangsanxat.update', 'uses' => 'HangsanxuatController@update']);
    });

    Route::group(['prefix' => 'nhanvien'], function () {
        //nhan vien quan ly
        Route::put('xoa-vien-quan-ly/{id}',['as'=>'admin.deletenhanvienquanly','uses'=>'NhanvienController@deleteNhanvienquanly']);
        Route::put('cap-nhat-vien-quan-ly/{id}',['as'=>'admin.putnhanvienquanly','uses'=>'NhanvienController@putNhanvienquanly']);
        Route::post('them-nhan-vien-quan-ly',['as'=>'admin.postnhanvienquanly','uses'=>'NhanvienController@postNhanvienquanly']);
        Route::get('danh-sach-nhan-vien-quan-ly',['as'=>'admin.getViewnhanvienquanly','uses'=>'NhanvienController@getViewNhanvienquanly']);
        Route::get('nhan-vien-quan-ly',['as'=>'admin.getnhanvienquanly','uses'=>'NhanvienController@getNhanvienquanly']);
        //nhan vien giao hang
        Route::get('list', ['as' => 'admin.nhanvien.list', 'uses' => 'NhanvienController@getDanhsachnhanvien']);
        Route::get('index', ['as' => 'admin.nhanvien.index', 'uses' => 'NhanvienController@index']);
        Route::post('add', ['as' => 'admin.nhanvien.store', 'uses' => 'NhanvienController@store']);
        Route::delete('delete/{id}', ['as' => 'admin.nhanvien.delete', 'uses' => 'NhanvienController@delete']);
        Route::put('update/{id}', ['as' => 'admin.nhanvien.update', 'uses' => 'NhanvienController@update']);
    });
    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('list', ['as' => 'admin.khachhang.list', 'uses' => 'UserController@getDanhsachkhachhang']);
        Route::get('index', ['as' => 'admin.khachhang.index', 'uses' => 'UserController@index']);
        // Route::post('add',['as'=>'admin.nhanvien.khachhang.store','uses'=>'UserController@store']);
        // Route::delete('delete/{id}',['as'=>'admin.khachhang.delete','uses'=>'UserController@delete']);
        // Route::put('update/{id}',['as'=>'admin.nhanvien.khachhang.update','uses'=>'UserController@update']);
    });

    Route::group(['prefix' => 'donhang'], function () {
        //
        
        Route::get('in-phieu-giao/{id}',['as'=>'admin.phieugiao.phieugiao','uses'=>'DonhangController@inPhieugiao']);
        Route::get('in-phieu-giao',['as'=>'admin.phieugiao.getphieugiao','uses'=>'DonhangController@getPhieugiao']);
        Route::get('in-hoa-don/{id}',['as'=>'admin.phieugiao.hoadon','uses'=>'DonhangController@inHoadon']);
        Route::get('in-hoa-don',['as'=>'admin.phieugiao.gethoadon','uses'=>'DonhangController@getHoadon']);
         //chờ duyệt
        Route::get('danhsachchoduyet', ['as' => 'admin.donhang.choduyet', 'uses' => 'DonhangController@getDanhsachchoduyet']);
        Route::get('index', ['as' => 'admin.donhang.index', 'uses' => 'DonhangController@index']);
        Route::put('update/{id}', ['as' => 'admin.donhang.update', 'uses' => 'DonhangController@update']);
        Route::put('update-xoa/{id}', ['as' => 'admin.donhang.update-xoa', 'uses' => 'DonhangController@updateXoa']);
        //đã duyệt
        Route::put('update-daduyet/{id}', ['as' => 'admin.donhang.update', 'uses' => 'DonhangController@updateDaduyet']);
        Route::get('danhsachdaduyet', ['as' => 'admin.donhang.daduyet', 'uses' => 'DonhangController@getDanhsachdaduyet']);
        Route::put('update-chitietdonhang/{id}', ['as' => 'admin.donhang.daduyet.update', 'uses' => 'DonhangController@updateChitietdonhang']);
        Route::delete('delete-chitietdonhang/{id}', ['as' => 'admin.donhang.daduyet.delete', 'uses' => 'DonhangController@deleteChitietdonhang']);
        Route::post('chonnhanviengiaohang', ['as' => 'admin.donhang.daduyet.chonnhanvien', 'uses' => 'DonhangController@chonNhanvien']);
        //danggiao
        Route::get('danhsachdanggiao', ['as' => 'admin.donhang.danggiao', 'uses' => 'DonhangController@getDanhsachdanggiao']);
        Route::put('update-danggiao/{id}', ['as' => 'admin.donhang.updatedanggiao', 'uses' => 'DonhangController@updateDanggiao']);
        Route::post('tra-hang-dang-giao/{id}',['as'=>'admin.phieugiao.trahangdanggiao','uses'=>'DonhangController@traHangDangGiao']);
        //hoanthanh
        Route::get('danhsachhoanthanh', ['as' => 'admin.donhang.hoanthanh', 'uses' => 'DonhangController@getDanhsachhoanthanh']);
        //dahuy
        Route::get('danhsachdahuy', ['as' => 'admin.donhang.dahuy', 'uses' => 'DonhangController@getDanhsachdahuy']);
        //san pham loi
        Route::get('danh-sach-loi', ['as' => 'admin.donhang.sanphamloi', 'uses' => 'DonhangController@getDanhsachsanphamloi']);
        //doi tra
        Route::get('danh-sach-doi-tra', ['as' => 'admin.donhang.doitra', 'uses' => 'DonhangController@getDanhsachdoitra']);
        Route::get('tra-hang', ['as' => 'admin.donhang.getdoitra', 'uses' => 'DonhangController@getDanhsachdoitrasanpham']);
    });






});

















// ----------------------------create table-------------------
// Route::get('sanpham',function(){
    
    // Schema::dropIfExists('sanpham');
    
    // Schema::create('sanpham', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->integer('id_loaisanpham')->unsigned();
    //     $table->integer('id_matensanpham')->unsigned();
    //     $table->string('tensp');
    //     $table->decimal('dongia');
    //     $table->string('hinhanh');
    //     $table->string('baohanh');
        
    //     $table->timestamps();
    // });
    // Schema::table('sanpham', function(Blueprint $table)
    // {
    //     $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham')->onDelete('cascade');
    // });
// });
// Route::get('loaisanpham',function(){
//     Schema::dropIfExists('loaisanpham');
//     Schema::create('loaisanpham', function (Blueprint $table) {
//         $table->increments('id');
//         $table->string('tenloai')->unique();
//         $table->timestamps();
//     });
// });

Route::get('/test2', function () {
  
    // Schema::table('sanpham', function (Blueprint $table) {
    //     $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham')->onDelete('cascade');
    // });
    // Schema::table('sanpham', function (Blueprint $table) {
    //     $table->foreign('id_matensanpham')->references('id')->on('matensanpham')->onDelete('cascade');
    // });
    // Schema::table('mota', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('hinhanh', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('luotxem', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('cauhinhdienthoai', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('cauhinhmaytinh', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('chitietkhuyenmai', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('chitietkhuyenmai', function (Blueprint $table) {
    //     $table->foreign('id_khuyenmai')->references('id')->on('khuyenmai')->onDelete('cascade');
    // });
    // Schema::table('donhang', function (Blueprint $table) {
    //     $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
    // });
    // Schema::table('chitietdonhang', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('chitietdonhang', function (Blueprint $table) {
    //     $table->foreign('id_hoadon')->references('id')->on('donhang')->onDelete('cascade');
    // });
    // Schema::table('sanphamloi', function (Blueprint $table) {
    //     $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
    // });
    // Schema::table('sanphamloi', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('trahang', function (Blueprint $table) {
    //     $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
    // });
    // Schema::table('trahang', function (Blueprint $table) {
    //     $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
    // });
    // Schema::table('dongsanpham', function (Blueprint $table) {
    //     $table->foreign('id_hangsanxuat')->references('id')->on('hangsanxuat')->onDelete('cascade');
    // });
});



// Route::get('/home', 'HomeController@index')->name('home');
