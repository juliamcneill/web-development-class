<!doctype html>
<html>
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="style/ajax.css">
  </head>
  <body>

    <h1>Chatroom</h1>

    <div id="namepanel">
      <form>
        Name: <input type="text" id="name">
        <button id="start">Chat!</button>
      </form>
    </div>

    <div id="chatpanel" class="hidden">
      <form>
        <textarea id="history"></textarea>
        <input type="text" id="message">
        <button id="send">Send Message</button>
      </form>
      <form>
        <input type="text" id="newName">
        <button id="changeName">Change Name</button>
      </form>
    </div>


    <script src="js/jquery-3.4.1.js"></script>
    <script>

      $(document).ready(function() {

        let namepanel = document.getElementById('namepanel')
        let name = document.getElementById('name')
        let chatbtn = document.getElementById('start')
        let chatpanel = document.getElementById('chatpanel')
        let message = document.getElementById('message')
        let sendbtn = document.getElementById('send')
        let history = document.getElementById('history')
        let changeName = document.getElementById('changeName')
        let newName = document.getElementById('newName')

        let screenname = "";

        function setCookie(cname, cvalue, exdays) {
          var d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          var expires = "expires="+ d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
          var name = cname + "=";
          var decodedCookie = decodeURIComponent(document.cookie);
          var ca = decodedCookie.split(';');
          for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
        }

        var loggedIn = getCookie("user");
        if (loggedIn != "") {
          namepanel.classList.add('hidden');
          chatpanel.classList.remove('hidden');
          screenname = getCookie("user");
        } else {
          namepanel.classList.remove('hidden');
          chatpanel.classList.add('hidden');
        }

        chatbtn.onclick = function(event) {
          event.preventDefault();

          screenname = name.value;

          setCookie("user", screenname);

          namepanel.classList.add('hidden');
          chatpanel.classList.remove('hidden');
        }

        sendbtn.onclick = function(event) {
          event.preventDefault();

          $.ajax({
            url: 'savemessage.php',
            type: 'POST',
            data: {
              name: screenname,
              message: message.value
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

        changeName.onclick = function(event) {
          event.preventDefault();
          screenname = newName.value;
          newName.value = "";
        }

        function getData() {

          $.ajax({
            url: 'data/log.txt?nocache=' + Math.random(),
            type: 'GET',
            success: function(data, status) {
              console.log(data)
              history.value = data;

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

    <div id="footer">&copy; 2020 Julia McNeill</div>

  </body>
</html>
