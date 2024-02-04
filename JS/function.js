function moreInfo(elem){
	var x = document.getElementById(elem);
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

function showDate(){
  if((takeOptValue('numeroInteri')!=0)||(takeOptValue('numeroRidotti')!=0)){
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
    document.getElementById("continueButton").setAttribute('disable','');
  }
}

function nextPage(){
  const collection = document.getElementsByClassName("container");
  for(i=0;i<collection.length;i++){
    if(collection[i].classList.contains("hidden")){
      collection[i].classList.remove("hidden");
      document.getElementById("backButton").parentElement.classList.remove("hidden");
      document.getElementById("continueButton").parentElement.classList.add("hidden");
      document.getElementById("payButton").parentElement.classList.remove("hidden");
    }else{
      collection[i].classList.add("hidden");
      document.getElementById("backButton").parentElement.classList.add("hidden");
      document.getElementById("continueButton").parentElement.classList.remove("hidden");
      document.getElementById("payButton").parentElement.classList.add("hidden");
    }
  }

}

const priceInt = 15.00;
const priceRid = 10.00;
function carrello(){
    let interi = document.getElementById("numeroInteri").value;
    let ridotti = document.getElementById("numeroRidotti").value;

    if(interi==0 && ridotti == 0){
      document.querySelector(".carrello").classList.add("hidden");
    }else{
      document.querySelector(".carrello").classList.remove("hidden");
    }

    if(interi !=0){
      document.getElementById("tableInteri").innerHTML = interi;
      document.getElementById("interiRow").classList.remove("hidden");
    }else{
      document.getElementById("interiRow").classList.add("hidden");
    }

    
    if(ridotti != 0){
      document.getElementById("tableRidotti").innerHTML = ridotti;
      document.getElementById("ridottiRow").classList.remove("hidden");
    }else{
      document.getElementById("ridottiRow").classList.add("hidden");
    }

    let date = document.getElementById("datePicker").value;
    document.getElementById("tableDate1").innerHTML = date;
    document.getElementById("tableDate2").innerHTML = date;

    let totInteri = priceInt*interi;
    let totRidotti = priceRid*ridotti;
    document.getElementById("tableTotInteri").innerHTML = '€' + totInteri.toFixed(2);
    document.getElementById("tableTotRidotti").innerHTML = '€' + totRidotti.toFixed(2);

    let tot = totInteri+totRidotti;
    document.getElementById("totalPrice").innerHTML = '€' + tot.toFixed(2);
  }

  function generaCampi(){
    let interi = document.getElementById("numeroInteri").value;
    for(i=1;i<=interi;i++)
      document.getElementById("datiInteri").innerHTML += "<h4>Partecipante Intero " + i + "</h4>" + 
        "<div><span>Nome:</span><input name=\"inp-nomeIntero" + i + "\" type=\"text\"></div>" +
        "<div><span>Cognome:</span><input name=\"inp-cognomeIntero" + i + "\" type=\"text\"></div>";

    let ridotti = document.getElementById("numeroRidotti").value;
    for(i=1;i<=ridotti;i++)
      document.getElementById("datiRidotti").innerHTML += "<h4>Partecipante Ridotto " + i + "</h4>" +
        "<div><span>Nome:</span><input id=\"inp-nomeRidotto" + i + "\" type=\"text\"></div>" +
        "<div><span>Cognome:</span><input id=\"inp-cognomeRidotto" + i + "\" type=\"text\"></div>";
  }

  function removeOldElements(){
    const elementInteri = document.getElementById("datiInteri");

    while(elementInteri.childElementCount != 1){
      elementInteri.removeChild(elementInteri.lastChild);
    }

    const elementRidotti = document.getElementById("datiRidotti");
    
    while(elementRidotti.childElementCount != 1){
      elementRidotti.removeChild(elementRidotti.lastChild);
    }

  }

  function functionsNumberPicker(){
    showDate();
    enable();
    carrello()
  }