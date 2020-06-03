<template>
     <div class="col-md-6 text-right">
            <div class="show-item">
              <select id="by-price" data-select-like-alignement="never" class="by-price drop-select" v-model="option"  @click="clickOption(option)"> 
                <option value="">Xếp xếp</option>
                <option value="1">Giá tăng dần</option>
                <option value="2">Giá giảm dần</option>
                <option value="3">Tên</option>     
              </select>
            </div>
            <!-- /.show-item -->
          </div>
          <!-- /.col-md-6 -->
</template>
<script>

export default {
    
  data() {
    return {
        option:'',
    };
  },
  created() {},
  methods: {
      clickOption(option){
      bus.$emit('option',option)
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