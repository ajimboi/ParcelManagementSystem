<?php
session_start();
require_once('../Connections/ManaParcelServer.php');
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $parcelID = $_POST['parcelID'];
  $courierID = $_POST['courierID'];
  $trackID = $_POST['trackID'];
  $currentLocation = $_POST['currentLocation'];
  $description = $_POST['description'];

  // Get the adminID from the current session or wherever you have it stored
  $adminID = $_SESSION['ID']; 
  // Insert the data into the tracking table
  $query = "INSERT INTO tracking (currentLocation, trackID, parcelID, adminID, courierID, description)
            VALUES ('$currentLocation', '$trackID', '$parcelID', '$adminID', '$courierID', '$description')";

  if ($conn->query($query) === TRUE) {
    // Tracking information inserted successfully
    echo "<script>alert('Tracking information inserted successfully');</script>";
    header("Location: ../adminPage.php");
  } else {
    // Error in inserting tracking information
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }
}

$conn->close();
?>
