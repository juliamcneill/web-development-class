let allAddButtons = document.querySelectorAll('.addbutton');
for (let i = 0; i < allAddButtons.length; i++) {

  allAddButtons[i].onclick = function(event) {

    event.preventDefault();

    let newElement = document.createElement('div');
    newElement.innerHTML = event.currentTarget.previousElementSibling.value;
    newElement.style.backgroundColor = event.currentTarget.dataset.color;

    let delButton = document.createElement('button');
    delButton.innerHTML = 'delete';
    newElement.appendChild(delButton);

    delButton.onclick = function(event) {
      event.currentTarget.parentElement.innerHTML = "";
    }

    event.currentTarget.previousElementSibling.value = "";

    document.getElementById('results').appendChild(newElement);
  }

}

let allTabs = document.querySelectorAll('.tab');
for (let i = 0; i < allTabs.length; i++) {

  console.log('hello!')

  allTabs[i].onclick = function(event) {
    let allPanels = document.querySelectorAll('.content');
    for (let j = 0; j < allPanels.length; j++) {
      allPanels[j].classList.add('hidden');
    }

    let contentID = event.currentTarget.dataset.content;
    document.getElementById(contentID).classList.remove('hidden');
  }

}
