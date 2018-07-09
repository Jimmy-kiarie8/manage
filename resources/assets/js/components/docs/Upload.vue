<!-- <template>
<div class="container w3-main" style="margin-left:300px;margin-top:43px;">
    -->

    <!-- <el-upload
      class="upload-demo"
      drag
      action="https://jsonplaceholder.typicode.com/posts/"
      :on-preview="handlePreview"
      :on-remove="handleRemove"
      :file-list="fileList"
      multiple>
      <i class="el-icon-upload"></i>
      <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
      <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
    </el-upload> -->



   <!--  <div id="upload">  
        <div class="form-group">
            <input type="text" class="form-control" v-model="upload.title">
        </div>
        <input id="upload-file" type="file" class="form-control" @change="fileChange"><br>
    </div>
    <button class="btn btn-primary" @click="fileUpload">Save</button>
</div>
</template>

<script>
export default {
    data() {
        return{
            /*doc: {
                file: ''
            }*/
            attachments: [],
            form: new FormData,
            upload: {
                title: ''
            }
        }
    },
    methods: {
        fileChange(e) {
            // console.log(e.target.files[0]);
            /*var fileReader = new FileReader()
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.doc.file = e.target.result
            }*/
            let selectedFiles = e.target.files;
            if (!selectedFiles.length) {
                return false;
            }

            for (let i=0; i<selectedFiles.length;i++) {
                this.attachments.push(selectedFiles[i]);
            }
            console.log(this.attachments);

            
        },
        fileUpload() {
            for (let i=0; i<this.attachments.length;i++){
                this.form.append('pics[]', this.attachments[i]);
            }
            const config = { headers: {'content-Type': 'multipart/form-data'} };
            document.getElementById('upload-file').value=[];

            axios.post('/docs', this.form,config).then((response) => {
                console.log(response)
            })
            .catch((error) => this.errors = error.response.data.errors)
        }
    }
}
</script>
 -->




 <!-- <template>
    <div class="container w3-main" style="margin-left:300px;margin-top:43px;">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8">
                <input type="file" v-on:change="onFileChange" class="form-control">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-block" @click="upload">Upload</button>
            </div>
        </div>
    </div>
</div>
</template>
<style scoped>
    img{
        max-height: 36px;
    }
</style>
<script>
    export default{
        data(){
            return {
                image: ''
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            upload(){
                axios.post('/api/upload',{image: this.image}).then(response => {

                });
            }
        }
    }
</script> -->


<template>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class="panel panel-primary col-md-6">
        <div class="panel-heading text-center">
          <h3 class="panel-title">Add Category</h3>
        </div>
        <div class="panel-body">
           <v-form v-model="valid">
                <v-text-field
                  label="Category"
                  v-model="list.name"
                  :rules="nameRules"
                  required
                ></v-text-field>
                <v-btn small color="primary"
                    @click="submit"
                >Submit</v-btn>
                <!-- <v-btn
                color="primary"
                  @click="submit"
                  :disabled="!valid"
                >
                  submit
                </v-btn> -->
            </v-form>
        </div>
        <div class="panel-footer">

        </div>
    </div>

    <div class="panel panel-primary col-md-6">
        <div class="panel-heading text-center">
          <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
           <ul class="w3-ul w3-hoverable" v-for="item in category">
                <li>{{item.name}}</li>
            </ul>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return{
            valid: false,
            list: {
                name: ''
            },
            nameRules: [
                v => !!v || 'Name is required',
                // v => v.length <= 50 || 'Name must be less than 50 characters'
            ],
            category: {}
        }
    },
    methods: {
        submit() {
            // console.log('submit');
            axios.post('/categories', this.$data.list)
            .then((response) => {
                console.log(response);
            })
            .catch((error) => this.errors = error.response.data.errors)
        }
    },
    mounted() {
        axios.post('/getCategory')
        .then((response) => {
            this.category = response.data
        })
        .catch((error) => this.errors = error.response.data.errors)
    }
}
</script>



<style scoped>
.btn:not(:disabled):not(.disabled) {
    color: #000 !important;
    padding: 5px 0 !important;
}
</style>