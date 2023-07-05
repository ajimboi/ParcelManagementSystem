<?php
require_once('../Connections/ManaParcelServer.php');
$parcelID = $_GET['parcelID'];
$ID = $_GET['ID'];

// Perform the database update
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the courierID value in the parcel table
$query = "UPDATE parcel SET courierID = '$ID' WHERE parcelID = '$parcelID'";
$result = $conn->query($query);

if ($result) {
    echo "Courier ID updated successfully.";
    header("Location: ../courierPage.php");
} else {
    echo "Error updating courier ID: " . $conn->error;
}

$conn->close();
?>
