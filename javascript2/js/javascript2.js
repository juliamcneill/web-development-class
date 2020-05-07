var cup1 = document.getElementById('cup1');
var cup2 = document.getElementById('cup2');
var cup3 = document.getElementById('cup3');
var prize = document.getElementById('prize');
var playAgain = document.getElementById('playagain');
var superCoinMessage = document.getElementById('supercoinmessage');
var resultsList = document.getElementById('resultslist');
var choice = '';
var winOrLose = '';
var currentAmount = 50;
var coinAmount = 5;

function checkcurrentAmount() {
  if (currentAmount <= 0) {
    document.getElementById('moneytracker').innerHTML = 'Game over!';
    prize.style.visibility = 'hidden';
    playAgain.style.visibility = 'hidden';
    cup1.removeEventListener('click', choice1);
    cup2.removeEventListener('click', choice2);
    cup3.removeEventListener('click', choice3);
  }
}

function choosePrize() {
  var choice = (Math.floor(Math.random() * 6));
  switch (choice) {
    case 0:
      prize.src = 'images/javascript2/prize2.png';
      superCoinMessage.style.visibility = 'visible';
      coinAmount = 10;
      break;
    default:
      prize.src = 'images/javascript2/prize.png';
      superCoinMessage.style.visibility = 'hidden';
      coinAmount = 5;
      break;
  }
}

function movePrize() {
  var choice = (Math.floor(Math.random() * 3));
  switch (choice) {
    case 0:
      prize.style.left = '-230px';
      break;
    case 1:
      prize.style.left = '0px';
      break;
    default:
      prize.style.left = '230px';
      break;
  }
  return choice;
}

function addToResults(choice, location) {
  if (location == 0) {
    location = 'Left';
  } else if (location == 1) {
    location = 'Center';
  } else {
    location = 'Right';
  }
  if (choice == location) {
    winOrLose = 'Won';
  } else {
    winOrLose = 'Lost';
  }
  if (location == 'Left') {
    location = 'Left\u00A0';
  } else if (location == 'Right') {
    location = 'Right\u202F';
  }
  if (winOrLose == 'Won') {
    winOrLose = 'Won\u00A0';
  }
  var column1 = document.createTextNode(choice);
  var column2 = document.createTextNode(location);
  var column3 = document.createTextNode(winOrLose);
  var space1 = document.createTextNode('\u00A0\u00A0\u00A0\u00A0');
  var space2 = document.createTextNode('\u00A0\u00A0\u00A0\u00A0');
  var lineBreak1 = document.createElement('br');
  var lineBreak2 = document.createElement('br');
  resultsList.prepend(lineBreak1);
  resultsList.prepend(lineBreak2);
  resultsList.prepend(column3);
  resultsList.prepend(space1);
  resultsList.prepend(column2);
  resultsList.prepend(space2);
  resultsList.prepend(column1);

}

playAgain.style.visibility = 'hidden';
superCoinMessage.style.visibility = 'hidden';
cup1.addEventListener('click', choice1);
cup2.addEventListener('click', choice2);
cup3.addEventListener('click', choice3);

playAgain.onclick = function() {
  playAgain.style.visibility = 'hidden';
  cup1.style.visibility = 'visible';
  cup2.style.visibility = 'visible';
  cup3.style.visibility = 'visible';
  cup1.style.opacity = 1;
  cup2.style.opacity = 1;
  cup3.style.opacity = 1;
  cup1.addEventListener('click', choice1);
  cup2.addEventListener('click', choice2);
  cup3.addEventListener('click', choice3);
  choosePrize();
}

clear.onclick = function() {
  resultsList.innerHTML = '';
}

function choice1() {
  choice = 'Left';
  var location = movePrize();
  if (location == 0) {
    currentAmount += coinAmount;
    document.getElementById('dollaramount').innerHTML = currentAmount;
  } else {
    currentAmount -= coinAmount;
    checkcurrentAmount();
    document.getElementById('dollaramount').innerHTML = currentAmount;
  }
  cup1.style.visibility = 'hidden';
  cup2.style.opacity = 0.3;
  cup3.style.opacity = 0.3;
  cup2.removeEventListener('click', choice2);
  cup3.removeEventListener('click', choice3);
  playAgain.style.visibility = 'visible';
  addToResults(choice, location);
}

function choice2() {
  choice = 'Center';
  var location = movePrize();
  if (location == 1) {
    currentAmount += coinAmount;
    document.getElementById('dollaramount').innerHTML = currentAmount;
  } else {
    currentAmount -= coinAmount;
    checkcurrentAmount();
    document.getElementById('dollaramount').innerHTML = currentAmount;
  }
  cup2.style.visibility = 'hidden';
  cup1.style.opacity = 0.3;
  cup3.style.opacity = 0.3;
  cup1.removeEventListener('click', choice1);
  cup3.removeEventListener('click', choice3);
  playAgain.style.visibility = 'visible';
  addToResults(choice, location);
}

function choice3() {
  choice = 'Right';
  var location = movePrize();
  if (location == 2) {
    currentAmount += coinAmount;
    document.getElementById('dollaramount').innerHTML = currentAmount;
  } else {
    currentAmount -= coinAmount;
    checkcurrentAmount();
    document.getElementById('dollaramount').innerHTML = currentAmount;
  }
  cup3.style.visibility = 'hidden';
  cup1.style.opacity = 0.3;
  cup2.style.opacity = 0.3;
  cup1.removeEventListener('click', choice1);
  cup2.removeEventListener('click', choice2);
  playAgain.style.visibility = 'visible';
  addToResults(choice, location);
}
