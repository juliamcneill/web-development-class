var cup1 = document.getElementById('cup1');
var cup2 = document.getElementById('cup2');
var cup3 = document.getElementById('cup3');
var prize = document.getElementById('prize');
var currentamount = 50;

function checkCurrentAmount() {
  if (currentamount <= 0) {
    document.getElementById('moneytracker').innerHTML = 'Game over!';
    prize.style.visibility = 'hidden';
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

cup1.onclick = function() {
  checkCurrentAmount();
  var choice = movePrize();
  if (choice == 0) {
    currentamount += 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  } else {
    currentamount -= 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  }
  cup1.style.visibility = 'hidden';
  cup2.style.opacity = 0.3;
  cup3.style.opacity = 0.3;
  var delayInMilliseconds = 1000;
  setTimeout(function() {
    cup1.style.visibility = 'visible';
    cup2.style.opacity = 1;
    cup3.style.opacity = 1;
  }, delayInMilliseconds);
  checkCurrentAmount();
}

cup2.onclick = function() {
  checkCurrentAmount();
  var choice = movePrize();
  if (choice == 1) {
    currentamount += 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  } else {
    currentamount -= 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  }
  cup2.style.visibility = 'hidden';
  cup1.style.opacity = 0.3;
  cup3.style.opacity = 0.3;
  var delayInMilliseconds = 1000;
  setTimeout(function() {
    cup2.style.visibility = 'visible';
    cup1.style.opacity = 1;
    cup3.style.opacity = 1;
  }, delayInMilliseconds);
  checkCurrentAmount();
}

cup3.onclick = function() {
  checkCurrentAmount();
  var choice = movePrize();
  if (choice == 2) {
    currentamount += 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  } else {
    currentamount -= 5;
    document.getElementById('dollaramount').innerHTML = currentamount;
  }
  cup3.style.visibility = 'hidden';
  cup1.style.opacity = 0.3;
  cup2.style.opacity = 0.3;
  var delayInMilliseconds = 1000;
  setTimeout(function() {
    cup3.style.visibility = 'visible';
    cup1.style.opacity = 1;
    cup2.style.opacity = 1;
  }, delayInMilliseconds);
  checkCurrentAmount();
}

var playagain = document.getElementById('playagain');

playagain.onclick = function () {
  window.location.reload();
}
