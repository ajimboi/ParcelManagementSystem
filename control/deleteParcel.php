<?php
require_once('../Connections/ManaParcelServer.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the parcelID is provided
if (isset($_GET['parcelID'])) {
    // Get the parcelID from the URL parameter
    $parcelID = $_GET['parcelID'];

    // Delete the parcel from the database
    $query = "DELETE FROM parcel WHERE parcelID = '$parcelID'";

    if ($conn->query($query) === TRUE) {
        // Parcel deleted successfully
        echo "<script>alert('Parcel deleted successfully');</script>";
    } else {
        // Error in deleting parcel
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
} else {
    // No parcelID provided
    echo "<script>alert('ParcelID not provided');</script>";
}

$conn->close();
?>
