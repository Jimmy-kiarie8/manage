<template>
  <div id="view" class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{comNo}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Comments</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-building w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{orgniz}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Organizations</h4>
      </div>
    </div>
  <!--   <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div> -->
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

  <div class="w3-container">
    <h5>Organizations</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <thead>
        <th>Name</th>
        <th>Created at</th>
      </thead>
      <tbody v-for="item,key in lists">
        <tr>
          <td>{{item.name}}</td>
          <td>{{item.created_at}}</td>
        </tr>
      </tbody>
    </table><br>
    <router-link to="/homepage" class="w3-button w3-dark-grey">More Organizations &nbsp;<i class="fa fa-arrow-right"></i></router-link>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <thead>
        <th>Name</th>
        <th>Created at</th>
      </thead>
      <!--<li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">{{$user->name}}</span> {{$user->created_at}} <br>
      </li>-->
      <tbody v-for="item,key in temp">
        <tr>
          <td>{{item.name}}</td>
          <td>{{item.created_at}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <hr>

  <div id="users" class="w3-container">
    <h5>Recent Comments</h5>
    <div id="users" class="w3-container">
      <h5>Comments</h5>
      <div class="w3-row" v-for="comments in comms">
        <div class="w3-col m2 text-center">
          <!-- <img class="w3-circle" src="/storage/img/team/team1.jpg" style="width:96px;height:96px"> -->
        </div>
        <div class="w3-col m10 w3-container">
          <h4>{{comments.user_name}} <span class="w3-opacity w3-medium">{{comments.created_at}}</span></h4>
          <p>{{comments.comments}}</p><br>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Footer -->
  <footer id="footer" class="w3-container w3-padding-16 w3-light-grey">
    <v-flex xs12>
       <v-text-field box multi-line label="Comment" placeholder="type your comment" v-model="list.comments"></v-text-field>
    </v-flex>
      <button class="button is-hovered is-primary" @click="save">Comment</button>
    <!-- <div class="form-group col-md-6 col-md-offset-3">
      <label for="">Comment</label>
      <textarea cols="10" rows="7" :class="{'is-danger':errors.comments}" class="form-control" v-model="list.comments" placeholder="say something..."></textarea>
      <small class="has-text-danger" v-if="errors.comments">{{ errors.comments[0] }}</small>
      <button class="button is-hovered is-primary" @click="save">Comment</button>
    </div> -->
    <div id="users" class="w3-container">
      <h5 style="color: #ddbdff">Comments</h5><hr>
      <div class="w3-row" v-for="comments in coms">
        <div class="w3-col m2 text-center">
          <!-- <img class="w3-circle" src="/storage/img/team/team1.jpg" style="width:96px;height:96px"> -->
        </div>
        <div class="w3-col m10 w3-container">
          <h4 style="color: #bab3b2">{{comments.user_name}} <span class="w3-opacity w3-medium" style="color: #6f8197">{{comments.created_at}}</span></h4>
          <p>{{comments.comments}}</p><br>
        </div>
      </div>
    </div>
  </footer>

  <!-- End page content -->
</div>
</template>

<script>
  export default{
    data () {
      return{
        temp: {},
        lists: {},
        coms: {},
        comms: {},
        comNo: {},
        userNo: {},
        orgniz: {},
        errors: {},
        list: {
          comments: ''
        }
      }
    },
    mounted() {
      axios.post('/usersinf')
      .then((response) => this.temp = response.data)
        .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getorg')
      .then((response) => this.orgniz = response.data)
        .catch((error) => this.errors = error.response.data.errors) 
    },
    created() {
      axios.post('/orginf')
      .then((response) => this.lists = response.data)
        .catch((error) => this.errors = error.response.data.errors)
      // console.log('mounted');
    },
    beforeCreate() {
      axios.post('/getComments')
      .then((response) => this.coms = response.data)
        .catch((error) => this.errors = error.response.data.errors)
      console.log('mounted');

      axios.post('/getFewComments')
      .then((response) => this.comms = response.data)
        .catch((error) => this.errors = error.response.data.errors)

        axios.post('/getCommentsNo')
      .then((response) => this.comNo = response.data)
        .catch((error) => this.errors = error.response.data.errors)

        axios.post('/getusersNo')
      .then((response) => this.userNo = response.data)
        .catch((error) => this.errors = error.response.data.errors)
    },
    methods: {
      save() {
        axios.post('/comment', this.$data.list)
        .then((response) => {
          // console.log(response)
          new Noty({
            type: 'alert',
            layout: 'topCenter',
            text: 'Comment added successifully',
            // theme: 'relax',
            animation: {
                open: 'animated bounceInRight', // Animate.css class names
                close: 'animated bounceOutRight' // Animate.css class names
            }
        }).show();
          this.list = ''
          this.coms.push(response.data)
        })
        .catch((error) => this.errors = error.response.data.errors)
      }
    }
  }
</script>