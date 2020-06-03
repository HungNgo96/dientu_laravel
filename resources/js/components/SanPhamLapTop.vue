<template>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div>&nbsp;</div>
          <div>
            
              <button  style="margin-left:25px" type="button" class="btn btn-primary" id="them" @click="capnhatDanhsach">
                <i class="nav-icon fa fa-refresh"></i>&nbsp;&nbsp; Cập nhật lại bảng
              </button>
            
            
              <button   style="float:right; margin-right:25px" type="button" class="btn btn-primary" id="them" @click="addSanpham">
                <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Thêm sản phẩm
              </button>
           
            
            
          
          </div>
          
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal -->
            <div class="table-reponsive">
              <div
                class="modal fade"
                id="addtable"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
                data-keyboard="false"
                data-backdrop="static"
              >
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color:#007bff">
                      <h3 class="modal-title" id="addtable">Thêm</h3>
                      <button
                        type="button"
                        class="close"
                        id="closetable"
                        data-dismiss="modal"
                        @click="closecreate"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form @on:submit.prevent method="post">
                      <div class="modal-body">
                        <!-- <div class="error" v-if="errors.length">
                              <span v-for="(err,key) in errors" :key='key'>
                                  {{ err }} <br>
                              </span>
                              <hr>
                        </div>-->
                        <div class="row">
                          <div class="col-md-6">
                            <label>Hãng sản xuất</label>
                            <select class="form-control" v-model="sanpham.hangsanxuat" required>
                              <option disabled value>Chọn hãng sản xuất</option>
                              <option
                                v-for="(hangsanxuat,index) in danhsachhangsanxuat"
                                :key="index"
                                :value="hangsanxuat.id"
                              >{{hangsanxuat.tenhangsanxuat}}</option>
                            </select>
                            <div>
                              <span v-for="(err,key) in errors" :key="key">
                                <span v-if="err =='Chưa chọn hãng sản xuất'">{{ err }}</span>
                              </span>
                              <span v-if="tinnhan!= ''">{{tinnhan}}</span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" v-model="sanpham.loaisanpham" required>
                              <option disabled value>Chọn loại sản phẩm</option>
                              <option
                                v-for="(loaisanpham,index) in danhsachloaisanpham"
                                :key="index"
                                :value="loaisanpham.id"
                                v-if="loaisanpham.phanloai =='mt'|| loaisanpham.phanloai==''"
                              >{{loaisanpham.tenloai}}</option>
                            </select>
                            <div>
                              <span v-for="(err,key) in errors" :key="key">
                                <span v-if="err =='Chưa chọn loại sản phẩm'">{{err}}</span>
                              </span>
                              <span v-if="tinnhanloai !='' ">{{tinnhanloai}}</span>
                            </div>
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-6">
                            <label>Tên sản phẩm</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Tên sản phẩm"
                              v-model="sanpham.tensp"
                              required
                            >
                            <div>
                              <span v-for="(err,key) in errors" :key="key">
                                <span v-if="err == 'Chưa nhập tên sản phẩm' ">{{ err }}</span>
                              </span>
                            </div>
                          </div>
                          <!-- <div class="col-md-3">
                            <label>Đơn giá</label>
                            <input
                              type="number"
                              class="form-control"
                              placeholder="Đơn giá"
                              v-model.number="sanpham.dongia"
                              required
                            >
                            <div>
                              <span v-for="(err,key) in errors" :key="key">
                                <span v-if="err =='Chưa nhập đơn giá'">{{ err }}</span>
                              </span>
                            </div>
                            <div>
                              <span v-for="(err,key) in errors" :key="key">
                                &nbsp;
                                <span v-if="err =='Đơn giá không nhỏ hơn 1000'">{{ err }}</span>
                              </span>
                            </div>
                          </div>-->
                          <div class="col-md-6">
                            <label>Bảo hành</label>
                            <select v-model="sanpham.baohanh" class="form-control">
                              <option disabled value>Chọn bảo hành</option>
                              <option value="6 tháng">6 tháng</option>
                              <option value="12 tháng">12 tháng</option>
                              <option value="18 tháng">18 tháng</option>
                              <option value="24 tháng">24 tháng</option>
                              <option value="36 tháng">36 tháng</option>
                              <option value="48 tháng">48 tháng</option>
                            </select>
                            <div>
                              <span
                                v-for="(err,key) in errors"
                                :key="key"
                                v-if="err =='Chưa chọn bảo hành'"
                              >&nbsp; {{ err }}</span>
                            </div>
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-group">
                              <label for="exampleInputFile">Hình ảnh đại diện:</label>
                              <input
                                type="file"
                                @change="onImageChange"
                                class="images"
                                name="filetest"
                              >
                            </div>
                            <div>
                              <span
                                v-for="(err,key) in errors"
                                :key="key"
                                v-if="err =='Chưa chọn hình ảnh'"
                              >&nbsp; {{ err }}</span>
                              <span
                                v-for="(err,key) in errors"
                                :key="key"
                                v-if="err =='Lỗi định dạng hình ảnh'"
                              >&nbsp; {{ err }}</span>
                            </div>
                          </div>
                          <div class="col-md-6 img120120">
                            <img
                              v-if="sanpham.hinhanhshow"
                              :src="sanpham.hinhanhshow"
                              class="img-responsive"
                            >
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <label for="exampleInputFile">Hình ảnh 1 :</label>
                              <input type="file" @change="onImageChange1" class="images">
                            </div>
                          </div>
                          <div class="col-md-2 img120120">
                            <img
                              v-if="sanpham.hinhanhshow1"
                              :src="sanpham.hinhanhshow1"
                              class="img-responsive"
                            >
                          </div>
                          <div class="col-md-6">
                            <label>Mô tả 1</label>
                            <textarea
                              type="text"
                              class="form-control"
                              placeholder="Mô tả 1"
                              v-model="sanpham.mota1"
                            ></textarea>
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <label for="exampleInputFile">Hình ảnh 2 :</label>
                              <input type="file" @change="onImageChange2" class="images">
                            </div>
                          </div>
                          <div class="col-md-2 img120120">
                            <img
                              v-if="sanpham.hinhanhshow2"
                              :src="sanpham.hinhanhshow2"
                              class="img-responsive"
                            >
                          </div>
                          <div class="col-md-6">
                            <label>Mô tả 2</label>
                            <textarea
                              type="text"
                              class="form-control"
                              placeholder="Mô tả 2"
                              v-model="sanpham.mota2"
                            ></textarea>
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <label for="exampleInputFile">Hình ảnh 3 :</label>
                              <input type="file" @change="onImageChange3" class="images">
                            </div>
                          </div>
                          <div class="col-md-2 img120120">
                            <img
                              v-if="sanpham.hinhanhshow3"
                              :src="sanpham.hinhanhshow3"
                              class="img-responsive"
                            >
                          </div>
                          <div class="col-md-6">
                            <label>Mô tả 3</label>
                            <textarea
                              type="text"
                              class="form-control"
                              placeholder="Mô tả 3"
                              v-model="sanpham.mota3"
                            ></textarea>
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <label>Màn hình</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Màn hình"
                              v-model="cauhinhmaytinh.manhinh"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>Hệ điều hành</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Hệ điều hành"
                              v-model="cauhinhmaytinh.hdh"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>CPU</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="CPU"
                              v-model="cauhinhmaytinh.cpu"
                              required
                            >
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <label>RAM</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="RAM"
                              v-model="cauhinhmaytinh.ram"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>VGA</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="VGA"
                              v-model="cauhinhmaytinh.vga"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>Cổng kết nối</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Cổng kết nối"
                              v-model="cauhinhmaytinh.congketnoi"
                              required
                            >
                          </div>
                        </div>&nbsp;
                        <div class="row">
                          <div class="col-md-4">
                            <label>Bộ nhớ</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Bộ nhớ"
                              v-model="cauhinhmaytinh.bonho"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>Pin</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Pin"
                              v-model="cauhinhmaytinh.pin"
                              required
                            >
                          </div>
                          <div class="col-md-4">
                            <label>Thông tin khác</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Thông tin khác"
                              v-model="cauhinhmaytinh.thongtinkhac"
                            >
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" @click="createSanpham" class="btn btn-primary">Tạo</button>
                        <button type="button" class="btn btn-secondary" @click="closecreate">Huỷ</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end-modal -->
            <table id="tableLaptop" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Loại sản phẩm</th>
                  <th>Mã tên sản phẩm</th>
                  <th>Hãng sản xuất</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Hình ảnh</th>
                  <th>Bảo hành</th>
                  <th style="text-align:center"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(sanpham,index) in danhsachsanpham" :key="index">
                  <td>{{sanpham.id}}</td>
                  <td>{{sanpham.loaisanpham.tenloai}}</td>
                  <td>{{sanpham.matensanpham.tenmasanpham}}</td>
                  <td>{{sanpham.hangsanxuat.tenhangsanxuat}}</td>
                  <td>{{sanpham.tensp}}</td>
                  <td>{{formatPrice(sanpham.dongia)}} VND</td>
                  <td>
                    <img :src="'../../public/image/maytinh/' + sanpham.hinhanh ">
                  </td>
                  <td>{{sanpham.baohanh}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="editSanpham(sanpham,sanpham.cauhinhmaytinh,sanpham.mota)"
                    >
                      <i class="nav-icon fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" @click="deleteSanpham(sanpham,index)">
                      <i class="nav-icon fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
              <!-- <tfoot>
                <tr>
                  <th>id</th>
                  <th>Loại sản phẩm</th>
                  <th>Mã tên sản phẩm</th>
                  <th>Hãng sản xuất</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Hình ảnh</th>
                  <th>Bảo hành</th>
                  <th></th>
                </tr>
              </tfoot>-->
            </table>
            <!-- Pagination -->
            <!-- edit -->
            <div
              class="modal fade"
              id="tableedit"
              tabindex="-1"
              role="dialog"
              aria-labelledby="tableedit"
              aria-hidden="true"
              data-keyboard="false"
              data-backdrop="static"
            >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#28a745">
                    <h5 class="modal-title" id="tableedit">Cập nhật</h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                      @click="closeupdate"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- modal body -->
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Hãng sản xuất</label>
                        <select class="form-control" v-model="sanpham.hangsanxuat.id" required>
                          <option disabled value>Chọn hãng sản xuất</option>
                          <option
                            v-for="(hangsanxuat,index) in danhsachhangsanxuat"
                            :key="index"
                            :value="hangsanxuat.id"
                          >{{hangsanxuat.tenhangsanxuat}}</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" v-model="sanpham.loaisanpham.id" required>
                          <option disabled value>Chọn loại sản phẩm</option>
                          <option
                            v-for="(loaisanpham,index) in danhsachloaisanpham"
                            :key="index"
                            :value="loaisanpham.id"
                            v-if="loaisanpham.phanloai=='mt'||loaisanpham.phanloai==''"
                          >{{loaisanpham.tenloai}}</option>
                        </select>
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-6">
                        <label>Tên sản phẩm</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Tên sản phẩm"
                          v-model="sanpham.tensp"
                          required
                        >
                      </div>
                      <!-- <div class="col-md-3">
                        <label>Đơn giá</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="Đơn giá"
                          v-model.number="sanpham.dongia"
                          required
                        >
                      </div>-->
                      <div class="col-md-6">
                        <label>Bảo hành</label>
                        <select v-model="sanpham.baohanh" class="form-control">
                          <option disabled value>Chọn bảo hành</option>
                          <option value="6 tháng">6 tháng</option>
                          <option value="12 tháng">12 tháng</option>
                          <option value="18 tháng">18 tháng</option>
                          <option value="24 tháng">24 tháng</option>
                          <option value="36 tháng">36 tháng</option>
                          <option value="48 tháng">48 tháng</option>
                        </select>
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <label for="exampleInputFile">Hình ảnh đại diện:</label>
                          <input type="file" @change="onImageChange" class="images">
                        </div>
                      </div>
                      <div class="col-md-6 img120120">
                        <img
                          v-if="sanpham.hinhanhshow"
                          :src="sanpham.hinhanhshow"
                          class="img-responsive"
                        >
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <div class="input-group">
                          <label for="exampleInputFile">Hình ảnh 1 :</label>
                          <input type="file" @change="onImageChange1" class="images">
                        </div>
                      </div>
                      <div class="col-md-2 img120120">
                        <img
                          v-if="sanpham.hinhanhshow1"
                          :src="sanpham.hinhanhshow1"
                          class="img-responsive"
                        >
                      </div>
                      <div class="col-md-6">
                        <label>Mô tả 1</label>
                        <textarea
                          type="text"
                          class="form-control"
                          placeholder="Mô tả 1"
                          v-model="mota.mota1"
                        ></textarea>
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <div class="input-group">
                          <label for="exampleInputFile">Hình ảnh 2 :</label>
                          <input type="file" @change="onImageChange2" class="images">
                        </div>
                      </div>
                      <div class="col-md-2 img120120">
                        <img
                          v-if="sanpham.hinhanhshow2"
                          :src="sanpham.hinhanhshow2"
                          class="img-responsive"
                        >
                      </div>
                      <div class="col-md-6">
                        <label>Mô tả 2</label>
                        <textarea
                          type="text"
                          class="form-control"
                          placeholder="Mô tả 2"
                          v-model="mota.mota2"
                        ></textarea>
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <div class="input-group">
                          <label for="exampleInputFile">Hình ảnh 3 :</label>
                          <input type="file" @change="onImageChange3" class="images">
                        </div>
                      </div>
                      <div class="col-md-2 img120120">
                        <img
                          v-if="sanpham.hinhanhshow3"
                          :src="sanpham.hinhanhshow3"
                          class="img-responsive"
                        >
                      </div>
                      <div class="col-md-6">
                        <label>Mô tả 3</label>
                        <textarea
                          type="text"
                          class="form-control"
                          placeholder="Mô tả 3"
                          v-model="mota.mota3"
                        ></textarea>
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <label>Màn hình</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Màn hình"
                          v-model="cauhinhmaytinh.manhinh"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>Hệ điều hành</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Hệ điều hành"
                          v-model="cauhinhmaytinh.hdh"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>CPU</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="CPU"
                          v-model="cauhinhmaytinh.cpu"
                          required
                        >
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <label>RAM</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="RAM"
                          v-model="cauhinhmaytinh.ram"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>VGA</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="VGA"
                          v-model="cauhinhmaytinh.vga"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>Cổng kết nối</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Cổng kết nối"
                          v-model="cauhinhmaytinh.congketnoi"
                          required
                        >
                      </div>
                    </div>&nbsp;
                    <div class="row">
                      <div class="col-md-4">
                        <label>Bộ nhớ</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Bộ nhớ"
                          v-model="cauhinhmaytinh.bonho"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>Pin</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Pin"
                          v-model="cauhinhmaytinh.pin"
                          required
                        >
                      </div>
                      <div class="col-md-4">
                        <label>Thông tin khác</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Thông tin khác"
                          v-model="cauhinhmaytinh.thongtinkhac"
                        >
                      </div>
                    </div>
                  </div>
                  <!-- end modal body -->
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="updateSanpham(sanpham)"
                    >Cập nhật</button>
                    <button type="button" class="btn btn-secondary" @click="closeupdate">Huỷ</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- endedit -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</template>

<script>
// var csrf = '{{csrf_token()}}';
$(() => {
  var table = $("#tableLaptop").DataTable({
    lengthChange: true,
    // buttons: ["copy", "excel", "pdf","print",colvis']
    buttons: [
      {
        extend: "pdf",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 7]
          // columns: ':visible'
        }
      },
      {
        extend: "excel",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 7]
        }
      },
      {
        extend: "print",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 7]
        }
      }
    ]
  });

  table
    .buttons()
    .container()
    .appendTo("#tableLaptop_wrapper .col-md-6:eq(0)");
});
import axios from "axios";
import moment from "moment";
export default {
  data() {
    return {
      sanpham: {
        loaisanpham: "",
        matensanpham: 1,
        hangsanxuat: "",
        tensp: "",
        dongia: 0,
        hinhanh: "",
        baohanh: "",
        hinhanhshow: ""
      },
      mota: {
        hinhanh1: "",
        hinhanhshow1: "",
        mota1: "",
        hinhanh2: "",
        hinhanhshow2: "",
        mota2: "",
        hinhanh3: "",
        hinhanhshow3: "",
        mota3: ""
      },

      cauhinhmaytinh: {
        manhinh: "",
        hdh: "",
        cpu: "",
        ram: "",
        vga: "",
        congketnoi: "",
        bonho: "",
        pin: "",
        thongtinkhac: ""
      },

      errors: [],
      danhsachsanpham: [],
      danhsachcauhinhmt: [],
      danhsachloaisanpham: [],
      danhsachhangsanxuat: [],
      danhsachmatensanpham: [],
      nameimages: "",
      show: false,
      tinnhan: "",
      tinnhanloai: ""
    };
  },
  created() {
    this.getDanhsachsanpham();
  },
  mounted() {},
  methods: {
    export() {
      var table = $("#tableLaptop").DataTable({
        lengthChange: true,
        // buttons: ["copy", "excel", "pdf","print",colvis']
        buttons: [
          {
            extend: "pdf",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7]
              // columns: ':visible'
            }
          },
          {
            extend: "excel",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7]
            }
          },
          {
            extend: "print",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 7]
            }
          }
        ]
      });

      table
        .buttons()
        .container()
        .appendTo("#tableLaptop_wrapper .col-md-6:eq(0)");
    },
    capnhatDanhsach() {
      $("#tableLaptop")
        .DataTable()
        .destroy();

      this.getDanhsachsanpham2();
    },
    addSanpham() {
      $("#addtable").modal("show");

      this.errors = [];
      this.sanpham.matensanpham = 1;
      this.sanpham.hangsanxuat = "";
      this.sanpham.loaisanpham = "";
      this.sanpham.tensp = "";
      this.sanpham.dongia = 0;
      this.sanpham.baohanh = "";
      this.sanpham.hinhanh = "";
      //mota
      this.sanpham.hinhanhshow = "";
      this.sanpham.hinhanh1 = "";
      this.sanpham.hinhanhshow1 = "";
      this.sanpham.mota1 = "";
      this.sanpham.hinhanh2 = "";
      this.sanpham.hinhanhshow2 = "";
      this.sanpham.mota2 = "";
      this.sanpham.hinhanh3 = "";
      this.sanpham.hinhanhshow3 = "";
      this.sanpham.mota3 = "";

      //maytinh
      this.cauhinhmaytinh.manhinh = "";
      this.cauhinhmaytinh.hdh = "";
      this.cauhinhmaytinh.cpu = "";
      this.cauhinhmaytinh.ram = "";
      this.cauhinhmaytinh.vga = "";
      this.cauhinhmaytinh.congketnoi = "";
      this.cauhinhmaytinh.bonho = "";
      this.cauhinhmaytinh.pin = "";
      this.cauhinhmaytinh.thongtinkhac = "";
    },
    closecreate() {
      $("#addtable").modal("hide");
      $(".images").val("");

      this.errors = [];
      this.sanpham.matensanpham = 1;
      this.sanpham.hangsanxuat = "";
      this.sanpham.loaisanpham = "";
      this.sanpham.tensp = "";
      this.sanpham.dongia = 0;
      this.sanpham.hinhanh = "";
      this.sanpham.hinhanhshow = "";
      this.sanpham.baohanh = "";
      //mota
      this.sanpham.hinhanh1 = "";
      this.sanpham.hinhanhshow1 = "";
      this.sanpham.mota1 = "";
      this.sanpham.hinhanh2 = "";
      this.sanpham.hinhanhshow2 = "";
      this.sanpham.mota2 = "";
      this.sanpham.hinhanh3 = "";
      this.sanpham.hinhanhshow3 = "";
      this.sanpham.mota3 = "";
      //maytinh
      this.cauhinhmaytinh.manhinh = "";
      this.cauhinhmaytinh.hdh = "";
      this.cauhinhmaytinh.cpu = "";
      this.cauhinhmaytinh.ram = "";
      this.cauhinhmaytinh.vga = "";
      this.cauhinhmaytinh.congketnoi = "";
      this.cauhinhmaytinh.bonho = "";
      this.cauhinhmaytinh.pin = "";
      this.cauhinhmaytinh.thongtinkhac = "";
    },
    closeupdate() {
      $("#tableedit").modal("hide");
      $(".images").val("");
      this.errors = [];
      this.sanpham.matensanpham = 1;
      this.sanpham.hangsanxuat = "";
      this.sanpham.loaisanpham = "";
      this.sanpham.tensp = "";
      this.sanpham.dongia = 0;
      // this.sanpham.hinhanh = "";
      // this.sanpham.hinhanhshow = "";
      this.sanpham.baohanh = "";
      //mota
      this.mota.mota1 = "";
      this.mota.mota2 = "";
      this.mota.mota3 = "";
      //maytinh
      this.cauhinhmaytinh.manhinh = "";
      this.cauhinhmaytinh.hdh = "";
      this.cauhinhmaytinh.cpu = "";
      this.cauhinhmaytinh.ram = "";
      this.cauhinhmaytinh.vga = "";
      this.cauhinhmaytinh.congketnoi = "";
      this.cauhinhmaytinh.bonho = "";
      this.cauhinhmaytinh.pin = "";
      this.cauhinhmaytinh.thongtinkhac = "";

      this.$nextTick(function() {
        this.getDanhsachsanpham();
      });
    },

    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;

      this.sanpham.hinhanh = event.target.files[0].name;

      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.sanpham.hinhanhshow = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onImageChange1(e) {
      let files = e.target.files; //|| e.dataTransfer.files
      if (!files.length) return;
      this.sanpham.hinhanh1 = event.target.files[0].name;
      this.createImage1(files[0]);
    },
    createImage1(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.sanpham.hinhanhshow1 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onImageChange2(e) {
      let files = e.target.files; //|| e.dataTransfer.files
      if (!files.length) return;
      this.sanpham.hinhanh2 = event.target.files[0].name;
      this.createImage2(files[0]);
    },
    createImage2(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.sanpham.hinhanhshow2 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onImageChange3(e) {
      let files = e.target.files; //|| e.dataTransfer.files
      if (!files.length) return;
      this.sanpham.hinhanh3 = event.target.files[0].name;
      this.createImage3(files[0]);
    },
    createImage3(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.sanpham.hinhanhshow3 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    getDanhsachsanpham2() {
      axios
        .get("sanphammaytinh")
        .then(response => {
          // console.log(response.data);
          this.danhsachsanpham = response.data.data;
          //cauhínhanpham
          axios
            .get("cauhinhmaytinh")
            .then(response => {
              // console.log(response.data);
              this.danhsachcauhinhmt = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors.cpu
            }); //endcauhinhmaytinh
          //loai san pham
          axios
            .get("loaisanpham")
            .then(response => {
              // console.log(response.data);
              this.danhsachloaisanpham = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end loai san pham
          //hang san xuat
          axios
            .get("hangsanxuat")
            .then(response => {
              // console.log(response.data);
              this.danhsachhangsanxuat = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end hang san xuat

          //ma ten loai san ppham
          axios
            .get("matensanpham")
            .then(response => {
              // console.log(response.data);
              this.danhsachmatensanpham = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end hang san xuat
        })
        .then(() => {
          $(".images").val("");
          this.export();
        })

        .catch(error => {
          // this.errors = error.response.data.errors.name
        });
    },
    //getlist sanpham
    getDanhsachsanpham() {
      axios
        .get("sanphammaytinh")
        .then(response => {
          // console.log(response.data);
          this.danhsachsanpham = response.data.data;
          //cauhínhanpham
          axios
            .get("cauhinhmaytinh")
            .then(response => {
              // console.log(response.data);
              this.danhsachcauhinhmt = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors.cpu
            }); //endcauhinhmaytinh
          //loai san pham
          axios
            .get("loaisanpham")
            .then(response => {
              // console.log(response.data);
              this.danhsachloaisanpham = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end loai san pham
          //hang san xuat
          axios
            .get("hangsanxuat")
            .then(response => {
              // console.log(response.data);
              this.danhsachhangsanxuat = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end hang san xuat

          //ma ten loai san ppham
          axios
            .get("matensanpham")
            .then(response => {
              // console.log(response.data);
              this.danhsachmatensanpham = response.data;
            })
            .catch(error => {
              // this.errors = error.response.data.errors
            }); //end hang san xuat
        })
        .then(() => {
          //  this.export();
          $(".images").val("");
        })

        .catch(error => {
          // this.errors = error.response.data.errors.name
        });
    },

    //create
    createSanpham() {
      this.errors = [];
      this.tinnhan = "";
      this.tinnhanloai = "";
      axios
        .post("sanphammaytinh", {
          loaisanpham: this.sanpham.loaisanpham,
          matensanpham: this.sanpham.matensanpham,
          hangsanxuat: this.sanpham.hangsanxuat,
          tensp: this.sanpham.tensp,

          baohanh: this.sanpham.baohanh,
          hinhanh: this.sanpham.hinhanh,
          hinhanhshow: this.sanpham.hinhanhshow,
          hinhanh1: this.sanpham.hinhanh1,
          hinhanhshow1: this.sanpham.hinhanhshow1,
          mota1: this.sanpham.mota1,
          hinhanh2: this.sanpham.hinhanh2,
          hinhanhshow2: this.sanpham.hinhanhshow2,
          mota2: this.sanpham.mota2,
          hinhanh3: this.sanpham.hinhanh3,
          hinhanhshow3: this.sanpham.hinhanhshow3,
          mota3: this.sanpham.mota3,
          //maytinh
          manhinh: this.cauhinhmaytinh.manhinh,
          hdh: this.cauhinhmaytinh.hdh,
          cpu: this.cauhinhmaytinh.cpu,
          ram: this.cauhinhmaytinh.ram,
          vga: this.cauhinhmaytinh.vga,
          congketnoi: this.cauhinhmaytinh.congketnoi,
          bonho: this.cauhinhmaytinh.bonho,
          pin: this.cauhinhmaytinh.pin,
          thongtinkhac: this.cauhinhmaytinh.thongtinkhac
        })
        .then(response => {
          this.tinnhan = response.data.message;
          this.tinnhanloai = response.data.messageloai;
          if (!response.data.message && !response.data.messageloai) {
            swal({
              position: "mid",
              type: "success",
              title: "Tạo thành công.",
              showConfirmButton: false,
              timer: 1500
            });
            $("#addtable").modal("hide");

            $("#tableLaptop")
              .DataTable()
              .destroy();

            this.getDanhsachsanpham2();
          }
        })
        .catch(error => {
          this.errors = [];
          if (error.response.data.errors.hinhanh) {
            this.errors.push(error.response.data.errors.hinhanh[0]);
          }
          // if (error.response.data.errors.hinhanh[1]) {
          //   this.errors.push(error.response.data.errors.hinhanh[1]);
          // }
          if (error.response.data.errors.hangsanxuat) {
            this.errors.push(error.response.data.errors.hangsanxuat[0]);
          }
          if (error.response.data.errors.loaisanpham) {
            this.errors.push(error.response.data.errors.loaisanpham[0]);
          }
          if (error.response.data.errors.tensp) {
            this.errors.push(error.response.data.errors.tensp[0]);
          }
          // if (error.response.data.errors.dongia) {
          //   this.errors.push(error.response.data.errors.dongia[0]);
          // }
          if (error.response.data.errors.hinhanhshow) {
            this.errors.push(error.response.data.errors.hinhanhshow[0]);
          }
          if (error.response.data.errors.baohanh) {
            this.errors.push(error.response.data.errors.baohanh[0]);
          }
        });
    },
    editSanpham(sanpham, maytinh, mota) {
      $("#tableedit").modal("show");

      this.sanpham = sanpham;
      this.cauhinhmaytinh = maytinh;
      this.mota = mota;

      // axios.put('sanpham/' + sanpham.id,{})
    },
    updateSanpham(sanpham) {
      axios
        .put("sanphammaytinh/" + sanpham.id, {
          id: sanpham.id,
          id_loaisanpham: this.sanpham.loaisanpham.id,
          id_matensanpham: this.sanpham.matensanpham.id,
          id_hangsanxuat: this.sanpham.hangsanxuat.id,
          tensp: this.sanpham.tensp,
          dongia: 0,
          hinhanh: this.sanpham.hinhanh,
          baohanh: this.sanpham.baohanh,
          hinhanhshow: this.sanpham.hinhanhshow,
          //mota
          hinhanh1: this.mota.hinhanh1,
          hinhanhshow1: this.mota.hinhanhshow1,
          mota1: this.mota.mota1,
          hinhanh2: this.mota.hinhanh2,
          hinhanhshow2: this.mota.hinhanhshow2,
          mota2: this.mota.mota2,
          hinhanh3: this.mota.hinhanh3,
          hinhanhshow3: this.mota.hinhanhshow3,
          mota3: this.mota.mota3,
          //maytinh

          manhinh: this.sanpham.cauhinhmaytinh.manhinh,
          hdh: this.sanpham.cauhinhmaytinh.hdh,
          cpu: this.sanpham.cauhinhmaytinh.cpu,
          ram: this.sanpham.cauhinhmaytinh.ram,
          vga: this.sanpham.cauhinhmaytinh.vga,
          congketnoi: this.sanpham.cauhinhmaytinh.congketnoi,
          bonho: this.sanpham.cauhinhmaytinh.bonho,
          pin: this.sanpham.cauhinhmaytinh.pin,
          thongtinkhac: this.sanpham.cauhinhmaytinh.thongtinkhac
        })
        .then(reponse => {
          swal({
            position: "mid",
            type: "success",
            title: "Cập nhật thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          $("#tableedit").modal("hide");

          $("#tableLaptop")
            .DataTable()
            .destroy();

          this.getDanhsachsanpham2();
        })
        .catch(error => {});
    },
    deleteSanpham(sanpham, index) {
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
            .delete("sanphammaytinh/" + sanpham.id)
            .then(response => {
              // console.log(response.data.count);
              if (response.data.count) {
                swal({
                  position: "mid",
                  type: "warning",
                  title: "Sản phẩm vẫn còn không thể xoá.",
                  showConfirmButton: false,
                  timer: 1500
                });
              } else {
                this.danhsachsanpham.splice(index, 1);
                $("#tableLaptop")
                  .DataTable()
                  .destroy();

                this.getDanhsachsanpham2();
                swal({
                  position: "mid",
                  type: "success",
                  title: "Xoá thành công.",
                  showConfirmButton: false,
                  timer: 1500
                });
              }
            })
            .catch(error => {
              // this.errors = error.response.data.errors.name
            });
        }
      });
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
div span {
  color: red;
}
img {
  width: 50px;
  height: 40px;
}
.img120120 img {
  width: 100px;
  height: 80px;
}
</style>