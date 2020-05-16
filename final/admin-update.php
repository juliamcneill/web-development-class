<?php

  if ($_COOKIE['loggedin'] == 'yes') {

    include ('config.php');
    include ('admin.php');

    $journalTitle = $_POST['journalTitle'];
    $journalDate = $_POST['journalDate'];
    $journalContent = $_POST['journalContent'];

    $cleanTitle = htmlentities($journalTitle);
    $cleanDate = htmlentities($journalDate);
    $cleanContent = htmlentities($journalContent);

    if(isset($_COOKIE['postToEdit'])) {
      $filename = $_COOKIE['postToEdit'];

      file_put_contents($filename, html_entity_decode($cleanTitle.$cleanDate.$cleanContent));
    }

    header('Location: admin.php');

  }

  else {

    header('Location: index.html');

  }


 ?>
