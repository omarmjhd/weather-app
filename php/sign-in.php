<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'weather');
define('DB_USER','root');
define('DB_PASSWORD','');

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