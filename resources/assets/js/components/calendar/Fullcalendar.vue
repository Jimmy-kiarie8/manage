<template>
    <div class="container" id="calendar">
    <div class="panel panel-primary">
        <div class="panel-heading">
            MY Calender 
            <a href="http://manage.dev/manage#/calendar" class="btn btn-primary btn-sm pull-right">Make an event</a>   
        </div>
        <div class="panel-body" >
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
</div>
</template>

<script>

</script>
