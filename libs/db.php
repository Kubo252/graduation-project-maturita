<?php

// inicializovanie premenných
$servername = "localhost";
$password = "";
$username = "";
$email = "";
$dbname = "app";
$errors = array(); 

// pripojenie databázy
$db = mysqli_connect($servername, 'root', $username, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";