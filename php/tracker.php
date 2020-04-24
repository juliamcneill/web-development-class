<!doctype html>
<html lang="en-us">
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="../style/php.css">
  </head>
  <body>

    <h1>All Myers-Briggs Test Results</h1>

    <?php

      $file = '../data/tracker.txt';
      $data = file_get_contents($file);

      $lines = explode("\n", $data);

      $intp = 0;
      $intj = 0;
      $infp = 0;
      $infj = 0;
      $istp = 0;
      $istj = 0;
      $isfp = 0;
      $isfj = 0;
      $entp = 0;
      $entj = 0;
      $enfp = 0;
      $enfj = 0;
      $estp = 0;
      $estj = 0;
      $esfp = 0;
      $esfj = 0;

      for ($i = 0; $i < sizeof($lines); $i++) {
          if ($lines[$i] === 'INTP') {
            $intp++;
            $total++;
          } else if ($lines[$i] === 'INTJ') {
            $intj++;
            $total++;
          } else if ($lines[$i] === 'INFP') {
            $infp++;
            $total++;
          } else if ($lines[$i] === 'INFJ') {
            $infj++;
            $total++;
          } else if ($lines[$i] === 'ISTP') {
            $istp++;
            $total++;
          } else if ($lines[$i] === 'ISTJ') {
            $istj++;
            $total++;
          } else if ($lines[$i] === 'ISFP') {
            $isfp++;
            $total++;
          } else if ($lines[$i] === 'ISFJ') {
            $isfj++;
            $total++;
          } else if ($lines[$i] === 'ENTP') {
            $entp++;
            $total++;
          } else if ($lines[$i] === 'ENTJ') {
            $entj++;
            $total++;
          } else if ($lines[$i] === 'ENFP') {
            $enfp++;
            $total++;
          } else if ($lines[$i] === 'ENFJ') {
            $enfj++;
            $total++;
          } else if ($lines[$i] === 'ESTP') {
            $estp++;
            $total++;
          } else if ($lines[$i] === 'ESTJ') {
            $estj++;
            $total++;
          } else if ($lines[$i] === 'ESFP') {
            $esfp++;
            $total++;
          } else if ($lines[$i] === 'ESFJ') {
            $esfj++;
            $total++;
          }
      }

      ?>

      <div id="trackingBox">

        <?php

        if ($total === 0) {
          print "<p>No votes!</p>";
        }
        else {
          print "<p>INTP: $intp</p>";
          print "<p>INTJ: $intj</p>";
          print "<p>INFP: $infp</p>";
          print "<p>INFJ: $infj</p>";
          print "<p>ISTP: $istp</p>";
          print "<p>ISTJ: $istj</p>";
          print "<p>ISFP: $isfp</p>";
          print "<p>ISFJ: $isfj</p>";
          print "<p>ENTP: $entp</p>";
          print "<p>ENTJ: $entj</p>";
          print "<p>ENFP: $enfp</p>";
          print "<p>ENFJ: $enfj</p>";
          print "<p>ESTP: $estp</p>";
          print "<p>ESTJ: $estj</p>";
          print "<p>ESFP: $esfp</p>";
          print "<p>ESFJ: $esfj</p>";
        }

      ?>

    </div>

  </body>
</html>
