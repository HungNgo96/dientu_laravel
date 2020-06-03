<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- table-->
            <table id="tabledoitra" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Khách hàng</th>
                  <th>Sản phẩm</th>
                  <th>Đơn hàng</th>
                  <th>Nội dung</th>
                  <th>Số lượng đổi trả</th>
                  <th>Tình trạng</th>
                  <th>Ngày yêu cầu</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in danhsachtrahang" :key="index">
                  <td>{{item.id}}</td>
                  <td>{{item.user.name}}</td>
                  <td>{{item.sanpham.tensp}}</td>
                  <td>{{item.donhang.id}} </td>
                  <!-- <td>
                    <span class="badge badge-success">Hoàn thành</span>
                  </td> -->
                  <td><span class="badge badge-success">{{item.noidung}}</span></td>
                  <td>{{item.soluong}}</td>
                   <td><span class="badge badge-success">{{item.tinhtrang}}</span></td>
                  <td>{{item.ngaytra}}</td>
                  
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
                      <!-- <tbody>
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
                      </tbody>-->
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
$(() => {
  var table = $("#tabledoitra").DataTable({
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
    .appendTo("#tabledoitra_wrapper .col-md-6:eq(0)");
});
export default {
  data() {
    return {
      danhsachtrahang:[],
    };
  },
  created() {
    this.getDanhsachtrahang();
  },
  methods: {
    getDanhsachtrahang() {
      axios.get('tra-hang')
      .then((response)=>{
        this.danhsachtrahang = response.data;
      })
    },
    exit() {
      $("#tableview").modal("hide");
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