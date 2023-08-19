<!DOCTYPE html>
<html>
<body>
<p id="demo"></p>

<script>
var x = document.getElementById("demo");
var y=0;

function showPosition(position) {
    y+=1;

  x.innerHTML="Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude+" "+y;
}

function loc(){
    navigator.geolocation.watchPosition(showPosition);
}

setInterval(loc,5000);
</script>

</body>
</html>