<?php
// DB connection info
$host = "br-cdbr-azure-south-a.cloudapp.net";
$user = "bcf47cbb515149";
$pwd = "e2463bf18453f93";
$db = "acsm_e138def7b2249b4";
try{
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = "CREATE TABLE weatherUsers
    (
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(15) NOT NULL,
    pass VARCHAR(15) NOT NULL,
    email VARCHAR(40) NOT NULL,
    city VARCHAR(10) NOT NULL,
    color VARCHAR(6) NOT NULL,
    PRIMARY KEY(username)
    );";
    $conn->query($sql);
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>