<template>
  <div>
    <div class="table-responsive">
      <table class="display nowrap" id="table">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>

            <th>Số lượng chi tiết</th>
            <th>Tổng tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,index) in choduyet" :key="index">
            <td>{{item.id}}</td>

            <td>{{item.chitietdonhang_count}}</td>
            <td>{{formatPrice(item.tongtien)}} VND</td>
            <td>
              <button
                class="btn-info"
                type="button"
                @click="openModalChoDuyet(item.chitietdonhang)"
              >
                <li class="fa fa-eye"></li>
              </button>
              <button class="btn-danger" type="button" @click="huydonhang(item.id,index)">
                <li class="fa fa-trash"></li>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="modal-choduyet">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#5bc0de">
            <h4 class="modal-title">Chi tiết đơn hàng</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table" id="table-chitiet">
                <thead>
                  <tr>
                    <th>Mã</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item,index) in danhsachchitiet" :key="index">
                    <td>{{item.id}}</td>
                    <td>{{item.id_donhang}}</td>
                    <td
                      v-for="(item_sanpham,index) in sanpham"
                      :key="index"
                      v-if="item_sanpham.id == item.id_sanpham"
                    >{{item_sanpham.tensp}}</td>
                    <td v-if="!item.isEdit">{{item.soluong}}</td>
                    <td v-else>
                      <input width="50" type="number" v-model.number="item.soluong">
                    </td>
                    <td>{{formatPrice(item.dongia)}} VND</td>
                    <td v-if="!item.isEdit">
                      <button class="btn-success" type="button" @click="item.isEdit=true">
                        <li class="fa fa-edit"></li>
                      </button>
                      <button class="btn-danger" type="button">
                        <li class="fa fa-trash"></li>
                      </button>
                    </td>
                    <td v-else>
                      <button class="btn-success" type="button">
                        <li class="fa fa-save"></li>
                      </button>
                      <button class="btn-danger" type="button" @click="item.isEdit=false">
                        <li class="fa fa-close"></li>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// $(document).ready(function() {

// });
// $(()=> {
//   $("#table").DataTable();

// });
export default {
  props: ["user", "donhang", "sanpham"],
  data() {
    return {
      danhsachchitiet: [],
      countsoluong: 0,
      i: 0,
      choduyet: []
    };
  },
  created() {
    this.getChoDuyet();
  },
  methods: {
    getChoDuyet() {
      axios
        .get("cho-duyet-nguoi-dung")
        .then(response => {
          this.choduyet = response.data;
        })
        .then(() => {
          $("#table").DataTable();
        });
    },
    huydonhang(id_donhang, index) {
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
            .post("huy-don-hang-nguoi-dung/" + id_donhang, {})
            .then(response => {
              this.choduyet.splice(index, 1);
              $("#table")
                .DataTable()
                .destroy();
              this.$nextTick(() => {
                $("#table").DataTable();
              }); 
              swal('Xoá thành công','','success')
            })
            .catch(error => {});
        }
        
      });
    },
    openModalChoDuyet(item) {
      $("#modal-choduyet").modal("show");
      this.danhsachchitiet = item;
      this.danhsachchitiet.forEach(item => {
        Vue.set(item, "isEdit", false);
      });
      this.$nextTick(() => {
        $("#table-chitiet").DataTable();
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