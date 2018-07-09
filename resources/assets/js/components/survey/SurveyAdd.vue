<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">Add new</p>
			      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    	<v-form v-model="valid">					    
			    		<v-text-field
					      label="Title"
					      v-model="list.title"
					      :rules="titleRules"
					    ></v-text-field>
						<small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
					    <v-flex xs12>
					       <v-text-field box multi-line 
					       		label="Questionare" 
					       		v-model="list.questions"
					      		:rules="commentRules"
					      	>
					       	</v-text-field>
							<small class="has-text-danger" v-if="errors.questions">{{ errors.questions[0] }}</small>
					    </v-flex>
					</v-form>
			    <!-- <div class="field">
					<div class="control">
						<label for="name">Title</label>
						<input class="input" :class="{ 'is-danger': errors.title}" type="text" placeholder="Enter the title" v-model="list.title">
					</div>
					<small class="has-text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Questions</label>
						<textarea cols="30" rows="10" class="form-control" :class="{ 'is-danger': errors.questions}" placeholder="enter the questions" v-model="list.questions"></textarea>
					</div>
					<small class="has-text-danger" v-if="errors.questions">{{ errors.questions[0] }}</small>
				</div> -->
			    </section>
			    <footer class="modal-card-foot">
			      <button class="button is-success" @click="save">Add</button>
			      <button class="button" @click="close">Cancel</button>
			    </footer>
		    </div>
		</div>
    </div>
</div>
</template>

<script>
export default {
    props: ['openmodal'],
    data(){
    	return{
    		list: {
    			title: '',
    			questions: ''
    		},
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
    	save() {
    		//alert(JSON.stringify(this.$data.list));
    		axios.post('/survey', this.$data.list).then((response)=> {
    			this.close()
    			// this.alertms()
    			// console.log(response);
    			this.$parent.lists.push(response.data)
    			this.list = ''
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
    		})
			.catch((error) => this.errors	= error.response.data.errors)
    	},
    	close() {
    		this.$emit('closeRequest');
    		this.errors ='';
    	},
    	/*alertms() {
    		this.$emit('alertRequest');
    	}*/
    }
}
</script>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos magni molestiae totam molestias, vero blanditiis quas, quasi reprehenderit numquam. Delectus, ipsam enim et praesentium nulla illo id, expedita iusto. Ratione! -->