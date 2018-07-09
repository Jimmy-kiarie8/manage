<template>
  <div  class="container w3-main" style="margin-left:300px;margin-top:43px;">
      <div id="add">
        
        <div class="modal" :class="openmodal">
          <div class="modal-background"></div>
          <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">Add new Event</p>
                <button class="delete" aria-label="close" @click="close"></button>
              </header>
              <section class="modal-card-body">
                <v-form v-model="valid">              
                    <v-text-field
                      label="Title"
                      v-model="list.title"
                      :rules="titleRules"                      
                      :counter="10"
                      required
                    ></v-text-field>
                    <small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
                <!-- <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" v-model="list.title" :class="{'is-danger':errors.title}" class="form-control">
                </div>
                <small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small> -->
                <div class="form-group">
                  <label for="">Date</label>
                  <date-picker v-model="list.start_date" :class="{'is-danger':errors.start_date}" :config="config"></date-picker>
                </div>
                <small class="has-text-danger" v-if="errors.start_date">{{ errors.start_date[0] }}</small>
                <div class="clearfix"></div>
                <!-- Time Picker -->
                <el-time-select
                  placeholder="Start time"
                  v-model="list.startTime"
                  :picker-options="{
                    start: '05:00',
                    step: '00:30',
                    end: '23:59'
                  }">
                </el-time-select>
                <small class="has-text-danger" v-if="errors.start_time">{{ errors.start_time[0] }}</small>
                <div class="clearfix"></div>
                <el-time-select
                  placeholder="End time"
                  v-model="list.endTime"
                  :picker-options="{
                    start: '05:00',
                    step: '00:30',
                    end: '23:59',
                    minTime: list.startTime
                  }">
                </el-time-select>
                <small class="has-text-danger" v-if="errors.end_time">{{ errors.end_time[0] }}</small>
                </v-form>
              </section>
              <footer class="modal-card-foot">
                <button class="button is-rounded is-hovered" @click="save">Add</button>
                <button class="button is-rounded is-hovered" @click="close">Cancel</button>
              </footer>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  // Import required dependencies 
  import 'bootstrap/dist/css/bootstrap.css';
  
  // Import this component
  import datePicker from 'vue-bootstrap-datetimepicker';
  
  // Import date picker css
  import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
   
export default {
  props:['openmodal'],
  data () {
    return {
      valid: false,
      name: '',
      titleRules: [
          v => !!v || 'Title is required',
          // v => v.length <= 50 || 'Name must be less than 50 characters'
      ],
      list: {
        start_date: new Date(),
        title: '',
        startTime: '',
        endTime: '',
      },
      errors: {},
      config: {
        format: 'YYYY-MM-DD',
        useCurrent: false,
      }       
    }
  },
  components: {
    datePicker
  },
  methods: {
    close() {
      this.$emit('closeRequest');
      this.errors = {};
    },
      // alertms() {
      //   this.$emit('alertRequest');
      // },
    save(){
      axios.post('/calendar', this.$data.list).then((response)=> {
        this.close()
          // this.alertms()
          this.$parent.lists.push(response.data)
          // console.log(response);
          // this.list = ''
          // this.showUpdate()
          /*new Noty({
            type: 'alert',
            layout: 'topCenter',
            text: 'add successifull',
            // theme: 'relax',
            animation: {
                open: 'animated bounceInRight', // Animate.css class names
                close: 'animated bounceOutRight' // Animate.css class names
            }
        }).show();*/
          // this.list.title = ''
      })
        .catch((error) => this.errors = error.response.data.errors)
    }
  }
}
</script>

<style scoped>
  .modal .modal-card-body{
    padding: 100px !important;
  }
  .modal .dropdown-menu{
    padding: 90px !important;
  }
</style>