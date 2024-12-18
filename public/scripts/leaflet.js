// Inicializa o mapa e define a localização e o nível de zoom
var map = L.map('map').setView([-19.633079983728564, -51.49301638451956], 4);

// Adiciona uma camada de mapa (OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

var lat = 0
var lng = 0

if(lat == 0 && lng ==0){
    console.log('Latitude e Longitude não definidas');
}
// Adiciona um marcador ao clicar no mapa
map.on('click', function(e) {
    //apaga os marcadores do mapa com nome de cad
    map.eachLayer(function(layer) {
        if (layer.title == "cad") {
            map.removeLayer(layer);
        }
    });
    
    lat = e.latlng.lat;
    lng = e.latlng.lng;

    console.log("Latitude: " + lat + " Longitude: " + lng);

    // Atualiza os campos invisíveis com a latitude e longitude
    if (document.getElementById('latitude') && document.getElementById('longitude')) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }

    // Adiciona um marcador no mapa
    var marker = L.marker([lat, lng]).addTo(map)
        .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
        .openPopup();
    marker.title = "cad";
});

var botaoNovo = document.getElementById('btn-novo');

botaoNovo.addEventListener('click', function() {
    if(lat == 0 && lng ==0){
        $("#myModal").modal('show')
        console.log('Latitude e Longitude não definidas');

        // cancela o submit do formulário
        event.preventDefault();
    }
});

window.addEventListener('resize', () => {
    map.invalidateSize();
    console.log('resize');
});