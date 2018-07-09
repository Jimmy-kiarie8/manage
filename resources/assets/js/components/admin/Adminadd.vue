<template>
<div class="container">
    <div id="add">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">Add new member</p>
			      	<a href="/csv" class="btn btn-primary">Add from a csv file</a>
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
					<small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
				    <v-text-field
				      label="E-mail"
				      v-model="list.email"
				      :rules="emailRules"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
				    <v-text-field
				      label="Member Number"
				      v-model="list.member_number"
				      :rules="memberRules"
				      :counter="10"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.member_number">{{ errors.member_number[0] }}</small>
				    <v-text-field
				      label="Mobile Number"
				      v-model="list.mobile_number"
				      :rules="mobileRules"
				      :counter="10"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.mobile_number">{{ errors.mobile_number[0] }}</small>
				    <v-text-field
				      label="Id Number"
				      v-model="list.id_number"
				      :rules="idRules"
				      :counter="10"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.id_number">{{ errors.id_number[0] }}</small>
				    <v-text-field
				      label="Divided number"
				      v-model="list.divided_balance"
				      :rules="dividedRules"
				      :counter="10"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.divided_balance">{{ errors.divided_balance[0] }}</small>
				    <v-text-field
				      label="Shares"
				      v-model="list.shares"
				      :rules="sharesRules"
				      :counter="10"
				      required
				    ></v-text-field>
					<small class="has-text-danger" v-if="errors.shares">{{ errors.shares[0] }}</small>
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
    props: ['openmodal', 'org'],
    data(){
    	return{
    		list: {
            id_number: '',
            member_number: '',
            mobile_number: '',
            divided_balance: '',
            name: '',
            email: '',
            shares: '',
    		manage_id: ''
    		},
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
    	/*clear () {
        this.$refs.form.reset()
      },*/
    	close() {
    		this.$emit('closeRequest');
    		
    		this.errors ='';
    	},
    	/*alertms() {
    		this.$emit('alertRequest');
    	},*/
    	save() {
    		//alert(JSON.stringify(this.$data.list));
    		axios.post('/admin', this.$data.list).then((response)=> {
    			this.close()
    			// this.alertms()
    			this.$parent.lists.push(response.data)
    			this.list = {}
    		})
			.catch((error) => this.errors = error.response.data.errors)
    	}
    }
}
</script>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, eum, non. Cupiditate ut voluptates sunt omnis possimus quis, veniam odit impedit quia necessitatibus rerum praesentium, dolores illo rem delectus perspiciatis? -->