var words = ['Awesome', 'Fantastic', 'Fabulous', 'Superb', 'Perfect', 'Brilliant', 'Coming Up Roses'];
let index = parseInt(Math.random() * words.length);

document.write('<h1>Everything is ' + words[index] + '!</h1>');

var time = new Date();
var hour = time.getHours();

if (hour >= 12) {
  var amPm = 'pm';
} else {
  var amPm = 'am';
}

if (hour <= 5) {
  var timeOfDay = 'Good night!';
  document.write('<img class="scene" src="images/night.png">')
} else if (hour <= 11) {
  var timeOfDay = 'Good morning!';
  document.write('<img class="scene" src="images/morning.png">')
} else if (hour <= 16) {
  var timeOfDay = 'Good afternoon!';
  document.write('<img class="scene" src="images/afternoon.png">')
} else {
  var timeOfDay = 'Good evening!';
  document.write('<img class="scene" src="images/evening.png">')
}

var americanHour = hour % 12 || 12;
var minute = ('0' + time.getMinutes()).slice(-2);

var array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
var randoms = [];

for (var c = 0; c < 3; c += 1) {
  var random = array[Math.floor(Math.random() * array.length)];
  randoms.push(random);
  array.splice(array.indexOf(random), 1);
}

document.write('<div class="textbox"><p>The time is currently ' + americanHour + ':' + minute + amPm + '. ' + timeOfDay + '</p><p>Look at all of the blocks! Your three lucky numbers today are ' + randoms[0] + ' (blue), ' + randoms[1] + ' (green), and ' + randoms[2] + ' (yellow).</p></div>');

for (var i = 0; i < 1000; ) {
  i += randoms[0];
  i += randoms[1];
  i += randoms[2];
  for (var j = 0; j < randoms[0]; j++) {
    document.write('<img class="block" src="images/block1.png">');
  }
  for (var j = 0; j < randoms[1]; j++) {
    document.write('<img class="block" src="images/block2.png">');
  }
  for (var j = 0; j < randoms[2]; j++) {
    document.write('<img class="block" src="images/block3.png">');
  }
}

var numbers = ["1", "2", "3", "4", "5", "6"];

let bodyindex = parseInt(Math.random() * numbers.length);
document.write('<img class="body" src="images/body' + numbers[bodyindex] + '.png">');

let stripeindex = parseInt(Math.random() * numbers.length);
document.write('<img class="stripe" src="images/stripe' + numbers[stripeindex] + '.png">');

let headindex = parseInt(Math.random() * numbers.length);
document.write('<img class="head" src="images/head' + numbers[headindex] + '.png">');

let hatindex = parseInt(Math.random() * numbers.length);
document.write('<img class="hat" src="images/hat' + numbers[hatindex] + '.png">');
