/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function ValidForm(form){
             if(form.usuari.value.length===0) { //comprueba que no esté vacío
                form.usuari.focus();   
                alert('Camp usuari és obligatori'); 
                return false; //devolvemos el foco
                }
              if(form.password.value.length===0) { //comprueba que no esté vacío
                form.password.focus();   
                alert('Camp password és obligatori'); 
                return false; //devolvemos el foco
                }
              if(form.email.value.length===0) { //comprueba que no esté vacío
                form.email.focus();   
                alert('Camp email és obligatori'); 
                return false; //devolvemos el foco
                }
                return true;
            }
// GoogleMaps
function mapGoogle(position)
{

    var x = position.coords.latitude;
    var y = position.coords.longitude;

    var posicion = new google.maps.LatLng(x, y);

    var mapProp = {
      center:  posicion  ,
      zoom:      8,
      panControl: true,
      zoomControl: true,
      mapTypeControl: true,
      scaleControl: true,
      mapTypeId: google.maps.MapTypeId.TERRAIN
      };

      var styleArray = [
          {
            featureType: "all",
            stylers: [
              { saturation: -80 }
            ]
          },{
            featureType: "road.arterial",
            elementType: "geometry",
            stylers: [
              { hue: "#f25e4e" },
              { saturation: 50 }
            ]
          },{
            featureType: "poi.business",
            elementType: "labels",
            stylers: [
              { visibility: "off" }
            ]
          }
        ];


    var map = new google.maps.Map(document.getElementById("mapGoogle"), mapProp);
    map.setOptions({styles: styleArray});

    var marker = new google.maps.Marker({
      position: posicion,
      map: map
    });

    var rectangle = new google.maps.Rectangle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      bounds: new google.maps.LatLngBounds(
        new google.maps.LatLng(x-0.005 , y-0.005 ),
        new google.maps.LatLng(x+0.005 , y+0.005 ))
    });



}

function obtener_localizacion() {
  if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mapGoogle, gestiona_errores);
  }else{
    alert('Tu navegador no soporta la API de geolocalizacion');
  }
}

function gestiona_errores(err) {
  if (err.code == 0) {
    alert("error desconocido");
  }
  if (err.code == 1) {
    alert("El usuario no ha compartido su posicion");
  }
  if (err.code == 2) {
    alert("no se puede obtener la posicion actual");
  }
  if (err.code == 3) {
    alert("timeout recibiendo la posicion");
  }
}


google.maps.event.addDomListener(window, 'load', obtener_localizacion);

