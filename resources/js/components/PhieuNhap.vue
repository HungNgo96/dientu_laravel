<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div>&nbsp;</div>
          <div style="text-align:right;  margin-right: 30px;">
            <button type="button" class="btn btn-primary" id="them" @click="openModalThem">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm phiếu nhập
            </button>
            <button type="button" class="btn btn-success" @click="openModalImport">
              <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Import excel
            </button>

            <div class="modal" id="modalImport">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header" style="background-color:#28a745">
                    <h4 class="modal-title">Import Excel</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>

                  <!-- Modal body -->
                  <form
                    v-on:submit.prevent="submitForm"
                    method="post"
                    enctype="multipart/form-data"
                  >
                    <div class="modal-body">
                      <div class="form-group text-left">
                        <label>Chọn file excel</label>
                        <br>
                        <input class="form-control excel" type="file" ref="file" name="file">
                        <span style="color:red" v-if="erros!=''">{{erros}}</span>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Xác nhận</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tablePhieunhap" class="table table-bordered table-hover" style="width:100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tên sản phẩm</th>

                  <th>Gía nhập</th>
                  <th>Gía bán</th>
                  <th>Số lượng</th>
                  <th>Ngày nhập</th>

                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in danhsachphieunhap" :key="index">
                  <td>{{item.id}}</td>
                  <td>{{item.sanpham.tensp}}</td>

                  <td>{{formatPrice(item.gianhap)}} VND</td>
                  <td>{{formatPrice(item.giaban)}} VND</td>
                  <td>{{(item.soluong)}}</td>
                  <td>{{item.ngaynhap}}</td>
                  <!-- <td>
                    <button type="button" class="btn btn-success">
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger">
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-info" @click="print">
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>-->
                </tr>
              </tbody>
            </table>
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
                    <h5 class="modal-title" id="tableadd">Thêm phiếu nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- <span style="color:red" v-for="(item,index) in errors" :key="index">{{item}}<br></span> -->
                    <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <select class="form-control" v-model="phieunhap.id_sanpham" required>
                        <option value>Chọn sản phẩm nhập</option>
                        <option
                          v-for="(item,index) in danhsachsanpham"
                          :key="index"
                          :value="item.id"
                        >{{item.tensp}}</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Số lượng</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số lượng"
                        v-model="phieunhap.soluong"
                        v-if="phieunhap.id_sanpham== ''"
                        disabled
                      >
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Số lượng"
                        v-model="phieunhap.soluong"
                        v-else
                      >
                    </div>
                    <div class="form-group">
                      <label>Giá nhập</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Giá nhập"
                        v-model="phieunhap.gianhap"
                        v-if="phieunhap.id_sanpham== ''"
                        disabled
                      >
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Giá nhập"
                        v-model="phieunhap.gianhap"
                        v-else
                      >
                    </div>
                    <div class="form-group">
                      <label>Giá bán</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Giá bán"
                        v-model="phieunhap.giaban"
                        v-if="phieunhap.id_sanpham== ''"
                        disabled
                      >
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Giá bán"
                        v-model="phieunhap.giaban"
                        v-else
                      >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      v-if="phieunhap.id_sanpham== '' || phieunhap.gianhap=='' || phieunhap.giaban=='' || phieunhap.soluong=='' "
                      disabled
                    >Tạo</button>
                    <button
                      type="button"
                      class="btn btn-primary"
                      v-else
                      @click="postPhieunhap(phieunhap)"
                    >Tạo</button>
                    <button type="button" class="btn btn-secondary" @click="closeModalThem">Huỷ</button>
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
  var table = $("#tablePhieunhap").DataTable({
    lengthChange: true,
    // buttons: ["copy", "excel", "pdf","print"]
    buttons: [
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
        }
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
        }
      },
      {
        extend: "print",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
        }
      }
    ]
  });

  table
    .buttons()
    .container()
    .appendTo("#tablePhieunhap_wrapper .col-md-6:eq(0)");
});
export default {
  data() {
    return {
      danhsachphieunhap: [],
      danhsachsanpham: [],
      phieunhap: {
        id: "",
        id_sanpham: "",
        gianhap: "",
        giaban: "",
        soluong: "",
        ngaynhap: ""
      },
      fileName: "",
      erros: "",
      loi:'',
    };
  },
  created() {
    this.getDanhsachphieunhap();
  },

  methods: {
    submitForm() {
      this.erros = "";
      this.formData = new FormData();
      this.loi = "";
      // this.formData.append("name", this.$refs.file.files[0].type);
      this.formData.append("file", this.$refs.file.files[0]);
      // console.log(this.$refs.file.files[0].type);
      axios
        .post("import-excel-phieu-nhap", this.formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.loi = response.data.message;
          console.log(response.data.message);
          
          $("#modalImport").modal("hide");
          swal({
            position: "mid",
            type: "success",
            title: "Import excel thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tablePhieunhap")
            .DataTable()
            .destroy();
          this.getDanhsachphieunhap2();
        })
        .catch(error => {
          if (error.response.data.errors.file) {
            this.erros = error.response.data.errors.file[0];
          }
        });
    },
    export() {
      var table = $("#tablePhieunhap").DataTable({
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
        .appendTo("#tablePhieunhap_wrapper .col-md-6:eq(0)");
    },
    openModalImport() {
      this.erros = "";
      $(".excel").val("");
      $("#modalImport").modal("show");
    },
    print() {
      window.print();
    },
    closeModalThem() {
      $("#tableadd").modal("hide");
    },
    openModalThem() {
      $("#tableadd").modal("show");
      this.phieunhap.id = "";
      this.phieunhap.id_sanpham = "";
      this.phieunhap.gianhap = "";
      this.phieunhap.giaban = "";
      this.phieunhap.soluong = "";
      this.phieunhap.ngaynhap = "";
    },
    postPhieunhap(phieunhap) {
      axios
        .post("them-phieu-nhap", {
          sanpham: phieunhap.id_sanpham,
          gianhap: phieunhap.gianhap,
          giaban: phieunhap.giaban,
          soluong: phieunhap.soluong
        })
        .then(() => {
          $("#tablePhieunhap")
            .DataTable()
            .destroy();
          this.getDanhsachphieunhap2();
        });
    },
    getDanhsachphieunhap() {
      axios
        .get("lay-phieu-nhap")
        .then(response => {
          console.log(response.data);
          this.danhsachphieunhap = response.data.phieunhap;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {});
    },
    getDanhsachphieunhap2() {
      axios
        .get("lay-phieu-nhap")
        .then(response => {
          console.log(response.data);
          this.danhsachphieunhap = response.data.phieunhap;
          this.danhsachsanpham = response.data.sanpham;
        })
        .then(() => {
          this.export();
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