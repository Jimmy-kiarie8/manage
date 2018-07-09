<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
		      	<p class="modal-card-title">Update {{ list.name }}'s details</p>
		      	<button class="delete" aria-label="close"  @click="close"></button>
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
				      label="Member Number"
				      v-model="list.member_number"
				      :rules="memberRules"
				      :counter="10"
				      required
				    ></v-text-field>
				    <v-text-field
				      label="Mobile Number"
				      v-model="list.mobile_number"
				      :rules="mobileRules"
				      :counter="10"
				      required
				    ></v-text-field>
				    <v-text-field
				      label="Id Number"
				      v-model="list.id_number"
				      :rules="idRules"
				      :counter="10"
				      required
				    ></v-text-field>
				    <v-text-field
				      label="Divided number"
				      v-model="list.divided_balance"
				      :rules="dividedRules"
				      :counter="10"
				      required
				    ></v-text-field>
				    <v-text-field
				      label="Shares"
				      v-model="list.shares"
				      :rules="sharesRules"
				      :counter="10"
				      required
				    ></v-text-field>
				    <!-- <v-checkbox
				      v-model="checkbox"
				      value="1"
				      label="Option"
				      :error-messages="errors.collect('checkbox')"
				      v-validate="'required'"
				      data-vv-name="checkbox"
				      type="checkbox"
				      required
				    ></v-checkbox> -->
				  <div class="control">
				  <div class="select">
				    <select class="is-hovered" :class="{'is-danger':errors.manage_id}" v-model="list.manage_id">
				    	<option value=""></option>
				      <option v-for="item in org" :value="item.id">{{item.name}}</option>
				    </select>
				  </div>
				  <small class="has-text-danger" v-if="errors.manage_id">{{ errors.manage_id[0] }}</small>
				</div>
				<!-- <v-btn @click="clear">clear</v-btn> -->
				  </v-form>
			    <!-- <div class="field">
					<div class="control">
						<label for="name">Member Name</label>
						<input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Enter member name" v-model="list.name">
					</div>
					<small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Member Number</label>
						<input class="input" :class="{'is-danger':errors.member_number}" type="text" placeholder="Enter member telephone number" v-model="list.member_number">
					</div>
					<small class="has-text-danger" v-if="errors.number">{{ errors.number[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Mobile number</label>
						<input class="input" :class="{'is-danger':errors.mobile_number}" type="text" placeholder="Enter member mobile number" v-model="list.mobile_number">
					</div>
					<small class="has-text-danger" v-if="errors.mobile_number">{{ errors.mobile_number[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Member Email</label>
						<input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="Enter member email" v-model="list.email">
					</div>
					<small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Id number</label>
						<input class="input" :class="{'is-danger':errors.id_number}" type="text" placeholder="Enter member id number" v-model="list.id_number">
					</div>
					<small class="has-text-danger" v-if="errors.id_number">{{ errors.id_number[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Shares</label>
						<input class="input" :class="{'is-danger':errors.shares}" type="text" placeholder="Enter member shares" v-model="list.shares">
					</div>
					<small class="has-text-danger" v-if="errors.shares">{{ errors.shares[0] }}</small>
				</div>
				<div class="field">
					<div class="control">
						<label for="">Divided balance</label>
						<input class="input" :class="{'is-danger':errors.divided_balance}" type="text" placeholder="Enter member divided balance" v-model="list.divided_balance">
					</div>
					<small class="has-text-danger" v-if="errors.divided_balance">{{ errors.divided_balance[0] }}</small>
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
    props:['openmodal', 'org'],
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
		    memberRules: [
		        v => !!v || 'member number is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    sharesRules: [
		        v => !!v || 'shares are required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    idRules: [
		        v => !!v || 'Id number is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    dividedRules: [
		        v => !!v || 'divided balance is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    mobileRules: [
		        v => !!v || 'mobile number is required',
		        // v => v.length <= 10 || 'Number must be less than 10'
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
    		axios.patch(`/admin/${this.list.id}`,this.$data.list).then((response) => {
    			this.close()
    			// this.alertms()
			 /* new Noty({
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
