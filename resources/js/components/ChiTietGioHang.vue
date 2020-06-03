<template>
  <div class="container">
    <div class="per-order-items">
      <table class="cart-table" v-if="cart.length >0">
        <tbody>
          <tr class="order-head">
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
          </tr>
          <tr v-for="(item,index) in cart" :key="index">
            <td class="order-item" width="300px">
              <button class="del" @click="removeallFromCart(item)" :title="'Xoá '+ item.tensp">
                <i class="ti-trash"></i>
              </button>

              <div class="item-thumbnail">
                <img
                  v-if="item.id_matensanpham == 1"
                  :src="'../public/image/maytinh/'+ item.hinhanh"
                  alt="images"
                  :title="item.tensp"
                >
                <img
                  v-else
                  :src="'../public/image/dienthoai/'+ item.hinhanh"
                  alt="images"
                  :title="item.tensp"
                >
              </div>
              <!-- /.item-thumbnail -->
              <div class="item-details">
                <h3 class="item-title" :title="item.tensp">{{item.tensp}}</h3>
              </div>
              <!-- /.item-details -->
            </td>
            <td class="unit-price">
              <span class="currency"></span>
              <span v-if="item.chitietkhuyenmai.length==0" class="price" style="color:red">{{formatPrice(item.dongia)}} VND</span>
              <span v-else class="price" style="color:red">{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
            </td>

            <td class="order-count">
              <div class="cart-counter">
                <button class="item-minus" @click="removeFromCart(item)" title="Giảm">
                  <i class="ti-minus" @click="(item.soluongsanpham.soluongcon - item.qty) + 1"></i>
                </button>
                <span class="item-count">
                  <b>{{item.qty}}</b>
                </span>
                <button
                  v-if="item.soluongsanpham.soluongcon - item.qty > 0"
                  class="item-plus"
                  @click="addToCart(item)"
                  title="Tăng"
                >
                  <i class="ti-plus" @click="(item.soluongsanpham.soluongcon-item.qty ) - 1"></i>
                </button>
              </div>
              <p v-if="(item.soluongsanpham.soluongcon - item.qty) > 0 ">Còn {{item.soluongsanpham.soluongcon - item.qty }} sản phẩm</p>
              <p v-else style="color:red">Hết hàng</p>
              <!-- /.cart-counter -->
            </td>

            <td class="total-price">
              <span class="currency"></span>
              <span v-if="item.chitietkhuyenmai.length==0" class="price">{{formatPrice(item.qty*item.dongia)}} VND</span>
              <span v-else class="price">{{formatPrice(item.qty* item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- /.cart-table -->
      <div class="cart-buttons">
        <button v-if="cart.length > 0" class="clear-cart" @click="removeall">Xoá giỏ hàng</button>
        <a :href="home">
          <button>Tiếp tục mua hàng</button>
        </a>
      </div>
      <!-- /.cart-buttons -->
    </div>
    <!-- /.per-order-items -->
    <div class="billing-table">
      <div class="row">
        <div class="billing-order col-md-4 col-sm-6" v-if="cart.length > 0">
          <div class="order-cost">
            <ul>
              <li>
                <div class="bill-name">Tổng giá </div>
                <div class="amount">
                  <span class="currency"></span>
                  <span class="count">{{formatPrice(carttotal)}}</span>
                </div>
              </li>
              <li>
                <div class="bill-name">Miễn phí vận chuyển toàn quốc</div>
                <div class="amount">
                  <span class="currency"></span>
                  <span class="count">0 VND</span>
                </div>
              </li>
              <li>
                <div class="bill-name total">Tổng tiền</div>
                <div class="amount total">
                  <span class="currency"></span>
                  <span class="count">{{formatPrice(carttotal)}} VND</span>
                </div>
              </li>
            </ul>
            <a :href="thanhtoan">
              <button class="btn">Thanh toán</button>
            </a>
          </div>
          <!-- /.order-cost -->
        </div>
        <!-- /.billing-order -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.billing-table -->
  </div>
  <!-- /.contaier -->
</template>
<script>
export default {
  props: [
    "cartcount",
    "cart",
    "carttotal",
    "totalitems",
    "home",
    "thanhtoan",
    "sapxep"
  ],
  data() {
    return {
      count: 0
    };
  },
  created() {},
  methods: {
    clickUp(data) {
      this.count = data;
      data++;
    },
    clickDown(data) {
      this.count = data;
      data--;
    },
    removeallFromCart(item) {
      bus.$emit("removeall-from-cart", item);
    },
    removeall() {
      bus.$emit("removeall");
    },

    removeFromCart(item) {
      bus.$emit("remove-from-cart", item);
    },
    addToCart(item) {
      bus.$emit("add-to-cart-detail", item);
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