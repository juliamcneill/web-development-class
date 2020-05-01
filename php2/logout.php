<?php
  setcookie('username', '', time() - 3600);
  setcookie('firstName', '', time() - 3600);
  setcookie('lastName', '', time() - 3600);
  setcookie('loggedin', '', time() - 3600);

  header('Location: ' . 'admin.php');
?>
