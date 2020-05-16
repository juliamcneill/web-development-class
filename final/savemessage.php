<?php

  // grab the message from the client
  $name = $_POST['name'];
  $msg = $_POST['message'];

  // store message in our chatdata folder
  if ($name && $msg) {
    $filename = 'data/log.txt';

    file_put_contents($filename, "<p><strong>".$name.' commented:</strong><br />'.$msg."</p>", FILE_APPEND);

    print "ok";
  }
  else {
    print "failure";
  }

 ?>
