<?php

  include('config.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = file_get_contents($file_path . '/accounts.txt');

  $split_users = explode(PHP_EOL, $data);

  $loggedIn = false;

  for ($i = 0; $i < sizeof($split_users); $i++) {
    $split_data = explode(",", $split_users[$i]);

    if ($username == $split_data[0] && $password == $split_data[1]) {
      setcookie('loggedin', 'yes');
      $loggedIn = true;

      setcookie('username', $split_data[0]);

      header('Location: admin.php?login=success');
    }
  }

  if ($loggedIn === false) {

    header('Location: admin.php?login=failed');

  }

?>
