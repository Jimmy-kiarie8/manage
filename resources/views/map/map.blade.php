<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google map</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map">
      
    </div>  

    <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQCpcc9kHek-YKlsZ20I3Zm9WhRj7_7kw&libraries=places">
    </script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

  </body>
</html>