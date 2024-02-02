

var $ = jQuery;
$('body').on("change", 'select', function() {
  var region = $('#regionDropdown').val();
  var type = $('#typeDropdown').val();
  var animalsContainer, animals;
  animalsContainer = document.getElementById("animalsContainer");
  animals = animalsContainer.getElementsByClassName("animal");
  if ((region == "all") && (type == "all")) {
    // Loop through all the animals, and show any of the hidden ones
    for (i = 0; i < animals.length; i++) {
      animals[i].style.display = "inline-flex";
    }
  } else {
    // Loop through all animals, and hide those who don't match the search query
    for (i = 0; i < animals.length; i++) {
      animalClass = animals[i].className;
      if (animalClass) {
        if ((animalClass.indexOf(region) > -1) && (animalClass.indexOf(type) > -1)) {
          animals[i].style.display = "inline-flex";
        } else {
          animals[i].style.display = "none";
        }
      } else {
        var a = "No Records Found!!!";
      }
    }
  }
});

function showAnimalPopup(obj) {
  animale=getAnimal(obj);

  const element = document.getElementById("popup-container");

  const animalDetailsPopup = document.createElement('div');
  animalDetailsPopup.setAttribute('id', 'animal-details-popup');
  element.appendChild(animalDetailsPopup);

  const popupTextContainer = document.createElement('div');
  popupTextContainer.setAttribute('id', 'popup-text-container');
  animalDetailsPopup.appendChild(popupTextContainer);

  const animalTitle = document.createElement('h1');
  animalTitle.innerHTML = animale.titolo;
  popupTextContainer.appendChild(animalTitle);

  const animalDescription = document.createElement('p');
  animalDescription.innerHTML = animale.descrizione;
  popupTextContainer.appendChild(animalDescription);

  const closeButton = document.createElement('button');
  closeButton.setAttribute('id', 'close-button');
  closeButton.type = 'button';
  closeButton.textContent = 'Chiudi la scheda';
  closeButton.addEventListener('click', function(){
      animalDetailsPopup.classList.remove("open")

      animalDetailsPopup.remove();
  });
  
  popupTextContainer.appendChild(closeButton);

  animalDetailsPopup.classList.add("animal-details-popup");
  popupTextContainer.classList.add("popup-text-container");
  animalDetailsPopup.classList.add("open");
  closeButton.classList.add("close-button");
}
function getAnimal(animale) {
  var strReturn;
  $.ajax({
      url: "ajax.php?action=getAnimal&animale="+animale, dataType: "json", success: function(data) {
strReturn=JSON.parse(JSON.stringify(data));
      },
      async:false
  });
  return strReturn;	
}