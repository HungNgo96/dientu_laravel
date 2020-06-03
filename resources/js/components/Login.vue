<template>

    <div class="sign-in bg-gray">
        <h2 class="title">Đăng nhập</h2>
        <form @on:submit.prevent  class="sign-in-form" id="sign-in-form" action="#" method="post">
        <p class="form-input">
            <input type="text" name="log" id="user_login" class="input"  placeholder="Username / Email" v-model='user.email'  required/>
        </p>
        <p class="form-input">
            <input type="password" name="pwd" id="user_pass" class="input"  placeholder="Password" v-model='user.password' required/>
        </p>
        <p class="form-input">
            <input  name="wp-submit" id="wp-submit" class="btn" value="Đăng nhập" @click='postLogin'/>
        </p>
        <p class="checkbox pull-left">
            <input name="rememberme" type="checkbox" class="rememberme" value="Ghi nhớ"/> 
            Ghi nhớ
            <a href="#" class="pull-right" title="Quên mật khẩu">Quên mật khẩu</a>
        </p>
        </form>

              
    </div><!-- /.sign-in -->
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
        props:[],
        user:{
            email:'',
            password:'',

        }
    };
  },
  created() {},
  methods: {
    postLogin(){
        axios.post('login',{
            email: this.user.email,
            password: this.user.password
        })
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