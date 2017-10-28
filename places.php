<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "MEH";

$curl = curl_init("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=tourist+attractions+in+".$_GET['city']."&key=AIzaSyB39gn3Le7ynVvxC-7GVvrtF3lIur60vsk");

echo json_encode(curl_exec($curl));
?>