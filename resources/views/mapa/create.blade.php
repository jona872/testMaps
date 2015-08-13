@extends('planear')
@section('content')


    <style>
      #map-canvas {
        width: 400px;
        height: 300px;
      }
    </style>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
function initialize() {
    var markers = [];
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom:11,
    center: new google.maps.LatLng(-31.741317989222836, -60.51154777055223),//parana
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  //limites de arg. con   map.fitBounds(defaultBounds); al final de esto
  var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-22.715, -66.840),
        new google.maps.LatLng(-48.048, -66.093));
//map.fitBounds(defaultBounds);

  // Create the search box and link it to the UI element.

//si quiero que el search este adentro del mapa le pongo push
 // map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('searchmap'));
  var searchBox = new google.maps.places.SearchBox((document.getElementById('searchmap')));
    /** @type {HTMLInputElement} */

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

    <div class="container">
    	<div class="col-sm-5">
    		<h1> Add Vendor, Location </h1>
        
        {!!Form::open(['route'=>'mapa.store','method'=>'POST','files'=>true])!!}
    		<div class="form-group">
    			<label for="">Title</label>
    			<input type="text" class="form-control input-sm" name="title">
    		</div>
    		<div class="form-group">
    			<label for="">Map</label>
    			<input type="text" id="searchmap" class="form-control">
    			<div id="map-canvas"></div>
    		</div>
    		<div class="form-group">
    			<label for="">Lat</label>
    			<input type="text" id="lat" name="lat" class="form-control input-sm">   
    		</div>

    		<div class="form-group">
    			<label for="">Lng</label>
    			<input type="text" id="lng" name="lng" class="form-control input-sm">
    		</div>   
        <div class="form-group" >
  {!!Form::label('event_name','Name: ')!!}
  {!!Form::text('event_name',null,['id'=> 'event_name', 'class'=> 'form-control', 'placeholder'=>'event_name aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_desc','Description: ')!!}
  {!!Form::text('event_desc',null,['id'=> 'event_desc', 'class'=> 'form-control', 'placeholder'=>'event_desc aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_date','event_date: ')!!}
  {!!Form::date('event_date',null,['id'=> 'event_date', 'class'=> 'form-control', 'placeholder'=>'cantidad aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_type','type: ')!!}
{!!Form::select('event_type', array('def' => 'Select Type','Party' => 'Party', 'Work' => 'Work', 'Friendly' => 'Friendly', 'Other' => 'Other'), 'def',array('class' => 'form-control'))!!}
</div>
<div class="form-group" >
  {!!Form::label('event_loca','event_loca: ')!!}
  {!!Form::text('event_loca',null,['id'=> 'event_loca', 'class'=> 'form-control', 'placeholder'=>'event_loca aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_priv','event_priv: ')!!}
  {!!Form::text('event_priv',null,['id'=> 'event_priv', 'class'=> 'form-control', 'placeholder'=>'event_priv aca'])!!}
</div>
		{!!Form::submit('SaveCon{Form}',['class'=>'btn btn-primary']) !!}
		<button class="btn btn-sm btn-danger">Save</button> 
	{!!Form::close()!!}

    	</div>
    </div>



@endsection

