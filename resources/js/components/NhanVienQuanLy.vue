<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div>&nbsp;</div>
          <div style="text-align:right;  margin-right: 30px;">
            <button type="button" class="btn btn-primary" id="them" @click="openAdd">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm nhân viên
            </button>
          </div>
          <div class="card-body">
            <!-- table-->
            <table
              id="tablenhanvienquanly"
              class="table table-bordered table-hover dataTable"
              border="0"
            >
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tên nhân viên</th>
                  <th>Vai trò</th>
                  <th>Email</th>
                  <th>Giới tính</th>
                  <th>Địa chỉ</th>
                  <th>SĐT</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in danhsachnhanvienquanly" :key="index">
                  <td>{{item.id}}</td>
                  <td>{{item.name}}</td>
                  <td>
                    <span class="badge badge-success" v-if="item.level == 3">{{item.vaitro}}</span>
                    <span class="badge badge-info" v-if="item.level == 4">{{item.vaitro}}</span>
                    <span class="badge badge-primary" v-if="item.level == 5">{{item.vaitro}}</span>
                  </td>
                  <td>
                    <span class="badge badge-success">{{item.email}}</span>
                  </td>
                  <td v-if="item.gioitinh==0">Nam</td>
                  <td v-else>Nữ</td>

                  <td>{{item.diachi}}</td>
                  <td>{{item.sdt}}</td>
                  <td>
                    <button type="button" class="btn btn-success" @click="openEdit(item)">
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="DeleteNhanVien(item,index)"
                    >
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- model  -->
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
                    <!-- <span style="color:red" v-for="(item,index) in errors" :key="index">
                      {{item}}
                    
                    </span>-->
                    <div class="form-group">
                      <label>Tên nhân viên</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Tên nhân viên"
                        v-model="nhanvien.name"
                      >
                    </div>

                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa nhập tên nhân viên'"
                    >{{item}}</span>

                    <div class="form-group">
                      <label>Email</label>
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        v-model="nhanvien.email"
                      >
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Sai định dạng email'||item=='Email đã tồn tại'||item=='Chưa nhập email'"
                    >{{item}}</span>
                    <div class="form-group">
                      <label>Vai trò</label>
                      <br>
                      <span>
                        <input type="radio" value="3" v-model="nhanvien.level">
                        Nhân viên hô trợ khách hàng
                      </span>
                      <br>
                      <span>
                        <input type="radio" value="4" v-model="nhanvien.level">
                        Nhân viên quản lý đơn hàng
                      </span>
                      <br>
                      <span>
                        <input type="radio" value="5" v-model="nhanvien.level">
                        Nhân viên quản lý sản phẩm
                      </span>
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa chọn vai trò'"
                    >{{item}}</span>
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
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa chọn giới tính'"
                    >{{item}}</span>
                    <div class="form-group">
                      <label>Địa chỉ</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Địa chỉ"
                        v-model="nhanvien.diachi"
                      >
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa nhập địa chỉ'"
                    >{{item}}</span>
                    <div class="form-group">
                      <label>Số điện thoại</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số diện thoại"
                        v-model="nhanvien.sdt"
                      >
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa nhập số điện thoại'||item=='Số điện thoại phải 10 số'"
                    >{{item}}</span>
                    <div class="form-group">
                      <label>Mật khẩu</label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Mật khẩu"
                        v-model="nhanvien.password"
                      >
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa nhập mật khẩu'"
                    >{{item}}</span>
                    <div class="form-group">
                      <label>Xác nhận mật mẩu</label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Xác nhận mật khẩu"
                        v-model="nhanvien.configpassword"
                      >
                    </div>
                    <span
                      style="color:red"
                      v-for="(item,index) in errors"
                      :key="index"
                      v-if="item=='Chưa nhập xác nhận mật khẩu'||item=='Mật khẩu xác nhận không đúng'"
                    >{{item}}</span>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="AddNhanVien">Tạo</button>
                    <button type="button" class="btn btn-secondary" @click="close">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endmodal -->
            <!-- end-model add -->
            <!-- endtable  -->
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
                        v-model="nhanvienadd.name"
                      >
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Email"
                        v-model="nhanvienadd.email"
                        disabled
                      >
                    </div>
                    <div class="form-group">
                      <label>Vai trò</label>
                      <br>
                      <span>
                        <input type="radio" value="3" v-model="nhanvienadd.level">
                        Nhân viên hô trợ khách hàng
                      </span>
                      <br>
                      <span>
                        <input type="radio" value="4" v-model="nhanvienadd.level">
                        Nhân viên quản lý đơn hàng
                      </span>
                      <br>
                      <span>
                        <input type="radio" value="5" v-model="nhanvienadd.level">
                        Nhân viên quản lý sản phẩm
                      </span>
                    </div>
                    <div class="form-group">
                      <label>Giới tính</label>
                      <br>
                      <span>
                        Nam
                        <input type="radio" value="0" v-model="nhanvienadd.gioitinh">
                      </span>
                      <span>
                        Nữ
                        <input type="radio" value="1" v-model="nhanvienadd.gioitinh">
                      </span>
                    </div>
                    <div class="form-group">
                      <label>Địa chỉ</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Địa chỉ"
                        v-model="nhanvienadd.diachi"
                      >
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số diện thoại"
                        v-model="nhanvienadd.sdt"
                      >
                    </div>
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="Doimatkhau"
                    >Thay mật khẩu mới</button>
                    <div class="doimatkhau">
                      <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Mật khẩu mới"
                          v-model="nhanvienadd.password"
                        >
                      </div>
                      <div class="form-group">
                        <label>Xác nhận mật mẩu mới</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Xác nhận mật khẩu mới"
                          v-model="nhanvienadd.configpassword"
                        >
                      </div>
                      <!-- end doi mat khau -->
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="UpdateNhanVien(this.nhanvienadd)"
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
  var table = $("#tablenhanvienquanly").DataTable({
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
    .appendTo("#tablenhanvienquanly_wrapper .col-md-6:eq(0)");
});
export default {
  data() {
    return {
      nhanvien: {
        name: "",
        email: "",
        level: "",
        diachi: "",
        gioitinh: "",
        sdt: "",
        password: "",
        configpassword: ""
      },
      nhanvienadd: {},
      danhsachnhanvienquanly: [],
      errors: []
    };
  },
  created() {
    this.getDanhsachnhanvienquanly();
  },
  methods: {
    Doimatkhau() {
      $(".doimatkhau").collapse("toggle");
    },
    DeleteNhanVien(item, index) {
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
          axios.put("xoa-vien-quan-ly/" + item.id).then(response => {
            this.danhsachnhanvienquanly.splice(index, 1);
            swal({
              position: "mid",
              type: "success",
              title: "Xoá thành công.",
              showConfirmButton: false,
              timer: 1500
            });

            $("#tablenhanvienquanly")
              .DataTable()
              .destroy();

            this.getDanhsachnhanvienquanly2();
          });
        }
      });
    },
    UpdateNhanVien(item) {
      this.errors = [];
      axios
        .put("cap-nhat-vien-quan-ly/" + item.id, {
          name: item.name,
          email: item.email,
          level: item.level,
          diachi: item.diachi,
          gioitinh: item.gioitinh,
          sdt: item.sdt,
          password: item.password,
          configpassword: item.configpassword
        })
        .then(response => {
          swal({
            position: "mid",
            type: "success",
            title: "Cập nhật thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tableedit").modal("hide");

          // $("#tablenhanvienquanly")
          //   .DataTable()
          //   .destroy();

          this.getDanhsachnhanvienquanly2();
        })
        .catch(erros => {});
    },
    AddNhanVien() {
      this.errors = [];
      axios
        .post("them-nhan-vien-quan-ly", {
          name: this.nhanvien.name,
          email: this.nhanvien.email,
          level: this.nhanvien.level,
          diachi: this.nhanvien.diachi,
          gioitinh: this.nhanvien.gioitinh,
          sdt: this.nhanvien.sdt,
          password: this.nhanvien.password,
          configpassword: this.nhanvien.configpassword
        })
        .then(response => {
          swal({
            position: "mid",
            type: "success",
            title: "Tạo thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tableadd").modal("hide");

          $("#tablenhanvienquanly")
            .DataTable()
            .destroy();

          this.getDanhsachnhanvienquanly2();
        })
        .catch(erros => {
          if (erros.response.data.errors.name) {
            this.errors.push(erros.response.data.errors.name[0]);
          }
          if (erros.response.data.errors.email) {
            this.errors.push(erros.response.data.errors.email[0]);
          }
          if (erros.response.data.errors.password) {
            this.errors.push(erros.response.data.errors.password[0]);
          }
          if (erros.response.data.errors.level) {
            this.errors.push(erros.response.data.errors.level[0]);
          }
          if (erros.response.data.errors.diachi) {
            this.errors.push(erros.response.data.errors.diachi[0]);
          }
          if (erros.response.data.errors.gioitinh) {
            this.errors.push(erros.response.data.errors.gioitinh[0]);
          }
          if (erros.response.data.errors.sdt) {
            this.errors.push(erros.response.data.errors.sdt[0]);
          }
          if (erros.response.data.errors.configpassword) {
            this.errors.push(erros.response.data.errors.configpassword[0]);
          }
        });
    },
    openEdit(item) {
      $(".doimatkhau").collapse("dispose");
      $("#tableedit").modal("show");
      this.nhanvienadd = item;
    },
    close() {
      this.errors = [];
      $("#tableadd").modal("hide");
      $("#tableedit").modal("hide");
    },
    openAdd() {
      this.errors = [];
      this.nhanvien.name = "";
      this.nhanvien.email = "";
      this.nhanvien.vaitro = "";
      this.nhanvien.diachi = "";
      this.nhanvien.gioitinh = "";
      this.nhanvien.sdt = "";

      $("#tableadd").modal("show");
    },
    export() {
      var table = $("#tablenhanvienquanly").DataTable({
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
        .appendTo("#tablenhanvienquanly_wrapper .col-md-6:eq(0)");
    },
    getDanhsachnhanvienquanly() {
      axios
        .get("nhan-vien-quan-ly")
        .then(response => {
          this.danhsachnhanvienquanly = response.data;
        })
        .then(() => {
          // this.export();
        });
    },
    getDanhsachnhanvienquanly2() {
      axios
        .get("nhan-vien-quan-ly")
        .then(response => {
          this.danhsachnhanvienquanly = response.data;
        })
        .then(() => {
          this.export();
        });
    }
  }
};
</script>