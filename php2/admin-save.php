<?php

  if ($_COOKIE['loggedin'] == 'yes') {

    // define system variables
    include ('config.php');

    // look at the incoming POST values
    $home = $_POST['home'];
    $about = $_POST['about'];
    $policies = $_POST['policies'];
    $alerts = $_POST['alerts'];

    // clean text
    $cleanHome = htmlentities($home);
    $cleanAbout = htmlentities($about);
    $cleanPolicies = htmlentities($policies);
    $cleanAlerts = htmlentities($alerts);

    // replace the text in the home text file
    file_put_contents($file_path.'/home.txt', html_entity_decode($cleanHome));
    file_put_contents($file_path.'/about.txt', html_entity_decode($cleanAbout));
    file_put_contents($file_path.'/policies.txt', html_entity_decode($cleanPolicies));
    file_put_contents($file_path.'/alerts.txt', html_entity_decode($cleanAlerts));

    // send them back to the admin page
    header('Location: admin.php');

  }

  else {

    header('Location: index.php');

  }


 ?>
