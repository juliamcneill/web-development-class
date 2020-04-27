<?php

  header("Content-Type: text/css; charset=utf-8");

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

form {
  padding: 20px;
  padding-bottom: 60px;
  width: 700px;
  height: 800px;
  margin: 20px 0px 30px 0px;
  border-radius: 20px;
  background-color: #F0F0F0;
  border: #D0D0D0 solid 2px;
  box-shadow: 5px 7px #D0D0D0;
}

input[type=submit] {
  clear: both;
  margin: 20px auto;
  border-radius: 2px;
  height: 30px;
  width: 300px;
}

.label {
  width: 20%;
  float: left;
  clear: both;
  line-height: 50px;
}

.bar {
  width: 80%;
  float: left;
  background-color: lightgrey;
  height: 50px;
}

#intp {
    width: <?= (($intp / $total) * 80) . '%'; ?>;
}

#intj {
    width: <?= (($intj / $total) * 80) . '%'; ?>;
}

#infp {
    width: <?= (($infp / $total) * 80) . '%'; ?>;
}

#infj {
    width: <?= (($infj / $total) * 80) . '%'; ?>;
}

#istp {
    width: <?= (($istp / $total) * 80) . '%'; ?>;
}

#istj {
    width: <?= (($istj / $total) * 80) . '%'; ?>;
}

#isfp {
    width: <?= (($isfp / $total) * 80) . '%'; ?>;
}

#isfj {
    width: <?= (($isfj / $total) * 80) . '%'; ?>;
}

#entp {
    width: <?= (($entp / $total) * 80) . '%'; ?>;
}

#entj {
    width: <?= (($entj / $total) * 80) . '%'; ?>;
}

#enfp {
    width: <?= (($enfp / $total) * 80) . '%'; ?>;
}

#enfj {
    width: <?= (($enfj / $total) * 80) . '%'; ?>;
}

#estp {
    width: <?= (($estp / $total) * 80) . '%'; ?>;
}

#estj {
    width: <?= (($estj / $total) * 80) . '%'; ?>;
}

#esfp {
    width: <?= (($esfp / $total) * 80) . '%'; ?>;
}

#esfj {
    width: <?= (($esfj / $total) * 80) . '%'; ?>;
}
