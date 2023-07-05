<?php require_once('Connections/ManaParcelServer.php');
$parcelID = $_GET['parcelID'];
$courierID = $_GET['courierID'];
$trackID = $_GET['trackID'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

			<link rel="stylesheet" href="styleSignuptest.css">
</head>

<body>
<header style="display: flex; justify-content: space-between; background-color: #FF5252;">
  <div class="logo">
    <img src="pic/mplogoheader.png" width="612" height="45">
  </div>
</header>

<div class="form" style="text-align: center">
<h1>Update Parcel</h1>
<form method="POST" action="../ManaParcelProject/control/updateParcelFunction.php">
  <p> 
     <input type="text" name="parcelID" placeholder="Parcel ID" value="<?php echo $parcelID; ?>">
  </p>
  <p>
    <input type="text" name="courierID" placeholder="Courier ID" value="<?php echo $courierID; ?>">
  </p>
  <p>
    <input type="text" name="trackID" placeholder="Track ID" value="<?php echo $trackID; ?>">
  </p>
  <p>
    <input type="text" name="currentLocation" placeholder="Current Location">
  </p>
  <p>
    <input type="text" name="description" placeholder="description">
  </p>
    <input name="submit" type="submit" id="submit" formmethod="POST" value="UPDATE">
  </p>
</form>
</div>
</body>
</body>
</html>