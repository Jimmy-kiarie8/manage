<template>
<div class="container">
    <div id="show">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">Details</p>
			      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
			    <li class="panel-block">
			    	<label class="column is-5"><b>Comments</b></label> {{ list.comments }}
			    </li>

			    <li class="panel-block">
			    	<label class="column is-5"><b>Attended</b></label>
			    	<div v-if="list.attended === 1">Attended</div> 
			    	<div v-else>Din't attended</div> 
			    </li>

			    <li class="panel-block">
			    	<label class="column is-5"><b>Registered to attended</b></label>
			    	<div v-if="list.registered === 1">Registered</div> 
			    	<div v-else>Din't register to attend</div> 
			    </li>

			    <li class="panel-block">
			    	<label class="column is-5"><b>Proxie who atteded</b></label>
			    	<div v-if="list.registered != null">{{ list.proxies }}</div> 
			    	<div v-else>No proxy attended</div> 
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
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt velit, sequi id harum aut qui dolor laborum dolore quisquam, facilis eum itaque quis tenetur illum quaerat impedit, et debitis ab! -->