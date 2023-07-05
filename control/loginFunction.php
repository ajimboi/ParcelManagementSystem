<?php
session_start();
require_once('../Connections/ManaParcelServer.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the credentials exist in the courier table
    $query = "SELECT courierID, courierEmail, courierPass, courierName FROM courier WHERE courierEmail = '$email' AND courierPass = '$password'";
    $result = $ManaParcelServer->query($query);

    if ($result->num_rows > 0) {
        // Login successful as a courier
        $row = $result->fetch_assoc(); // Fetch the row data
        $_SESSION['userType'] = 'courier';
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['courierName'];
        $_SESSION['ID'] = $row['courierID']; // Set the session ID
        
        // Debug statements
        echo "Courier login successful. Session variables:";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        header("Location: ../courierPage.php");
        exit();
    }

    // Check if the credentials exist in the user table
    $query = "SELECT userID, userEmail, userPass, userName FROM user WHERE userEmail = '$email' AND userPass = '$password'";
    $result = $ManaParcelServer->query($query);

    if ($result->num_rows > 0) {
        // Login successful as a user
        $row = $result->fetch_assoc(); // Fetch the row data
        $_SESSION['userType'] = 'user';
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['userName'];
        $_SESSION['ID'] = $row['userID']; // Set the session ID

        // Debug statements
        echo "User login successful. Session variables:";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        header("Location: ../index.php");
        exit();
    }

    // Check if the credentials exist in the admin table
    $query = "SELECT adminID, adminEmail, adminPass, adminName FROM admin WHERE adminEmail = '$email' AND adminPass = '$password'";
    $result = $ManaParcelServer->query($query);

    if ($result->num_rows > 0) {
        // Login successful as an admin
        $row = $result->fetch_assoc(); // Fetch the row data
        $_SESSION['userType'] = 'admin';
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['adminName'];
        $_SESSION['ID'] = $row['adminID']; // Set the session ID

        // Debug statements
        echo "Admin login successful. Session variables:";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        header("Location: ../adminPage.php");
        exit();
    }

    // If no matching records found in any table, redirect to login page
    header("Location: ../login.php");
    exit();
} else {
    // Redirect to login page if email or password is not provided
    header("Location: ../login.php");
    exit();
}
?>
