let allTabs = document.querySelectorAll('.tab');
for (let i = 0; i < allTabs.length; i++) {

  allTabs[i].onclick = function(event) {

    for (let j = 0; j < allTabs.length; j++) {
      allTabs[j].classList.remove('selected');
    }

    event.currentTarget.classList.add('selected');

    let allPanels = document.querySelectorAll('.content');
    for (let j = 0; j < allPanels.length; j++) {
      allPanels[j].classList.add('hidden');
    }

    let contentID = event.currentTarget.dataset.content;
    document.getElementById(contentID).classList.remove('hidden');
  }

}

let allAddButtons = document.querySelectorAll('.addbutton');
for (let i = 0; i < allAddButtons.length; i++) {

  allAddButtons[i].onclick = function(event) {

    event.preventDefault();

    let newText = document.createElement('span');
    newText.innerHTML = event.currentTarget.previousElementSibling.value;
    let newElement = document.createElement('div');
    newElement.appendChild(newText);
    newElement.style.backgroundColor = event.currentTarget.dataset.color;
    newElement.classList.add('listItem');
    newElement.classList.add(event.currentTarget.dataset.type);

    let delButton = document.createElement('span');
    delButton.innerHTML = 'x';
    delButton.classList.add('button');
    newElement.appendChild(delButton);

    delButton.onclick = function(event) {
      event.currentTarget.parentElement.innerHTML = "";
      newElement.classList.remove('listItem');
    }

    let moveDownButton = document.createElement('span');
    moveDownButton.innerHTML = '↓';
    moveDownButton.classList.add('button');
    moveDownButton.classList.add('moveDownButton');
    newElement.appendChild(moveDownButton);

    moveDownButton.onclick = function(event) {
      if (event.currentTarget.parentNode.nextElementSibling) {
        event.currentTarget.parentNode.parentNode.insertBefore(event.currentTarget.parentNode.nextElementSibling, event.currentTarget.parentNode);
      }
    }

    let moveUpButton = document.createElement('span');
    moveUpButton.innerHTML = '↑';
    moveUpButton.classList.add('button');
    moveUpButton.classList.add('moveUpButton');
    newElement.appendChild(moveUpButton);

    moveUpButton.onclick = function(event) {
      if(event.currentTarget.parentNode.previousElementSibling) {
        event.currentTarget.parentNode.parentNode.insertBefore(event.currentTarget.parentNode, event.currentTarget.parentNode.previousElementSibling);
      }
    }

    document.getElementById('results').appendChild(newElement);

    event.currentTarget.previousElementSibling.value = "";

  }

}

function filterFunction() {
  var listItems = document.getElementsByClassName("listItem");
  var option = document.getElementById("filter").value;

  for (let i = 0; i < listItems.length; i++) {
      if (option == "all") {
        listItems[i].style.display = "";
        continue;
      }
      listItems[i].style.display = "none";
      if (listItems[i].classList.contains(option)) {
        listItems[i].style.display = "";
      }
  }
}

document.onclick = updateMoveButtonsAndStrikethrough;
function updateMoveButtonsAndStrikethrough() {
  var listItems = document.getElementsByClassName("listItem");
  for (let i = 0; i < listItems.length; i++) {

    var itemText = listItems[i].querySelector("span");

    itemText.onclick = function(event) {
      if (event.currentTarget.style.textDecoration == "line-through") {
        event.currentTarget.style.textDecoration = "none";
      } else {
        event.currentTarget.style.textDecoration = "line-through";
      }
    }

    var itemMoveUpButton = listItems[i].querySelector(".moveUpButton");
    var itemMoveDownButton = listItems[i].querySelector(".moveDownButton");

    itemMoveUpButton.style.visibility = "hidden";
    itemMoveDownButton.style.visibility = "hidden";

    if (listItems[i-1]) {
      itemMoveUpButton.style.visibility = "visible";
    }

    if (listItems[i+1]) {
      itemMoveDownButton.style.visibility = "visible";
    }
  }
}
