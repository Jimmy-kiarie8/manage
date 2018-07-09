<template>
<div class="container">
    <div id="show">
		<div class="modal" :class="openmodal">
		  <div class="modal-background"></div>
			<div class="modal-card"  style="width: 1100px;">
		    	<header class="modal-card-head">
			      	<p class="modal-card-title">{{ list.name }}'s details</p>
			      	<button class="delete" aria-label="close" @click="close"></button>
		    	</header>
			    <section class="modal-card-body">
				    	<table class="w3-table w3-striped w3-bordered w3-border w3-white">
					      <thead>
					        <th>Name</th>
					        <th>Email</th>
					        <th>Id number</th>
					        <th>Member number</th>
					        <th>Mobile number</th>
					        <th>Shares</th>
					        <th>Divided balance</th>
					        <th>Created on</th>
					      </thead>
					      <!--<li class="w3-padding-16">
					        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
					        <span class="w3-xlarge">{{$user->name}}</span> {{$user->created_at}} <br>
					      </li>-->

					      <tbody v-for="item in members">
					        <tr v-if="item.manage_id === list.id">
					          <td>{{item.name}}</td>
					          <td>{{item.email}}</td>
					          <td>{{item.id_number}}</td>
					          <td>{{item.member_number}}</td>
					          <td>{{item.mobile_number}}</td>
					          <td>{{item.shares}}</td>
					          <td>{{item.divided_balance}}</td>
					          <td>{{item.created_at}}</td>
					        </tr>
					      </tbody>
					    </table>
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
    		list: '',
    		members: {}
    	}
    },
    created() {
      axios.post('/getAdmin')
      .then((response) => {
      	this.members = response.data
      })
        .catch((error) => this.errors = error.response.data.errors)
    },
    methods: {
    	close() {
    		this.$emit('closeRequest');
    	}
    }
}
</script>
