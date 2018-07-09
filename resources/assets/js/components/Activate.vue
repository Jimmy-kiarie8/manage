<template>
<div class="container">
    <div id="active">
        <div class="modal" :class="openmodal">
          <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title">Update {{ list.name }}'s details</p>
                <button class="delete" aria-label="close" @click="close"></button>
                </header>
                <section class="modal-card-body">
                <input type="number" :class="{'is-danger':errors.act}" v-model="list.act" max="1" min="0">
                <small class="has-text-danger" v-if="errors.act">{{ errors.act[0] }}</small>
                <!-- <button class="btn btn-primary" @click="active" v-model="list.act">Activate</button>
                <button class="btn btn-danger" @click="deactive" v-model="list.act">Deactivate</button> -->
                <p :act="active"></p>
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
            list: {
                act: ''
            },
            errors: {}
        }
    },
    methods: {
        active() {
            this.act = 1
            console.log(this.act);
        },
        deactive() {
            this.act = 0
            console.log(this.act);
        },
        close() {
            this.$emit('closeRequest');
        },
        update() {
            axios.patch(`/active/${this.list.id}`, this.$data.list).then((response) => {
                this.close()
                /*new Noty({
                    type: 'alert',
                    layout: 'topCenter',
                    text: 'update successifull',
                    // theme: 'semanticui',
                    animation: {
                        open: 'animated bounceInRight', // Animate.css class names
                        close: 'animated bounceOutRight' // Animate.css class names
                    }
                }).show();*/
                // this.$parent.lists.push(response.data)
            })
              .catch((error) => this.errors = error.response.data.errors)
        },
    }
}
</script>