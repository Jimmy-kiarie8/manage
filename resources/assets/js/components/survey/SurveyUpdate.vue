<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Update {{ list.title }}'s details</p>
		      	<button class="delete" aria-label="close"  @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    	<v-form v-model="valid">					    
			    		<v-text-field
					      label="Title"
					      v-model="list.title"
					      :rules="titleRules"
					    ></v-text-field>
					    <v-flex xs12>
					       <v-text-field box multi-line 
					       		label="Questionare" 
					       		v-model="list.questions"
					      		:rules="commentRules"
					      	>
					       	</v-text-field>
					    </v-flex>
					</v-form>
			    <!-- <div class="field">
					<div class="control">
						<label for="name">Title</label>
						<input class="input" :class="{'is-danger':errors.title}" type="text" placeholder="Enter the title" v-model="list.title">
					</div>
					<small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Questions</label>
						<textarea cols="30" rows="10" class="form-control" :class="{'is-danger':errors.title}"  v-model="list.questions"></textarea>
					</div>
					<small class="has-text-danger" v-if="errors.number">{{ errors.number[0] }}</small>
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
    		list: {},
    		errors: {},
    		// form
    		valid: false,
		    name: '',
		    titleRules: [
		        v => !!v || 'Title is required',
		        // v => v.length <= 10 || 'Name must be less than 50 characters'
		    ],
		    commentRules: [
		        v => !!v || 'Questions are required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
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
    		axios.patch(`/survey/${this.list.id}`,this.$data.list).then((response) => {
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
    			// this.$parent.lists.push(response.data)
    			// console.log(response);
    		})
			  .catch((error) => this.errors = error.response.data.errors)
    	}
    }
}
</script>
