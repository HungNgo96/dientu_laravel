<template>
  <article class="post type-post media">
    <div class="entry-thumbnail media-left">
      <a v-if="item.id_matensanpham == 1" :href="link">
        <img width="75px" height="75px" :src="assetmaytinh + '/' + item.hinhanh" :alt="item.tensp"/>
      </a>
      
      <a v-else :href="link">
        <img
          width="75px"
          height="75px"
          :src="assetdienthoai + '/' + item.hinhanh"
          :alt="item.tensp"
        />
      </a>
    </div>
    <!--/.post-thumbnail-->
    <div class="post-content media-body">
      <br>
      <h3 class="entry-title" style="text-align:left">
            <span>{{item.tensp}}</span>
      </h3>
      <h3 class="entry-title" style="text-align:left">
        <span v-if="item.chitietkhuyenmai.length == 0" style="color:red">{{formatPrice(item.dongia)}} VND</span>
        <span v-else style="color:red">{{formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
        
      </h3>
      <h3 class="entry-title" style="text-align:left">
        <span > 
            <p  @click="addToCart(item)" class="fa fa-shopping-cart" ></p>
         <a :href="sosanh"><p style="padding-left:15px" class="fa fa-exchange"></p></a></span>
      </h3>
    </div>
    <!--/.post-content media-body-->
  </article>
</template>
<script>
export default {
  props: ["item", "link", "assetmaytinh", "assetdienthoai","sosanh"],
  data() {
    return {};
  },
  created() {},
  methods: {
    addToCart(item){
        bus.$emit('add-to-cart',item);
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