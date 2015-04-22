<?php

define('DB_HOST', 'br-cdbr-azure-south-a.cloudapp.net');
define('DB_NAME', 'weatherappdb');
define('DB_USER','bcf47cbb515149');
define('DB_PASSWORD','4569ced7');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


if(!empty($_POST['userName'])) { //checking the 'user' name which is from Sign-Up.html, is it empty or have some text

    $query = mysql_query("SELECT * FROM weatherUsers WHERE username = '$_POST[userName]'") or die(mysql_error());

    if (!$row = mysql_fetch_array($query)) {

        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $username = $_POST['userName'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $color = $_POST['color'];
        $query = "INSERT INTO weatherUsers (firstname,lastname,username,pass,email,city,color) VALUES ('$firstname','$lastname','$username','$pass','$email','$city','$color')";
        $data = mysql_query($query) or die(mysql_error());

        $createdRow = mysql_fetch_array(mysql_query("SELECT * FROM weatherUsers WHERE username = '$_POST[userName]'"));

        echo json_encode($createdRow);

    } else {

        echo "duplicate";

    }



}


?>