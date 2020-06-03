<template>
  <div>
    <a class="btn" @click="addToCart(sanphamlienquan)">Thêm giỏ hàng</a>
  </div>
</template>
<script>
export default {
  props: ["sanphamlienquan"],
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