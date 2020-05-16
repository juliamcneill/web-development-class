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


        <h1>Find Me At:</h1>
        <br />juliammcneill@gmail.com
        <br /><a href="https://github.com/juliamcneill" target="_blank">GitHub</a>
        <br /><a href="https://www.linkedin.com/in/mcneilljulia/" target="_blank">LinkedIn</a>
        <br /><a href="https://www.instagram.com/julia.mcneill/" target="_blank">Instagram</a>
        <br />&nbsp;
        <br />New York, NY

        <h1>&nbsp;</h1>
        <h1>Comment Board</h1>

        <div id="chatpanel">
          <form>
            <div id="history"></div>
            <br />
            <p>Your Name: <input type="text" id="name"></p>
            <p>Comment: <input type="comment" id="comment"></p>
            <button id="send">Leave a Comment</button>
          </form>
        </div>

        <script src="../jquery-3.4.1.js"></script>
        <script>

          $(document).ready(function() {

            let namepanel = document.getElementById('namepanel')
            let chatbtn = document.getElementById('start')
            let chatpanel = document.getElementById('chatpanel')
            let name = document.getElementById('name')
            let comment = document.getElementById('comment')
            let sendbtn = document.getElementById('send')
            let history = document.getElementById('history')
            let changeName = document.getElementById('changeName')
            let newName = document.getElementById('newName')


            sendbtn.onclick = function(event) {
              event.preventDefault();

              $.ajax({
                url: 'savemessage.php',
                type: 'POST',
                data: {
                  name: name.value,
                  message: comment.value
                },
                success: function(data, status) {
                  console.log(data)
                },
                error: function(request, data, status) {
                  console.log(data)
                }
              })

              message.value = "";

            }

            function getData() {

              $.ajax({
                url: 'data/log.txt?nocache=' + Math.random(),
                type: 'GET',
                success: function(data, status) {
                  console.log(data)
                  history.innerHTML = data;

                  setTimeout( getData, 1000 )
                },
                error: function(request, data, status) {
                  console.log("something went wrong")
                }
              })

              var scrolled = false;
              $(history).on('scroll', function() {
                  scrolled = true;
              });
              function updateScroll() {
                  if(!scrolled) {
                      history.scrollTop = history.scrollHeight;
                  }
              }
              setTimeout( updateScroll, 1000 );

            }

            getData()



          })


        </script>

      </div>
    </div>
  </body>
</html>
