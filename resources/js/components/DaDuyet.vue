<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- table-->
            <table id="tabledaduyet" class="table table-bordered table-hover dataTable">
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
                <tr v-for="(daduyet,index) in danhsachdaduyet" :key="index">
                  <td>{{daduyet.id}}</td>
                  <td>{{daduyet.user.name}}</td>
                  <td>{{formatPrice(daduyet.tongtien)}} VND</td>
                  <td>
                    <span class="badge badge-success">Đã duyệt</span>
                  </td>
                  <td>{{daduyet.ngaydat}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-info"
                      @click="viewdetails(daduyet,daduyet.chitietdonhang)"
                    >
                      <i class="nav-icon fa fa-eye"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="openChonnhanvien(daduyet)"
                    >
                      <i class="nav-icon fa fa-exchange"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
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
                    <table id="tablevieww" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Mã đơn hàng</th>
                          <th>Tên sản phẩm</th>
                          <th>Đơn giá</th>
                          <th>Số lượng</th>
                          <th></th>
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
                          <td v-if="!chitietdonhang.isEdit">{{chitietdonhang.soluong}}</td>
                          <td v-else>
                            <input type="number" v-model.number="chitietdonhang.soluong">
                            <span
                              v-for="(item,index) in soluongsanpham"
                              :key="index"
                              v-if="item.id_sanpham == chitietdonhang.id_sanpham"
                            >Còn {{item.soluongcon}} sản phẩm</span>
                          </td>
                          <td v-if="!chitietdonhang.isEdit">
                            <button
                              type="button"
                              class="btn btn-success"
                              @click="chitietdonhang.isEdit=true ; chitietdonhang.tam = chitietdonhang.soluong"
                            >
                              <i class="nav-icon fa fa-edit"></i>
                            </button>
                            <button
                              class="btn btn-danger"
                              @click="deleteChitietdonhang(chitietdonhang,index)"
                            >
                              <i class="nav-icon fa fa-trash"></i>
                            </button>
                          </td>
                          <td v-else>
                            <button type="button" class="btn btn-success">
                              <i
                                class="nav-icon fa fa-save"
                                @click="updateChitietdonhang(chitietdonhang,index)"
                              ></i>
                            </button>
                            <button
                              class="btn btn-danger"
                              @click="chitietdonhang.isEdit=false ; chitietdonhang.soluong=chitietdonhang.tam "
                            >
                              <i class="nav-icon fa fa-close"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click=" exit">Thoát</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endmodal -->
            <!-- modal chon nhan vien -->
            <div
              class="modal fade"
              id="tablechonnhanvien"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tablechonnhanvien"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:lightgreen">
                    <h5 class="modal-title" id="tablechonnhanvien">Chọn nhân viên giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Chọn nhân viên giao hàng</label>
                      <select class="form-control" v-model="nhanvien.id">
                        <option disabled value>Chọn nhân viên giao hàng</option>
                        <option
                          v-for="(nhanvien,index) in danhsachnhanvien"
                          :key="index"
                          :value="nhanvien.id"
                          v-if="nhanvien.giaohang.reduce((tong,gh)=>{return tong += gh.trangthai},0) == 0"
                        >{{nhanvien.tennv}}</option>
                      </select>
                      <label class="text-danger" v-if="loinhanvien !=''">{{loinhanvien}}</label>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Chọn thời gian giao</label>
                        <select class="form-control" v-model="nhanvien.songaygiao">
                          <option disabled value>Chọn thời gian giao</option>
                          <option value="1">1 ngày</option>
                          <option value="2">2 ngày</option>
                          <option value="3">3 ngày</option>
                          <option value="4">4 ngày</option>
                          <option value="5">5 ngày</option>
                          <option value="6">6 ngày</option>
                          <option value="7">7 ngày</option>
                        </select>
                        <label class="text-danger" v-if="loisongaygiao !=''">{{loisongaygiao}}</label>
                      </div>
                    </div>
                    <div class="form-group" style="display: none;">
                      <label>ag</label>
                      <input type="text" v-model="donhangdaduyet.tongtien">
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="chooseNhanvien">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" @click="exit">Thoát</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal chon nhan vien -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
$(() => {
  var table = $("#tabledaduyet").DataTable({
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
    .appendTo("#tabledaduyet_wrapper .col-md-6:eq(0)");
});
import axios from "axios";
import moment from "moment";
export default {
  data() {
    return {
      hiden: false,
      donhangdaduyet: {
        user: "",
        tongtien: 0,
        trangthai: 1,
        ngaydat: moment().format("YYYY-MM-DD HH:mm:ss")
      },
      chitietdonhang: {
        id: "",
        id_donhang: "",
        id_sanpham: "",
        dongia: "",
        soluong: ""
      },
      nhanvien: {
        id: "",
        tennv: "",
        gioitinh: "",
        sdt: "",
        diachi: "",
        songaygiao: ""
      },
      danhsachdaduyet: [],
      danhsachchitietdonhang: [],
      danhsachsanpham: [],
      danhsachnhanvien: [],
      soluongsanpham: [],
      loinhanvien: "",
      loisongaygiao: ""
    };
  },
  created() {
    this.getDanhsachdaduyet();
  },
  methods: {
    export() {
      var table = $("#tabledaduyet").DataTable({
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
        .appendTo("#tabledaduyet_wrapper .col-md-6:eq(0)");
    },

    chooseNhanvien() {
      (this.loinhanvien = ""),
        (this.loisongaygiao = ""),
        axios
          .post("chonnhanviengiaohang", {
            donhang: this.donhangdaduyet.id,
            nhanvien: this.nhanvien.id,
            songaygiao: this.nhanvien.songaygiao
          })
          .then(response => {
            swal({
              position: "mid",
              type: "success",
              text: "Chọn nhân viên giao thành công.",
              showConfirmButton: false,
              timer: 1500
            });
            $("#tablechonnhanvien").modal("hide");
            $("#tabledaduyet")
              .DataTable()
              .destroy();
            this.$nextTick(function() {
              this.getDanhsachdaduyet2();
            });
          })
          .catch(error => {
            // console.log(errors.response.data.errors.songaygiao[0])
            if (error.response.data.errors.songaygiao) {
              this.loisongaygiao = error.response.data.errors.songaygiao[0];
            }
            if (error.response.data.errors.nhanvien) {
              this.loinhanvien = error.response.data.errors.nhanvien[0];
            }
          });
    },
    openChonnhanvien(daduyet) {
      $("#tablechonnhanvien").modal("show");
      this.nhanvien.id = "";
      this.nhanvien.songaygiao = "";
      (this.loinhanvien = ""),
        (this.loisongaygiao = ""),
        (this.donhangdaduyet = daduyet);
    },
    deleteChitietdonhang(chitietdonhang, index) {
      swal({
        title: "Bạn có muốn xoá ?",
        text: "Không thể hoàn tác lại được!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận!",
        cancelButtonText: "Huỷ"
      }).then(result => {
        if (result.value) {
          axios
            .delete("delete-chitietdonhang/" + chitietdonhang.id)
            .then(response => {
              swal({
                position: "mid",
                type: "success",
                text: "Xoá thành công.",
                showConfirmButton: false,
                timer: 1500
              });
              console.log(response.data.result);

              $("#tablevieww")
                .DataTable()
                .destroy();
              if (chitietdonhang.soluong == 0) {
                this.danhsachchitietdonhang.splice(index, 1);
              }
              this.$nextTick(() => {
                $("#tablevieww").DataTable();
              });
            })
            .catch(error => {
              // this.errors = error.response.data.errors.name
            });
        }
      });

      // axios.delete('delete-chitietdonhang/'+ chitietdonhang.id)
      // .then(()=>{
      //   this.danhsachchitietdonhang.splice(index,1);
      // })
    },
    updateChitietdonhang(chitietdonhang, index) {
      axios
        .put("update-chitietdonhang/" + chitietdonhang.id, {
          soluong: chitietdonhang.soluong
        })
        .then(() => {
          swal({
            position: "mid",
            type: "success",
            text: "Cập nhật thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          chitietdonhang.isEdit = false;
          if (chitietdonhang.soluong == 0) {
            this.danhsachchitietdonhang.splice(index, 1);
          }
          $("#tablevieww")
            .DataTable()
            .destroy();
          $("#tabledaduyet")
            .DataTable()
            .destroy();
          this.$nextTick(function() {
            $("#tablevieww").DataTable();
            this.getDanhsachdaduyet2();
          });
        });
    },
    exit() {
      $("#tableview").modal("hide");
      $("#tablechonnhanvien").modal("hide");
    },
    viewdetails(daduyet, chitietdonhang) {
      $("#tableview").modal("show");
      $("#tableview").modal("toggle");
      this.danhsachchitietdonhang = chitietdonhang;
      this.donhangdaduyet = daduyet;
      this.danhsachchitietdonhang.forEach(item => {
        Vue.set(item, "isEdit", false);
      });
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
    },
    getDanhsachdaduyet() {
      axios
        .get("index")
        .then(response => {
          // console.log(response.data.daduyet)
          this.danhsachdaduyet = response.data.daduyet;
          this.danhsachnhanvien = response.data.nhanviengiaohang;
          this.danhsachsanpham = response.data.sanpham;
          this.soluongsanpham = response.data.soluongsanpham;
        })
        .then(() => {})
        .catch(erros => {});
    },
    getDanhsachdaduyet2() {
      axios
        .get("index")
        .then(response => {
          // console.log(response.data.daduyet)
          this.danhsachdaduyet = response.data.daduyet;
          this.danhsachnhanvien = response.data.nhanviengiaohang;
          this.danhsachsanpham = response.data.sanpham;
          this.soluongsanpham = response.data.soluongsanpham;
        })
        .then(() => {
          this.export();
        })
        .catch(erros => {});
    }
    // change(donhang) {
    //   swal({
    //     title: "Bạn có muốn chuyển trạng thái đã duyệt ?",
    //     type: "info",
    //     showCancelButton: true,
    //     confirmButtonColor: "#3085d6",
    //     cancelButtonColor: "#d33",
    //     confirmButtonText: "Xác nhận!",
    //     cancelButtonText: "Huỷ"
    //   })
    //     .then(result => {
    //       if (result.value) {
    //         axios
    //           .put("update-daduyet/" + donhang.id, {
    //             trangthai: 2
    //           })
    //           .then(response => {
    //                this.danhsachchitietdonhang.splice(index, 1);

    //           })
    //           .catch(error => {});
    //         swal("", "Bạn đã chuyển thành công", "success");
    //         this.$nextTick(function() {
    //           $("#tabledaduyet")
    //             .DataTable()
    //             .destroy();
    //           // this.getDanhsachdaduyet()
    //         });
    //       }
    //     })
    //     .then(() => {});
    // }
  },
  mounted() {
    console.log("Component mounted.");
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