<?php
  include('config.php');
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Hogwarts School Management System</title>
    <link type="text/css" href="styles.css" rel="stylesheet" />
  </head>
  <body>
    <div id="container">
      <div id="leftcolumn">
        <img src="images/hogwarts_logo.png">
        <ul>
          <li><a href="index.php" class="navlink">Home</a></li>
          <li><a href="about.php" class="navlink active">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink">Admin</a></li>
        </ul>
      </div>
      <div id="rightcolumn">
        <?php
          $alert_data = file_get_contents($file_path."/alerts.txt");

          if ($alert_data != "") {
            print '<div id="alert">' . $alert_data . '</div>';
          }
         ?>
        <div id="header">
          About Our School
        </div>
        <div id="content">
          <?php
            include($file_path."/about.txt");
           ?>
        </div>
      </div>
    </div>
  </body>
</html>
