<template>
 <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div>&nbsp;</div>
                <div style="text-align:right;  margin-right: 30px;">
                <button  type="button" class="btn btn-primary" id="them" @click="addHangsanxuat">
                    <i class="nav-icon fa fa-plus"></i>&nbsp;&nbsp; Hãng sản xuất
                </button>
                    </div>
                <div class="card-body">
                    <!-- Add -->
                    <div class="table-reponsive">
                        <div  class="modal fade" id="addtable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="width:650px;">
                                    <div class="modal-header" style="background-color:#007bff">
                                        <h3 class="modal-title" id="addtable">Thêm</h3>
                                        <button type="button" class="close" id="closetable" data-dismiss="modal" @click="closecreate" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form @on:submit.prevent method="post">
                                        <div class="modal-body">
                                        
                                            <div class="error" v-if="errors.length">
                                            <span v-for="(err,key) in errors" :key='key'>
                                                {{ err }} <br>
                                            </span>
                                            <hr>
                                            </div>
                                        
                                            <div class="form-group">
                                            <label>Tên hãng sản xuất</label>
                                            <input type="text" class="form-control" placeholder="Tên hãng sản xuất"  v-model="hangsanxuat.tenhangsanxuat" required>
                                            </div>
                                                <div class="form-group">
                                                <label for="exampleInputFile">Hình ảnh</label>
                                                <div class="input-group">
                                                    <div > 
                                                        <input type="file"  @change="onImageChange" class="images" required>
                                                    </div>
                                                    <div class="img120120" v-if="hangsanxuat.logoshow">
                                                        <img  :src="hangsanxuat.logoshow" class="img-responsive" height="120" width="120">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="modal-footer"> 
                                            <button type="button" @click="createHangsanxuat" class="btn btn-primary">Tạo</button>
                                            <button type="button" class="btn btn-secondary" @click="closecreate">Huỷ</button>
                                        </div>
                                    </form>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                    <!-- End add -->
                    <!-- Edit  -->
                    <div class="table-reponsive">
                        <div  class="modal fade" id="edittable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="width:650px;">
                                    <div class="modal-header" style="background-color:#28a745">
                                        <h3 class="modal-title" id="addtable">Cập nhật</h3>
                                        <button type="button" class="close" id="closetable" data-dismiss="modal" @click="closecreate" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form @on:submit.prevent method="post">
                                        <div class="modal-body">
                                        
                                            <div class="error" v-if="errors.length">
                                            <span v-for="(err,key) in errors" :key='key'>
                                                {{ err }} <br>
                                            </span>
                                            <hr>
                                            </div>
                                        
                                            <div class="form-group">
                                            <label>Tên hãng sản xuất</label>
                                            <input type="text" class="form-control" placeholder="Tên hãng sản xuất"  v-model="hangsanxuat.tenhangsanxuat" required>
                                            </div>
                                                <div class="form-group">
                                                <label for="exampleInputFile">Hình ảnh</label>
                                                <div class="input-group">
                                                    <div > 
                                                        <input type="file"  @change="onImageChange" class="images" required>
                                                    </div>
                                                    <div class="img120120" v-if="hangsanxuat.logoshow">
                                                        <img  :src="hangsanxuat.logoshow" class="img-responsive" height="120" width="120">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="modal-footer"> 
                                            <button type="button" @click="updateHangsanxuat(hangsanxuat)" class="btn btn-success">Cập nhật</button>
                                            <button type="button" class="btn btn-secondary" @click="closecreate">Huỷ</button>
                                        </div>
                                    </form>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                    <!-- End edit -->
                    <table  id="tablehangsanxuat" class="table table-bordered table-hover dataTable ">
                            <thead>
                                <tr>
                                <th>id</th>
                                <th>Tên hãn sản xuất</th>
                                <th>Hinh anh</th>
                                <th></th> 
                                </tr>
                            </thead>
                            <tbody >
                                <tr v-for="(hangsanxuat,index) in danhsachhangsanxuat" :key="index" >
                                <td>{{hangsanxuat.id}}</td>
                                <td>{{hangsanxuat.tenhangsanxuat}}</td>
                                <td ><img :src="'../../public/image/logo/' + hangsanxuat.logo "/></td> 
                                <td>
                                    <button type="button" class="btn btn-success" @click="editHangsanxuat(hangsanxuat)"> <i class="nav-icon fa fa-edit"></i></button>
                                    <button class="btn btn-danger"  @click="deleteHangsanxuat(hangsanxuat,index)"><i class="nav-icon fa fa-trash"></i></button>
                                </td>
                                </tr>
                            </tbody>   
                    </table>
                </div>
            </div>
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
 </section>
</template>
<script>
import axios from "axios";
import moment from "moment";
export default {
  data() {
    return {
      hangsanxuat: {
        tenhangsanxuat: "",
        logo: "",
        logoshow: ""
      },
      danhsachhangsanxuat: [],
      errors: []
    };
  },
  created() {
    this.getDanhsachhangsanxuat();
  },
  methods: {
    onImageChange(e) {
      let files = e.target.files; //|| e.dataTransfer.files
      if (!files.length) return;

      this.hangsanxuat.logo = event.target.files[0].name;

      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.hangsanxuat.logoshow = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    closecreate() {
      $("#addtable").modal("hide");
      $("#edittable").modal("hide");
      $(".images").val("");
    },
    addHangsanxuat() {
      $("#addtable").modal("show");
      this.hangsanxuat.tenhangsanxuat = "";
      this.hangsanxuat.logo = "";
      this.hangsanxuat.logoshow = "";
      $(".images").val("");
    },
    editHangsanxuat(hangsanxuat) {
      $("#edittable").modal("show");
      $(".images").val("");
      this.hangsanxuat = hangsanxuat;
    },
    createHangsanxuat() {
      axios
        .post("add", {
          tenhangsanxuat: this.hangsanxuat.tenhangsanxuat,
          logo: this.hangsanxuat.logo,
          logoshow: this.hangsanxuat.logoshow
        })
        .then(() => {
          toast({
            type: "success",
            title: "Signed in successfully",
            background: "lightblue"
          });
          $("#addtable").modal("hide");
          $("#tablehangsanxuat")
            .DataTable()
            .destroy();
          this.$nextTick(function() {
            this.getDanhsachhangsanxuat();
          });
        })
        .catch(erros => {});
    },
    updateHangsanxuat(hangsanxuat){
        axios.put('update/'+ hangsanxuat.id ,{
            tenhangsanxuat: this.hangsanxuat.tenhangsanxuat,
            logo: this.hangsanxuat.logo,
            logoshow: this.hangsanxuat.logoshow
        }).then(()=>{
             $("#edittable").modal("hide");
             swal({
            position: "top-end",
            type: "success",
            title: "Cập nhật thành công.",
            showConfirmButton: false,
            timer: 1500
          });
          this.$nextTick(()=>{
              this.getDanhsachhangsanxuat();
          })
        }).catch(error=>{

        })
        
    },
    deleteHangsanxuat(hangsanxuat, index) {
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
            .delete("delete/" + hangsanxuat.id)
            .then(response => {
              console.log(response.data.result);
              if(response.data.result == 'loi'){
                  swal("Lỗi", "Hãng sản xuất còn sản phẩm", "warning");
              }
              else
            {
                  this.danhsachhangsanxuat.splice(index, 1);
              $("#tablehangsanxuat")
                .DataTable()
                .destroy();
              this.$nextTick(function() {
                this.getDanhsachhangsanxuat();
              });
              swal("Đã xoá", "Bạn đã xoá thành công", "success");
              }
            })
            .catch(error => {
              // this.errors = error.response.data.errors.name
            });
          
        }
      });
    },
    getDanhsachhangsanxuat() {
      axios
        .get("index")
        .then(res => {
          console.log(res.data);
          this.danhsachhangsanxuat = res.data;
        })
        .then(() => {
          $("#tablehangsanxuat").DataTable();
        })
        .catch(errors => {});
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
img {
  width: 50px;
  height: 40px;
}
</style>