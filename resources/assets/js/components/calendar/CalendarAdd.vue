<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Add new Event</p>
		      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    <div class="field">
					<div class="control">
						<label for="title">Event Name</label>
						<input class="input" :class="{'is-danger':errors.title}" type="text" placeholder="Enter title" v-model="list.title">
					</div>
					<small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Start day</label>
						<input class="input" :class="{'is-danger':errors.start_date}" type="text" placeholder="yy-mm-dd eg 2018-02-01" v-model="list.start_date">
						<small class="has-text-danger" v-if="errors.start_date">{{ errors.start_date[0] }}</small>
					</div>
				</div>
			    </section>
			    <footer class="modal-card-foot">
			      <button class="button is-rounded is-hovered"  :class="{'is-danger':errors.color}" @click="save">Add</button>
			      <button class="button is-rounded is-hovered" @click="close">Cancel</button>
			    </footer>
		    </div>
		</div>
    </div>
</div>
</template>

<script>
export default {
    props:['openmodal'],
    data() {
    	return{
    		list: {
				title: '',
				start_date: '',
			},
    		errors: {}
    	}
    },
    /*notifications: {
      showUpdate: { // You can have any name you want instead of 'showLoginError'
        title: 'Deleted',
        message: 'Deletion successifull',
        type: 'success' // You also can use 'VueNotifications.types.error' instead of 'error'
      }
    },*/
    methods: {
    	close() {
    		this.$emit('closeRequest');
    		this.errors ='';
    	},
    	save(){
			axios.post('/calendar', this.$data.list).then((response)=> {
				this.close()
    			this.$parent.lists.push(response.data)
    			// console.log(response);
    			this.list = ''
    			// this.showUpdate()
    			new Noty({
				    type: 'alert',
				    layout: 'topCenter',
				    text: 'add successifull',
				    // theme: 'relax',
				    animation: {
				        open: 'animated bounceInRight', // Animate.css class names
				        close: 'animated bounceOutRight' // Animate.css class names
				    }
				}).show();
    			// this.list.title = ''
			})
			.catch((error) => this.errors = error.response.data.errors)
		}
    }
}

</script>
