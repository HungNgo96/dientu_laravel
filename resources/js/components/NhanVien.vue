<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div>&nbsp;</div>
          <div style="text-align:right;  margin-right: 30px;">
            <button type="button" class="btn btn-primary" id="them" @click="addNhanvien">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm nhân viên
            </button>
          </div>
          <div class="card-body">
            <!-- table-->
            <table id="tablenhanvien" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tên nhân viên</th>
                  <th>Giới tính</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(nhanvien,index) in danhsachnhanvien" :key="index">
                  <td>{{nhanvien.id}}</td>
                  <td>{{nhanvien.tennv}}</td>
                  <td v-if="nhanvien.gioitinh==0">Nam</td>
                  <td v-else>Nữ</td>
                  <td>{{nhanvien.sdt}}</td>
                  <td>{{nhanvien.diachi}}</td>
                  <td>
                    <button type="button" class="btn btn-success" @click="editNhanvien(nhanvien)">
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="deleteNhanvien(nhanvien,index)"
                    >
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
            <!-- modal -->
            <div
              class="modal fade"
              id="tableadd"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tableadd"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#007bff">
                    <h5 class="modal-title" id="tableadd">Thêm nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <span style="color:red" v-for="(item,index) in errors" :key="index">
                      {{item}}
                      <br>
                    </span>
                    <div class="form-group">
                      <label>Tên nhân viên</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Tên nhân viên"
                        v-model="nhanvien.tennv"
                      >
                    </div>
                    <div class="form-group">
                      <label>Giới tính</label>
                      <br>
                      <span>
                        Nam
                        <input type="radio" value="0" v-model="nhanvien.gioitinh">
                      </span>
                      <span>
                        Nữ
                        <input type="radio" value="1" v-model="nhanvien.gioitinh">
                      </span>
                    </div>
                    <div class="form-group">
                      <label>Địa chỉ</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Địa chỉ"
                        v-model="nhanvien.diachi"
                      >
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số diện thoại"
                        v-model="nhanvien.sdt"
                      >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="createNhanvien">Tạo</button>
                    <button type="button" class="btn btn-secondary" @click="close">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endmodal -->
            <!-- modal edit  -->
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
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#28a745">
                    <h5 class="modal-title" id="tableedit">Cập nhật nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <span style="color:red" v-if="errors.length>0">{{errors}}</span>
                    <div class="form-group">
                      <label>Tên nhân viên</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Tên nhân viên"
                        v-model="nhanvien.tennv"
                      >
                    </div>
                    <div class="form-group">
                      <label>Giới tính</label>
                      <br>
                      <span>
                        Nam
                        <input type="radio" value="0" v-model="nhanvien.gioitinh">
                      </span>
                      <span>
                        Nữ
                        <input type="radio" value="1" v-model="nhanvien.gioitinh">
                      </span>
                    </div>
                    <div class="form-group">
                      <label>Địa chỉ</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Địa chỉ"
                        v-model="nhanvien.diachi"
                      >
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số diện thoại"
                        v-model="nhanvien.sdt"
                      >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="updateNhanvien(nhanvien)"
                    >Cập nhật</button>
                    <button type="button" class="btn btn-secondary" @click="close">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal edit -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
$(() => {
  var table = $("#tablenhanvien").DataTable({
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
    .appendTo("#tablenhanvien_wrapper .col-md-6:eq(0)");
});
export default {
  data() {
    return {
      nhanvien: {
        tennv: "",
        gioitinh: "",
        sdt: "",
        diachi: ""
      },
      errors: [],
      danhsachnhanvien: []
    };
  },
  created() {
    this.getDanhsachnhanvien();
  },
  methods: {
    export() {
      var table = $("#tablenhanvien").DataTable({
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
        .appendTo("#tablenhanvien_wrapper .col-md-6:eq(0)");
    },
    editNhanvien(nhanvien) {
      $("#tableedit").modal("show");
      this.nhanvien = nhanvien;
      this.errors = [];
    },
    updateNhanvien(nhanvien) {
      axios
        .put("update/" + nhanvien.id, {
          tennv: this.nhanvien.tennv,
          gioitinh: this.nhanvien.gioitinh,
          sdt: this.nhanvien.sdt,
          diachi: this.nhanvien.diachi
        })
        .then(response => {
          swal({
            position: "mid",
            type: "success",
            title: "Cập nhật thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tablenhanvien")
            .DataTable()
            .destroy();

          this.getDanhsachnhanvien2();
          $("#tableedit").modal("hide");
        })
        .catch(erro => {
          this.errors = [];
          this.errors = erro.response.data.errors.sdt[0];
        });
    },
    deleteNhanvien(nhanvien, index) {
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
            .delete("delete/" + nhanvien.id)
            .then(response => {
              if (response.data.count > 0) {
                // console.log(response.data.result);
                swal({
                  position: "mid",
                  type: "warning",
                  text: "Nhân viên đang giao hàng.",
                  showConfirmButton: false,
                  timer: 1500
                });
              } else {
                swal({
                  position: "mid",
                  type: "success",
                  title: "Xoá thành công.",
                  showConfirmButton: false,
                  timer: 1500
                });
                // console.log(response.data.result);
                this.danhsachnhanvien.splice(index, 1);
              }
              $("#tablenhanvien")
                .DataTable()
                .destroy();
            })
            .then(() => {
              this.getDanhsachnhanvien2();
            })
            .catch(error => {
              // this.errors = error.response.data.errors.name
            });
        }
      });
    },
    createNhanvien() {
      axios
        .post("add", {
          tennv: this.nhanvien.tennv,
          gioitinh: this.nhanvien.gioitinh,
          sdt: this.nhanvien.sdt,
          diachi: this.nhanvien.diachi
        })
        .then(() => {
          $("#tablenhanvien")
            .DataTable()
            .destroy();
          $("#tableadd").modal("hide");
          this.getDanhsachnhanvien2();
        })

        .then(() => {
           swal({
            position: "mid",
            type: "success",
            text: "Tạo thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          
        })
        .catch(error => {
          this.errors = [];
          if (error.response.data.errors.sdt) {
            this.errors.push(error.response.data.errors.sdt[0]);
          }
          if (error.response.data.errors.gioitinh) {
            this.errors.push(error.response.data.errors.gioitinh[0]);
          }
          if (error.response.data.errors.tennv) {
            this.errors.push(error.response.data.errors.tennv[0]);
          }
          if (error.response.data.errors.diachi) {
            this.errors.push(error.response.data.errors.diachi[0]);
          }
        });
    },
    close() {
      $("#tableadd").modal("hide");
      $("#tableedit").modal("hide");
      this.$nextTick(function() {
        this.getDanhsachnhanvien();
      });
    },
    addNhanvien() {
      $("#tableadd").modal("show");
      this.nhanvien.tennv = "";
      this.nhanvien.gioitinh = "";
      this.nhanvien.sdt = "";
      this.nhanvien.diachi = "";
      this.errors = [];
    },
    getDanhsachnhanvien() {
      axios
        .get("index")
        .then(response => {
          this.danhsachnhanvien = response.data;
        })
        .then(() => {});
    },
    getDanhsachnhanvien2() {
      axios
        .get("index")
        .then(response => {
          this.danhsachnhanvien = response.data;
        })
        .then(() => {
          this.export();
        });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
