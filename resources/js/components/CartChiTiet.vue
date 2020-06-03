<template>

     <div >
       <div class="cart-counter">
                  <button  id="item-plus" class="item-plus" @click="addToCartChiTiet(chitietsanpham)"><i class="ti-plus"></i></button>
                  <span id="count" class="count" v-for="(item,index) in cart" :key="index" v-if="item.id == chitietsanpham.id">{{item.qty}}</span>
                  
                  <button id="item-minus" class="item-minus" @click="removeFromCart(chitietsanpham)"><i    v-for="(item,index) in cart" :key="index" v-if="(item.soluongsanpham.soluongcon - item.qty  > -1 && item.id == chitietsanpham.id)" class="ti-minus"></i></button>
                </div>
                <!-- /.cart-counter -->
                
              <div class="buttons">
                <button class="add-to-cart" @click="addToCart(chitietsanpham)">Thêm vào giỏ hàng<i class="fa fa-shopping-cart"></i></button>
                <a :href="sosanh"><button class="wish-list"><i class="fa fa-exchange"></i></button> </a>
              </div>
    </div>
</template>
<script>
export default {
    props:['chitietsanpham','cart','sosanh'],
  data() {
    return {};
  },
  created() {},
  methods: {
    addToCartChiTiet(item) {
      bus.$emit("add-to-cart-detail", item);
    },
    addToCart(item) {
      bus.$emit("add-to-cart", item);
    },
    removeFromCart(item) {
      bus.$emit("remove-from-cart", item);
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