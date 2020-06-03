<template>

  <div class="col-md-5">
    <div id="order_review" class="woocommerce-checkout-review-order">
      <h3 class="title">Sản phẩm đã chọn</h3>

      <table class="cart-table">
        <thead>
          <tr>
            <th class="product-name">Sản phẩm</th>
            <th class="product-total pull-right">Đơn giá</th>
          </tr>
        </thead>

        <tbody>
          <tr class="cart_item" v-for="(item,index) in cart" :key="index" v-if="cart.length > 0">
            <td class="product-name order-item">
              <h3 class="item-title">
                {{item.tensp}}
                <span class="count">x {{item.qty}}</span>
              </h3>
            </td>
            <td class="product-name pull-right">
              <span
                class="amount"
                v-if="item.chitietkhuyenmai.length > 0 && item.soluongsanpham.soluongcon > 0 && item.chitietkhuyenmai[0].trangthai == 0 "
              >{{ formatPrice(item.chitietkhuyenmai[0].dongia_giamgia)}} VND</span>
              <span class="amount" v-else>{{formatPrice(item.dongia)}} VND</span>
            </td>
          </tr>
          <tr v-if="cart.length==0" align="center">
            <td>
              <span>Hiện tại chưa có sản phẩm nào.</span>
            </td>
          </tr>
        </tbody>

        <tfoot>
          <tr class="cart-subtotal">
            <th>Tổng phụ</th>
            <td class="pull-right">
              <span class="amount">{{formatPrice(carttotal)}} VND</span>
            </td>
          </tr>

          <tr class="shipping-total">
            <th>Vận chuyển</th>
            <td class="pull-right">
              <span class="amount">0</span>
            </td>
          </tr>

          <tr class="order-total">
            <th>Tổng</th>
            <td class="pull-right">
              <strong>
                <span class="amount">{{formatPrice(carttotal)}} VND</span>
              </strong>
            </td>
          </tr>
        </tfoot>
      </table>

      <div class="payment-method">
        <div class="alt-address">
          <form @submit.prevent action="#" class="new-form">
            <label>Nhập số điện liên lạc</label>
            <input class="input-text" type="text" placeholder="Nhập SDT liên lạc khi giao hàng" v-model="sdt">
            <p v-if="loisdt!=''" class="text-danger">{{loisdt}}</p>
            <label for="new-customer">Nhập địa chỉ vận chuyển </label>
            
            <br>
            <textarea
              class="input-text"
              name="order_note"
              id="order_note"
              placeholder="Địa chỉ khác"
              v-model="diachikhac"
            ></textarea>
            <p v-if="loi!=''" class="text-danger">{{loi}}</p>
          </form>
        </div>

        <form @submit.prevent  class="payment-form" :action="postthanhtoan" method="post" >
          <div class="bank-method">
            <input type="checkbox" name="bank_transfer" value id="bank_transfer" checked>
            <label for="new-customer">Vận chuyển tại nhà</label>
            <p class="description">Giao hàng tận nhà mới nhận tiền</p>
            <!-- /.description -->
          </div>
          <!-- /.bank-method -->
          
          <div class="g-recaptcha" data-sitekey="6LeiWIcUAAAAACQKXyJ8b52lzZVr0AQLkYc9J-1r" style="margin-left:45px;margin-top:30px;"></div>
          <p style="margin-left:45px;margin-top:5px;color:red" v-if="erros.length > 0 &&item =='Bạn chưa tích vào bản kiểm tra robot'" v-for="(item,index) in erros" :key="index">{{item}}</p>
          <button
            type="submit"
            v-if="cart.length > 0"
            class="btn"
            @click="postDonhang(carttotal,cart,user)"
          >Đặt hàng</button>
        </form>

        <!-- /.alt-address -->
        <!-- /.payment-form -->
      </div>
      <!-- /.payment-method -->
    </div>
    <!-- /.order_review -->
  </div>
</template>
<script>
export default {
  props: ["cart", "user", "carttotal", "totalitem", "postthanhtoan"],
  data() {
    return {
      tuychondiachi: "",
      diachikhac: "",
      sdt:'',
      carttoal: 0,
      erros: [],
      a:'',
      loi:'',
      loisdt:'',
      
    };
  },
  created() {},
  
  methods: {
    thongbao() {
      window.location.href = "../";
    },
    postDonhang(a, b, c) {
      this.loi='';
      this.loisdt='';
      this.erros = [];
      this.a=grecaptcha.getResponse();
      swal({
        title: "Bạn có muốn đặt hàng",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận!",
        cancelButtonText: "Huỷ"
      }).then(result => {
        if (result.value) {
          swal({
            position: "mid",
            type: "info",
            title: "Đang xử lý",
            showConfirmButton: false,
            timer: 5000,
            onBeforeOpen: () => {
              swal.showLoading();
            },
            onAfterClose: () => {
              swal({
                position: "mid",
                type: "success",
                title: "Đặt hàng thành công",
                showConfirmButton: false,
                timer: 1500
              });
              setTimeout(this.thongbao, 2000);
            }
          });
          axios
            .post("thanhtoan", {
              tongtien: a,
              giohang: b,
              user: c,
              diachikhac: this.diachikhac,
              captcha: grecaptcha.getResponse(),
              sdt:this.sdt,
            })
            .then(response => {
             
                bus.$emit("thanhtoan");
              
              
            })
            .catch(erros => {
              if (erros.response.data.errors.captcha) {
                this.erros.push(erros.response.data.errors.captcha[0]);
              }
               if (erros.response.data.errors.diachikhac){
                 this.loi=erros.response.data.errors.diachikhac[0];
               }
               if(erros.response.data.errors.sdt){
                  this.loisdt=erros.response.data.errors.sdt[0];
               }
              swal({
                position: "mid",
                type: "error",
                title: "Đặt hàng lỗi",
                showConfirmButton: false,
                timer: 1500
              });
            });
        }
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