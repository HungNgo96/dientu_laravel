<template>
  <div>
    <div class="table-responsive">
      <table class="table" id="table-danggiao">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            
            <th>Số lượng chi tiết</th>
            <th>Tổng tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,index) in danggiao" :key="index">
            <td>{{item.id}}</td>
            
            <td>{{item.chitietdonhang_count}}</td>
            <td>{{formatPrice(item.tongtien)}} VND</td>
            <td>
              <button class="btn-info" type="button" @click="openModalDangGiao(item.chitietdonhang)">
                <li class="fa fa-eye"></li>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="modal-danggiao">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#5bc0de">
            <h4 class="modal-title">Chi tiết đơn hàng</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table" id="table-chitietdanggiao">
                <thead>
                  <tr>
                    <th>Mã</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item,index) in danhsachchitiet" :key="index">
                    <td>{{item.id}}</td>
                    <td>{{item.id_donhang}}</td>
                    <td
                      v-for="(item_sanpham,index) in sanpham"
                      :key="index"
                      v-if="item_sanpham.id == item.id_sanpham"
                    >{{item_sanpham.tensp}}</td>
                    <td>{{item.soluong}}</td>
                    <td>{{formatPrice(item.dongia)}} VND</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
$(document).ready(function() {
  $("#table-danggiao").DataTable();
 
});
export default {

  props:['danggiao','sanpham'],
  data() {
    return {
      danhsachchitiet:[],
    };
  },
  created() {},
  methods: {
    openModalDangGiao(item) {
       
      $("#modal-danggiao").modal("show");
      this.danhsachchitiet=item;
     
     
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