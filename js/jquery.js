$(document).ready(function() {

  var pokemon = ['snorlax.png', 'electrabuzz.png', 'chansey.png', 'oddish.png',
              'pikachu.png', 'paras.png', 'arcanine.png', 'ponita.png',
              'venonat.png', 'eggsecute.png', 'machop.png', 'pidgey.png',
              'psyduck.png', 'tauros.png', 'vulpix.png', 'gloom.png',
              'krabby.png', 'butterfree.png', 'bulbasaur.png', 'clefairy.png',
              'koffing.png', 'goldeen.png', 'magikarp.png', 'beedrill.png',
              'lapras.png', 'meowth.png', 'ekans.png', 'jigglypuff.png',
              'horsea.png', 'polywog.png', 'sandshrew.png', 'rattata.png',
              'gengar.png', 'eevee.png', 'bellsprout.png', 'squirtle.png',
              'seel.png', 'caterpie.png'];

  // timer
  var bestTime;
  if (localStorage.getItem("bestTime") === null) {
    localStorage.setItem("bestTime", 10000000);
  }

  var seconds = 0;
  var finalTime = 0;
  function timer() {
    $('#timeCounter').html(seconds);
    var timeLoop = setTimeout(timer, 1000);
    seconds++;
  }

  // play again
  $('#playAgainButton').click(function() {
    location.reload();
  });

  // set up
  $('#startButton').click(setUp);

  function setUp() {
    $('#introContainer').addClass('hidden');
    $('#gameContainer').removeClass('hidden');

    timer();

    // choose random images
    var images = [];
    for (let i = 0; i < 10; i++) {
      var random = Math.floor(Math.random() * pokemon.length);
      images.push('images/jquery/' + pokemon[random]);
      images.push('images/jquery/' + pokemon[random]);
      pokemon.splice(random, 1);
    }

    // put random images in random order
    for (let i = 0; i < 20; i++) {
      var tile = document.createElement('img');
      tile.src = 'images/jquery/pokeball.png';
      tile.draggable = false;
      tile.dataset.alreadyMatched = 'false';
      tile.addEventListener('click', tester);

      var random = Math.floor(Math.random() * images.length);
      tile.dataset.image= images[random];
      images.splice(random, 1);

      $('#imgContainer').append(tile);
    }
  }

  // game play
  var currentChoice;
  var lastChoice;

  var token1 = false;
  var token2 = false;

  var inProgress = false;
  var matchCount = 0;

  function tester(event) {
    // check that this selection is allowed
    if (this.dataset.alreadyMatched == 'true') {
      var canClick = false;
    } else if (inProgress == true) {
      canClick = false;
    } else {
      canClick = true;
    }

    if (canClick == true) {
      currentChoice = this;

      // determine if user is on their first selection or second selection
      if (token1 == false) {
        token1 = currentChoice.dataset.image;
        currentChoice.src = currentChoice.dataset.image;
        lastChoice = currentChoice;

      } else {
        token2 = currentChoice.dataset.image;
        currentChoice.src = currentChoice.dataset.image;

        // check if the two selections are for the same image
        if (token1 == token2) {
          currentChoice.dataset.alreadyMatched = 'true';
          lastChoice.dataset.alreadyMatched = 'true';

          matchCount++;
          if (matchCount >= 10) {
            setTimeout(function(){
              endGame();
            }, 400);
          }

        } else {
          inProgress = true;

          setTimeout(function(){
            currentChoice.src = 'images/jquery/pokeball.png';
            lastChoice.src = 'images/jquery/pokeball.png';
            inProgress = false;
          }, 400);

        }
        token1 = false;
        token2 = false;
      }
    }

    // end of game
    function endGame() {
      finalTime = seconds - 1;
      bestTime = parseInt(localStorage.getItem("bestTime"));

      if (finalTime < bestTime) {
        localStorage.setItem("bestTime", finalTime);
        $('#bestTime').html(finalTime + '<blink> (New High Score)</blink>');
      } else {
        $('#bestTime').html(bestTime);
      }

      $('#gameContainer').addClass('hidden');
      $('#resultsContainer').removeClass('hidden');
      $('#yourTime').html(finalTime);

      setInterval(function(){
        $('blink').fadeOut(500);
        $('blink').fadeIn(500);
      });

    }

  }

});
