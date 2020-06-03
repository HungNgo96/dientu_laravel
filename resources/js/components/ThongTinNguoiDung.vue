<template>
  <div>
    <div class="profile-user-info">
      <div class="profile-info-row">
        <div class="profile-info-name">Cập nhật</div>
        <div class="profile-info-value">
          <a>
            <i class="fa fa-edit" @click="openModalKhachhang(user)"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="profile-user-info">
      <div class="profile-info-row">
        <div class="profile-info-name">Đổi mật khẩu</div>
        <div class="profile-info-value">
          <a>
            <i class="fa fa-edit" @click="openModalDoiMatKhau(user)"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- The Modal thông tin-->
    <div class="modal fade" id="myModalKhachHang">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#007bff">
            <h4 class="modal-title">Thông tin khách hàng</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label>Tên:</label>
              <input type="text" width="20" class="form-control" v-model="users.name">
            </div>
            <!-- <div class="form-group">
              <label>Email:</label>
              <input type="email" class="form-control" v-model="users.email">
            </div>-->
            <div class="form-group">
              <label>SDT:</label>
              <input type="text" class="form-control" v-model="users.sdt">
            </div>
            <div class="form-group">
              <label>Giới tính:</label>
              <br>
              <label class="checkbox-inline">
                <input type="radio" value="0" name="gioitinh" v-model="users.gioitinh">Name
              </label>
              <label class="checkbox-inline">
                <input type="radio" value="1" name="gioitinh" v-model="users.gioitinh">Nữ
              </label>
            </div>
            <div class="form-group">
              <label>Địa chỉ:</label>
              <input type="text" class="form-control" v-model="users.diachi">
            </div>
            <div class="form-group">
              <label>Nhập mật khẩu xác nhận thay đổi</label>
              <input
                type="password"
                class="form-control"
                placeholder="Mật khẩu xác nhận"
                value=''
                v-model="users.password"
              >
              <br>
              <span style="color:red">{{error}}</span>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class='btn-success'  @click="capnhat(users)">Cập nhật</button>
            <button type="button" class='btn-danger' data-dismiss="modal" >Đóng</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal doi mat khau -->
    <div class="modal fade" id="myModalDoiMatKhau">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#007bff">
            <h4 class="modal-title">Đổi mật khẩu</h4>

            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <br>
            <div class="form-group">
              <label>Mật khẩu hiện tại :</label>
              <input
                type="password"
                class="form-control"
                placeholder="Mật khẩu hiên tại"
                v-model="thongtin.matkhau"
              >
              <br>
              <span style="color:red" v-if="error=='Mật khẩu hiện tại không đúng'">{{error}}</span>
            </div>
            <div class="form-group">
              <label>Mật khẩu mới</label>
              <input
                type="password"
                class="form-control"
                placeholder="Mật khẩu mới"
                v-model="thongtin.matkhaumoi"
              >
              <br>
              <span v-if="loi.length>0" style="color:red">{{loi}}</span>
            </div>

            <div class="form-group">
              <label>Xác nhận mật khẩu</label>
              <input
                type="password"
                class="form-control"
                placeholder="Xác nhận mật khẩu mới"
                v-model="thongtin.xacnhanmatkhaumoi"
              >
              <br>
              <span style="color:red" v-if="error=='Xác nhận lại mật khẩu mới không đúng'">{{error}}</span>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn-success"  @click="doimatkhau(thongtin)">Cập nhật</button>
            <button type="button" class='btn-danger' data-dismiss="modal" >Đóng</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["user"],
  data() {
    return {
      error: "",
      users: [],
      thongtin: [],
      loi: [],
    };
  },
  created() {},
  methods: {
    doimatkhau(thongtin) {
      axios
        .post("doi-mat-khau/" + thongtin.id, {
          matkhau: thongtin.matkhau,
          matkhaumoi: thongtin.matkhaumoi,
          xacnhanmatkhaumoi: thongtin.xacnhanmatkhaumoi
        })
        .then(response => {
          this.error = response.data.message;
          if (response.data.message == "Thành công") {
            swal({
              position: "mid",
              type: "success",
              title: "Cập nhật thành công",
              showConfirmButton: false,
              timer: 1500
            });
            $("#myModalDoiMatKhau").modal("hide");
            setTimeout(window.location.reload.bind(window.location), 1500);
          }
        })
        .catch(error => {
          if (error.response.data.errors.matkhaumoi) {
            this.loi = error.response.data.errors.matkhaumoi[0];
          }
        });
    },
    capnhat(users) {
      axios
        .post("cap-nhat-thong-tin/" + users.id, {
          name: users.name,
          diachi: users.diachi,
          sdt: users.sdt,
          gioitinh: users.gioitinh,
          password: users.password
        })
        .then(response => {
          this.error = response.data.message;
          if (this.error == "Thành công") {
            swal({
              position: "mid",
              type: "success",
              title: "Cập nhật thành công",
              showConfirmButton: false,
              timer: 1500
            });
            $("#myModalKhachHang").modal("hide");
            setTimeout(window.location.reload.bind(window.location), 1500);
          }
        })
        .catch(errors => {
          swal({
            position: "mid",
            type: "warning",
            title: "Cập nhật lỗi.",
            showConfirmButton: false,
            timer: 1500
          });
        });
    },
    openModalKhachhang(item) {
      $("#myModalKhachHang").modal("show");
      this.users = item;
      this.error = "";
    },
    openModalDoiMatKhau(item) {
      $("#myModalDoiMatKhau").modal("show");
      this.thongtin.matkhau = "";
      this.thongtin.matkhaumoi = "";
      this.thongtin.xacnhanmatkhaumoi = "";
      this.thongtin = item;
      this.error = "";
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