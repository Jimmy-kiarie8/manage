<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Update {{ list.title }} date {{ list.start_date }}</p>
		      	<button class="delete" aria-label="close"  @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" v-model="list.title" :class="{'is-danger':errors.title}" class="form-control">
                </div>
                <small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
                <div class="form-group">
                  <label for="">Date</label>
                  <date-picker v-model="list.start_date" :class="{'is-danger':errors.start_date}" :config="config"></date-picker>
                </div>
                <small class="has-text-danger" v-if="errors.start_date">{{ errors.start_date[0] }}</small>
                <div class="clearfix"></div>
                <!-- Time Picker -->
                <el-time-select
                  placeholder="Start time"
                  v-model="list.start_time"
                  :picker-options="{
                    start: '05:00',
                    step: '00:30',
                    end: '23:59'
                  }">
                </el-time-select>
                <div class="clearfix"></div>
                <el-time-select
                  placeholder="End time"
                  v-model="list.end_time"
                  :picker-options="{
                    start: '05:00',
                    step: '00:30',
                    end: '23:59',
                    minTime: list.startTime
                  }">
                </el-time-select>
			    </section>
			    <footer class="modal-card-foot">
			      <button class="button is-success" @click="update">Update</button>
			      <button class="button" @click="close">Cancel</button>
			    </footer>
		    </div>
		</div>
    </div>
</div>
</template>

<script>
export default {
    props:['openmodal', 'mes'],
    data() {
    	return{
    		list: {},
		      errors: {},
		      config: {
		        format: 'YYYY-MM-DD',
		        useCurrent: false,
		      }
    	}
    },
    methods: {
    	close() {
    		this.$emit('closeRequest');
    	},
      // alertms() {
      //   this.$emit('alertRequest');
      // },
    	update() {
    		axios.patch(`/calendar/${this.list.id}`,this.$data.list).then((response) => {
    		  this.close()
          // this.alertms()
			  /*new Noty({
				    type: 'alert',
				    layout: 'topCenter',
				    text: 'Update successifull',
				    // theme: 'relax',
				    animation: {
				        open: 'animated bounceInRight', // Animate.css class names
				        close: 'animated bounceOutRight' // Animate.css class names
				    }
				}).show();*/
    		})
			  .catch((error) => this.errors = error.response.data.errors)
		}
    }
}
</script>
