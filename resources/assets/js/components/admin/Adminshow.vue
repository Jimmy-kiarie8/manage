<template>
<div class="container">
    <div id="show">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">{{ list.name }}'s details</p>
			      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
				    <li class="panel-block">
				    	<label class="column is-5"><b>Name</b></label> {{ list.name }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Email</b></label> {{ list.email }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Mobile Number</b></label> 	{{ list.mobile_number }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Number</b></label> 	{{ list.member_number }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Shares</b></label> 	{{ list.shares }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Divided balances</b></label> 	{{ list.divided_balance }}
				    </li>
			    </section>
			    <footer class="modal-card-foot">
			      <button class="button" @click="close">Close</button>
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
    		list: ''
    	}
    },
    methods: {
    	close() {
    		this.$emit('closeRequest');
    	}
    }
}
</script>
