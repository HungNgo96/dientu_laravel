<template>
  <div class="banner-top">
    <div class="col-sm-9">
      <div
        id="banner-slider"
        class="banner-slider carousel slide background-bg"
        data-image-src
        style="background-color:#808080"
      >
        <ol class="carousel-indicators">
          <li data-target="#banner-slider" data-slide-to="0" class="active"></li>
          <li data-target="#banner-slider" data-slide-to="1"></li>
          <li data-target="#banner-slider" data-slide-to="2"></li>
          <li data-target="#banner-slider" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" style="height:447px">
          <div class="item active" v-for="item in sanpham[0]">
            <div class="col-sm-6">
              <div class="slider-content">
                <h2 class="main-title">{{item.tensp}}</h2>
                <!-- /.banner-title -->
                <!-- <h3 v-if="item.chitietkhuyenmai.length > 0 && item.chitietkhuyenmai[0].trangthai == 0" class="sub-title">{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                <h3 v-else class="sub-title">{{formatPrice(item.dongia)}} VND</h3>-->
                <div class="item-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                  <h3 v-else class="price">{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <div class="previous-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <!-- /.banner-sub-title -->
                <a @click="addToCart(item)" class="btn">Mua ngay</a>
                <!-- /.btn -->
              </div>
              <!-- /.slider-content -->
            </div>

            <div class="col-sm-6">
              <img
                v-if="item.id_matensanpham == 1"
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetmaytinh + '/'+item.hinhanh"
                alt="Slider Image"
              >
              <img
                v-else
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetdienthoai + '/'+item.hinhanh"
                alt="Slider Image"
              >
            </div>
          </div>
          <!-- /.item -->
          <div class="item" v-for="item in sanpham[1]">
            <div class="col-sm-6">
              <img
                v-if="item.id_matensanpham == 1"
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetmaytinh + '/'+item.hinhanh"
                alt="Slider Image"
              >
              <img
                v-else
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetdienthoai + '/'+item.hinhanh"
                alt="Slider Image"
              >
            </div>

            <div class="col-sm-6">
              <div class="slider-content">
                <!-- <h4 class="top-title">Brand New</h4> -->
                <h2 class="main-title">{{item.tensp}}</h2>
                <!-- /.banner-title -->
                <div class="item-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                  <h3 v-else class="price">{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <div class="previous-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <!-- /.banner-sub-title -->
                <a @click="addToCart(item)" class="btn">Mua ngay</a>
                <!-- /.btn -->
              </div>
              <!-- /.slider-content -->
            </div>
          </div>
          <!-- /.item -->
          <div class="item" v-for="item in sanpham[2]">
            <div class="col-sm-6">
              <img
                v-if="item.id_matensanpham == 1"
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetmaytinh + '/'+item.hinhanh"
                alt="Slider Image"
              >
              <img
                v-else
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetdienthoai + '/'+item.hinhanh"
                alt="Slider Image"
              >
            </div>

            <div class="col-sm-6">
              <div class="slider-content">
                <!-- <h4 class="top-title">Brand New</h4> -->
                <h2 class="main-title">{{item.tensp}}</h2>
                <!-- /.banner-title -->
                <div class="item-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                  <h3 v-else class="price">{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <div class="previous-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</h3>
                </div>

                <!-- /.banner-sub-title -->
                <a @click="addToCart(item)" class="btn">Mua ngay</a>
                <!-- /.btn -->
              </div>
              <!-- /.slider-content -->
            </div>
          </div>
          <!-- /.item -->
          <div class="item" v-for="(item,index) in sanpham[3]" :key="index">
            <div class="col-sm-6">
              <img
                v-if="item.id_matensanpham == 1"
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetmaytinh + '/'+item.hinhanh"
                alt="Slider Image"
              >
              <img
                v-else
                width="250px"
                height="250px"
                class="banner-image"
                :src="assetdienthoai + '/'+item.hinhanh"
                alt="Slider Image"
              >
            </div>

            <div class="col-sm-6">
              <div class="slider-content">
                <!-- <h4 class="top-title">Brand New</h4> -->
                <h2 class="main-title">{{item.tensp}}</h2>
                <!-- /.banner-title -->
                <!-- <h3 v-if="item.chitietkhuyenmai.length > 0 && item.chitietkhuyenmai[0].trangthai == 0" class="sub-title">{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                <h3 v-else class="sub-title">{{formatPrice(item.dongia)}} VND</h3>-->
                <div class="item-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</h3>
                  <h3 v-else class="price">{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <div class="previous-price">
                  <h3
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</h3>
                </div>
                <!-- /.banner-sub-title -->
                <a @click="addToCart(item)" class="btn">Mua ngay</a>
                <!-- /.btn -->
              </div>
              <!-- /.slider-content -->
            </div>
          </div>
          <!-- /.item -->
        </div>
      </div>
      <!-- /#banner-slider -->
    </div>

    <div class="col-sm-3">
      <h3 class="banner-title">Sản phẩm bán chạy</h3>
      <!-- /.banner-title -->
      <div id="top-sell-slider" class="top-sell-slider carousel slide text-center">
        <ol class="carousel-indicators">
          <li data-target="#top-sell-slider" data-slide-to="0" class="active"></li>
          <li data-target="#top-sell-slider" data-slide-to="1"></li>
          <li data-target="#top-sell-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" style="height: 500px;">
          <div class="item active">
            <div class="product-item" v-for="(item,index) in sanphamtop[0]" :key="index">
              <div class="item-thumbnail">
                <img
                  width="219px"
                  height="155px"
                  v-if="item.id_matensanpham == 1"
                  :src="assetmaytinh + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <img
                  width="219px"
                  height="155px"
                  v-else
                  :src="assetdienthoai + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <div class="add-cart">
                  <a
                    @click="addToCart(item)"
                    width="219px"
                    height="155px"
                    class="btn"
                  >Thêm vào giỏ hàng</a>
                </div>
                <!-- /.add-cart -->
              </div>
              <!-- /.item-thumbnail -->
              <div class="item-details">
                <h3 class="item-title">{{item.tensp}}</h3>

                <!-- /.item-title -->
                <div class="item-price">
                  <span
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
                  <span v-else class="price">{{formatPrice(item.dongia)}} VND</span>
                </div>
                <div class="previous-price">
                  <span
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</span>
                </div>
                <!-- /.item-price -->
              </div>
              <!-- /.item-details -->
            </div>
            <!-- /.product-item -->
            <!-- /.product-item -->
          </div>
          <!-- /.item -->
          <div class="item">
            <div class="product-item" v-for="(item,index) in sanphamtop[1]" :key="index">
              <div class="item-thumbnail">
                <img
                  width="219px"
                  height="155px"
                  v-if="item.id_matensanpham == 1"
                  :src="assetmaytinh + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <img
                  width="219px"
                  height="155px"
                  v-else
                  :src="assetdienthoai + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <div class="add-cart">
                  <a @click="addToCart(item)" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <!-- /.add-cart -->
              </div>
              <!-- /.item-thumbnail -->
              <div class="item-details">
                <h3 class="item-title">{{item.tensp}}</h3>
                <!-- /.item-title -->
                <div class="item-price">
                  <span
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
                  <span v-else class="price">{{formatPrice(item.dongia)}} VND</span>
                </div>
                <div class="previous-price">
                  <span
                    v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                    class="price"
                  >{{formatPrice(item.dongia)}} VND</span>
                </div>
                <!-- /.item-price -->
              </div>
              <!-- /.item-details -->
            </div>
            <!-- /.product-item -->
          </div>
          <!-- /.item -->
          <div class="item">
            <div class="product-item" v-for="(item,index) in sanphamtop[2]" :key="index">
              <div class="item-thumbnail">
                <img
                  width="219px"
                  height="155px"
                  v-if="item.id_matensanpham == 1"
                  :src="assetmaytinh + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <img
                  width="219px"
                  height="155px"
                  v-else
                  :src="assetdienthoai + '/' + item.hinhanh"
                  :alt="item.tensp"
                >
                <div class="add-cart">
                  <a @click="addToCart(item)" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <!-- /.add-cart -->
              </div>
              <!-- /.item-thumbnail -->
              <div class="item-details">
                <h3 class="item-title">{{item.tensp}}</h3>
                <!-- /.item-title -->
                <div class="item-price">
                  <!-- <span class="currency">$</span> -->
                  <div class="item-price">
                    <span
                      v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0"
                      class="price"
                    >{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
                    <span v-else class="price">{{formatPrice(item.dongia)}} VND</span>
                  </div>
                  <div class="previous-price">
                    <span
                      v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0  && item.chitietkhuyenmai[0].trangthai == 0"
                      class="price"
                    >{{formatPrice(item.dongia)}} VND</span>
                  </div>
                </div>
                <!-- /.item-price -->
              </div>
              <!-- /.item-details -->
            </div>
            <!-- /.product-item -->
          </div>
          <!-- /.item -->
          <!-- /.item -->
        </div>
      </div>
      <!-- /#top-sell-slider -->
    </div>
  </div>
  <!-- /.banner-top -->
</template>
<script>
export default {
  props: ["assetmaytinh", "assetdienthoai"],
  data() {
    return {
      sanpham: [],
      sanphamtop: []
    };
  },
  created() {
    this.getDanhsach();
  },
  methods: {
    addToCart(item) {
      bus.$emit("add-to-cart", item);
    },
    getDanhsach() {
      axios.get("sanpham/sanphambanner").then(response => {
        console.log(response.data);
        this.sanpham = response.data.sanpham;
        this.sanphamtop = response.data.sanphamtop;
      });
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    formatDate(d) {
      var dformat =
        [d.getFullYear(), d.getMonth() + 1, d.getDate()].join("/") +
        " " +
        [d.getHours(), d.getMinutes(), d.getSeconds()].join(":");
      return dformat;
    }
  }
};
</script>


<style lang="scss" scoped>
.error {
  span {
    color: red;
  }
}
</style>