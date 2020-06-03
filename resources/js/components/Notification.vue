<template>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fa fa-bell-o"></i>
      <span class="badge badge-danger navbar-badge">{{unreadNotifications.length}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">{{unreadNotifications.length}} thông báo</span>
      <div class="dropdown-divider"></div>
      <span class="dropdown-item dropdown-footer"
        v-if="unreadNotifications.length == 0">
        
      Không có thông báo</span>
      <a
        
        
        class="dropdown-item"
        v-for="(item,index) in unreadNotifications"
        :key="index"
        v-if="unreadNotifications.length!=0"
        @click="markAsRead(item,index)"
        :href="thongbao +'/' + item.data.donhang.id"
      >
        <i class="fa fa-bell"></i>
        Khách hàng {{item.data.user.name}} đã đặt đơn hàng
        <span
          class="float-right text-muted text-sm"
        >{{moment(item.created_at).fromNow() }}</span>
        <br>
        
      </a>
       
      <div class="dropdown-divider"></div>
      <a :href="xemtatca" class="dropdown-item dropdown-footer" >Xem tất cả</a>
     
    </div>
  </li>
</template>
<script>
export default {
  props: ["unread", "userid", "assetthongbao","thongbao","xemtatca"],
  data() {
    return {
      unreadNotifications: this.unread
    };
  },
  mounted() {
    console.log("ok");
    Echo.private("App.User." + this.userid).notification(notification => {
      console.log(notification);
      let newUnread = {
          data :{
             donhang: notification.donhang,
          user: notification.user,
          time: notification.time
          },
          id: notification.id,
         
        
      };
      this.unreadNotifications.push(newUnread);
      console.log(newUnread);
    });
  },
  created() {},
  methods: {
    markAsRead(item, index) {
      axios.get(this.assetthongbao + "/" + item.id);
      this.unreadNotifications.splice(index, 1);
      bus.$emit('thong-bao-don-hang',item.data.donhang);
      // window.location.href='xemthongbaodonhang';

    },
    markAsReadAll(item, index) {
      axios.get(this.assetthongbao + "/" + item.id);
      this.unreadNotifications.splice(index, 1);
      bus.$emit('thong-bao-don-hang',item.data.donhang);
      // window.location.href='xemthongbaodonhang';

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