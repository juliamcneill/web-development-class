let startButton = document.getElementById('startButton');

let introContainer = document.getElementById('introContainer');
let gameContainer = document.getElementById('gameContainer');
let resultsContainer = document.getElementById('resultsContainer');

gameContainer.classList.add('hidden');
resultsContainer.classList.add('hidden');

startButton.onclick = function(event) {
  introContainer.classList.add('hidden');
  gameContainer.classList.remove('hidden');
};
