
@extends('planear')
@section('content')


    <style>
      #map-canvas {
        width: 500px;
        height: 400px;
      }
    </style>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <!--  <script>
    //   function initialize() {
    //     var mapCanvas = document.getElementById('map-canvas');
    //     var mapOptions = {
    //       center: new google.maps.LatLng(44.5403, -78.5463),
    //       zoom: 8,
    //       mapTypeId: google.maps.MapTypeId.ROADMAP
    //     }
    //     var map = new google.maps.Map(mapCanvas, mapOptions);
    //         var searchBox = new google.maps.places.searchBox(document.getElementById('searchmap'));
    //  google.maps.event.addDomListener(searchBox,'places_changed',function(){
    //     var places = searchBox.getPlaces();
    // });

    //   }
    //   google.maps.event.addDomListener(window, 'load', initialize);
    // </script> 
    -->


   
    <div class="container">
    	<div class="col-sm-4">
    		<h1> Add Vendor, Location </h1>
        
        {!!Form::open(['route'=>'mapa.store','method'=>'POST','files'=>true])!!}
    		<div class="form-group">
    			<label for="">Title</label>
    			<input type="text" class="form-control input-sm" name="title">
    		</div>
    		<div class="form-group">
    			<label for="">Map</label>
    			<input type="text" id="searchmap">
    			<div id="map-canvas"></div>
    		</div>
    		<div class="form-group">
    			<label for="">Lat</label>
    			<input type="text" id="lat" class="form-control input-sm">    		
    		</div>
    		<div class="form-group">
    			<label for="">Lng</label>
    			<input type="text" id="lng" class="form-control input-sm">
    		</div>   
    		<button class="btn btn-sm btn-danger">Save</button> 		
    		{!!Form::close()!!}
    	</div>
    </div>


<script>
function initialize() {
    var markers = [];
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(-33.8902, 151.1759),
      new google.maps.LatLng(-33.8474, 151.2631));
  map.fitBounds(defaultBounds);

  // Create the search box and link it to the UI element.

  map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('searchmap'));

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(document.getElementById('searchmap')));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location,
        draggable: true 
      });

      markers.push(marker);
  google.maps.event.addListener(marker, 'position_changed', function() {
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);
  });
      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</script>


@endsection