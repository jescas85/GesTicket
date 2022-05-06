window.marker = null;

function initialize() {
  var map;
  var latitude = $('#map').attr('data-latitude');
  var longitude = $('#map').attr('data-longitude');
  var mapMarker = $('#map').attr('data-marker');
  var mapMarkerName = $('#map').attr('data-marker-name');
  var bounds = new google.maps.LatLngBounds();
  var style = [{
      "featureType": "administrative.locality",
      "elementType": "all",
      "stylers": [{
          "hue": "#2c2e33"
        },
        {
          "saturation": 7
        },
        {
          "lightness": 19
        },
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels.text",
      "stylers": [{
          "visibility": "on"
        },
        {
          "saturation": "-3"
        }
      ]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#282a00"
      }]
    },
    {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [{
          "hue": "#ffffff"
        },
        {
          "saturation": -100
        },
        {
          "lightness": 100
        },
        {
          "visibility": "simplified"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [{
          "hue": "#ffffff"
        },
        {
          "saturation": -100
        },
        {
          "lightness": 100
        },
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "poi.school",
      "elementType": "geometry.fill",
      "stylers": [{
          "color": "#f39247"
        },
        {
          "saturation": "0"
        },
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [{
          "hue": "#ffb600"
        },
        {
          "saturation": "100"
        },
        {
          "lightness": 31
        },
        {
          "visibility": "simplified"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry.stroke",
      "stylers": [{
          "color": "#ffb600"
        },
        {
          "saturation": "0"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels",
      "stylers": [{
          "hue": "#008eff"
        },
        {
          "saturation": -93
        },
        {
          "lightness": 31
        },
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "geometry.stroke",
      "stylers": [{
          "visibility": "on"
        },
        {
          "color": "#f3dbc8"
        },
        {
          "saturation": "0"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels",
      "stylers": [{
          "hue": "#bbc0c4"
        },
        {
          "saturation": -93
        },
        {
          "lightness": -2
        },
        {
          "visibility": "simplified"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [{
          "hue": "#e9ebed"
        },
        {
          "saturation": -90
        },
        {
          "lightness": -8
        },
        {
          "visibility": "simplified"
        }
      ]
    },
    {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [{
          "hue": "#e9ebed"
        },
        {
          "saturation": 10
        },
        {
          "lightness": 69
        },
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "all",
      "stylers": [{
          "hue": "#e9ebed"
        },
        {
          "saturation": -78
        },
        {
          "lightness": 67
        },
        {
          "visibility": "simplified"
        }
      ]
    }
  ];
  var mapOptions = {
    center: bounds,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    backgroundColor: "#000",
    zoom: 10,
    panControl: !1,
    zoomControl: !0,
    mapTypeControl: !1,
    scaleControl: !1,
    streetViewControl: !1,
    overviewMapControl: !1,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.LARGE
    }
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var mapType = new google.maps.StyledMapType(style, {
    name: "Grayscale"
  });
  map.mapTypes.set('grey', mapType);
  map.setMapTypeId('grey');

      
  // Multiple markers location, latitude, and longitude
  var markers = [
    ['Mérida, Yuc.', 20.991510, -89.607512],
    ['Progreso, Yuc.', 21.285502, -89.661280],
    ['Villahermosa, Tab.', 17.987815, -92.943849],
    ['Cancun, Q. Roo.', 21.160703, -86.824875]
];
                    
// Info window content
var infoWindowContent = [
    ['<div class="info_content">' +
    '<h3>Matriz - Protege</h3>' +
    '<p>Calle 19 No. 84 x 12 y 14, Colonia Itzmina. Mérida, Yucatán.<br> Teléfono:<br>(+52) 9999 26-41-71<br>(+52) 9999 26-99-45.</p>' + '</div>'],
    ['<div class="info_content">' +
    '<h3>Sucursal - Progreso</h3>' +
    '<p><p>Plaza del Mar, local interior..<br> Teléfono:<br>(+52) 9999 26-41-71<br>(+52) 9999 26-99-45.</p>' +
    '</div>'],
    ['<div class="info_content">' +
    '<h3>Sucursal - Villahermosa</h3>' +
    '<p>Av. Sitio Grande No. 128-A, Fracc. Jose Colomo. Villahermosa, Tabasco.<br> Teléfono:<br>(+52) 9933 54-23-20.</p>' +
    '</div>'],
    ['<div class="info_content">' +
    '<h3>Sucursal - Cancun</h3>' +
    '<p>Súper Manzana 73, manzana 5, lote 101-01.<br> Teléfono:<br>(+52) 9988 88-27-06.</p>' +
    '</div>']
];
    
// Add multiple markers to map
var infoWindow = new google.maps.InfoWindow(), marker, i;

// Place each marker on the map  
for( i = 0; i < markers.length; i++ ) {
    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
	var marker_image = mapMarker;
	var pinIcon = new google.maps.MarkerImage(marker_image, null, null, null, new google.maps.Size(46, 40));
    bounds.extend(position);
    marker = new google.maps.Marker({
        position: position,
        map: map,
		icon: pinIcon,
		animation: google.maps.Animation.DROP,
        title: markers[i][0]
    });
    
    // Add info window to marker    
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
        }
    })(marker, i));

    // Center the map to fit all markers on the screen
    map.fitBounds(bounds);
}

   // Set zoom level
   var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    this.setZoom(7);
    google.maps.event.removeListener(boundsListener);
});
}
var map = document.getElementById('map');
if (map != null) {
  google.maps.event.addDomListener(window, 'load', initialize)
}