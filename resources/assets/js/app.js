require('./bootstrap');

// window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import 'w3-css/w3.css';

// import VeeValidate from 'vee-validate';

import Notifications from 'vue-notification'
import VueButtonSpinner from 'vue-button-spinner';
import datePicker from 'vue-bootstrap-datetimepicker';
import 'bootstrap/dist/css/bootstrap.css';
import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
import ElementUI from 'element-ui'

Vue.use(datePicker);
// import('path/to/node_modules/vuetify/dist/vuetify.min.css') 
Vue.use(ElementUI);


Vue.use(Vuetify)

Vue.use(Notifications)
Vue.use(VueButtonSpinner)
Vue.use(VueRouter)
// Vue.use(VeeValidate);

// Vue.component('myapp', require('./components/app.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));


let myadd = require('./components/Add.vue');
// let myapp = require('./components/App.vue');

// maps
// import { load } from 'vue-google-maps'
// load({
//   key: 'AIzaSyBNzKeF6ZwxlAOUCyeH8UxvvYRHP_w_Guk',
//   v: '3.24',                // Google Maps API version
//   libraries: 'places',   // If you want to use places input
// });

var AddToCalendar = require('vue-add-to-calendar');
 
Vue.use(AddToCalendar);

Vue.component('file-management', require('./components/FileManagement.vue'));
Vue.component('attachment-list', require('./components/AttachmentList.vue'));


// let file-management = require('./components/FileManagement.vue');
// let attachment-list = require('./components/AttachmentList.vue');


let myheader = require('./components/Header.vue');
let myhome = require('./components/Home.vue');
let overview = require('./components/overview/Overview.vue');
// let mypicker = require('./components/picker/Picker.vue');
let myadmin = require('./components/admin/Admin.vue');
let myupload = require('./components/docs/Upload.vue');
let mysurvey = require('./components/survey/Survey.vue');
let mycalendar = require('./components/calendar/Calendar.vue');
let myattend = require('./components/attend/Attend.vue');
let myevent = require('./components/events/Event.vue');

const routes = [
  { path: '/overview', component: overview },
  { path: '/homepage', component: myhome },
  // { path: '/picker', component: mypicker },
  { path: '/admin', component: myadmin },
  { path: '/reports', component: myattend },
  { path: '/survey', component: mysurvey },
  // { path: '/docs', component: myupload },
  { path: '/documents', component: myupload },
  { path: '/events', component: myevent },
] 

const router = new VueRouter({
	// mode: 'history',
  	routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components: {
    	// myapp, mypicker
      myheader, myhome, myadmin, myupload, mysurvey, mycalendar, 
      myattend, overview, myadd,  myevent
    },
    data: {
      user: {
        email: '',
        name: '',
        password: '',
        password_confirmation: '',
      },
      errors: {}
    },
    methods: {
      close() {
        this.$emit('closeRequest')
        this.errors = ''
      },
      save() {
        axios.post(`/user`, this.$data.user).then((response) => {
          this.close()
          // this.$parent.lists.push(response.data)
          this.user = ''
          new Noty({
              type: 'alert',
              layout: 'topCenter',
              text: 'Signup successfull you can now go to login',
              // theme: 'relax',
              animation: {
                  open: 'animated bounceInRight', // Animate.css class names
                  close: 'animated bounceOutRight' // Animate.css class names
              }
          }).show();
        })
        .catch((error) => this.errors = error.response.data.errors)      
      }
    }
});