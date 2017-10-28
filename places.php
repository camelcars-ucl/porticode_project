<?php
$curl = curl_init("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=tourist+attractions+in+".$_GET['city']."&key=AIzaSyB39gn3Le7ynVvxC-7GVvrtF3lIur60vsk");

echo curl_exec($curl);*////http_get("https://maps.googleapis.com/maps/api/place/textsearch/xlm?query=tourist attractions in ".$_GET['city']."&key=AIzaSyB39gn3Le7ynVvxC-7GVvrtF3lIur60vsk", array("timeout"=>2), $info);
?>