<template>
  <div id="home" class="w3-main" style="margin-left:300px;margin-top:43px;">
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
        <div class="w3-left"><i class="fa fa-building w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{orgniz}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>All Organizations</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{userNo}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>


  <div class="panel-heading">
    <button class="button is-primary is-outlined pull-right" @click="openAdd">Add an organization</button> 
    <small class="text-center">{{user.name}}'s page</small>
  </div>

  <div class="panel-block">
    <p class="control has-icons-left column is-4">
      <input class="input" type="text" placeholder="search" v-model="searchQuery">
      <span class="icon is-small is-left"><i class="fa fa-search" aria-hidden="true"></i></span>
    </p>
  </div>



<div class="row">
  <!-- manage -->
  <div class="col-md-6">
    <div class="panel panel-primary">
    <div class="panel-heading text-center">
      <!-- <h1 class="panel-title" 
        v-for="item,key in temp" 
        v-if="(user.id === item.user_id || user.priverage === 'Admin')">{{key}} Companies
      </h1> -->
      Companies
    </div>
    <div class="panel-body">
      <table class="w3-table w3-striped w3-bordered w3-border w3-white">
      <thead>
        <th>Name</th>
        <th>Action</th>
        <th>Status</th>
      </thead>
      <!--<li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">{{$user->name}}</span> {{$user->created_at}} <br>
      </li>-->
      <tbody v-for="mitem,key in temp">
        <tr v-if="(user.id === mitem.user_id || user.priverage === 'Admin')">
          <td>{{mitem.name}}</td>
          <td>
            <span class="panel-icon"><i class="fa fa-trash button is-default is-outlined" aria-hidden="true" @click="del(key, mitem.id)" title="delete"></i></span>
            <span class="panel-icon"><i class="fa fa-edit button is-default is-outlined" aria-hidden="true" @click="openUpdate(key)" title="edit"></i></span>
            <span class="panel-icon"><i class="fa fa-eye button is-default is-outlined" aria-hidden="true" @click="openShow(key)" title="details"></i></span> 
            <span class="panel-icon"><i style="color: #f00" class="fa fa-power-off button is-default is-outlined" aria-hidden="true" @click="openactivate(key)" title="activate or deactivate"></i></span> 
            <span class="panel-icon"><i style="color: #000" class="fa fa-users button is-default is-outlined" aria-hidden="true" @click="memberactivate(key, mitem.id)" title="Members"></i></span> 
          </td>
          <td v-if="mitem.act === 1">activated</td>
          <td v-else="mitem.act === 0">Deactivated</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  </div>

  <!-- Admin -->
  <div class="col-md-6">
    <div class="panel panel-primary">
    <div class="panel-heading text-center">
      <h3 class="panel-title">Members</h3>
    </div>
    <div class="panel-body">
        <table class="w3-table w3-striped w3-bordered w3-border w3-white">
          <thead>
            <th>Name</th>
            <th>Created on</th>
            <th>Org</th>
          </thead>
          <!--<li class="w3-padding-16">
            <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
            <span class="w3-xlarge">{{$user->name}}</span> {{$user->created_at}} <br>
          </li>-->
          <tbody v-for="Aitem,key in admin">
            <tr v-if="user.priverage === 'Org' || user.priverage === 'Admin'">
              <td>{{Aitem.name}}</td>
              <td>{{Aitem.created_at}}</td>
              <td v-for="man in manage" v-if="man.id === Aitem.manage_id">{{man.name}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="panel-footer">
        Add new
      </div>
    </div>
    
  </div>
</div>
  
    <myadd :openmodal='addActive' @closeRequest="close"></myadd>
    <myshow :openmodal='showActive' @closeRequest="close"></myshow>
    <myupdate :openmodal='updateActive' @closeRequest="close"></myupdate>
    <myactivate :openmodal='activate' @closeRequest="close"></myactivate>     
    <mymembers :openmodal='memberact' @closeRequest="close"></mymembers>     
</div>
</template>

<script>
let myadd = require('./Add.vue');
let myshow = require('./Show.vue');
let myupdate = require('./Update.vue');
let myactivate = require('./Activate.vue');
let mymembers = require('./Member.vue');
export default {
    props : ['user', 'manage'],
      components: {
        myadd, myshow, myupdate, myactivate, mymembers
      },
    data() {
      return{
      // alert: false,
        addActive: '',
        showActive: '',
        updateActive: '',
        activate: '',
        memberact: '',
        // activateActive: '',
        lists: {},
        users: {},
        orgniz: {},
        userNo: {},
        errors: {},
        searchQuery: '',
        temp: '',
        admin: {},
        membersNo: {}
      }
    },
    watch: {
      searchQuery() {
          if (this.searchQuery.length > 0) {
          this.temp = this.lists.filter((item) => {
            return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
          });
        }else{
          this.temp = this.lists
        }
      }
    },
    beforeCreate() {
      axios.post('/getData')
      .then((response) => this.lists = this.temp = response.data)
        .catch((error) => this.errors = error.response.data.errors)

    },
    beforeMount() {
        axios.post('/getAdmin')
      .then((response) => this.admin = response.data)
        .catch((error) => this.errors = error.response.data.errors)

    },
    created() {
      axios.post('/getUser')
      .then((response) => this.users = response.data)
        .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getuserNo')
      .then((response) => this.userNo = response.data)
        .catch((error) => this.errors = error.response.data.errors)

    },
    mounted() {
      axios.post('/getadminNo')
      .then((response) => this.membersNo = response.data)
        .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getorg')
      .then((response) => this.orgniz = response.data)
        .catch((error) => this.errors = error.response.data.errors) 
    },
    methods: {
      openAdd() {
        this.addActive = "is-active";
      },
      openShow(key) {
        this.$children[1].list = this.lists[key]
        this.showActive = "is-active";
      },
      openUpdate(key) {
        this.$children[2].list = this.lists[key]
        this.updateActive = "is-active";
      },
      openactivate(key) {
        this.$children[3].list = this.lists[key]
        this.activate = "is-active";
      },
      memberactivate(key, id) {
        this.$children[4].list = this.lists[key]
        this.memberact = "is-active";
      },
      del(key, id) {
        if (confirm('Are you sure')) {
          axios.delete(`/manage/${id}`)
          .then((response) => {
            this.lists.splice(key, 1)
          })
          .catch((error) => this.errors = error.response.data.errors)
        }
        
      },
      close() {
        this.addActive = this.showActive = this.updateActive = this.activate = this.memberact = ""
        
      }
    },
}
</script>