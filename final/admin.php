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
    <script type="text/javascript" src="../jquery-3.4.1.js"></script>
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

        <?php
          if ($_GET['login'] == 'failed') {
            print "Login failed!";
          }

          if ($_COOKIE['loggedin'] == 'yes') {

        ?>
        <h1>Add Journal Post</h1>

        <form method="POST" action="admin-save.php">

          <p>Title<br /><textarea name="journalTitle">&lt;h2&gt;&lt;/h2&gt;</textarea></p>
          <p>Date<br /><textarea name="journalDate">&lt;h3&gt;&lt;/h3&gt;</textarea></p>
          <p>Content<br /><textarea name="journalContent">&lt;p&gt;&lt;/p&gt;</textarea></p>
          <input type="submit">

        </form>

        <hr />

        <h1>Edit Journal Post</h1>

        <?php
          $regexHead = '#<\s*?h2\b[^>]*>(.*?)</h2\b[^>]*>#s';
          $regexDate = '#<\s*?h3\b[^>]*>(.*?)</h3\b[^>]*>#s';

          $list = glob($entries_path."/*.txt");
          natsort($list);
          foreach(array_reverse($list) as $filename) {
                $raw = file_get_contents($filename);

                preg_match($regexHead, $raw, $headForForm);
                preg_match($regexDate, $raw, $dateForForm);

                echo '<a href="admin.php" class="specificPost" id="'.$filename.'">'.$headForForm[1].' - '.$dateForForm[1].'</a><br />';
          }
        ?>

        <script>
          $(document).ready(function() {
            function setCookie(cname, cvalue, exdays) {
              var d = new Date();
              d.setTime(d.getTime() + (exdays*24*60*60*1000));
              var expires = "expires="+ d.toUTCString();
              document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            $(".specificPost").click(function() {
              setCookie("postToEdit", $(this).attr("id"));
            });
          });
        </script>

        <?php
          $regexHead = '#<\s*?h2\b[^>]*>(.*?)</h2\b[^>]*>#s';
          $regexDate = '#<\s*?h3\b[^>]*>(.*?)</h3\b[^>]*>#s';
          $regexContent = '#<\s*?div\b[^>]*>(.*?)</div\b[^>]*>#s';

          if(isset($_COOKIE['postToEdit'])) {
            $filename = $_COOKIE['postToEdit'];
            $raw = file_get_contents($filename);

            preg_match($regexHead, $raw, $headForForm);
            preg_match($regexDate, $raw, $dateForForm);
            preg_match($regexContent, $raw, $contentForForm);
          }
        ?>

      <form method="POST" action="admin-update.php">
        <p>Title<br /><textarea name="journalTitle"><?php
          print $headForForm[0];
          ?></textarea></p>
        <p>Date<br /><textarea name="journalDate"><?php
          print $dateForForm[0];
          ?></textarea></p>
        <p>Content<br /><textarea name="journalContent"><?php
          print $contentForForm[0];
          ?></textarea></p>
        <input type="submit">
      </form>

        <button><a href="logout.php">Log Out</a></button>

        <?php
          }

          else {
        ?>

      <form method="POST" action="login.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password">
        <input type="submit">
      </form>

      <?php
            }
       ?>

      </div>
    </div>
  </body>
</html>
