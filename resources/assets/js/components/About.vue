<template>
<div class="container">
<div id="home">  
    <nav class="panel column is-offset-2 is-8">
    	<h3>About Us</h3><hr>
        <div class="panel-block">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, similique. Non sit ea, reprehenderit doloremque nobis eos hic, enim quisquam perferendis quia? Necessitatibus eum vero distinctio facere totam cupiditate, voluptatibus!</p>
        </div>
    </nav>
</div>
</div>
</template>

<script>
let myadd = require('./Add.vue')
export default {
      components: {
        myadd
      },
    data() {
      return{
        addActive: ''
      }
    },
    methods: {
      openAdd() {
        this.addActive = "is-active";
      },
      close() {
        this.addActive = "";
      }
    }

}
</script>
