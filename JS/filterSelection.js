

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

function popupFunc(clickedElem){

  $.ajax({
    url: "Animali.php",
    type: "get",
    data: {
        animalValue: $(clickedElem).val()
    }
  });

  // var btn = clickedElem.id;
  // const openButton = document.getElementById(btn);
  // const closeButton = document.getElementById("close-button");
  // const animaldeatailspopup = document.getElementById("animal-details-popup");

  // openButton.addEventListener("click", () => {
  //   animaldeatailspopup.classList.add("open");
  // });
  
  // closeButton.addEventListener("click", () => {
  //   animaldeatailspopup.classList.remove("open");
  // });



}

// const openButton = document.getElementsByClassName("show-details");
// const closeButton = document.getElementById("close-button");
// const animaldeatailspopup = document.getElementById("animal-details-popup");

// openButton.addEventListener("click", () => {
//   animaldeatailspopup.classList.add("open");
// });

// closeButton.addEventListener("click", () => {
//   animaldeatailspopup.classList.remove("open");
// });