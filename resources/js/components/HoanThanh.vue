<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- table-->
            <table id="tablehoanthanh" class="table table-bordered table-hover dataTable">
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
                <tr v-for="(hoanthanh,index) in danhsachhoanthanh" :key="index">
                  <td>{{hoanthanh.id}}</td>
                  <td>{{hoanthanh.user.name}}</td>
                  <td>{{formatPrice(hoanthanh.tongtien)}} VND</td>
                  <td>
                    <span class="badge badge-success">Hoàn thành</span>
                  </td>
                  <td>{{hoanthanh.ngaydat}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-info"
                      @click="viewdetails(hoanthanh.chitietdonhang)"
                    >
                      <i class="nav-icon fa fa-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
            <div
              class="modal fade"
              id="tableview"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tableedit"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="width:1100px">
                  <div class="modal-header" style="background-color:lightgreen">
                    <h5 class="modal-title" id="tableedit">Chi tiêt đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table id="tablevieww" class="table table-bordered table-hover dataTable">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Mã đơn hàng</th>
                          <th>Tên sản phẩm</th>
                          <th>Tổng tiền</th>
                          <th>Số lượng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(chitietdonhang,index) in danhsachchitietdonhang" :key="index">
                          <td>{{chitietdonhang.id}}</td>
                          <td>{{chitietdonhang.id_donhang}}</td>
                          <td
                            v-for="(sanpham,index) in danhsachsanpham"
                            :key="index"
                            v-if="sanpham.id==chitietdonhang.id_sanpham"
                          >{{sanpham.tensp}}</td>
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
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
$(()=>{
    var table = $("#tablehoanthanh").DataTable({
        lengthChange: true,
        // buttons: ["copy", "excel", "pdf","print"]
        buttons: [
          {
            extend: "pdfHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: "excelHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: "print",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          }
        ]
      });

      table
        .buttons()
        .container()
        .appendTo("#tablehoanthanh_wrapper .col-md-6:eq(0)");
})
import moment from "moment";
export default {
  data() {
    return {
      donhanghoanthanh: {
        user: "",
        tongtien: 0,
        trangthai: 0,
        ngaydat: moment().format("YYYY-MM-DD HH:mm:ss")
      },
      danhsachhoanthanh: [],
      danhsachchitietdonhang: [],
      danhsachsanpham: []
    };
  },
  created() {
    this.getDanhsachhoanthanh();
  },
  methods: {
    export() {
      var table = $("#tablehoanthanh").DataTable({
        lengthChange: true,
        // buttons: ["copy", "excel", "pdf","print"]
        buttons: [
          {
            extend: "pdfHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: "excelHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: "print",
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          }
        ]
      });

      table
        .buttons()
        .container()
        .appendTo("#tablehoanthanh_wrapper .col-md-6:eq(0)");
    },
    exit() {
      $("#tableview").modal("hide");
    },
    getDanhsachhoanthanh() {
      axios
        .get("index")
        .then(response => {
          this.danhsachhoanthanh = response.data.hoanthanh;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {
          
        })
        .catch(erros => {});
    },
      getDanhsachhoanthanh2() {
      axios
        .get("index")
        .then(response => {
          this.danhsachhoanthanh = response.data.hoanthanh;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {
          this.export();
        })
        .catch(erros => {});
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