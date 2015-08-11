// $(document).ready(function(){
// 	var tablaDatos = $("#datos");
// 	var route = "http://localhost/app/ejem/public/generos";


// $.get(route, function(res){
// 		$(res).each(function(key,value){
// 			tablaDatos.append("<tr><td>"+value.idStock+"</td>"+
// 			"<td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal' >Editar</button>"+
// 			"<button class='btn btn-danger'>Eliminar</button></td></tr>");
// 		});
// 	});

// });
// function Mostrar(btn){
// 	var route = "http://localhost/app/ejem/public/genero/"+btn.value+"/edit";

// 	$.get(route, function(res){
// 		$("#id").val(res.id);
// 	});
// }




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
    $('#lat2').val(lat);


    $('#lng').val(lng);
    $('#lng2').val(lng);


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