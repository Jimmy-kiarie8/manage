<!DOCTYPE html>
<html>
<title>@yield('title')</title>
<meta charset="UTF-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/calendar.min.css') }}" rel="stylesheet"> -->
 <link href="{{ asset('vuetify/css/vuetify.min.css') }}" rel="stylesheet">
<link href="{{ asset('vuetify/css/vuetify.css') }}" rel="stylesheet"> 
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/elem.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('data/DataTables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/> -->
 
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
<link rel="stylesheet" href="https://vuetifyjs.com/layout/pre-defined">
<!-- import CSS -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<div id="app">
	@yield('content')
</div>
<!-- AIzaSyBNzKeF6ZwxlAOUCyeH8UxvvYRHP_w_Guk -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('data/DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('data/DataTables/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $('#example').dataTable();
</script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> -->
<!-- <script src="{{ asset('js/moment.min.js') }}"></script> -->
<!-- <script src="{{ asset('js/calendar.min.js') }}"></script> -->
<script src="{{ asset('vuetify/js/vuetify.min.js') }}"></script>
<script src="{{ asset('vuetify/js/vuetify.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>