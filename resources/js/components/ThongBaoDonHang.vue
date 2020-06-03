<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- table-->
            <table id="tablechoduyet" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Khách hàng</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Ngày đặt</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in donhang" :key="index">
                  <td>{{item.id}}</td>
                  <td>{{item.user.name}}</td>
                  <td>{{formatPrice(item.tongtien)}} VND</td>
                  <td>
                    <span class="badge badge-danger">Chưa duyệt</span>
                  </td>
                  <td>{{item.ngaydat}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-info"
                      @click="viewdetails(item.chitietdonhang)"
                    >
                      <i class="nav-icon fa fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-success" @click="change(item)">
                      <i class="nav-icon fa fa-exchange"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
             <!-- modal -->
                  <div class="modal fade "  id="tableview" tabindex="-1" role="dialog" aria-labelledby="tableedit" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-lg" role="document"   >
                            <div class="modal-content " style="width:1100px"  >
                                <div class="modal-header" style="background-color:lightgreen" >
                                    <h5  class="modal-title" id="tableedit" >Chi tiêt đơn hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                    
                                    
                                    
                                    <table  id="tablevieww" class="table table-bordered table-hover dataTable ">
                                        <thead>
                                            <tr>
                                            <th>id</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tổng tiền</th> 
                                            <th>Số lượng</th> 
                                              
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <tr v-for="(chitietdonhang,index) in danhsachchitietdonhang" :key="index" >
                                            <td>{{chitietdonhang.id}}</td>
                                            <td>{{chitietdonhang.id_donhang}}</td>
                                            <td v-for="(sanpham,index) in sanpham" :key="index" v-if="sanpham.id==chitietdonhang.id_sanpham" >{{sanpham.tensp}}</td>
                                              <td>{{formatPrice(chitietdonhang.dongia)}} VND</td>
                                            <td>{{chitietdonhang.soluong}}</td>
                                            </tr>
                                        </tbody>   
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary" @click="exit">Thoát</button>
                                
                                </div>
                            </div>
                    </div>
                </div>
                            <!-- endmodal -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  props: ['donhang',"sanpham"],
  data() {
    return {
      danhsachchoduyet: [],
      danhsachchitietdonhang: [],
      danhsachsanpham: []
    };
  },
  created() {},
  methods: {
    thongbao(){
       window.location.href = "../dashboard";
    },
       exit() {
      $("#tableview").modal("hide");
    },
    change(donhang) {
      swal({
        title: "Bạn có muốn chuyển trạng thái đã duyệt ?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận!",
        cancelButtonText: "Huỷ"
      })
        .then(result => {
          if (result.value) {
            axios
              .put("../donhang/update/" + donhang.id, {
                trangthai: 1
              })
              .then(response => {})
              .catch(error => {});
            swal({
                position: "mid",
                type: "success",
                title: "Bạn chuyển trạng thái thành công",
                showConfirmButton: false,
                timer: 1500
              });
            setTimeout(this.thongbao, 2000)
            
          }
        })
        .then(() => {});
    },
    viewdetails(chitietdonhang) {
      $("#tableview").modal("show");
      $("#tableview").modal("toggle");
      this.danhsachchitietdonhang = chitietdonhang;
      $("#tablevieww")
        .DataTable()
        .destroy();
      this.$nextTick(function() {
        $("#tablevieww").DataTable();
      });
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