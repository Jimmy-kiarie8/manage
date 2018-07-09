<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Update {{ list.name }}'s details</p>
		      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    	<v-form v-model="valid">
					    <v-text-field
					      label="Name"
					      v-model="list.name"
					      :rules="nameRules"
					      :counter="10"
					      required
					    ></v-text-field>
					    <v-text-field
					      label="E-mail"
					      v-model="list.email"
					      :rules="emailRules"
					      required
					    ></v-text-field>
					    <v-text-field
					      label="Telephone Number"
					      v-model="list.number"
					      :rules="numberRules"
					      :counter="10"
					      required
					    ></v-text-field>
					    <v-text-field
					      label="Logo"
					      v-model="list.logo"
					      :rules="logoRules"
					      :counter="10"
					      required
					    ></v-text-field>
					    <v-text-field
					      label="Color"
					      v-model="list.color"
					      :rules="colorRules"
					      :counter="10"
					      required
					    ></v-text-field>
					</v-form>
			    <!-- <div class="field">
					<div class="control">
						<label for="name">Sacco Name</label>
						<input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Enter sacco name" v-model="list.name">
					</div>
					<small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Sacco Telephone Number</label>
						<input class="input" :class="{'is-danger':errors.number}" type="text" placeholder="Enter sacco telephone number" v-model="list.number">
						<small class="has-text-danger" v-if="errors.number">{{ errors.number[0] }}</small>
					</div>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Sacco Email</label>
						<input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Enter sacco email" v-model="list.email">
					</div>
					<small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Sacco Logo</label>
						<input class="input" :class="{'is-danger':errors.logo}" type="text" placeholder="Enter sacco logo" v-model="list.logo">
					</div>
					<small class="has-text-danger" v-if="errors.logo">{{ errors.logo[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Main colors</label>
						<input class="input" :class="{'is-danger':errors.color}" type="text" placeholder="Enter sacco Main colors" v-model="list.color">
					</div>
					<small class="has-text-danger" v-if="errors.color">{{ errors.color[0] }}</small>
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
    	// alertms() {
    	// 	this.$emit('alertRequest');
    	// },
    	update() {
    		axios.patch(`/manage/${this.list.id}`, this.$data.list).then((response) => {
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
    		})
			  .catch((error) => this.errors = error.response.data.errors)
    	}
    }
}
</script>
