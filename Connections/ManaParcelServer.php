<?php
$servername = "localhost:2020";
$username = "root";
$password = "";
$dbname = "manaparcel";

// Create connection
$ManaParcelServer = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($ManaParcelServer->connect_error) {
    die("Connection failed: " . $ManaParcelServer->connect_error);
}

echo "Connected successfully to the database.";
?>
