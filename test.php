<?php require_once('Connections/ManaParcelServer.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO `user` (userEmail, userUsername, userPass, userName, userPhone) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['phoneNum'], "text"));

  mysql_select_db($database_ManaParcelServer, $ManaParcelServer);
  $Result1 = mysql_query($insertSQL, $ManaParcelServer) or die(mysql_error());

  $insertGoTo = "login1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
		<link rel="stylesheet" href="styleSignuptest.css">
</head>
<body>

<header style="display: flex; justify-content: space-between; background-color: #FF5252;">
  <div class="logo">
    <img src="pic/mplogoheader.png" width="612" height="45">
  </div>
  <div class="btn">
    <a href="login1.php"><button type="button">Login</button></a>
  </div>
</header>

<div class="form" style="text-align: center">
<h1>Sign Up</h1>
<p>Welcome to our community!</p>
<form action="<?php echo $editFormAction; ?>" name="form" method="POST">
  <p>
  <input type="email" name="email" placeholder="Enter your email">
  </p>
  <p>
    <input type="text" name="username" placeholder="Enter your username">
  </p>
  <p>
    <input type="password" name="password" placeholder="Enter your password">
  </p>
  <p>
    <input type="text" name="name" placeholder="Enter your name">
  </p>
  <p>
    <input type="text" name="phoneNum" placeholder="Enter your phone number">
  </p>
 
    <input name="submit" type="submit" id="submit" formmethod="POST" value="SIGN UP">
    <input type="hidden" name="MM_insert" value="form">
  </p>
</form>
</div>
</body>
</html>
