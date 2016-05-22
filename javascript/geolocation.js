function getLocationConstant() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(geoSuccess);
    } else {
        alert("Your browser or device doesn't support Geolocation");
    }
}

function geoSuccess(event) {
    localStorage.setItem("lat", event.coords.latitude);
    localStorage.setItem("lon", event.coords.longitude);
    localStorage.setItem("coordsExist", true);
}
