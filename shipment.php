<?php
require_once('Connections/ManaParcelServer.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$senderName = $senderAddress = $senderPoscode = '';
$trackNumber = generateTrackNumber(); // Generate the initial track number

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senderPhone = $_POST['senderPhone'];

    $query = "SELECT * FROM user WHERE userPhone = '$senderPhone'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senderName = $row['userName'];
        $senderAddress = $row['userAddress'];
        $senderPoscode = $row['userPoscode'];
        $userID = $row['userID'];
    } else {
        // Handle case when no sender details found
        echo "<script>alert('No sender details found!');</script>";
    }
}

// Function to generate a random track number
function generateTrackNumber() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $trackNumber = '';

    for ($i = 0; $i < 12; $i++) {
        $trackNumber .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $trackNumber;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ManaParcel</title>
  <link rel="stylesheet">

  <style>
    .input-container {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .input-container label {
      flex: 0 0 150px;
      text-align: right;
      margin-right: 10px;
    }

    .input-container input {
      flex: 1;
      padding: 5px;
    }
  </style>
</head>
<header>
  <?php include('control/header.php'); ?>
</header>
<body>
  <form method="post" >
    <div class="input-container">
      <label>Sender Number:</label>
      <input type="text" name="senderPhone" value="<?php echo isset($_POST['senderPhone']) ? $_POST['senderPhone'] : ''; ?>" required>
      <input type="submit" value="Search">
    </div>
  </form>
  <form method="post" action="../ManaParcelProject/control/shipmentFunction.php">
    <div class="input-container">
      <label>Sender Name:</label>
      <input type="text" name="senderName" value="<?php echo $senderName; ?>" readonly>
    </div>
    <div class="input-container">
      <label>Sender Address:</label>
      <input type="text" name="senderAddress" value="<?php echo $senderAddress; ?>" readonly>
    </div>
    <div class="input-container">
      <label>Recipient Number:</label>
      <input type="text" name="recipientNumber" id="recipientNumber" required>
    </div>
    <div class="input-container">
      <label>Recipient Name:</label>
      <input type="text" name="recipientName" id="recipientName" required>
    </div>
    <div class="input-container">
      <label>Recipient Address:</label>
      <input type="text" name="recipientAddress" id="recipientAddress" required>
    </div>
    <div class="input-container">
      <label>From Poscode:</label>
      <input type="text" name="senderPoscode" value="<?php echo $senderPoscode; ?>" readonly>
    </div>
    <div class="input-container">
      <label>To Poscode:</label>
      <input type="text" name="recipientPoscode" id="recipientPoscode" required>
    </div>
    <div class="input-container">
      <label>Package Weight:</label>
      <input type="text" name="weight" id="weight" required>
    </div>
    <div class="input-container">
      <label>Track Number:</label>
      <input type="text" name="trackID" id="tracking" value="<?php echo $trackNumber; ?>" readonly>
    </div>
    <input type="hidden" name="userID" value="<?php echo $userID; ?>">
    <input type="hidden" name="senderPhone" value="<?php echo $senderPhone; ?>">
    <input type="submit" value="Submit">
  </form>
</body>
</html>
