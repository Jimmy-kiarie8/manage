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
			    	<label class="column is-5"><b>Title</b></label> {{ list.title }}
			    </li>

			    <li class="panel-block">
			    	<label class="column is-5"><b>Quetions</b></label> {{ list.questions }}
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
