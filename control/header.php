<?php
session_start() ?>
<header style="display: flex; justify-content: space-between; background-color: #FF5252;">
  <div class="logo">
    <img src="pic/mplogoheader.png" width="612" height="45">
  </div>
  <div class="btn">
    <?php
    if (isset($_SESSION['name'])) {
        echo "Welcome, " . $_SESSION['name'];
        echo "<a href='../ManaParcelProject/control/logoutFunction.php'><button type='button'>Logout</button></a>";
    } else {
        echo "<a href='login.php'><button type='button'>Login</button></a>";
    }
    ?>
  </div>
</header>
