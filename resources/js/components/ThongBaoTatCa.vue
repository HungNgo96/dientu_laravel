<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div>&nbsp;</div>
          <div>
            <button
              style="margin-left:25px"
              type="button"
              class="btn btn-primary"
              id="them"
              @click="xoaLichsu"
            >
              <i class="nav-icon fa fa-refresh"></i>&nbsp;&nbsp; Xoá lịch sử đơn hàng
            </button>
          </div>
          <div class="card-body">
            <!-- table-->
            <table id="tablethongbao" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>Nội dung thông báo</th>
                  <th>Ngày xem</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in orderThongbao " :key="index">
                  <td>Khách hàng {{item.data.user.name}} mới vừa đặt hàng lúc {{moment(item.created_at).format('hh:mm:ss DD-MM-YYYY')}}</td>

                  <td>{{moment(item.read_at).format('hh:mm:ss DD-MM-YYYY ')}}</td>
                  <!-- <td>
                    <a :href="xemdonhangthongbao + '/' + item.data.donhang.id">
                      <button type="button" class="btn btn-info">
                        <i class="nav-icon fa fa-eye"></i>
                      </button>
                    </a>
                  </td>-->
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
$(document).ready(() => {
  $("#tablethongbao").DataTable();
});
// $(document).ready(function(){
//  $("#tablethongbao").DataTable();
// })
export default {
  props: ["datathongbao", "sanpham", "xemdonhangthongbao"],
  data() {
    return {};
  },
  created() {},
  computed: {
    orderThongbao: function() {
      return _.orderBy(this.datathongbao, "create_at", "desc");
    }
  },
  methods: {
    xoaLichsu() {
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

          axios.delete("xoa-thong-bao").then(() => {
            window.location.reload();
          });
           swal({
                position: "mid",
                type: "success",
                title: "Xoá lịch sử thành công",
                showConfirmButton: false,
                timer: 1500
              });
        }
        
      });
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