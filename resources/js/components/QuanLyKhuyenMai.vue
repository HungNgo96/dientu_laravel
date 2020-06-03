<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div>&nbsp;</div>
          <div style="text-align:right;  margin-right: 30px;">
            <button type="button" class="btn btn-primary" id="them" @click="openModal">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm sản phẩm khuyến mãi
            </button>
          </div>
          <div class="card-body">
            <!-- table-->
            <table id="tableKhuyenmai" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Chủ đề khuyến mãi</th>
                  <th>Tên sản phẩm</th>
                  <th>Đon giá</th>
                  <th>Đơn giá giảm giá</th>
                  <th>Trạng thái</th>
                  <th>Ngày khuyến mãi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(item,index) in sanphamkhuyenmai"
                  :key="index"
                  v-if="item.dongia_giamgia > 0"
                >
                  <td>{{index+1}}</td>
                  <td>{{item.khuyenmai.tenkhuyenmai}}</td>
                  <td>{{item.sanpham.tensp}}</td>
                  <td>{{formatPrice(item.sanpham.dongia)}} VND</td>
                  <td v-if="!item.isEdit">{{formatPrice(item.dongia_giamgia)}} VND</td>
                  <td v-else>
                    <input type="text" class="form-control" v-model.number="item.dongia_giamgia">
                  </td>
                  <td v-if="!item.isEdit">
                    <span v-if="item.trangthai==0" class="badge badge-success">Khuyến mãi</span>
                    <span v-else class="badge badge-danger">Tạm dừng</span>
                  </td>
                  <td v-else>
                    <div class="custom-control custom-radio custom-control">
                      <input
                        type="radio"
                        class="custom-control-input"
                        id="customRadio1"
                        name="trangthai"
                        value="0"
                        v-model="item.trangthai"
                      >
                      <label class="custom-control-label" for="customRadio1">
                        <span class="badge badge-success">Khuyến mãi</span>
                      </label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                      <input
                        type="radio"
                        class="custom-control-input"
                        id="customRadio2"
                        name="trangthai"
                        value="1"
                        v-model="item.trangthai"
                      >
                      <label class="custom-control-label" for="customRadio2">
                        <span class="badge badge-danger">Tạm dừng</span>
                      </label>
                    </div>
                  </td>

                  <td>{{item.ngaytao}}</td>
                  <td v-if="!item.isEdit">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="item.isEdit=true; item.gia=item.dongia_giamgia ; item.trangthai_trungian = item.trangthai"
                    >
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="deleteSanphamkhuyenmai(item)"
                    >
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>
                  <td v-if="item.isEdit">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="updateSanphamkhuyenmai(item)"
                    >
                      <i class="nav-icon fa fa-save"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="item.isEdit=false ; item.dongia_giamgia = item.gia;item.trangthai = item.trangthai_trungian "
                    >
                      <i class="nav-icon fa fa-remove"></i>
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
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#007bff">
                    <h5 class="modal-title" id="tableedit">Thêm sản phẩm giảm giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Sản phẩm</label>
                        <select class="form-control" v-model="sanpham.id" required>
                          <option disabled value>Chọn sản phẩm khuyến mãi</option>
                          <option
                            v-for="(item,index) in danhsachchuakm"
                            :key="index"
                            :value="item.id"
                            v-if="item.chitietkhuyenmai_count==0"
                          >{{item.tensp}}</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Tên khuyến mãi</label>
                        <select
                          v-if="sanpham.id ==''"
                          class="form-control"
                          v-model="khuyenmai.id"
                          disabled
                          required
                        >
                          <option disabled value>Chọn khuyến mãi</option>
                          <option
                            v-for="(item,index) in dskhuyenmai"
                            :key="index"
                            :value="item.id"
                          >{{item.tenkhuyenmai}}</option>
                        </select>
                        <select v-else class="form-control" v-model="khuyenmai.id" required>
                          <option disabled value>Chọn khuyến mãi</option>
                          <option
                            v-for="(item,index) in dskhuyenmai"
                            :key="index"
                            :value="item.id"
                          >{{item.tenkhuyenmai}}</option>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Đơn giá</label>
                        <input
                          v-for="(item,index) in danhsachchuakm"
                          :key="index"
                          v-if="item.id==sanpham.id"
                          class="form-control"
                          type="text"
                          name="dongia"
                          :value="formatPrice(item.dongia) + ' VND'"
                          disabled
                        >
                        <input
                          v-if="sanpham.id == ''"
                          class="form-control"
                          type="text"
                          name="dongia"
                          v-model="sanpham.dongia"
                          disabled
                        >
                      </div>

                      <div class="col-md-6">
                        <label>Đơn giá giảm giá</label>
                        <input
                          class="form-control"
                          type="text"
                          name="dongia_giam"
                          v-model="sanpham.dongia_giam"
                          v-if="khuyenmai.id =='' "
                          disabled
                        >
                        <input
                          class="form-control"
                          type="text"
                          name="dongia_giam"
                          v-model="sanpham.dongia_giam"
                          v-else
                        >
                        <span
                          v-for="(item,index) in erros"
                          :key="index"
                          v-if="erros.length>0"
                          style="color:red"
                        >{{item}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="addSanphamkhuyenmai(sanpham,khuyenmai)"
                    >Tạo</button>
                    <button type="button" class="btn btn-secondary" @click="closeModal">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endmodal -->
          </div>
        </div>
        <!-- /end.card -->
      </div>
    </div>
  </section>
</template>
<script>
$(()=>{
  var table = $("#tableKhuyenmai").DataTable({
        lengthChange: true,
        // buttons: ["copy", "excel", "pdf","print"]
        buttons: [
          {
            extend: "pdfHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          },
          {
            extend: "excelHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          },
          {
            extend: "print",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          }
        ]
      });

      table
        .buttons()
        .container()
        .appendTo("#tableKhuyenmai_wrapper .col-md-6:eq(0)");
})
export default {
  props: ["dskhuyenmai"],
  data() {
    return {
      khuyenmai: {
        id: ""
      },
      sanpham: {
        id: "",
        dongia: 0,
        dongia_giam: 0
      },
      sanphamkhuyenmai: [],
      danhsachchuakm: [],
      erros: []
    };
  },
  created() {
    this.getSanphamkhuyenmai();
    this.getSanphamchuakhuyenmai();
  },
  mounted() {},

  methods: {
    export() {
      var table = $("#tableKhuyenmai").DataTable({
        lengthChange: true,
        // buttons: ["copy", "excel", "pdf","print"]
        buttons: [
          {
            extend: "pdfHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          },
          {
            extend: "excelHtml5",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          },
          {
            extend: "print",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]
            }
          }
        ]
      });

      table
        .buttons()
        .container()
        .appendTo("#tableKhuyenmai_wrapper .col-md-6:eq(0)");
    },
    openModal() {
      $("#tableview").modal("show");
      this.erros = [];
      this.sanpham.id = "";
      this.sanpham.dongia = 0;
      this.sanpham.dongia_giam = 0;
      this.khuyenmai.id = "";
    },
    closeModal() {
      $("#tableview").modal("hide");
    },
    deleteSanphamkhuyenmai(item) {
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
            .delete("sanpham/xoa-san-pham-khuyen-mai/" + item.id)
            .then(response => {
              swal({
                position: "mid",
                type: "success",
                title: "Xoá thành công",
                showConfirmButton: false,
                timer: 1500
              });
              $("#tableKhuyenmai")
                .DataTable()
                .destroy();

              this.$nextTick(() => {
                this.getSanphamkhuyenmai2();
                this.getSanphamchuakhuyenmai();
              });
            });
        }
      });
    },
    addSanphamkhuyenmai(sanpham, khuyenmai) {
      this.erros = [];
      axios
        .post(
          "sanpham/them-san-pham-khuyen-mai/" + sanpham.id + "/" + khuyenmai.id,
          {
            sanpham: sanpham.id,
            khuyenmai: khuyenmai.id,
            dongia_giamgia: sanpham.dongia_giam
          }
        )
        .then(response => {
          // console.log(response.data.message);

          if (response.data.message == "Gỉam giá không lớn hơn đơn giá.") {
            this.erros.push(response.data.message);
          }
          if (this.erros.length == 0) {
            // this.danhsachtensanpham.splice(item.id, 1);
            $("#tableKhuyenmai")
              .DataTable()
              .destroy();
            this.sanphamkhuyenmai.push({
              id_sanpham: sanpham.id
            });
            this.$nextTick(() => {
              this.getSanphamkhuyenmai2();
              this.getSanphamchuakhuyenmai();
            });
          }
          $("#tableview").modal("hide");
          swal({
            position: "mid",
            type: "success",
            title: "Thêm thành công",
            showConfirmButton: false,
            timer: 1500
          });
        })

        .catch(erorr => {
          swal({
            position: "mid",
            type: "error",
            title: " loi",
            showConfirmButton: false,
            timer: 1500
          });
        });
    },
    updateSanphamkhuyenmai(item) {
      axios
        .post("sanpham/san-pham-khuyen-mai/" + item.id, {
          dongia_giamgia: item.dongia_giamgia,
          trangthai: item.trangthai
        })
        .then(response => {
          console.log(response.data.message);
          if (response.data.message == "Thất bại") {
            swal({
              position: "mid",
              type: "warning",
              title: "Lỗi",
              text: "Đơn giá giảm giá không lớn hơn đon giá!",
              showConfirmButton: false,
              timer: 1500
            });
          } else {
            item.isEdit = false;
            swal({
              position: "mid",
              type: "success",
              title: "Cập nhật thành công",
              showConfirmButton: false,
              timer: 1500
            });
          }
        })
        .then(() => {
          $("#tableKhuyenmai")
            .DataTable()
            .destroy();
          this.getSanphamkhuyenmai2();
          this.$nextTick(() => {
            
            this.getSanphamchuakhuyenmai();
          });
        })
        .catch(() => {
          swal({
            position: "mid",
            type: "error",
            title: "Dat hang loi",
            showConfirmButton: false,
            timer: 1500
          });
        });
    },
    getSanphamkhuyenmai() {
      axios
        .get("sanpham/san-pham-khuyen-mai")
        .then(response => {
          console.log(response.data);
          this.sanphamkhuyenmai = response.data;
          this.sanphamkhuyenmai.forEach(item => {
            Vue.set(item, "isEdit", false);
          });
        })
        .then(() => {
          
        })
        .catch(erros => {});
    },
    getSanphamkhuyenmai2() {
      axios
        .get("sanpham/san-pham-khuyen-mai")
        .then(response => {
          console.log(response.data);
          this.sanphamkhuyenmai = response.data;
          this.sanphamkhuyenmai.forEach(item => {
            Vue.set(item, "isEdit", false);
          });
        })
        .then(() => {
          this.export();
        })
        .catch(erros => {});
    },
    getSanphamchuakhuyenmai() {
      axios
        .get("sanpham/san-pham-chua-khuyen-mai")
        .then(response => {
          console.log(response.data);
          this.danhsachchuakm = response.data;
          // this.sanphamkhuyenmai.forEach(item => {
          //   Vue.set(item, "isEdit", false);
          // });
        })
        .then(() => {
          // $("#tableKhuyenmai").DataTable();
        })
        .catch(erros => {});
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