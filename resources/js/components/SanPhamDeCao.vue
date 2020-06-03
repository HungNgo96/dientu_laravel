<template>
  <section>
    <div class="item col-md-3 col-sm-4 cat-1" v-if="sanphamdecao.id_matensanpham==1">
      <div class="item-thumbnail">
        <a :href="linkchitiet">
          <img
            width="259px"
            height="259px"
            :src="assetmaytinh + '/' + sanphamdecao.hinhanh"
            :alt="sanphamdecao.tensp"
          >
        </a>
        <span class="ribbon sale" v-if="sanphamdecao.soluongsanpham.soluongcon == 0">Tạm hết</span>
        <span
          class="ribbon new"
          v-if="time <= 30 && sanphamdecao.soluongsanpham.soluongcon != 0"
        >Mới</span>
        <span class="ribbon sale" v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0"><i>Khuyến mãi</i></span>
      </div>
      <!-- /.item-thumbnail -->
      <div class="item-content">
        <div class="buttons">
          <button class="add-to-cart" @click="addToCart(sanphamdecao)">
            Thêm vào giỏ hàng
            <i class="fa fa-shopping-cart"></i>
          </button>
          <button class="wish-list">
            <a :href="sosanh">
              <i class="fa fa-exchange"></i>
            </a>
          </button>
        </div>
        <!-- /.buttons -->
        <h3 class="item-title">
          <span>{{sanphamdecao.tensp}}</span>
        </h3>
        <!-- /.item-title -->
        <div class="item-price">
          <span v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0" class="price">{{formatPrice(sanphamdecao.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
          <span v-else class="price">{{formatPrice(sanphamdecao.dongia)}} VND</span>

        </div>
         <div class="previous-price">
         
          <span v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0" class="price">{{formatPrice(sanphamdecao.dongia)}} VND</span>
        </div>
        <!-- /.item-price -->
        <div>
          <span>
            {{sanphamdecao.luotxem}}
            <li class="fa fa-eye"></li>
          </span>
        </div>
        <!-- /.rating -->
      </div>
      <!-- /.item-content -->
    </div>
    <!-- /.item -->
    <div class="item col-md-3 col-sm-4 cat-2" v-else>
      <div class="item-thumbnail">
        <a :href="linkchitiet">
          <img
            width="259px"
            height="259px"
            :src="assetdienthoai + '/' + sanphamdecao.hinhanh"
            :alt="sanphamdecao.tensp"
          >
        </a>
        <span class="ribbon sale" v-if="sanphamdecao.soluongsanpham.soluongcon == 0">Tạm hết</span>
        <span
          class="ribbon new"
          v-if="time <= 30 && sanphamdecao.soluongsanpham.soluongcon != 0"
        >Mới</span>
        <span class="ribbon sale" v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0"><i>Khuyến mãi</i></span>
      </div>
      <!-- /.item-thumbnail -->
      <div class="item-content">
        <div class="buttons">
          <button class="add-to-cart" @click="addToCart(sanphamdecao)">
            Thêm vào giỏ hàng
            <i class="fa fa-shopping-cart"></i>
          </button>
          <button class="wish-list">
            <a :href="sosanh">
              <i class="fa fa-exchange"></i>
            </a>
          </button>
        </div>
        <!-- /.buttons -->
        <h3 class="item-title">
          <span>{{sanphamdecao.tensp}}</span>
        </h3>
        <!-- /.item-title -->
        <div class="item-price">
          <span v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0" class="price">{{formatPrice(sanphamdecao.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
          <span v-else class="price">{{formatPrice(sanphamdecao.dongia)}} VND</span>

        </div>
         <div class="previous-price">
         
          <span v-if="sanphamdecao.chitietkhuyenmai.length > 0 && sanphamdecao.soluongsanpham.soluongcon > 0 && sanphamdecao.chitietkhuyenmai[0].trangthai == 0" class="price">{{formatPrice(sanphamdecao.dongia)}} VND</span>
        </div>
        <!-- /.item-price -->
        <div>
          <span>
            {{sanphamdecao.luotxem}}
            <li class="fa fa-eye"></li>
          </span>
        </div>
        <!-- /.rating -->
      </div>
      <!-- /.item-content -->
    </div>
    <!-- /.item -->
  </section>
</template>
<script>
export default {
  props: [
    "sanphamdecao",
    "assetmaytinh",
    "assetdienthoai",
    "time",
    "linkchitiet",
    "sosanh"
  ],
  data() {
    return {};
  },
  created() {},
  methods: {
    addToCart(item) {
      bus.$emit("add-to-cart", item);
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