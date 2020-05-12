<?php

  // grab the message from the client
  $name = $_POST['name'];
  $msg = $_POST['message'];

  // store message in our chatdata folder
  if ($name && $msg && preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/', $msg)) {
    $filename = 'data/log.txt';

    file_put_contents($filename, "\n".$name.': '.$msg, FILE_APPEND);

    print "ok";
  }
  else {
    print "failure";
  }

 ?>
