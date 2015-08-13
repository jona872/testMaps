@extends ('planear')

@section('content') 
<!-- //tamaño del mapita -->
    <style>
      #map-canvas {
        width: 100%;
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
  var searchBox = new google.maps.places.SearchBox((document.getElementById('event_loca')));
    /** @type {HTMLInputElement} */

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();
    var opt = { minZoom: 10, maxZoom: 18 };
      //maxZoom es la vista previa que me da...
      //min zoom es hasta donde lo voy a poder alejar... 
      //menor numero es menor el zoom que le aplican(se ve mas lejor en 1)
  map.setOptions(opt);
    //aca cargo los valores de la busqueda en location.
    var loc = document.getElementById('event_loca').value;
    $('#event_loca').val(loc);


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
        size: new google.maps.Size(75, 75),
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


      markers.push(marker);//aca pone el marcador en el mapa
                          //y al toke roke la latitudes
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      $('#lat').val(lat);
      $('#lng').val(lng);

  google.maps.event.addListener(marker, 'position_changed', function() {
    lat = marker.getPosition().lat();
    lng = marker.getPosition().lng();
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

 <div class="container" >

		<!-- model es como open, pero ya me va a cargar los campos con los datos del modelo
		 $events->idUsuario  es con loq busca -->
		{!!Form::model($event,['route'=>['event.update', $event->id_event],'method'=>'PUT'] )!!}
		@include('event.form.event')

		@if ($event->event_priv == '0')
			{!!Form::label('event_priv','Privacidad del evento?')!!}
		    <div class="row">
			    <div class="col-md-3">  
			  	    {!!Form::radio('event_priv', 'privado')!!}Privado(solo invitados)
				</div>
				<div class="col-md-3">  
				    {!!Form::radio('event_priv', 'publico',true)!!}Publico(todo el mundo)  
			    </div>
		    </div>
    	@else
			{!!Form::label('event_priv','Privacidad del evento?')!!}
		    <div class="row">
			    <div class="col-md-3">  
			  	    {!!Form::radio('event_priv', 'privado',true)!!}Privado(solo invitados)
				</div>
				<div class="col-md-3">  
				    {!!Form::radio('event_priv', 'publico')!!}Publico(todo el mundo)  
			    </div>
		    </div>
		@endif
		</br>
		<div class="row">
  			<div class="col-md-2">
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
		{!!Form::close()!!}
			</div>
			<div class="col-md-2">
			{!!Form::open(['route'=>['event.destroy', $event->id_event],'method'=>'DELETE'] )!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
			{!!Form::close()!!}
			</div>
<input type="button" value="Cancelar" class="btn btn-warning" onclick= "self.location.href = '../../event' "/>
		</div>
</div>
@stop