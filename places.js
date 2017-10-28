function GetDestinations(City){
	var JsonFile = new XMLHttpRequest();
	var url = "places.php?city="+city;
	JsonFile.open("GET",url,true);
	JsonFile.send();
	JsonFile.onreadystatechange = function() {
		if (JsonFile.readyState== 4 && JsonFile.status == 200) {
			console.log(JsonFile.responseText);
		}
	}
}