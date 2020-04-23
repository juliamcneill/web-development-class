<!doctype html>
<html lang="en-us">
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="../style/php.css">
  </head>
  <body>

    <h1>Myers-Briggs Test Results</h1>

    <?php

      $answers = $_POST['answers'];

      $e = 0;
      $i = 0;
      $s = 0;
      $n = 0;
      $t = 0;
      $f = 0;
      $j = 0;
      $p = 0;

      for ($index = 0; $index < sizeof($answers); $index++) {
        if ($answers[$index] == 'e') {
          $e++;
        }
        if ($answers[$index] == 'i') {
          $i++;
        }
        if ($answers[$index] == 's') {
          $s++;
        }
        if ($answers[$index] == 'n') {
          $n++;
        }
        if ($answers[$index] == 't') {
          $t++;
        }
        if ($answers[$index] == 'f') {
          $f++;
        }
        if ($answers[$index] == 'j') {
          $j++;
        }
        if ($answers[$index] == 'p') {
          $p++;
        }
      }

      $type = '';
      if ($e > $i) {
        $type .= 'E';
      } else {
        $type .= 'I';
      }
      if ($s > $n) {
        $type .= 'S';
      } else {
        $type .= 'N';
      }
      if ($t > $f) {
        $type .= 'T';
      } else {
        $type .= 'F';
      }
      if ($j > $p) {
        $type .= 'J';
      } else {
        $type .= 'P';
      }

    ?>

    <form action="../php.html">
      <p>Your Type is <?php print $type; ?></p>
      <input type="submit" value="Take the Quiz Again!">
    </form>

  </body>
</html>
