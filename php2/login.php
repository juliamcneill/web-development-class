<?php

  include('config.php');

  // grab the user name and password from the incoming POST stream
  $username = $_POST['username'];
  $password = $_POST['password'];

  // validate the data against the accounts file
  $data = file_get_contents($file_path . '/teacheraccounts.txt');

  // isolate each user in the text file
  $split_users = explode(PHP_EOL, $data);

  $loggedIn = false;

  for ($i = 0; $i < sizeof($split_users); $i++) {
    // isolate each value in the text file
    $split_data = explode(",", $split_users[$i]);

    // if validation is successful - indicate that they are logged in (cookie)
    if ($username == $split_data[0] && $password == $split_data[1]) {
      setcookie('loggedin', 'yes');
      $loggedIn = true;

      $timestamp = time();
      $time = date('Y-m-d h:i:sa', $timestamp);

      $line = $time . ',' . $split_data[0] . ',login' . "\n";
      file_put_contents($file_path . '/adminlog.txt', $line, FILE_APPEND);

      // set relevant cookies for account
      setcookie('username', $split_data[0]);
      setcookie('firstName', $split_data[2]);
      setcookie('lastName', $split_data[3]);

      // send them back to admin.php
      header('Location: admin.php?login=success');
    }
  }

  // otherwise we should reject them and throw an error message
  if ($loggedIn === false) {

    // send them back to admin.php
    header('Location: admin.php?login=failed');

  }

?>
