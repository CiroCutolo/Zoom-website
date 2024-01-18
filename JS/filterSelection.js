

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
      animals[i].style.display = "flex";
    }
  } else {
    // Loop through all animals, and hide those who don't match the search query
    for (i = 0; i < animals.length; i++) {
      animalClass = animals[i].className;
      if (animalClass) {
        if ((animalClass.indexOf(region) > -1) && (animalClass.indexOf(type) > -1)) {
          animals[i].style.display = "flex";
        } else {
          animals[i].style.display = "none";
        }
      } else {
        var a = "No Records Found!!!";
      }
    }
  }
});
