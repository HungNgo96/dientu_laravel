<template>
    <!-- <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-body">
                            .....
                        </div>
                    </div>
                </div>
            </div>
    </section> -->

     <div class="container">
        <div class="row ">
            
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  created() {},
  methods: {
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