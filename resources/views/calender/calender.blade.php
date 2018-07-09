<!doctype html>
<html lang="en">
<head>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/calendar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.min.css') }}" rel="stylesheet">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> -->
    <style>
        #calendar{
            width: 50%;
            max-height: 400px;
            margin: auto;
        }
        table tbody .fc-day{
            width: 20px !important;
            height: 20px !important;
        }
        .fc-ltr .fc-basic-view .fc-day-number {
            /*margin-right: -40px !important;*/
            text-align: center !important;
        }

    </style>
</head>
<body>
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
        <!-- <input type="text" class="timepicker form-control"> -->
</div>


<!-- <myheader></myheader>
<div class="clearfix"></div>
<router-view></router-view>
<myApp></myApp> -->

<!-- <script>
    $('.timepicker').datatimepicker({
        format: 'HH:mm:ss'
    });
</script> -->
</body>
</html>

