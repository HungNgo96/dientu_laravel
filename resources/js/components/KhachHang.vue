<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div>&nbsp;</div>
                    <div style="text-align:right;  margin-right: 30px;">
                        <button  type="button" class="btn btn-primary" id="them"  >
                            <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm nhân viên
                        </button>
          </div>-->
          <div class="card-body">
            <!-- table-->
            <table
              id="tablekhachhang"
              class="table table-bordered table-hover dataTable"
              border="0"
            >
              <thead>
                <tr>
                  <th>id</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Giới tính</th>
                  <th>Vai trò</th>
                  <th>Địa chỉ</th>
                  <th>SĐT</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(khachhang,index) in danhsachkhachang" :key="index">
                  <td>{{khachhang.id}}</td>
                  <td>{{khachhang.name}}</td>
                  <td>
                    <span class="badge badge-success">{{khachhang.email}}</span>
                  </td>
                  <td v-if="khachhang.gioitinh==0">Nam</td>
                  <td v-else>Nữ</td>
                  <td>{{khachhang.vaitro}}</td>
                  <td>{{khachhang.diachi}}</td>
                  <td>{{khachhang.sdt}}</td>
                </tr>
              </tbody>
            </table>
            <!-- endtable  -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
$(()=>{
  var table = $("#tablekhachhang").DataTable({
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
        .appendTo("#tablekhachhang_wrapper .col-md-6:eq(0)");
})
export default {
  data() {
    return {
      khachhang: {
        name: "",
        email: "",
        vaitro: "",
        diachi: "",
        gioitinh: "",
        sdt: ""
      },
      danhsachkhachang: []
    };
  },
  created() {
    this.getDanhsachkhachang();
  },
  methods: {
    export() {
      var table = $("#tablekhachhang").DataTable({
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
        .appendTo("#tablekhachhang_wrapper .col-md-6:eq(0)");
    },
    getDanhsachkhachang() {
      axios
        .get("index")
        .then(response => {
          this.danhsachkhachang = response.data;
        })
        .then(() => {
          // this.export();
        });
    }
  }
};
</script>