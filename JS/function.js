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

function nextPage(){
  document.querySelector(".informazioni").classList.add("hidden");
  document.querySelector(".acquisto").classList.add("hidden");
  document.querySelector(".datiBiglietti").classList.remove("hidden");
}

function carrello(){
    let interi = document.getElementById("numeroInteri").value;
    document.getElementById("tableInteri").innerHTML = interi;

    let ridotti = document.getElementById("numeroRidotti").value;
    document.getElementById("tableRidotti").innerHTML = ridotti;

    let date = document.getElementById("datePicker").value;
    document.getElementById("tableDate1").innerHTML = date;
    document.getElementById("tableDate2").innerHTML = date;

    let totInteri = 15.00*interi;
    let totRidotti = 10.00*ridotti;
    document.getElementById("tableTotInteri").innerHTML = '€' + totInteri.toFixed(2);
    document.getElementById("tableTotRidotti").innerHTML = '€' + totRidotti.toFixed(2);

    let tot = totInteri+totRidotti;
    document.getElementById("totalPrice").innerHTML = '€' + tot.toFixed(2);
  }