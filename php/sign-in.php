<?php

define('DB_HOST', 'br-cdbr-azure-south-a.cloudapp.net');
define('DB_NAME', 'acsm_e138def7b2249b4');
define('DB_USER','bcf47cbb515149');
define('DB_PASSWORD','e2463bf18453f93');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


if (!empty($_POST['userName'])) {

    $query = mysql_query("SELECT * FROM weatherUsers WHERE username = '$_POST[userName]' and pass = '$_POST[pass]'");

    if ($row = mysql_fetch_array($query)) {


        echo json_encode($row);

    } else {

        echo "failure";

    }
}