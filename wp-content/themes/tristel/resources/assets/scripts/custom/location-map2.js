import { mapStyles } from './map-styles';

export class LocationMap {
  constructor(mapEle) {
    this.google = window.google;
    this.mapEle = mapEle;
    this.map;
    this.markers = [...this.mapEle.querySelectorAll('.location-map__marker')];

    this.args = {
      zoom: 16,
      mapTypeId: this.google.maps.MapTypeId.ROADMAP,
      styles: mapStyles,
    }

    this.mapInit();
  }

  mapInit() {

    this.map = new this.google.maps.Map( this.mapEle, this.args );
    this.map.markers = [];

    this.markers.forEach((item ) => {
      this.initMarker( item );
    });

    this.centerMap();
  }

  initMarker( markerEle) {

   // const google = window.google;
    let lat = markerEle.getAttribute('data-lat');
    let lng = markerEle.getAttribute('data-lng');

    let latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng ),
    };
  
    let marker = new this.google.maps.Marker({
        position : latLng,
        icon: localizedData.assetsPaths + '/tristel-map-marker.svg',
        map: this.map,
    });

    this.map.markers.push( marker );
  }

  centerMap() {

    var bounds = new this.google.maps.LatLngBounds();
    
    this.map.markers.forEach(( marker )  =>  {
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng(),
      });
        
    });
    console.log('bounds = ',bounds);
    
    if( this.map.markers.length == 1 ){
        this.map.setCenter( bounds.getCenter() );
    } else{
        this.map.fitBounds( bounds );
    }
  }
}
