<?php
require_once('Connections/ManaParcelServer.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query_Recordset1 = "SELECT * FROM parcel";
$Recordset1 = $conn->query($query_Recordset1);
$row_Recordset1 = $Recordset1->fetch_assoc();
$totalRows_Recordset1 = $Recordset1->num_rows;

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styleAdmin.css">
</head>
<body style="background-color: #B9DAF3">
    <header>
        <?php include('control/header.php'); ?>
    </header>
    <h1> Make a new shipment </h1>
    <a href="shipment.php"><button>CREATE</button></a>
    <form id="form1" name="form1" method="post">
        <p>&nbsp;</p>
        <?php
        do {
            $trackID = $row_Recordset1['trackID'];
            $query_tracking = "SELECT * FROM tracking WHERE trackID = '$trackID' ORDER BY currentDate DESC LIMIT 1";
            $result_tracking = $conn->query($query_tracking);
            $row_tracking = $result_tracking->fetch_assoc();
        ?>
        <table width="834" border="2" align="center" cellpadding="2">
            <tbody>
                <tr>
                    <td width="368" style="text-align: center">Tracking number</td>
                    <td width="158" style="text-align: center">Courier</td>
                    <td width="137" style="text-align: center">Status</td>
                    <td width="137" style="text-align: center">Current Location</td>
                    <td width="139" style="text-align: center">Delete</td>
                    <td width="139" style="text-align: center">Update</td>
                </tr>
                <tr>
                    <td style="text-align: left"><?php echo $row_Recordset1['trackID']; ?></td>
                    <td style="text-align: center"><?php echo $row_Recordset1['courierID']; ?></td>
                    <td style="text-align: center"><?php echo $row_tracking['description']; ?></td>
                    <td style="text-align: center"><?php echo $row_tracking['currentLocation']; ?></td>
                    <td style="text-align: center">
                        <a href="control/deleteParcel.php?parcelID=<?php echo $row_Recordset1['parcelID']; ?>">Delete</a>
                    </td>
                    <td style="text-align: center">
                        <a href="updateParcel.php?parcelID=<?php echo $row_Recordset1['parcelID']; ?>&courierID=<?php echo $row_Recordset1['courierID']; ?>&trackID=<?php echo $row_Recordset1['trackID']; ?>">Update</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
        } while ($row_Recordset1 = $Recordset1->fetch_assoc());
        ?>
    </form>
</body>
</html>

<?php
$Recordset1->free_result();
$conn->close();
?>
