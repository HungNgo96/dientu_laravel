<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- table-->
            <table id="tabledanggiao" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Khách hàng</th>
                  <th>Tổng tiền</th>
                  <th>Nhân viên giao</th>
                  <th>Trạng thái</th>

                  <th>Ngày đặt</th>
                  <th>In phiếu giao</th>
                  <th>In hoá đơn</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(danggiao,index) in danhsachdanggiao" :key="index">
                  <td>{{danggiao.id}}</td>
                  <td>{{danggiao.user.name}}</td>
                  <td>{{formatPrice(danggiao.tongtien)}} VND</td>
                  <td
                    v-for="(item,index) in nhanvien"
                    :key="index"
                    v-if="item.id == danggiao.giaohang.id_nhanvien "
                  >{{item.tennv}}</td>
                  <td>
                    <span class="badge badge-warning">Đang giao</span>
                  </td>
                  <td>{{danggiao.ngaydat}}</td>
                  <td>
                    <a :href="phieugiao +'/' + danggiao.id" target="_blank">
                      <button type="button" class="btn btn-success">
                        <i class="nav-icon fa fa-print"></i>&nbsp;In
                      </button>
                    </a>
                  </td>
                  <td>
                    <a :href="hoadon +'/' + danggiao.id" target="_blank">
                      <button type="button" class="btn btn-success">
                        <i class="nav-icon fa fa-print"></i>&nbsp;In
                      </button>
                    </a>
                  </td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-info"
                      @click="viewdetails(danggiao.chitietdonhang)"
                    >
                      <i class="nav-icon fa fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-success" @click="change(danggiao)">
                      <i class="nav-icon fa fa-exchange"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-warning"
                      @click="openModalTraHang(danggiao.id,index)"
                    >
                      <span>Trả hàng</span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
            <!-- Modal -->
            <div
              class="modal fade"
              id="modaltrahang"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#ffc107">
                    <h5 class="modal-title" id="modaltrahang">Trả hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Chọn nguyên nhân trả hàng</label>
                      <select class="form-control" v-model="trahang.noidung">
                        <option disabled value>Chọn nguyên nhân trả hàng</option>
                        <option value="Khách hàng không nhận">Khách hàng không nhận</option>
                        <option value="Sản phẩm bị lỗi">Sản phẩm bị lỗi</option>
                        <option
                          value="Không liên lạc được khách hàng"
                        >Không liên lạc được khách hàng</option>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Chọn tình trạng</label>
                        <select  class="form-control">
                          <option disabled value="">Chọn tình trạng</option>
                          <option value="Bình thường">Bình thường</option>
                          <option value="Sản phẩm bị lỗi">Sản phẩm bị lỗi</option>
                          
                          
                        </select>
                    </div>-->
                  </div>
                  <!-- end modal-boy -->
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-warning"
                      v-if="trahang.noidung != ''"
                      @click="TraHang(this.id_donhangtrahang,this.vitri_donhang)"
                    >Xác nhận</button>
                    <button type="button" class="btn btn-warning" v-else disabled>Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal -->
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
            <!-- endmodal -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
$(() => {
  var table = $("#tabledanggiao").DataTable({
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
    .appendTo("#tabledanggiao_wrapper .col-md-6:eq(0)");
});
import monent from "moment";
export default {
  props: ["phieugiao", "nhanvien", "hoadon"],
  data() {
    return {
      donhangdanggiao: {
        user: "",
        tongtien: "",
        sanpham: "",
        ngaydat: monent().format("YYYY-MM-DD HH:mm:ss")
      },
      chitietdonhang: {
        id: "",
        id_donhang: "",
        id_sanpham: "",
        dongia: "",
        soluong: ""
      },
      danhsachdanggiao: [],
      danhsachchitietdonhang: [],
      danhsachsanpham: [],
      trahang: {
        noidung: "",
        tinhtrang: ""
      },
      id_donhangtrahang: "",
      vitri_donhang: "",
      isTrue: true
    };
  },
  created() {
    this.getDanhsachdanggiao();
  },
  methods: {
    openModalTraHang(item, index) {
      $("#modaltrahang").modal("show");
      this.id_donhangtrahang = item;
      this.vitri_donhang = index;
    },
    TraHang(id, index) {
      axios
        .post("tra-hang-dang-giao/" + this.id_donhangtrahang, {
          noidung: this.trahang.noidung
        })
        .then(() => {
          this.danhsachdanggiao.splice(index, 1);
          $("#modaltrahang").modal("hide");
          $("#tabledanggiao")
            .DataTable()
            .destroy();
          swal({
            position: "mid",
            type: "success",
            text: "Thành Công",
            timer: 1500,
            showConfirmButton: false
          });

          this.$nextTick(function() {
            this.getDanhsachdanggiao2();
          });
        })
        .catch(() => {});
    },
    export() {
      var table = $("#tabledanggiao").DataTable({
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
        .appendTo("#tabledanggiao_wrapper .col-md-6:eq(0)");
    },
    getDanhsachdanggiao() {
      axios
        .get("index")
        .then(response => {
          this.danhsachdanggiao = response.data.danggiao;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {});
    },
    getDanhsachdanggiao2() {
      axios
        .get("index")
        .then(response => {
          this.danhsachdanggiao = response.data.danggiao;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {
          this.export();
        });
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
    exit() {
      $("#tableview").modal("hide");
    },
    change(donhang) {
      swal({
        title: "Bạn có muốn chuyển trạng thái hoàn thành ?",
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
              .put("update-danggiao/" + donhang.id, {
                trangthai: 3,
                id_donhang: donhang.id
              })
              .then(response => {
                $("#tabledanggiao")
                  .DataTable()
                  .destroy();
                swal({
                  position: "mid",
                  type: "success",
                  text: "Chuyển trạng thái thành công",
                  timer: 1500,
                  showConfirmButton: false
                });
                this.$nextTick(function() {
                  this.getDanhsachdanggiao2();
                });
              })
              .catch(error => {});
          }
        })
        .then(() => {});
    }
  }
};
</script>
<style scoped>
</style>

