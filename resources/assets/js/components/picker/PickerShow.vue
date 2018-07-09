<template>
<div class="container">
    <div id="show">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">Event date {{ list.start_date }}</p>
			      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
				    <li class="panel-block">
				    	<label class="column is-5"><b>Title</b></label> {{ list.title }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Date</b></label> {{ list.start_date }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>Start time</b></label> {{ list.start_time }}
				    </li>

				    <li class="panel-block">
				    	<label class="column is-5"><b>End time</b></label> {{ list.end_time }}
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
