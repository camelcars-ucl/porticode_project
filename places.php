<?php
function GetData(){
	$options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    ); 
	$curl = curl_init("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=tourist+attractions+in+".$_GET['city']."&key=");//AIzaSyCt5eOwxpf76CDhdCoBUQ3ICzi-QwB4-eo
	curl_setopt_array($curl, $options);
	$xml=curl_exec($curl);
	echo $xml;
	file_put_contents($_GET['city'].".xml", $xml);
}


if (file_exists($_GET['city'].".xml")){
	if ((time() - filemtime($_GET['city'].".xml")) > 86400){
		unlink($_GET['city'].".xml");
		GetData();
	}else{
		echo file_get_contents($_GET['city'].".xml");
	}
}else{
	GetData();
}
?>