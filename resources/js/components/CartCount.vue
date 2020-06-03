<template>
  <div class="col-sm-2">
    <div class="shop-cart">
      <a class="cart-control"  title="View your shopping cart">
        <i class="ti-bag"></i>
        <span class="count">{{cartcount}}</span>
        
        <span class="amount">{{formatPrice(carttotal)}} Đ</span>
      </a>
      <!-- /.cart-control -->
      <div class="cart-items">
        <div class="widget_shopping_cart_content">
          <div v-if="cart.length > 0"  class="cart-top">
            <div class="item media" v-for="(item,index) in cart" :key="index">
              <button class="btn" @click="removeallFromCart(item)">
                <i class="fa fa-close"></i>
              </button>
              <div v-if="item.id_matensanpham == 1"  class="item-thumbnail media-left">
                <img width="90px" height="90px" :src="assetmaytinh +'/'+  item.hinhanh" >
              </div>
              <div v-else class="item-thumbnail media-left">
                <img width="90px" height="90px" :src="assetdienthoai +'/'+ item.hinhanh" >
              </div>
              <!-- /.item-thumbnail -->
              <div class="item-details media-body">
                <h4 class="item-title">
                  <a href="#">{{item.tensp}}</a>
                </h4>
                <!-- /.item-title -->
                <div class="item-price">
                  <div class="item-price">
                    <span class="currency"></span>
                    <span v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0 " class="price">{{ formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
                    <span v-else class="price">{{formatPrice(item.dongia)}} VND</span>
                    <span class="item-count">{{item.qty}}</span>
                    <!-- /.item-count -->
                  </div>
                  <!-- /.item-price -->
                </div>
                <!-- /.item-price -->
              </div>
              <!-- /.item-details -->
            </div>
            <!-- /.item -->
          </div>
          <div v-else class="cart-top" style="text-align:center">Hiện tại chưa có sản phẩm nào</div>
          <!-- /.cart-top -->
          <div class="cart-middle" v-if="cart.length > 0">
            <button class="btn pull-left" @click="removeall(cart)">
              <i class="ti-trash"></i> 
            </button>
            <div class="price-total pull-right" v-if="cart.length > 0">
              <span>Tổng tiền:</span>
              <span class="currency"></span>
              <span class="price">{{formatPrice(carttotal)}} VND</span>
            </div>
            <!-- /.price-total -->
          </div>
          <!-- /.cart-middle -->
          <div class="cart-bottom" v-if="cart.length > 0">
            <a :href="chitietgiohang" class="btn pull-left">
              <i class="icons icon-basket-loaded"></i> Xem giỏ hàng
            </a>
            <a :href="thanhtoan" class="btn pull-right">Thanh toán</a>
          </div>
          <!-- /.cart-bottom -->
        </div>
        <!-- /.widget_shopping_cart_content -->
      </div>
      <!-- /.scart-items -->
    </div>
  </div>
</template>
<script>
export default {
  props: ["cartcount", "cart", "carttotal", "totalitems", "chitietgiohang",'assetmaytinh','assetdienthoai','thanhtoan'],
  data() {
    return {};
  },
  created() {},
  methods: {
    removeFromCart(item) {
      bus.$emit("remove-from-cart", item);
    },
    removeallFromCart(item) {
      bus.$emit("removeall-from-cart", item);
    },
    removeall(){
      bus.$emit("removeall");
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