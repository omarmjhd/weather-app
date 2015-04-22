<?php
// DB connection info
$host = "br-cdbr-azure-south-a.cloudapp.net";
$user = "root";
$pwd = "";
$db = "weatherappdb";
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