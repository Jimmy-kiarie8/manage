<template>
  <div id="home" class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- <v-alert type="success" dismissible v-model="alert">
      The process was a success
    </v-alert> -->
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Views</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>


  <div class="panel-heading">
    <button class="button is-primary is-outlined pull-right" @click="openadd">Add an event</button> 
    <small class="text-center">{{user.name}}'s page</small>
  </div>
  
  <div class="panel-block">
    <p class="control has-icons-left column is-4">
      <input class="input" type="text" placeholder="search" v-model="searchQuery">
      <span class="icon is-small is-left"><i class="fa fa-search" aria-hidden="true"></i></span>
    </p>
  </div>


  <table class="w3-table w3-striped w3-bordered w3-border w3-white">
      <thead>
        <th>Name</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Action</th>
      </thead>
      <tbody v-for="item,key in temp">
        <tr>
          <td>{{item.title}}</td>
          <td>{{item.start_time}}</td>
          <td>{{item.end_time}}</td>
          <td>
            <span class="panel-icon"><i class="fa fa-trash button is-default is-outlined" aria-hidden="true" @click="del(key, item.id)"></i></span>
              <span class="panel-icon"><i class="fa fa-edit button is-default is-outlined" aria-hidden="true" @click="openUpdate(key)"></i></span>
              <span class="panel-icon"><i class="fa fa-eye button is-default is-outlined" aria-hidden="true" @click="openShow(key)"></i></span> 
          </td>
        </tr>
      </tbody>
    </table>
    <pickeradd :openmodal="addActive" @closeRequest="close"></pickeradd>
    <pickershow :openmodal="showActive" @closeRequest="close"></pickershow>
    <pickerupdate :openmodal="updateActive" @closeRequest="close"></pickerupdate>
</div>
</template>


<script>
let pickeradd = require('./PickerAdd.vue')
let pickershow = require('./PickerShow.vue')
let pickerupdate = require('./PickerUpdate.vue')
export default{
    props : ['user'],
  components: {
    pickeradd, pickershow, pickerupdate
  },
  data() {
    return{
      // alert: false,
      addActive: '',
      showActive: '',
      updateActive: '',
      searchQuery: '',
      lists: {},
      temp: '',
      errors: {}
    }
  },
  mounted () {
    axios.post('/getEvent')
      .then((response) => this.lists = this.temp = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  },
  watch: {
    searchQuery() {
        if (this.searchQuery.length > 0) {
          this.temp = this.lists.filter((item) => {
            return item.title.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
          });
        }else{
          this.temp = this.lists
        }
    }
    
  },
  methods: {
    openadd() {
      this.addActive = 'is-active'
    },
    openShow(key) {
      this.$children[1].list = this.lists[key]
      this.showActive = 'is-active'
    },
    del(key,id) {
      if (confirm('are you sure you want to delete?')) {
        axios.delete(`/calendar/${id}`)
            .then((response) => {
              this.lists.splice(key, 1)
              // this.alert = true
              // console.log(response);
            })
            .catch((error) => this.errors = error.response.data.errors)
            /*new Noty({
            type: 'alert',
            layout: 'topCenter',
            text: 'Delete successifull',
            // theme: 'relax',
            animation: {
                open: 'animated bounceInRight', // Animate.css class names
                close: 'animated bounceOutRight' // Animate.css class names
            }
        }).show();*/
      }
      console.log(`${key} ${id}`);
    },
    openUpdate(key) {
      this.$children[2].list = this.lists[key]
      this.updateActive = 'is-active'
    },
    close() {
      this.addActive = this.showActive = this.updateActive = ''
    },
    /*alertms() {
      this.alert = true
    },*/
  }
}
</script>
