function buscarClimaPorGeolocalizacao() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            obterClima(latitude, longitude);
        }, function(error) {
            alert("Geolocalização falhou!");
            obterClima(null, null, "são paulo");
        });
    } else {
        obterClima(null, null, "são paulo");
        alert("Geolocalização não suportada pelo seu navegador.");
        
    }
}

function obterClima(lat, lon, cidade = null) {
    const apiKey = "07ba6394cc5e62f1fc138c1a0297d106";
    let url = "";

    if (cidade) {
        url = `https://api.openweathermap.org/data/2.5/weather?q=${cidade}&appid=${apiKey}&units=metric&lang=pt_br`;
    } else {
        url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric&lang=pt_br`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const local = `${data.name}`;
            document.getElementById("local").innerText = `${local}`;
            document.getElementById("clima").src=`https://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
            document.getElementById("clima").alt=`Clima ${data.weather[0].description}`;
            document.getElementById("clima").title=`${data.weather[0].description}`;
            document.getElementById("temperatura").innerText = `${Math.ceil(data.main.temp)}°C`;
        })
        .catch(error => {
            alert("Erro ao buscar dados do clima.");
        });
}


buscarClimaPorGeolocalizacao();