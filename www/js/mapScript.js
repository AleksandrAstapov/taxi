
// Variables
var google, myMap, myMarker = new Array();
var sities = {
  "Kharkov": {
    "params": {
      center: {lat: 49.9878, lng: 36.2336},
      zoom: 12,
      mapTypeId: "roadmap"
    },
    "cars": {
      'car001': {
        position: {lat: 49.9958, lng: 36.2416},
        title: "car001",
        content: "Петрович, Lanos"
      },
      'car002': {
        position: {lat: 49.9678, lng: 36.2736},
        title: "car002",
        content: "Макарыч, Lada" 
      },
      'car003': {
        position: {lat: 49.9898, lng: 36.2126},
        title: "car003",
        content: "Саныч, Opel" 
      },
      'car004': {
        position: {lat: 49.9938, lng: 36.2656},
        title: "car004",
        content: "Генадиевия, Ford" 
      }
    }
  }
};

// Functions
function initialize(sityName,myMap) {
  // adding map
  myMap = new google.maps.Map(document.getElementById("googleMap"),sities[sityName]["params"]);
  // adding markers
  for (var key in sities[sityName]['cars']) {
    var markProp = sities[sityName]['cars'][key];
    setMatker(key,markProp,myMap);
  };
};
//
function setMatker(markName,markProp,mapName){
  myMarker[markName] = new google.maps.Marker(markProp);
  myMarker[markName].addListener('click',function() {
    mapName.setCenter(this.getPosition());
    mapName.setZoom(14);
    if (markProp.content){
      var infowindow = new google.maps.InfoWindow(markProp);
      infowindow.open(mapName, this);
    }
  });
  myMarker[markName].setMap(mapName);
}
 
// Events
window.onload = function(){
  initialize('Kharkov',myMap);
};
