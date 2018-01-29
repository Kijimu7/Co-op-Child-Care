<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if($conn === false){

    echo "mysql connection error";
}