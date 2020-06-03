<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div>&nbsp;</div>
          <div style="text-align:right;  margin-right: 30px;">
            <button @click="openModal" type="button" class="btn btn-primary" id="them">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm khuyến mãi
            </button>
          </div>
          <div class="card-body">
            <table id="tableNoidungkm" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Chủ đề khuyến mãi</th>
                  <th>Nội dung</th>
                  <th>Ngày tạo</th>
                  <th>Ngày cập nhật</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in danhsachkm" :key="index">
                  <td>{{item.id}}</td>
                  <td>{{item.tenkhuyenmai}}</td>
                  <td>{{item.noidung}}</td>
                  <td>{{(item.ngaytao)}}</td>
                  <td>{{item.ngaycapnhat}}</td>
                  <td>
                    <button type="button" class="btn btn-success" @click="openModalEdit(item)">
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="deleteNoidungkhuyenmai(item,index)"
                    >
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div
              class="modal fade"
              id="tableview"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tableview"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#007bff">
                    <h5 class="modal-title" id="tableview">Thêm khuyến mãi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Chủ đề khuyến mãi</label>
                        <input
                          class="form-control"
                          type="text"
                          placeholder="Nhập chủ đề"
                          name="dongia"
                          v-model="khuyenmai.chude"
                        >
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Nội dung</label>
                        <textarea
                          class="form-control"
                          placeholder="Nhập nội dung"
                          v-model="khuyenmai.noidung"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="addNoidungkhuyenmai(khuyenmai)"
                    >Tạo</button>
                    <button type="button" class="btn btn-secondary" @click="closeModal">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endmodal -->
            <!-- modal edit -->
            <div
              class="modal fade"
              id="tableedit"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tableedit"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#28a745">
                    <h5 class="modal-title" id="tableedit">Cập nhật khuyến mãi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Chủ đề khuyến mãi</label>
                        <input
                          class="form-control"
                          type="text"
                          placeholder="Nhập chủ đề"
                          name="dongia"
                          v-model="editkhuyenmai.chude"
                        >
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Nội dung</label>
                        <textarea
                          class="form-control"
                          placeholder="Nhập nội dung"
                          v-model="editkhuyenmai.noidung"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="updateNoidungkhuyenmai(editkhuyenmai)"
                    >Cập nhật</button>
                    <button type="button" class="btn btn-secondary" @click="closeModalEdit">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end model edit -->
          </div>
          <!-- end-cart body -->
        </div>
      </div>
    </div>
    <!-- {{moment().startOf(item.ngaybatdau).fromNow()}||{{moment().endOf(item.ngaybatdau).fromNow()}}||{{moment().startOf(item.ngaybatdau).fromNow()}}
    {{moment(item.ngayketthuc).diff(item.ngaybatdau,'days')}||{{moment().diff(item.ngaybatdau,'days')}}-->
  </section>
</template>

<script>
$(() => {
  var table = $("#tableNoidungkm").DataTable({
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
    .appendTo("#tableNoidungkm_wrapper .col-md-6:eq(0)");
});
export default {
  data() {
    return {
      danhsachkm: [],
      khuyenmai: {
        chude: "",
        noidung: ""
      },
      editkhuyenmai: {
        id: "",
        chude: "",
        noidung: ""
      }
    };
  },
  created() {
    this.getDanhsachkm();
  },
  methods: {
    export() {
      var table = $("#tableNoidungkm").DataTable({
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
        .appendTo("#tableNoidungkm_wrapper .col-md-6:eq(0)");
    },

    closeModalEdit() {
      $("#tableedit").modal("hide");
    },
    openModalEdit(khuyenmai) {
      this.editkhuyenmai.chude = khuyenmai.tenkhuyenmai;
      this.editkhuyenmai.noidung = khuyenmai.noidung;
      this.editkhuyenmai.id = khuyenmai.id;
      $("#tableedit").modal("show");
      this.erros = [];
    },
    closeModal() {
      $("#tableview").modal("hide");
    },
    openModal() {
      this.khuyenmai.chude = "";
      this.khuyenmai.noidung = "";
      $("#tableview").modal("show");
      this.erros = [];
    },
    getDanhsachkm() {
      axios
        .get("lay-noi-dung-khuyen-mai")
        .then(response => {
          this.danhsachkm = response.data;
        })
        .then(() => {});
    },
    getDanhsachkm2() {
      axios
        .get("lay-noi-dung-khuyen-mai")
        .then(response => {
          this.danhsachkm = response.data;
        })
        .then(() => {
          this.export();
        });
    },
    updateNoidungkhuyenmai(khuyenmai) {
      axios
        .put("capnhat-noi-dung-khuyen-mai/" + khuyenmai.id, {
          chude: this.editkhuyenmai.chude,
          noidung: this.editkhuyenmai.noidung
        })
        .then(() => {
          $("#tableedit").modal("hide");
          swal({
            position: "top-end",
            type: "success",
            title: "Cật nhât thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tableNoidungkm")
            .DataTable()
            .destroy();
          this.getDanhsachkm2();
        });
    },
    deleteNoidungkhuyenmai(khuyenmai, index) {
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
            .delete("xoa-noi-dung-khuyenmai/" + khuyenmai.id)
            .then(response => {
              console.log(response.data.count);
              if (response.data.count > 0) {
                swal({
                  position: "mid",
                  type: "warning",
                  title: "Nội dung đang khuyến mãi không thể xoá.",
                  showConfirmButton: false,
                  timer: 1500
                });
              } else {
                this.danhsachkm.splice(index, 1);
                swal({
                  position: "mid",
                  type: "success",
                  title: "Xoá thành công.",
                  showConfirmButton: false,
                  timer: 1500
                });
                $("#tableNoidungkm")
                  .DataTable()
                  .destroy();
                this.getDanhsachkm2();
              }
            });
        }
      });
    },
    addNoidungkhuyenmai(khuyenmai) {
      axios
        .post("them-noi-dung-khuyenmai", {
          chude: khuyenmai.chude,
          noidung: khuyenmai.noidung
        })
        .then(erorr => {
          $("#tableview").modal("hide");
          this.danhsachkm.push({
            noidung: khuyenmai.noidung
          });
          swal({
            position: "top-end",
            type: "success",
            title: "Tạo thành công.",
            showConfirmButton: false,
            timer: 1500
          });

          $("#tableNoidungkm")
            .DataTable()
            .destroy();
          this.getDanhsachkm2();
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