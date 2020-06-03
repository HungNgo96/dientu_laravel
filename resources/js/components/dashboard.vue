<template>
  <div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{tongkhachhang}}</h3>
                <p>Tổng khách hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a :href="listkhachhang" class="small-box-footer">
                Xem thông tin
                <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  {{tongluotxem}}
                  <sup style="font-size: 20px"></sup>
                </h3>

                <p>Tổng lượt xem</p>
              </div>
              <div class="icon">
                <i class="ion ion-eye"></i>
              </div>
              <p class="small-box-footer">&nbsp;</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" v-if="ngaythang">
                <h3>{{formatPrice(tongtienngay)}} VND</h3>

                <p>Tổng tiền đơn hàng trong ngày</p>
              </div>
              <div class="inner" v-else>
                <h3>{{formatPrice(tongtrongthang)}} VND</h3>

                <p>Tổng tiền đơn hàng trong tháng</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" v-if="ngaythang" class="small-box-footer"  @click="ngaythang=false">
                <span> Tổng trong tháng </span><i class="fa fa-refresh"></i>
              </a>
              <a href="#" v-else class="small-box-footer" @click="ngaythang=true">
               <span>Tổng trong ngày </span><i class="fa fa-refresh"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner" v-if="tuannam">
                <h3>{{formatPrice(tongtrongtuan)}} VND</h3>

                <p>Tổng tiền đơn hàng trong tuần</p>
              </div>
              <div class="inner" v-else>
                <h3>{{formatPrice(tongtiennam)}} VND</h3>

                <p>Tổng tiền đơn hàng trong năm</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <p class="small-box-footer">
                <a href="#" v-if="tuannam" class="small-box-footer"  @click="tuannam=false">
                <span> Tổng trong năm</span> <i class="fa fa-refresh"></i>
              </a>
              <a href="#" v-else class="small-box-footer" @click="tuannam=true">
               <span>Tổng trong ngày </span> <i class="fa fa-refresh"></i>
              </a>
              </p>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            
            
           
            <div class="card">
              <div class="card-header no-border">
                <h3 class="card-title">Sản phẩm giảm giá</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>Sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Giá giảm</th>
                      <th>Sale</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item,index) in chitietkhuyenmai" :key="index">
                      <td v-if="item.sanpham.id_matensanpham == 1">
                        <img
                          :src="assetmaytinh +'/' + item.sanpham.hinhanh "
                          :alt="item.sanpham.tensp"
                          class="img-circle img-size-32 mr-2"
                        >
                        {{item.sanpham.tensp}}
                      </td>
                      <td v-else>
                        <img
                          :src="assetdienthoai +'/' + item.sanpham.hinhanh "
                          :alt="item.sanpham.tensp"
                          class="img-circle img-size-32 mr-2"
                        >
                        {{item.sanpham.tensp}}
                      </td>
                      <td>{{formatPrice(item.sanpham.dongia)}} VND</td>
                      <td class="text-danger">
                        <strong>{{formatPrice(item.dongia_giamgia)}} VND</strong>
                      </td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fa fa-arrow-down"></i>
                          {{parseInt(100-((item.dongia_giamgia * 100)/(item.sanpham.dongia)))}}%
                        </small>
                        {{formatPrice(item.sanpham.dongia - item.dongia_giamgia) }} VND
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Lịch sử đơn đặt hàng</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in chitietdonhang" :key="index">
                        <td>{{item.donhang.id}}</td>
                        <td>{{item.sanpham.tensp}}</td>
                        <td>
                          <span
                            v-if="item.donhang.trangthai == 0"
                            class="badge badge-danger"
                          >Chờ duyệt</span>
                          <span
                            v-if="item.donhang.trangthai == 1"
                            class="badge badge-success"
                          >Đã duyệt</span>
                          <span
                            v-if="item.donhang.trangthai == 2"
                            class="badge badge-warning"
                          >Đang giao</span>
                          <span
                            v-if="item.donhang.trangthai == 3"
                            class="badge badge-success"
                          >Hoàn thành</span>
                          <span v-if="item.donhang.trangthai == 4" class="badge badge-danger">Đã huỷ</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>-->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
           <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="visibility: hidden; height:0px ; width:0px">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-pie-chart mr-1"></i>
                  Sales
                </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div
                    class="chart tab-pane active"
                    id="revenue-chart"
                    style="position: relative; height: 300px;"
                  ></div>
                  <div
                    class="chart tab-pane"
                    id="sales-chart"
                    style="position: relative; height: 300px;"
                  ></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <section class="col-lg-5 connectedSortable">


            <div class="card bg-info-gradient" style="display:none">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>


            
            <!-- solid sales graph -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông số đơn hàng và sản phẩm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                 <ul class="products-list product-list-in-card pl-2 pr-2">
                    <div class="progress-group">
                      Tổng số lượng sản phẩm được đặt
                      <span class="float-right"><b>{{countsoluongchitiet}}</b>/{{countsoluong}} </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" v-bind:style="{width:(parseInt(((countsoluongchitiet*100)/countsoluong))) +'%'}"></div>
                      </div>
                    </div>
                     <!-- /.progress-group -->
                    <div class="progress-group">
                      Đơn hàng chờ duyệt
                      <span class="float-right"><b>{{tongdonhangchoduyet}}</b>/{{tongdonhang}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" v-bind:style="{width:(parseInt(((tongdonhangchoduyet*100)/tongdonhang))) +'%'}"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Đơn hàng đã duyệt
                      <span class="float-right"><b>{{tongdonhangdaduyet}}</b>/{{tongdonhang}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" v-bind:style="{width:(parseInt(((tongdonhangdaduyet*100)/tongdonhang))) +'%'}"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Đơn hàng đang giao
                      <span class="float-right"><b>{{tongdonhangdanggiao}}</b>/{{tongdonhang}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" v-bind:style="{width:(parseInt(((tongdonhangdanggiao*100)/tongdonhang))) +'%'}"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Đơn hàng thành công
                      <span class="float-right"><b>{{tongdonhangthanhcong}}</b>/{{tongdonhang}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" v-bind:style="{width:(parseInt(((tongdonhangthanhcong*100)/tongdonhang))) +'%'}"></div>
                      </div>
                    </div>
                    <div class="progress-group">
                      Đơn hàng huỷ
                      <span class="float-right"><b>{{tongdonhangdahuy}}</b>/{{tongdonhang}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" v-bind:style="{width:(parseInt(((tongdonhangdahuy*100)/tongdonhang))) +'%'}"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <!-- <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div> -->
                 </ul>
              </div>
                    

                   
                  </div>
            <!-- /.card -->
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản phẩm thêm gần đây</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item" v-for="(item,index) in sanpham" :key="index">
                    <div class="product-img">
                      <img v-if="item.id_matensanpham == 1"
                        :src="assetmaytinh + '/' + item.hinhanh"
                        :alt="item.tensp"
                        class="img-size-50"
                      >
                       <img v-else
                        :src="assetdienthoai + '/' + item.hinhanh"
                        :alt="item.tensp"
                        class="img-size-50"
                      >
                    </div>
                    <div class="product-info">
                      <!-- <a href="javascript:void(0)" class="product-title"> -->
                        {{item.tensp}}
                        <span v-if="item.id_matensanpham == 1" class="badge badge-warning float-right">{{formatPrice(item.dongia)}} VND</span>
                        <span v-else class="badge badge-info float-right">{{formatPrice(item.dongia)}} VND</span>
                      </a>
                      <span v-if="item.id_matensanpham == 1" class="product-description">{{item.cauhinhmaytinh.manhinh}}</span>
                      <span v-else class="product-description">{{item.cauhinhdienthoai.manhinh}}</span>
                    </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>-->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
</template>

<script>
export default {
  props: [
   
    "assetdienthoai",
    "assetmaytinh",
    "listkhachhang",
    // "tongtienngay",
    // "tongtiennam",
    // "chitietdonhang",
    // "chitietkhuyenmai",
    //  "tongkhachhang",
    // "tongluotxem",
    // "sanpham",
    // "tongtrongtuan",
    // "tongtrongthang",
    // "countsoluong",
    // "countsoluongchitiet",
    // "tongdonhang",
    // "tongdonhangthanhcong",
    // "tongdonhangchoduyet",
    // "tongdonhangdaduyet",
    // "tongdonhangdanggiao"
  ],
  data() {
    return {
      img: "user5-128x128.jpg",
      ngaythang:true,
      tuannam:true,
      tongkhachhang:'',
      tongluotxem:'',
      
      tongtienngay:'',
      tongtiennam:'',
      chitietdonhang:[],
      chitietkhuyenmai:[],
      sanpham:[],
      tongtrongtuan:'',
      tongtrongthang:'',
      countsoluong:'',
      countsoluongchitiet:'',
      tongdonhang:'',
      tongdonhangthanhcong:'',
      tongdonhangchoduyet:'',
      tongdonhangdaduyet:'',
      tongdonhangdanggiao:'',
      tongdonhangdahuy:'',
      








      


      
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  created(){
  this.getThongke();
  setInterval(()=>{this.getThongke()},30000);
  }

  ,
  methods: {
    getThongke(){
      axios.get('thong-ke')
      .then((response)=>{
        
       
        this.tongkhachhang = response.data.user;
        
        this.tongluotxem = response.data.tongluotxemsanpham;
        this.tongtienngay = response.data.tongtien_donhang_trongngay;
        this.tongtiennam = response.data.tongtien_donhang_trongnam;
        this.chitietdonhang = response.data.chitietdonhang;
        this.chitietkhuyenmai = response.data.chitietkhuyenmai;
        this.sanpham = response.data.sanpham;
        this.tongtrongtuan = response.data.tongtien_donhang_trongtuan;
        this.tongtrongthang = response.data.tongtien_donhang_trongthang;
        this.countsoluong = response.data.countsoluong;
        this.countsoluongchitiet = response.data.countsoluongchitiet;
        this.tongdonhang = response.data.tongdonhang;
        this.tongdonhangthanhcong = response.data.tongdonhangthanhcong;
        this.tongdonhangchoduyet = response.data.tongdonhangchoduyet;
        this.tongdonhangdaduyet = response.data.tongdonhangdaduyet;
        this.tongdonhangdanggiao = response.data.tongdonhangdanggiao;
        this.tongdonhangdahuy = response.data.tongdonhangdahuy;

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