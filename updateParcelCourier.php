<?php require_once('Connections/ManaParcelServer.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Courier page</title>
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
<form action="<?php echo $editFormAction; ?>" name="form" method="POST">
  <p> 
     <input type="text" name="parcelId" placeholder="Parcel ID">
  </p>
  <p>
    <input type="text" name="courierid" placeholder="Courier ID">
  </p>
    <input name="submit" type="submit" id="submit" formmethod="POST" value="UPDATE">
    <input type="hidden" name="MM_insert" value="form">
    <input type="hidden" name="MM_update" value="form">
  </p>
</form>
</div>
</body>
</body>
</html>