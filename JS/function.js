function toggleElement(elem){
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
    }else{
      collection[i].classList.add("hidden");
    }
  }

}

function carrello(){
    let interi = document.getElementById("numeroInteri").value;
    document.getElementById("tableInteri").innerHTML = interi;

    let ridotti = document.getElementById("numeroRidotti").value;
    if(ridotti != 0){
      document.getElementById("tableRidotti").innerHTML = ridotti;
      document.getElementById("interiRow").classList.remove("hidden");
    }

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

  function generaCampi(){
    let interi = document.getElementById("numeroInteri").value;
    for(i=1;i<=interi;i++)
      document.getElementById("datiInteri").innerHTML += "<h4>Partecipante Intero " + i + "</h4>" + 
        "<label>Nome:<input type=\"text\"><label>" +
        "<label>Cognome:<input type=\"text\"><label>";

    let ridotti = document.getElementById("numeroRidotti").value;
    for(i=1;i<=ridotti;i++)
      document.getElementById("datiRidotti").innerHTML += "<h4>Partecipante Ridotto " + i + "</h4>" +
      "<label>Nome:<input type=\"text\"><label>" +
      "<label>Cognome:<input type=\"text\"><label>";
  
  }

  function functionNumberPicker(){
    showDate();
    enable();
    carrello()
  }