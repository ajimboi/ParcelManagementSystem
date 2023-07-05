<?php require_once('Connections/ManaParcelServer.php'); 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Courier Login</title>
	  <link rel="stylesheet" href="styleLogin1.css">
</head>

<body style="color: #B9DAF3" x-data="setupHeader()">
<header>
<?php include('control/header.php'); ?>
</header>
    <form action="control/loginFunction.php" id="form1" name="form1" method="POST">
        <table width="100%" border="0" align="center">
            <tbody>
            <tr>
                <td width="846" style="text-align: center; color: #000000;"><p style="font-size: xx-large">Login</p>
                    <p>Welcome Back!</p></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>
                        <input name="email" type="email" id="email" placeholder="Email">
                    </p>
                    <p>
                        <input name="password" type="password" id="password" placeholder="Password">
                    </p></td>
            </tr>
            <tr>
                <td style="text-align: center"><input type="reset" name="reset" id="reset" value="RESET">
                    <input name="submit" type="submit" id="submit" formmethod="POST" value="LOGIN"></td>
            </tr>
            </tbody>
        </table>
    </form>

</body>
</html>
