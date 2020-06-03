/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Fire = new Vue();
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;
import moment from 'moment';
moment.locale('vi');
Vue.prototype.moment = moment;


window.bus = new Vue();
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('sanphamlaptop', require('./components/SanPhamLapTop.vue'));
Vue.component('sanphamdienthoai', require('./components/SanPhamDienThoai.vue'));
Vue.component('dashboard', require('./components/dashboard.vue'));
Vue.component('hangsanxuat', require('./components/HangSanXuat.vue'));
Vue.component('nhanvien', require('./components/NhanVien.vue'));
Vue.component('khachhang', require('./components/KhachHang.vue'));
Vue.component('choduyet', require('./components/ChoDuyet.vue'));
Vue.component('daduyet', require('./components/DaDuyet.vue'));
Vue.component('danggiao', require('./components/DangGiao.vue'));
Vue.component('hoanthanh', require('./components/HoanThanh.vue'));
Vue.component('dahuy', require('./components/DaHuy.vue'));
Vue.component('sanpham', require('./components/SanPham.vue'));
Vue.component('cart-count', require('./components/CartCount.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('chitietgiohang', require('./components/ChiTietGioHang.vue'));
Vue.component('chitietsanpham', require('./components/ChiTietSanPham.vue'));
Vue.component('thanhtoan', require('./components/ThanhToan.vue'));
Vue.component('sapxep', require('./components/SapXep.vue'));
Vue.component('banner', require('./components/Banner.vue'));
Vue.component('cartchitiet', require('./components/CartChiTiet.vue'));
Vue.component('cart-so-sanh', require('./components/CartSoSanh.vue'));
Vue.component('cart-san-pham-lien-quan', require('./components/CartSanPhamLienQuan.vue'));
Vue.component('san-pham-de-cao', require('./components/SanPhamDeCao.vue'));
Vue.component('cho-duyet-nguoi-dung', require('./components/ChoDuyetNguoiDung.vue'));
Vue.component('da-duyet-nguoi-dung', require('./components/DaDuyetNguoiDung.vue'));
Vue.component('dang-giao-nguoi-dung', require('./components/DangGiaoNguoiDung.vue'));
Vue.component('hoan-thanh-nguoi-dung', require('./components/HoanhThanhNguoiDung.vue'));
Vue.component('huy-nguoi-dung', require('./components/HuyNguoiDung.vue'));
Vue.component('thong-tin-nguoi-dung', require('./components/ThongTinNguoiDung.vue'));
Vue.component('san-pham-pho-bien', require('./components/SanPhamPhoBien.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('san-pham-sale', require('./components/SanPhamSale.vue'));
Vue.component('thong-bao-don-hang', require('./components/ThongBaoDonHang.vue'));
Vue.component('thong-bao-tat-ca', require('./components/ThongBaoTatCa.vue'));
Vue.component('quan-ly-khuyen-mai', require('./components/QuanLyKhuyenMai.vue'));
Vue.component('phieu-nhap', require('./components/PhieuNhap.vue'));
Vue.component('quan-ly-noi-dung-khuyen-mai', require('./components/NoiDungKhuyenMai.vue'));
Vue.component('tim-kiem', require('./components/TimKiem.vue'));
Vue.component('doi-tra', require('./components/DoiTra.vue'));
Vue.component('san-pham-loi', require('./components/SanPhamLoi.vue'));
Vue.component('nhan-vien-quan-ly', require('./components/NhanVienQuanLy.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Vue.config.devtools = false;
const app = new Vue({
    el: '#app',
    data: {

        cart: [],
        sosanh: [],
        option: '',
        thongbaodonhang: [],
    },

    created() {
        this.getCart();

        bus.$on('thong-bao-don-hang', (donhang) => {
            this.getThongbao(donhang);
        });
        bus.$on('option', (option) => {
            this.option = option;
        });
        bus.$on('add-to-cart', (sanpham) => {
            // console.log(sanpham);

            this.addToCart(sanpham);
        });
        bus.$on('add-to-cart-detail', (sanpham) => {
            // console.log(sanpham);

            this.addToCartChitiet(sanpham);
        });
        bus.$on('remove-from-cart', (sanpham) => {
            this.removeFromCart(sanpham);
        });
        bus.$on('removeall-from-cart', (sanpham) => {
            this.removeallFromCart(sanpham);
        });
        bus.$on('removeall', () => {
            this.removeall();
        });
        bus.$on('thanhtoan', () => {
            this.cart = [];
            localStorage.clear();
        });
    },
    computed: {

        cartTotal() {
            return this.cart.reduce((total, sanpham) => {
                if (sanpham.chitietkhuyenmai.length > 0 && sanpham.chitietkhuyenmai[0].trangthai == 0) {
                    console.log(sanpham.chitietkhuyenmai[0].dongia_giamgia);
                    return total + sanpham.qty * sanpham.chitietkhuyenmai[0].dongia_giamgia;
                } else {
                    return total + sanpham.qty * sanpham.dongia;
                }
            }, 0);
        },
        totalItems() {
            return this.cart.reduce((total, sanpham) => {
                return total + sanpham.qty;
            }, 0);
        }
    },
    methods: {
        getThongbao(donhang) {
            this.thongbaodonhang = donhang;
        },
        addToCartChitiet(sanpham) {
            const matchingProductIndex = this.cart.findIndex((item) => {
                return item.id === sanpham.id;
            });
            if (sanpham.soluongsanpham.soluongcon != 0) {
                if (matchingProductIndex > -1) {
                    if (sanpham.soluongsanpham.soluongcon > this.cart[matchingProductIndex].qty) {
                        this.cart[matchingProductIndex].qty++;
                        toast({
                            type: "success",
                            title: "Thêm giỏ hàng thành công",

                        });
                    } else {
                        swal({
                            position: 'mid',
                            type: 'warning',
                            title: 'Sản phẩm tạm hết',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                } else {
                    sanpham.qty = 1;
                    this.cart.push(sanpham);
                    toast({
                        type: "success",
                        title: "Thêm giỏ hàng thành công",

                    });

                }

                localStorage.setItem('cart', JSON.stringify(this.cart));
            } else {
                swal({
                    position: 'mid',
                    type: 'warning',
                    title: 'Sản phẩm tạm hết',
                    showConfirmButton: false,
                    timer: 1500
                });
            }



        },
        getCart() {
            if (localStorage && localStorage.getItem('cart')) {
                this.cart = JSON.parse(localStorage.getItem('cart'));

            } else {
                this.cart = [];
            }
        },
        addToCart(sanpham) {
            swal({
                title: "Bạn muốn thêm vào giỏ hàng ?",
                text: "",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Huỷ"
            }).then(result => {
                if (result.value) {
                    const matchingProductIndex = this.cart.findIndex((item) => {
                        return item.id === sanpham.id;
                    });
                    if (sanpham.soluongsanpham.soluongcon != 0) {
                        if (matchingProductIndex > -1) {
                            if (sanpham.soluongsanpham.soluongcon > this.cart[matchingProductIndex].qty) {
                                this.cart[matchingProductIndex].qty++;
                                toast({
                                    type: "success",
                                    title: "Thêm giỏ hàng thành công",

                                });
                            } else {
                                swal({
                                    position: 'mid',
                                    type: 'warning',
                                    title: 'Sản phẩm tạm hết',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        } else {
                            sanpham.qty = 1;
                            this.cart.push(sanpham);
                            toast({
                                type: "success",
                                title: "Thêm giỏ hàng thành công",

                            });

                        }

                        localStorage.setItem('cart', JSON.stringify(this.cart));
                    } else {
                        swal({
                            position: 'mid',
                            type: 'warning',
                            title: 'Sản phẩm tạm hết',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });







        },
        removeFromCart(sanpham) {
            const matchingProductIndex = this.cart.findIndex((item) => {
                return item.id == sanpham.id;
            });

            if (this.cart[matchingProductIndex].qty <= 1) {
                this.cart.splice(matchingProductIndex, 1);
            } else {
                this.cart[matchingProductIndex].qty--;
            }

            localStorage.setItem('cart', JSON.stringify(this.cart));
        },
        removeallFromCart(sanpham) {
            swal({
                title: "Bạn muốn xoá sản phẩm này",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Huỷ"
            }).then(result => {
                if (result.value) {
                    const matchingProductIndex = this.cart.findIndex((item) => {
                        return item.id == sanpham.id;
                    });

                    if (this.cart[matchingProductIndex]) {
                        this.cart.splice(matchingProductIndex, 1);
                    } else {
                        this.cart[matchingProductIndex].qty--;
                    }

                    localStorage.setItem('cart', JSON.stringify(this.cart));
                }
            });









        },
        removeall() {
            this.cart = [];
            localStorage.clear();
        }
    },


});