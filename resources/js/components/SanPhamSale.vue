<template>
  <div class="item" v-if=" item.chitietkhuyenmai.length > 0">
    <div class="col-md-6" v-if="item.chitietkhuyenmai[0].trangthai == 0">
      <div class="item-thumbnail">
        <img
          v-if="item.id_matensanpham == 1"
          :src="assetmaytinh +'/' + item.hinhanh"
          :alt="item.tensp"
        >
        <img
          v-if="item.id_matensanpham == 2"
          :src="assetdienthoai +'/' + item.hinhanh"
          :alt="item.tensp"
        >
        <span class="ribbon sale">Khuyến mãi</span>
        <!-- /.ribbon -->
        <div class="item-inner">
          <button class="wish-list">
            <a :href="sosanh">
              <i class="fa fa-exchange"></i>
              <span>So sánh</span>
            </a>
          </button>
          <button class="wish-list">
            <a :href="link">
              <i class="fa fa-search"></i>
              <span>Xem chi tiết</span>
            </a>
          </button>
          <!-- <a class="fancybox" :href="link"><i class="fa fa-search"></i> <span>Xem chi tiết</span></a> -->
        </div>
        <!-- /.item-inner -->
      </div>
      <!-- /.item-thumbnail -->
    </div>

    <div class="col-md-6" v-if="item.chitietkhuyenmai[0].trangthai == 0">
      <div class="item-details">
        <h3 class="item-title">
          <a :href="link">{{item.tensp}}</a>
        </h3>
        <!-- /.item-title -->
        <div class="item-price">
          <span class="currency"></span>
          <!-- /.currency -->
          <span class="price">{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
          <!-- /.price -->
        </div>
        <!-- /.item-price -->
        <div class="previous-price">
          <span class="currency"></span>
          <span class="price">{{formatPrice(item.dongia)}} VND</span>
        </div>
        <!-- /.previous-price -->
        <a class="btn" @click="addToCart(item)">Thêm giỏ hàng</a>
        <!-- /.btn -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["item", "assetmaytinh", "assetdienthoai", "sosanh", "link"],
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