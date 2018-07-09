<template>
<div class="container">
    <div id="header" class="wrap masthead">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="carousel-item">
                        <img src="storage/carousel/jet.jpg">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lorem ipsum dolor sit amet..</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis expedita impedit, eos non rerum eum, est. Alias impedit perspiciatis, optio voluptatibus, adipisci libero neque doloribus ullam quasi quisquam fuga quae.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-item">
                        <img src="storage/carousel/car.jpg">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lorem ipsum dolor sit amet..</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis expedita impedit, eos non rerum eum, est. Alias impedit perspiciatis, optio voluptatibus, adipisci libero neque doloribus ullam quasi quisquam fuga quae.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-item">
                        <img src="storage/carousel/pl.jpg">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lorem ipsum dolor sit amet..</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis expedita impedit, eos non rerum eum, est. Alias impedit perspiciatis, optio voluptatibus, adipisci libero neque doloribus ullam quasi quisquam fuga quae.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a>
                <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
</div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .masthead {
    position: relative;
}
/* .wrap {
    position: relative;
    left: 15.625em;
    transition: left 300ms ease;
} */
</style>