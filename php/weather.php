<?php

$woeid=$_GET["woeid"];
$file = "http://api.openweathermap.org/data/2.5/forecast?id=".$woeid;

$json = file_get_contents($file);

echo $json;

?>