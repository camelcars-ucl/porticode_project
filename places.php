<?php
if (file_exists($_GET['city'].".xml")){
	echo file_get_contents($_GET['city'].".xml");
}else{
	$curl = curl_init("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=tourist+attractions+in+".$_GET['city']."&key=AIzaSyB39gn3Le7ynVvxC-7GVvrtF3lIur60vsk");

	$xml=curl_exec($curl);
	echo $xml;
	file_put_contents($_GET['city'].".xml", $xml);
}
?>