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

function showDate(elementID1, elementID2){
  
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

function enable(){
  if((takeOptValue("numeroInteri")!=0||takeOptValue("numeroRidotti")!=0)&& getSelectedDate()!=''){
    document.getElementById("continueButton").removeAttribute('disabled');
  }else{
    document.getElementById("continueButton").setAttribute('disable');
  }
}

function showCart(){
  document.querySelector(".tipologia").classList.add("hidden");
  document.querySelector(".acquisto").classList.add("hidden");
}

function ridotti(){
    let x = document.getElementById("numeroRidotti").value;
    document.getElementById("numRidotti").innerHTML = x;
  
}