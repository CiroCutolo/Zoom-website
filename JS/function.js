function moreInfo(panelID){
	var x = document.getElementById(panelID);
  if (x.classList.contains("hidden")) {
    x.classList.remove("hidden");
  } else {
    x.classList.add("hidden");
  }
}

function takeOptValue(selectId){
  var e = document.getElementById(selectId);
  var value = e.value;
  return value;
}

function show(elementID1, elementID2){
  
  if((takeOptValue(elementID1)!=0)||(takeOptValue(elementID2)!=0)){
    document.getElementById("dateContainer").classList.remove("hidden");
  }else{
    document.getElementById("dateContainer").classList.add("hidden");
  }
}

function getTicketNumber(type){
  return document.getElementById(type).value;
}

function getSelectedDate(){
  return document.getElementById("datePicker").value;
}

function disable(){
  if(((document.getElementById("numeroRidotti").value!=0)||
    (document.getElementById("numeroInteri").value!=0))&&document.getElementById("datePicker").value!=null){
      document.getElementById("continueButton").removeAttribute("disabled");
    }
}