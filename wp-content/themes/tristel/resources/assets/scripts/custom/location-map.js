import { mapStyles } from './map-styles';

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
export function initMap( $el ) {
  
  const google= window.google;
  let markers  = [...document.querySelectorAll('.location-map__marker')];
  // Create gerenic map.
  var mapArgs = {
      zoom        : $el.data('zoom') || 16,
      mapTypeId   : google.maps.MapTypeId.ROADMAP,
      styles: mapStyles,
  };
  var map = new google.maps.Map( $el[0], mapArgs );
  // Add markers.
  map.markers = [];
  // $markers.each(function(){
  //     initMarker( $(this), map );
  // });
  markers.forEach((item) => {
      initMarker( item, map );
  });
  // Center map based on markers.
  centerMap( map );

  // Return map instance.
  return map;
}

/**
* initMarker
*
* Creates a marker for the given jQuery element and map.
*
* @date    22/10/19
* @since   5.8.6
*
* @param   jQuery $el The jQuery element.
* @param   object The map instance.
* @return  object The marker instance.
*/
export function initMarker( markerEle, map ) {

  const google = window.google;
  var lat = markerEle.getAttribute('data-lat');
  var lng = markerEle.getAttribute('data-lng');
  var latLng = {
      lat: parseFloat( lat ),
      lng: parseFloat( lng ),
  };

  var marker = new google.maps.Marker({
      position : latLng,
      icon: localizedData.assetsPaths + '/tristel-map-marker.svg',
      map: map,
  });

  map.markers.push( marker );
}

/**
* centerMap
*
* Centers the map showing all markers in view.
*
* @date    22/10/19
* @since   5.8.6
*
* @param   object The map instance.
* @return  void
*/
export function centerMap( map ) {

  const google = window.google;
  // Create map boundaries from all map markers.
  var bounds = new google.maps.LatLngBounds();
  map.markers.forEach(function( marker ){
      bounds.extend({
          lat: marker.position.lat(),
          lng: marker.position.lng(),
      });
  });
  console.log('bounds = ',bounds);
  // Case: Single marker.
  if( map.markers.length == 1 ){
      map.setCenter( bounds.getCenter() );

  // Case: Multiple markers.
  } else{
      map.fitBounds( bounds );
  }
}
