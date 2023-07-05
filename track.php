<?php
require_once('Connections/ManaParcelServer.php');
$trackID = $_POST['trackID'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve tracking information ordered by date
$query = "SELECT currentLocation, currentDate, courierID, description FROM tracking WHERE trackID = '$trackID' ORDER BY currentDate ASC";
$result = $conn->query($query);
?>
<header>
<?php include('control/header.php'); ?>
<header>
<?php
// Check if there are any rows returned
if ($result->num_rows > 0) {
    ?>
    <section class="timeline-area">
        <?php
        // Loop through the rows and display the details
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="timeline-div">
                <h2><?php echo $row['currentLocation']; ?></h2>
                <h3><?php echo $row['description']; ?></h3>
                <h4><?php echo $row['currentDate']; ?></h4>
            </div>
            <?php
        }
        ?>
    </section>
    <link rel="stylesheet" href="../ManaParcelProject/style/styleTimeline.css">
    <?php
} else {
    echo "No tracking information found.";
}

$conn->close();
?>
