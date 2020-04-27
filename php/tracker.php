<!doctype html>
<html lang="en-us">
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="../style/php.css">
    <link rel='stylesheet' type='text/css' href='barchart.php' />
  </head>
  <body>

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

    <h1>All Myers-Briggs Test Results</h1>

    <form action="../php.html">
      <div class="label">INTP: <?= (round(($intp / $total) * 100)) . '%'; ?></div><div class="bar" id="intp"></div>
      <div class="label">INTJ: <?= (round(($intj / $total) * 100)) . '%'; ?></div><div class="bar" id="intj"></div>
      <div class="label">INFP: <?= (round(($infp / $total) * 100)) . '%'; ?></div><div class="bar" id="infp"></div>
      <div class="label">INFJ: <?= (round(($infj / $total) * 100)) . '%'; ?></div><div class="bar" id="infj"></div>
      <div class="label">ISTP: <?= (round(($istp / $total) * 100)) . '%'; ?></div><div class="bar" id="istp"></div>
      <div class="label">ISTJ: <?= (round(($istj / $total) * 100)) . '%'; ?></div><div class="bar" id="istj"></div>
      <div class="label">ISFP: <?= (round(($isfp / $total) * 100)) . '%'; ?></div><div class="bar" id="isfp"></div>
      <div class="label">ISFJ: <?= (round(($isfj / $total) * 100)) . '%'; ?></div><div class="bar" id="isfj"></div>
      <div class="label">ENTP: <?= (round(($entp / $total) * 100)) . '%'; ?></div><div class="bar" id="entp"></div>
      <div class="label">ENTJ: <?= (round(($entj / $total) * 100)) . '%'; ?></div><div class="bar" id="entj"></div>
      <div class="label">ENFP: <?= (round(($enfp / $total) * 100)) . '%'; ?></div><div class="bar" id="enfp"></div>
      <div class="label">ENFJ: <?= (round(($enfj / $total) * 100)) . '%'; ?></div><div class="bar" id="enfj"></div>
      <div class="label">ESTP: <?= (round(($estp / $total) * 100)) . '%'; ?></div><div class="bar" id="estp"></div>
      <div class="label">ESTJ: <?= (round(($estj / $total) * 100)) . '%'; ?></div><div class="bar" id="estj"></div>
      <div class="label">ESFP: <?= (round(($esfp / $total) * 100)) . '%'; ?></div><div class="bar" id="esfp"></div>
      <div class="label">ESFJ: <?= (round(($esfj / $total) * 100)) . '%'; ?></div><div class="bar" id="esfj"></div>

      <input type="submit" value="Take the Quiz Again!">
    </form>

  </body>
</html>
