<template>
  <div class="top-search-form">
    <form action="#" method="post" class="menu-form">
      <fieldset>
        <select name="category" id="category">
          <option selected="selected">Tìm kiếm:</option>
        </select>
      </fieldset>

      <input type="text" placeholder="Nhập từ khoá" class="form-control" v-model="tukhoa">
      <button type="submit" class="btn">
        <i class="fa fa-search"></i>
      </button>
    </form>
  </div>
</template>
<script>
export default {
  props:['timkiem'],
  data() {
    return {
      tukhoa:'',
    };
  },
  created() {},
  methods: {
    timkiem(){
      axios.post('timkiem',{
        tukhoa: this.tukhoa,
      }).then((response)=>{
        
      })
      
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