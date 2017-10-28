var Places = null;
// Changes XML to JSON
function xmlToJson(xml) {
	
	// Create the return object
	var obj = {};

	if (xml.nodeType == 1) { // element
		// do attributes
		if (xml.attributes.length > 0) {
		obj["@attributes"] = {};
			for (var j = 0; j < xml.attributes.length; j++) {
				var attribute = xml.attributes.item(j);
				obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
			}
		}
	} else if (xml.nodeType == 3) { // text
		obj = xml.nodeValue;
	}

	// do children
	if (xml.hasChildNodes()) {
		for(var i = 0; i < xml.childNodes.length; i++) {
			var item = xml.childNodes.item(i);
			var nodeName = item.nodeName;
			if (typeof(obj[nodeName]) == "undefined") {
				obj[nodeName] = xmlToJson(item);
			} else {
				if (typeof(obj[nodeName].push) == "undefined") {
					var old = obj[nodeName];
					obj[nodeName] = [];
					obj[nodeName].push(old);
				}
				obj[nodeName].push(xmlToJson(item));
			}
		}
	}
	return obj;
}


function GetDestinations(City){
	var JsonFile = new XMLHttpRequest();
	var parser = new DOMParser();
	var url = "places.php?city="+City;
	JsonFile.open("GET",url,true);
	JsonFile.send();
	JsonFile.onreadystatechange = function() {
		if (JsonFile.readyState== 4 && JsonFile.status == 200) {
			Places=xmlToJson(parser.parseFromString(JsonFile.responseText,"text/xml"));
			PlacesFound(Places);
		}
	}
}