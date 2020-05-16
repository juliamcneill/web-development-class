<?php
  include('config.php');
?>
<!doctype html>
<html>
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="style/final.css">
    <link rel="stylesheet" href="https://use.typekit.net/lyc5fdd.css">
  </head>
  <body>
    <div id="contentContainer">
      <div id="leftColumn">
        <a href="index.html"><h1>Julia McNeill</h1></a>
        <a href="index.html"><h3>Developer & Photographer</h3></a>
        <nav>
          <a href="programming.html" class="navHeading">Programming</a>
          <a href="websites.html" class="navItem">Websites</a>
          <a href="games.html" class="navItem">Games</a>
          <a href="data.html" class="navItem">Data</a>
          <a href="photography.html" class="navHeading">Photography</a>
          <a href="comingsoon.html" class="navItem">Places</a>
          <a href="comingsoon.html" class="navItem">People</a>
          <a href="comingsoon.html" class="navItem">Events</a>
          <a href="comingsoon.html" class="navItem">Film</a>
          <a href="comingsoon.html" class="navHeading">Design</a>
          <a href="comingsoon.html" class="navItem">Applications</a>
          <a href="journal.php" class="navHeading">Journal</a>
          <a href="about.html" class="navHeading">About</a>
          <a href="contact.php" class="navHeading">Contact</a>
        </nav>
      </div>
      <div id="rightColumn">

        <div id="textOnlyBox">

          <?php
          $list = glob($entries_path."/*.txt");
          $list = array_reverse($list);

          $page = isset($_GET['page']) ? $_GET['page'] : 0;
          $nextPage = $page + 1;
          $count = count($allFiles);
          $perPage = 5;
          $numberOfPages = ceil($count / $perPage);
          $offset = $page * $perPage;
          $files = array_slice($list, $offset, $perPage);

          foreach($files as $key => $value) {
              include_once $value;
          }

          echo "<hr />";
          echo "<a href='admin.php' id='adminLogin'>Admin Login</a>";

          if(count(array_slice($list, $offset + 1, $perPage)) >= 5) {
            echo "<button id='nextPageButton'><a href='journal.php?page=" . $nextPage . "'>Next page</a></button>";
          }

          ?>

        </div>

      </div>
    </div>
  </body>
</html>
