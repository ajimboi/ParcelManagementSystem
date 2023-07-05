<?php
require_once('../Connections/ManaParcelServer.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $weight = $_POST['weight'];
    $userID = $_POST['userID'];
    $senderPoscode = $_POST['senderPoscode'];
    $senderName = $_POST['senderName'];
    $senderPhone = $_POST['senderPhone'];
    $senderAddress = $_POST['senderAddress'];
    $trackID = $_POST['trackID'];
    $recipientAddress = $_POST['recipientAddress'];
    $recipientPhone = $_POST['recipientNumber'];
    $recipientName = $_POST['recipientName'];
    $recipientPoscode = $_POST['recipientPoscode'];

    $query = "INSERT INTO parcel (weight, userID, senderPoscode, senderName, senderPhone, senderAddress, trackID, recipientAddress, recipientPhone, recipientName, recipientPoscode)
              VALUES ('$weight', '$userID', '$senderPoscode', '$senderName', '$senderPhone', '$senderAddress', '$trackID', '$recipientAddress', '$recipientPhone', '$recipientName', '$recipientPoscode')";

    if ($conn->query($query) === TRUE) {
        // Parcel inserted successfully
        echo "<script>alert('Parcel inserted successfully');</script>";
        header("Location: ../shipment.php");
    } else {
        // Error in inserting parcel
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
