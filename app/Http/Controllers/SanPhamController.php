<?php

namespace App\Http\Controllers;

use App\Cauhinhmaytinh;
use App\Cauhinhdienthoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Sanpham;
use App\Mota;
use Darryldecode\Cart\Cart;
use Carbon\Carbon;
use App\Chitietkhuyenmai;
use App\Khuyenmai;
use App\Phieunhap;
use App\Soluongsanpham;
use App\Hangsanxuat;
use App\Loaisanpham;
use Excel;


class SanPhamController extends Controller
{
    public function postExcelPhieunhap(Request $request)
    {

        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls',

        ], [
            'file.required' => 'Chưa chọn file excel',
            'file.mimes' => 'Sai định dạng file excel hoặc chưa chọn file',
            'file.uploaded' => 'Sai định dạng file excel '
        ]);

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();

        // $type = getType($ext);
        // $fileName = $request['name'] . '.' . $ext;
        $file->move('public/file', $name);

        $results = Excel::load('public/file/' . $name, function ($render) {
            $render->all();
        })->get();


        foreach ($results as $item) {
            $sanpham = Sanpham::all();
            if ($item->gianhap == "" || $item->giaban == "" || $item->soluong == "") {
                return response(['message' => "Loi"]);
            } else {
                foreach ($sanpham as $itemsp) {
                    if (trim(strtolower($itemsp->tensp)) == trim(strtolower($item->tensp))) {
                        $phieunhap = new Phieunhap();
                        $soluongsanpham = Soluongsanpham::where('id_sanpham', $itemsp->id)->first();
                        $soluongsanpham->soluongcon = $soluongsanpham->soluongcon + $item->soluong;
                        $soluongsanpham->tongsoluong = $soluongsanpham->tongsoluong + $item->soluong;
                        $soluongsanpham->save();

                        $sanpham2 = Sanpham::where('tensp', $itemsp->tensp)->first();
                        $sanpham2->dongia = $item->giaban;
                        $sanpham2->save();

                        $phieunhap->id_sanpham = $sanpham2->id;
                        $phieunhap->gianhap = $item->gianhap;
                        $phieunhap->giaban = $item->giaban;
                        $phieunhap->soluong = $item->soluong;
                        $phieunhap->ngaynhap = Carbon::now();
                        $phieunhap->save();
                    }
                }
            }


            // echo $item->giaban;
        }
        // Return a proper response
        return response()->json([
            'message' => 'Thành công',
        ]);
    }
    public function getDanhsachmaytinh()
    {
        $list = Sanpham::all();
        return view('admin.sanpham.maytinh', compact('list'));
    }
    public function getSanphamkhuyenmai()
    {
        $sanphamkhuyenmai = Chitietkhuyenmai::with('sanpham', 'khuyenmai')->get();
        // $sanphamkhuyenmai = Sanpham::where('dongia_giamgia', '>', 0)->get();
        return $sanphamkhuyenmai;
    }
    public function getSanphamchuakhuyenmai()
    {
        $sanpham = Sanpham::withCount('chitietkhuyenmai')->get();
        return $sanpham;
    }
    public function getViewnoidungkhuyenmai()
    {
        return view('admin.noidungkhuyenmai');
    }
    public function getNoidungkhuyenmai()
    {
        $khuyenmai = Khuyenmai::all();
        return $khuyenmai;
    }
    public function getViewPhieunhap()
    {
        return view('admin.phieunhap.phieunhap');
    }
    public function getPhieuNhap()
    {
        $phieunhap = Phieunhap::with('sanpham')->get();
        $sanpham = Sanpham::all();
        $data1 = [
            'phieunhap' => $phieunhap,
            'sanpham' => $sanpham,
        ];
        return $data1;
    }
    public function postPhieunhap(Request $request)
    {
        $id_sanpham = $request->input('sanpham');
        $gianhap = $request->input('gianhap');
        $giaban = $request->input('giaban');
        $soluong = $request->input('soluong');
        $phieunhap = new Phieunhap();
        if ($id_sanpham) {
            $soluongsanpham = Soluongsanpham::where('id_sanpham', $id_sanpham)->first();
            $sanpham = Sanpham::findOrFail($id_sanpham);
            $phieunhap->id_sanpham = $id_sanpham;
            $phieunhap->soluong = $soluong;
            $phieunhap->gianhap = $gianhap;
            $phieunhap->giaban = $giaban;
            $phieunhap->ngaynhap = Carbon::now();
            $phieunhap->save();
            $soluongsanpham->soluongcon = $soluongsanpham->soluongcon + $soluong;
            $soluongsanpham->tongsoluong = $soluongsanpham->tongsoluong + $soluong;
            $soluongsanpham->save();
            $sanpham->dongia = $giaban;
            $sanpham->save();
        }
    }
    public function postNoidungkhuyenmai(Request $request)
    {
        $noidung = $request->input('noidung');
        $chude = $request->input('chude');
        $khuyenmai = new Khuyenmai();
        if ($noidung && $chude) {
            $khuyenmai->tenkhuyenmai = $chude;
            $khuyenmai->noidung = $noidung;
            $khuyenmai->ngaytao = Carbon::now();
            $khuyenmai->ngaycapnhat = Carbon::now();
            $khuyenmai->save();
            return response(['message' => 'Thành công']);
        } else {
            return response(['message' => 'Thất bại']);
        }
        
    }
    public function putNoidungkhuyenmai(Request $request, $id)
    {
        $chude = $request->input('chude');
        $noidung = $request->input('noidung');
        $khuyenmai = Khuyenmai::findOrFail($id);
        if ($khuyenmai) {
            $khuyenmai->tenkhuyenmai = $chude;
            $khuyenmai->noidung = $noidung;
            $khuyenmai->ngaycapnhat = Carbon::now();
            $khuyenmai->save();
        }
    }
    public function deleteNoidungkhuyenmai($id)
    {
        $khuyenmai = Khuyenmai::withCount('chitietkhuyenmai')->where('id', $id)->first();
        $count = $khuyenmai->chitietkhuyenmai_count;
        if ($count > 0) {
            return response(['count' => $count]);
        } else {
            if ($khuyenmai) {
                // $khuyenmai->chitietkhuyenmai->delete();
                $khuyenmai->delete();
                return response(['message' => 'Thành công']);
            }
            return response(['message' => 'Thất bại']);
        }
    }
    public function postThemSanphamkhuyenmai(Request $request, $id_sanpham, $id_khuyenmai)
    {
        $id_sanpham = $request->input('sanpham');
        $id_khuyenmai = $request->input('khuyenmai');
        $dongia_giamgia = $request->input('dongia_giamgia');
        $chitietkhuyenmai = new Chitietkhuyenmai();
        $sanpham = Sanpham::findOrFail($id_sanpham);
        if ($sanpham) {
            if ($dongia_giamgia < $sanpham->dongia) {
                $chitietkhuyenmai->id_sanpham = $id_sanpham;
                $chitietkhuyenmai->id_khuyenmai = $id_khuyenmai;
                $chitietkhuyenmai->dongia_giamgia = $dongia_giamgia;
                $chitietkhuyenmai->ngaytao = Carbon::now();
                $chitietkhuyenmai->trangthai = 0;
                $chitietkhuyenmai->save();
                return response(['message' => 'Thành công']);
            }
            return response(['message' => 'Gỉam giá không lớn hơn đơn giá.']);
        }
        return response(['message' => 'Thất bại']);
    }
    public function postCapNhatSanphamkhuyenmai(Request $request, $id)
    {
        $dongia_giamgia = $request->input('dongia_giamgia');
        $trangthai = $request->input('trangthai');
        $chitietkhuyenmai = Chitietkhuyenmai::findOrFail($id);
        $sanpham = Sanpham::findOrFail($chitietkhuyenmai->id_sanpham);
        if ($chitietkhuyenmai) {
            if ($sanpham->dongia > $dongia_giamgia) {

                $chitietkhuyenmai->dongia_giamgia = $dongia_giamgia;
                $chitietkhuyenmai->trangthai = $trangthai;
                $chitietkhuyenmai->ngaytao = Carbon::now();
                $chitietkhuyenmai->save();
                return response(['message' => 'Thành công']);
            }
        }
        return response(['message' => 'Thất bại']);
    }
    public function postXoaSanphamkhuyenmai(Request $request, $id)
    {
        $chitietkhuyenmai = Chitietkhuyenmai::findOrFail($id);

        if ($chitietkhuyenmai) {

            $chitietkhuyenmai->delete();
            return response(['message' => 'Thành công']);
        }
        return response(['message' => 'Thất bại']);
    }
    public function getDanhsachdienthoai()
    {
        return view('admin.sanpham.dienthoai');
    }
    public function indexmaytinh()
    {
        $data = Sanpham::withCount('soluongsanpham')->with('loaisanpham', 'matensanpham', 'hangsanxuat', 'cauhinhmaytinh', 'mota')->where('id_matensanpham', 1)->get();
        $datapaginate = SanPham::paginate(1);
        $response = [
            'data' => $data,
            'datapaginate' => $datapaginate,
            'pagination' => [
                'total' => $datapaginate->total(),
                'per_page' => $datapaginate->perPage(),
                'current_page' => $datapaginate->currentPage(),
                'last_page' => $datapaginate->lastPage(),
                'from' => $datapaginate->firstItem(),
                'to' => $datapaginate->lastItem()
            ]
        ];
        return response()->json($response);
    }
    public function storemaytinh(Request $request)
    {
        $sanpham = new Sanpham();
        $maytinh = new Cauhinhmaytinh();
        $mota = new Mota();
        //mimes:jpeg,jpg,png,gif',
        $this->validate($request, [
            'loaisanpham' => 'required',
            'hangsanxuat' => 'required',
            'tensp' => 'required|unique:sanpham,tensp',
            // 'dongia' => 'required|numeric|min:1000',

            'baohanh' => 'required',
            'hinhanhshow' => 'required|image64:jpeg,jpg,png',
        ], [
            'tensp.required' => 'Chưa nhập tên sản phẩm',
            'tensp.unique' => 'Tên sản phẩm đã tồn tại',
            'loaisanpham.required' => 'Chưa chọn loại sản phẩm',
            'hangsanxuat.required' => 'Chưa chọn hãng sản xuất',
            // 'dongia.required' => 'Chưa nhập đơn giá',
            // 'dongia.min' => 'Đơn giá không nhỏ hơn 1000',

            'baohanh.required' => 'Chưa chọn bảo hành',
            'hinhanhshow.image64' => 'Lỗi định dạng hình ảnh',
            'hinhanhshow.required' => 'Chưa chọn hình ảnh',
        ]);
        $tenspa = $request->input('tensp');
        $tensp = strtolower($tenspa);
        $id_loaisanpham = $request->input('loaisanpham');
        $id_hangsanxuat = $request->input('hangsanxuat');
        $tenhangsanxuat = Hangsanxuat::findOrFail($id_hangsanxuat);
        $tenloaisanpham = Loaisanpham::findOrFail($id_loaisanpham);

        if (str_is('*sam sung*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Samsung') {
            return response(['message' => 'Tên hãng sản xuất là Samsung']);
        } else if (str_is('*HP*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'HP') {
            return response(['message' => 'Tên hãng sản xuất là HP']);
        } else if (str_is('*asus*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Asus') {
            return response(['message' => 'Tên hãng sản xuất là Asus']);
        } else if (str_is('*apple*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Apple') {
            return response(['message' => 'Tên hãng sản xuất là Apple']);
        } else if (str_is('*acer*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Acer') {
            return response(['message' => 'Tên hãng sản xuất là Acer']);
        } else if (str_is('*microsoft*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Microsoft') {
            return response(['message' => 'Tên hãng sản xuất là Microsoft']);
        } else if (str_is('*nokia*', $tensp) && $tenhangsanxuat->tenhangsanxuat != 'Nokia') {
            return response(['message' => 'Tên hãng sản xuất là Nokia']);
        }
        if ($tenloaisanpham->tenloai != 'Macbook' && str_is('*apple*', $tensp)) {
            return response(['messageloai' => 'Tên loại phải là Macbook']);
        } else if ($tenloaisanpham->tenloai == 'Macbook' && !str_is('*apple*', $tensp)) {
            return response(['messageloai' => 'Tên không phải là  Macbook']);
        }



        //sanpham  
        if ($request->input('tensp') != '') {
            if ($request->input('hinhanhshow')) {
                //    $image = $request->get('hinhanh');
                $name = $request->input('hinhanh');
                //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->input('hinhanhshow'))->save(public_path('image/maytinh/') . $name);
            }
            if ($request->input('hinhanhshow1') && $request->input('hinhanhshow1')) {
                $name1 = $request->input('hinhanh1');
                \Image::make($request->input('hinhanhshow1'))->save(public_path('image/mota-maytinh/') . $name1);
            }
            if ($request->input('hinhanhshow2') && $request->input('hinhanhshow2')) {
                $name2 = $request->input('hinhanh2');
                \Image::make($request->input('hinhanhshow2'))->save(public_path('image/mota-maytinh/') . $name2);
            }
            if ($request->input('hinhanhshow3') && $request->input('hinhanhshow3')) {
                $name3 = $request->input('hinhanh3');
                \Image::make($request->input('hinhanhshow3'))->save(public_path('image/mota-maytinh/') . $name3);
            }
            $sanpham->id_loaisanpham = $request->input('loaisanpham');
            $sanpham->id_matensanpham = $request->input('matensanpham');
            $sanpham->id_hangsanxuat = $request->input('hangsanxuat');
            $sanpham->tensp = $request->input('tensp');
            $sanpham->dongia = 0;
            $sanpham->hinhanh = $request->input('hinhanh');
            $sanpham->baohanh = $request->input('baohanh');
            $sanpham->ngaytao = Carbon::now();
            $sanpham->save();
            //maytinh
            $maytinh->id_sanpham = $sanpham->id;
            $maytinh->manhinh = $request->input('manhinh');
            $maytinh->hdh = $request->input('hdh');
            $maytinh->cpu = $request->input('cpu');
            $maytinh->ram = $request->input('ram');
            $maytinh->vga = $request->input('vga');
            $maytinh->bonho = $request->input('bonho');
            $maytinh->pin = $request->input('pin');
            $maytinh->congketnoi = $request->input('congketnoi');
            $maytinh->thongtinkhac = $request->input('thongtinkhac');
            $maytinh->save();
            //mota
            $mota->id_sanpham = $sanpham->id;
            $mota->mota1 = $request->input('mota1');
            $mota->hinhanh1 = $request->input('hinhanh1');
            $mota->mota2 = $request->input('mota2');
            $mota->hinhanh2 = $request->input('hinhanh2');
            $mota->mota3 = $request->input('mota3');
            $mota->hinhanh3 = $request->input('hinhanh3');
            $mota->save();
            //soluongsanpham
            $soluongsanpham = new Soluongsanpham();
            $soluongsanpham->id_sanpham = $sanpham->id;
            $soluongsanpham->soluongcon = 0;
            $soluongsanpham->tongsoluong = 0;
            $soluongsanpham->save();
        }


        return response([
            'result' => 'success'
        ], 200);
    }
    public function updatemaytinh(Request $request, $id)
    {
        $sanpham = Sanpham::findOrFail($id);

        if ($request->input('hinhanhshow') && $request->input('hinhanhshow') != '') {
            //    $image = $request->get('hinhanh');
            $name = $request->input('hinhanh');
            //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->input('hinhanhshow'))->save(public_path('image/maytinh/') . $name);
            $sanpham->hinhanh = $request->input('hinhanh');
        }
        if ($request->input('hinhanhshow1') && $request->input('hinhanhshow1') != '') {
            $name1 = $request->input('hinhanh1');
            \Image::make($request->input('hinhanhshow1'))->save(public_path('image/mota-maytinh/') . $name1);
            $mota->hinhanh1 = $request->input('hinhanh1');
        }
        if ($request->input('hinhanhshow2') && $request->input('hinhanhshow2') != '') {
            $name2 = $request->input('hinhanh2');
            \Image::make($request->input('hinhanhshow2'))->save(public_path('image/mota-maytinh/') . $name2);
            $mota->hinhanh2 = $request->input('hinhanh2');
        }
        if ($request->input('hinhanhshow3') && $request->input('hinhanhshow3') != '') {
            $name3 = $request->input('hinhanh3');
            \Image::make($request->input('hinhanhshow3'))->save(public_path('image/mota-maytinh/') . $name3);
            $mota->hinhanh3 = $request->input('hinhanh3');
        }

        $this->validate($request, [], []);
        //san pham
        $sanpham->id_loaisanpham = $request->input('id_loaisanpham');
        $sanpham->id_matensanpham = $request->input('id_matensanpham');
        $sanpham->id_hangsanxuat = $request->input('id_hangsanxuat');
        $sanpham->tensp = $request->input('tensp');
        // $sanpham->dongia = $request->input('dongia');
        $sanpham->baohanh = $request->input('baohanh');
        $sanpham->ngaytao = Carbon::now();
        $sanpham->save();
        //may tinh
        $maytinh = Cauhinhmaytinh::where('id_sanpham', $sanpham->id)->first();
        $maytinh->manhinh = $request->input('manhinh');
        $maytinh->hdh = $request->input('hdh');
        $maytinh->cpu = $request->input('cpu');
        $maytinh->ram = $request->input('ram');
        $maytinh->vga = $request->input('vga');
        $maytinh->bonho = $request->input('bonho');
        $maytinh->pin = $request->input('pin');
        $maytinh->congketnoi = $request->input('congketnoi');
        $maytinh->thongtinkhac = $request->input('thongtinkhac');
        $maytinh->save();
        //mota
        $mota = Mota::where('id_sanpham', $sanpham->id)->first();
        $mota->mota1 = $request->input('mota1');
        $mota->mota2 = $request->input('mota2');
        $mota->mota3 = $request->input('mota3');
        $mota->save();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function destroymaytinh($id)
    {
        $sanpham = Sanpham::withCount('soluongsanpham')->where('id', $id)->first();
        $count = $sanpham->soluongsanpham_count;
        if ($sanpham->dongia > 0) {
            return response(['count' => $count]);
        } else {
            $sanpham->cauhinhdienthoai()->delete();
            $sanpham->soluongsanpham()->delete();
            $sanpham->mota()->delete();
            $sanpham->delete();
            return response([
                'result' => 'success'
            ], 200);
        }
    }

    public function indexdienthoai()
    {
        $data = Sanpham::with('loaisanpham', 'matensanpham', 'hangsanxuat', 'cauhinhdienthoai', 'mota')->where('id_matensanpham', 2)->get();
        return $data;
    }
    public function storedienthoai(Request $request)
    {
        $this->validate($request, [
            'loaisanpham' => 'required',
            'hangsanxuat' => 'required',
            'tensp' => 'required|unique:sanpham,tensp',
            // 'dongia' => 'required|numeric|min:1000',

            'baohanh' => 'required',
            'hinhanhshow' => 'required|image64:jpeg,jpg,png',
        ], [
            'tensp.required' => 'Chưa nhập tên sản phẩm',
            'tensp.unique' => 'Tên sản phẩm đã tồn tại',
            'loaisanpham.required' => 'Chưa chọn loại sản phẩm',
            'hangsanxuat.required' => 'Chưa chọn hãng sản xuất',
            // 'dongia.required' => 'Chưa nhập đơn giá',
            // 'dongia.min' => 'Đơn giá không nhỏ hơn 1000',

            'baohanh.required' => 'Chưa chọn bảo hành',
            'hinhanhshow.image64' => 'Lỗi định dạng hình ảnh',
            'hinhanhshow.required' => 'Chưa chọn hình ảnh',
        ]);
        $sanpham = new Sanpham();
        $dienthoai = new Cauhinhdienthoai();
        $mota = new Mota();


        $tenspa = $request->input('tensp');
        $tensp = strtolower($tenspa);
        $id_hangsanxuat = $request->input('hangsanxuat');
        $id_loaisanpham = $request->input('loaisanpham');

        $tenhsx = Hangsanxuat::findOrFail($id_hangsanxuat);
        $tenloaisanpham = Loaisanpham::findOrFail($id_loaisanpham);
        if (str_is('*sam sung*', $tensp) && $tenhsx->tenhangsanxuat != 'Samsung') {
            return response(['message' => 'Tên hãng sản xuất là Samsung']);
        } else if (str_is('*HP*', $tensp) && $tenhsx->tenhangsanxuat != 'HP') {
            return response(['message' => 'Tên hãng sản xuất là HP']);
        } else if (str_is('*asus*', $tensp) && $tenhsx->tenhangsanxuat != 'Asus') {
            return response(['message' => 'Tên hãng sản xuất là Asus']);
        } else if (str_is('*apple*', $tensp) && $tenhsx->tenhangsanxuat != 'Apple') {
            return response(['message' => 'Tên hãng sản xuất là Apple']);
        } else if (str_is('*acer*', $tensp) && $tenhsx->tenhangsanxuat != 'Acer') {
            return response(['message' => 'Tên hãng sản xuất là Acer']);
        } else if (str_is('*microsoft*', $tensp) && $tenhsx->tenhangsanxuat != 'Microsoft') {
            return response(['message' => 'Tên hãng sản xuất là Microsoft']);
        } else if (str_is('*nokia*', $tensp) && $tenhsx->tenhangsanxuat != 'Nokia') {
            return response(['message' => 'Tên hãng sản xuất là Nokia']);
        }
        if ($tenloaisanpham->tenloai != 'Ios' && str_is('*apple*', $tensp)) {
            return response(['messageloai' => 'Tên loại phải là Ios']);
        } else if ($tenloaisanpham->tenloai == 'Ios' && !str_is('*apple*', $tensp)) {
            return response(['messageloai' => 'Tên không phải là  Macbook']);
        }
        // san pham
        if ($request->input('tensp') != '') {
            if ($request->input('hinhanhshow') && $request->input('hinhanhshow')) {
                //    $image = $request->get('hinhanh');
                $name = $request->input('hinhanh');
                //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->input('hinhanhshow'))->save(public_path('image/dienthoai/') . $name);
            }
            if ($request->input('hinhanhshow1') && $request->input('hinhanhshow1')) {
                $name1 = $request->input('hinhanh1');
                \Image::make($request->input('hinhanhshow1'))->save(public_path('image/mota-dienthoai/') . $name1);
            }
            if ($request->input('hinhanhshow2') && $request->input('hinhanhshow2')) {
                $name2 = $request->input('hinhanh2');
                \Image::make($request->input('hinhanhshow2'))->save(public_path('image/mota-dienthoai/') . $name2);
            }
            if ($request->input('hinhanhshow3') && $request->input('hinhanhshow3')) {
                $name3 = $request->input('hinhanh3');
                \Image::make($request->input('hinhanhshow3'))->save(public_path('image/mota-dienthoai/') . $name3);
            }
            $sanpham->id_loaisanpham = $request->input('loaisanpham');
            $sanpham->id_matensanpham = $request->input('matensanpham');
            $sanpham->id_hangsanxuat = $request->input('hangsanxuat');
            $sanpham->tensp = $request->input('tensp');
            $sanpham->dongia = 0;
            $sanpham->hinhanh = $request->input('hinhanh');
            $sanpham->baohanh = $request->input('baohanh');
            $sanpham->save();
            //dienthoai

            $dienthoai->id_sanpham = $sanpham->id;
            $dienthoai->manhinh = $request->input('manhinh');
            $dienthoai->hdh = $request->input('hdh');
            $dienthoai->cpu = $request->input('cpu');
            $dienthoai->ram = $request->input('ram');
            $dienthoai->camera = $request->input('camera');
            $dienthoai->bonho = $request->input('bonho');
            $dienthoai->pin = $request->input('pin');
            $dienthoai->thongtinkhac = $request->input('thongtinkhac');
            $dienthoai->save();
            //mota
            $mota->id_sanpham = $sanpham->id;
            $mota->mota1 = $request->input('mota1');
            $mota->hinhanh1 = $request->input('hinhanh1');
            $mota->mota2 = $request->input('mota2');
            $mota->hinhanh2 = $request->input('hinhanh2');
            $mota->mota3 = $request->input('mota3');
            $mota->hinhanh3 = $request->input('hinhanh3');
            $mota->save();
            //soluongsanpham
            $soluongsanpham = new Soluongsanpham();
            $soluongsanpham->id_sanpham = $sanpham->id;
            $soluongsanpham->soluongcon = 0;
            $soluongsanpham->tongsoluong = 0;
            $soluongsanpham->save();
        }




        return response([
            'result' => 'success'
        ], 200);
    }
    public function destroydienthoai($id)
    {
        // $sanpham = Sanpham::findOrFail($id);
        $sanpham = Sanpham::withCount('soluongsanpham')->where('id', $id)->first();
        $count = $sanpham->dongia;
        if ($sanpham->dongia > 0) {
            return response(['count' => $count]);
        } else {
            $sanpham->cauhinhdienthoai()->delete();
            $sanpham->soluongsanpham()->delete();
            $sanpham->mota()->delete();
            $sanpham->delete();
            return response([
                'result' => 'success'
            ], 200);
        }
    }
    public function updatedienthoai(Request $request, $id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $this->validate($request, [

            'tensp' => 'unique:sanpham,tensp,' . $id,


        ], [

            'tensp.unique' => 'Tên sản phẩm tồn tại'
        ]);

        if ($request->input('hinhanhshow') && $request->input('hinhanhshow') != ' ') {
            //    $image = $request->get('hinhanh');
            $name = $request->input('hinhanh');
            //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->input('hinhanhshow'))->save(public_path('image/dienthoai/') . $name);
            $sanpham->hinhanh = $request->input('hinhanh');
        }
        if ($request->input('hinhanhshow1') && $request->input('hinhanhshow1') != ' ') {
            $name1 = $request->input('hinhanh1');
            \Image::make($request->input('hinhanhshow1'))->save(public_path('image/mota-dienthoai/') . $name1);
            $mota->hinhanh1 = $request->input('hinhanh1');
        }
        if ($request->input('hinhanhshow2') && $request->input('hinhanhshow2') != ' ') {
            $name2 = $request->input('hinhanh2');
            \Image::make($request->input('hinhanhshow2'))->save(public_path('image/mota-dienthoai/') . $name2);
            $mota->hinhanh2 = $request->input('hinhanh2');
        }
        if ($request->input('hinhanhshow3') && $request->input('hinhanhshow3') != ' ') {
            $name3 = $request->input('hinhanh3');
            \Image::make($request->input('hinhanhshow3'))->save(public_path('image/mota-dienthoai/') . $name3);
            $mota->hinhanh3 = $request->input('hinhanh3');
        }

        $this->validate($request, [], []);
        //san pham
        $sanpham->id_loaisanpham = $request->input('id_loaisanpham');
        $sanpham->id_matensanpham = $request->input('id_matensanpham');
        $sanpham->id_hangsanxuat = $request->input('id_hangsanxuat');
        $sanpham->tensp = $request->input('tensp');
        $sanpham->dongia = $request->input('dongia');
        $sanpham->baohanh = $request->input('baohanh');
        $sanpham->save();

        //dienthoai
        $dienthoai = Cauhinhdienthoai::where('id_sanpham', $sanpham->id)->first();
        $dienthoai->manhinh = $request->input('manhinh');
        $dienthoai->hdh = $request->input('hdh');
        $dienthoai->cpu = $request->input('cpu');
        $dienthoai->ram = $request->input('ram');
        $dienthoai->camera = $request->input('camera');
        $dienthoai->bonho = $request->input('bonho');
        $dienthoai->pin = $request->input('pin');
        $dienthoai->thongtinkhac = $request->input('thongtinkhac');
        $dienthoai->save();
        //mota
        $mota = Mota::where('id_sanpham', $sanpham->id)->first();
        $mota->mota1 = $request->input('mota1');
        $mota->mota2 = $request->input('mota2');
        $mota->mota3 = $request->input('mota3');
        $mota->save();
        return response([
            'result' => 'success'
        ], 200);
    }
}
