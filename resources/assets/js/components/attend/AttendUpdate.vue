<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Update details</p>
		      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    	<v-form v-model="valid">					    
			    		<v-text-field
					      label="proxies"
					      v-model="list.proxies"
					      :counter="10"
					    ></v-text-field>
					    <v-flex xs12>
					       <v-text-field box multi-line label="Comment" v-model="list.comments"></v-text-field>
					    </v-flex>
					    <v-checkbox
					      :label="`Register to attend: ${checkbox.toString()}`"
					      v-model="list.registered"
					    ></v-checkbox>
					    <v-checkbox
					      :label="`Atended: ${checkbox.toString()}`"
					      v-model="list.attended"
					    ></v-checkbox>
					</v-form>
			    <!-- <div class="field">
					<div class="control">
						<label for="">Select a proxie to attend for you</label>
						<input class="input" :class="{'is-danger':errors.proxies}" type="text" placeholder="Enter proxie name" v-model="list.proxies">
						<small class="has-text-danger" v-if="errors.proxies">{{ errors.proxies[0] }}</small>
					</div>
				</div>
			    <div class="field">
					<div class="control">
						<label for="name">Mark the box if you will attend</label>
						<input :class="{'is-danger':errors.registered}" type="checkbox" v-model="list.registered">
					</div>
					<small class="has-text-danger" v-if="errors.registered">{{ errors.registered[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="name">Mark the box if you will attended</label>
						<input :class="{'is-danger':errors.attended}" type="checkbox" v-model="list.attended">
					</div>
					<small class="has-text-danger" v-if="errors.attended">{{ errors.attended[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Your comment</label>
						<textarea id="" cols="30" rows="10" class="form-control" :class="{'is-danger':errors.comments}" v-model="list.comments" placeholder="your comment"></textarea>
					</div>
					<small class="has-text-danger" v-if="errors.comments">{{ errors.comments[0] }}</small>
				</div> -->
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
    props:['openmodal'],
    data() {
    	return{
    	checkbox: true,
    		list: {},
    		errors: {},
    		// form
    		valid: false,
		    name: '',
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    numberRules: [
		        v => !!v || 'member number is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    colorRules: [
		        v => !!v || 'shares are required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    numberRules: [
		        v => !!v || 'Telephone number is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    logoRules: [
		        v => !!v || 'Logo balance is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    email: '',
		    emailRules: [
		        v => !!v || 'E-mail is required',
		        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
		    ]
    	}
    },
    methods: {
    	close() {
    		this.$emit('closeRequest');
    	},
    	/*alertms() {
    		this.$emit('alertRequest');
    	},*/
    	update() {
    		axios.patch(`/report/${this.list.id}`, this.$data.list).then((response) => {
    			this.close()
    			// this.alertms()
    			/*new Noty({
				    type: 'alert',
				    layout: 'topCenter',
				    text: 'update successifull',
				    // theme: 'relax',
				    animation: {
				        open: 'animated bounceInRight', // Animate.css class names
				        close: 'animated bounceOutRight' // Animate.css class names
				    }
				}).show();*/
				// console.log(response);
    		})
			  .catch((error) => this.errors = error.response.data.errors)
    	}
    }
}
</script>
