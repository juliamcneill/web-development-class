<?php
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
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
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink active">Admin</a></li>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Welcome to Hogwarts
        </div>
        <div id="content">

          <?php

              // see if there is a failure flag being set by the GET stream
              if ($_GET['login'] == 'failed') {
                print "Login failed!";
              }

              // if a cookie is already set indiciating that this person
              // is logged in, go ahead and show the 'secret' admin form
              if ($_COOKIE['loggedin'] == 'yes') {
          ?>


            <form method="POST" action="admin-save.php">

              Welcome, <?php
                echo $_COOKIE['firstName'] . ' ' . $_COOKIE['lastName']
                ?>!<br>
              <p><textarea name="home"><?php
                print file_get_contents($file_path.'/home.txt');
                ?></textarea></p>
              <p><textarea name="about"><?php
                print file_get_contents($file_path.'/about.txt');
                ?></textarea></p>
              <p><textarea name="policies"><?php
                print file_get_contents($file_path.'/policies.txt');
                ?></textarea></p>
              <p><textarea name="alerts"><?php
                print file_get_contents($file_path.'/alerts.txt');
                ?></textarea></p>
              <input type="submit">

            <button><a href="logout.php">Log Out</a></button>
            <button><a href="admin-report.php">Admin Report</a></button>

           <?php
              }

              // otherwise show them the regular form to log into the site
              else {
           ?>

          <form method="POST" action="login.php">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password">
            <input type="submit">
          </form>

          <?php
                }
           ?>

        </div>
      </div>
    </div>
  </body>
</html>
