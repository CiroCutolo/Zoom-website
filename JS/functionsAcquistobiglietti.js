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
  var valRidotti = $('#numeroRidotti').find('option:selected').val();
  var valInteri = $('#numeroInteri').find('option:selected').val();
  var vardate = $('#datePicker').val();

  if(((valRidotti > 0) || (valInteri > 0)) && (vardate != '')){
    document.getElementById("continueButton").removeAttribute('disabled');
  }else{
    document.getElementById("continueButton").setAttribute('disabled', '');
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
      document.getElementById("tableInteri").innerHTML = interi +
      "<input name=\"interiToDb\" type=\"hidden\" value=\"" + interi + "\">";
      document.getElementById("interiRow").classList.remove("hidden");
    }else{
      document.getElementById("interiRow").classList.add("hidden");
    }

    
    if(ridotti != 0){
      document.getElementById("tableRidotti").innerHTML = ridotti +
      "<input name=\"ridottiToDb\" type=\"hidden\" value=\"" + ridotti + "\">";
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
      document.getElementById("datiInteri").innerHTML += "<h3>Biglietti Interi</h3><h4>Partecipante Intero " + i + "</h4>" + 
        "<div><span>Nome:</span><input id=\"nome" + i + "\" name=\"inp-nomeIntero" + i + "\" type=\"text\"></div>" +
        "<div><span>Cognome:</span><input id=\"cognome" + i + "\" name=\"inp-cognomeIntero" + i + "\" type=\"text\"></div>";

    let ridotti = document.getElementById("numeroRidotti").value;
    for(i=1;i<=ridotti;i++)
      document.getElementById("datiRidotti").innerHTML += "<h3>Biglietti Ridotti</h3><h4>Partecipante Ridotto " + i + "</h4>" +
        "<div><span>Nome:</span><input id=\"nome" + i + "\" name=\"inp-nomeRidotto" + i + "\" type=\"text\"></div>" +
        "<div><span>Cognome:</span><input id=\"cognome" + i + "\" name=\"inp-cognomeRidotto" + i + "\" type=\"text\"></div>";
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
    carrello();
  }

  function functionDataPicker(){
    carrello();
    enable();
  }

  function getIsLogged() { //chiamata ad ajax per controllare se l'utente ha effettuato l'accesso
    var strReturn;
    $.ajax({
      url: "ajax.php?action=getIsLogged", dataType: "json", success: function(data) {
      strReturn=JSON.parse(JSON.stringify(data));
      },
      async:false
    });
    return strReturn;	
  }

  function controllaCampiVuoti(){
    var elements = document.forms["frmPaga"].elements;
    okCampi=true;

    for (i=0; i<elements.length; i++){ //controlla gli elementi del form tramite il loro 'name'
      campo=elements[i].name;

      if (campo=="privacy" && !elements[i].checked) { //verifica che il campo privacy sia stato settato
        okCampi=false;
        obj=document.getElementById("mess");
              obj.style.display="block";
              obj.innerHTML="<div><b>Il campo " + elements[i].id + " è obbligatorio</b></div>";	
        break;
      }
      position = campo.search("inp-");
      if (position>=0) { //verifica che tutti gli altri (nome,cognome,intestatario,numero carta) campi siano stati settati
        if (elements[i].value=="") {
          okCampi=false;
          obj=document.getElementById("mess");
                obj.style.display="block";
                obj.innerHTML="<div><b>Il campo " + elements[i].id + " è obbligatorio</b></div>";				
          break;
        }
      }
      
    }

    if(okCampi){ //se i campi sono stati tutti settati, vengono inviati i dati al server tramite l'azione del form
      document.getElementById("frmPaga").action="acquistobiglietti.php?action=salva"
      document.getElementById("frmPaga").submit();
      alert("Pagamento avvenuto con successo :)");
    }
  }

  function controlla() { //controlla la risposta di ajax
    checkLog=getIsLogged();
    isLogged=checkLog.isLogged;

    if (!controllaLogin()) {
      //se l'utente ha effettuato l'accesso, il pulsante 'continua' permette l'accesso all'area di pagamento
      nextPage();
    }
    else{//altrimenti lo riporta all'inizio della pagina aprendo il popup di login
      var continua = document.getElementById("continua");
      continua.href = "#home";				
    }
  }


  function controllaLogin(){
    //se l'utente non ha effettuato l'accesso, cliccando il pulsante continua gli sarà mostrato il popup di login, che si chiuderà dopo l'accesso
    ret = false;
    if(isLogged==""){
      popup[0].classList.add("activate");
      ret = true;
    }
    return ret;
  }
  

  function onFocus() { //elimina il messaggio di errore riferito alle credenziali se ci si sposta su uno dei campi 
    obj=document.getElementById("mess");
    obj.style.display="none";
    obj.innerHTML="<div></div>";
      }
