<?php
if (file_exists($_GET['city'].".xml")){
	echo json_decode(file_get_contents($_GET['city'].".xml"));
	echo "MEH";
}else{
	echo "HERE";
	$curl = curl_init("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=tourist+attractions+in+".$_GET['city']."&key=AIzaSyB39gn3Le7ynVvxC-7GVvrtF3lIur60vsk");
	$xml=curl_exec($curl);
	echo $xml;
	file_put_contents($_GET['city'].".xml", json_encode($xml));
}
?>