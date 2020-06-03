<template>
  <div class="item">
    <div class="item-thumbnail">
      <a v-if="item.id_matensanpham == 1" :href="link">
        <img
          width="251px"
          height="188px"
          :src="assetmaytinh +'/'+  item.hinhanh"
          alt="Item Thumbnail"
        >
      </a>
      
      <a v-else :href="link">
        <img
          width="251px"
          height="188px"
          :src="assetdienthoai +'/'+ item.hinhanh"
          alt="Item Thumbnail"
        >
      </a>
      <span class="ribbon sale" v-if="item.soluongsanpham.soluongcon == 0">
        <i>Tạm hết</i>
      </span>
      
      <span class="ribbon new" v-if="time <= 30 && item.soluongsanpham.soluongcon != 0">Mới</span>
      <span
        class="ribbon sale"
        v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0 "
      >
        <i>Khuyến mãi</i>
      </span>
    </div>

    <div class="item-content">
      <div class="buttons">
        <button class="add-to-cart" @click="addCart">
          Thêm giỏ hàng
          <i class="fa fa-shopping-cart"></i>
        </button>
        
        <a :href="sosanh">
          <button>
            <i class="fa fa-exchange" title="So sánh"></i>
          </button>
        </a>
      </div>
      <!-- /.buttons -->
      <h3 class="item-title">
        <a :href="link">{{item.tensp}}</a>
      </h3>
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
  </div>
</template>

<script>
export default {
  props: [
    "item",
    "link",
    "sapxep",
    "assetmaytinh",
    "assetdienthoai",
    "sosanh",
    "time"
  ],
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    addCart() {
      bus.$emit("add-to-cart", this.item);
    },
    addToCompare() {
      bus.$emit("add-to-compare", this.item);
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
