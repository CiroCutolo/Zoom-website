<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/9491817803.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header-part.css?<?php echo rand();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
  </head>
  <body>
  <div class="tag tickets">
    <div class="buy-tickets-container">
          <div class="buy-tickets-content">
          <!--Se la sessione è diversa da null, entrerò nel ramo else per permettere l'acquisto, in caso contrario visualizzo
          la sezione con un reindirizzamento alla pagina di registrazione-->
          <?php 
          
          if((!isset($_SESSION["isLogged"])) || ($_SESSION["isLogged"] == "")) { ?>
            <div class="buy-tickets-textcontent">Registrati o accedi per acquistare!</div>

          </div>
          <?php }else{ ?>
           <p class="buy-tickets-textcontent">ACQUISTA IL TUO BIGLIETTO</p>
             <p class="buy-tickets-textcontent">Adulti
              <select id="selector1">
                <script>
                  var i = 0;
                  for (i = 0; i <= 10 ; i++){
                    document.write("<option>" + i + "</option>");
                  }
                </script>
             </select>
             </p>
             <p class="buy-tickets-textcontent">Bambini
             <select id="selector2">
               <script>
                 var i = 0;
                 for (i = 0; i <= 10 ; i++){
                   document.write("<option>" + i + "</option>");
                 }
               </script>
             </select>
             </p>
             <p class="buy-tickets-textcontent">Data della visita</p>
             <p><input type="date" class="date-picker" min="<?php echo date('Y-m-d');?>"></input>
             </p>
         </div>
         <div class="btn-tickets-container">
           <button class="btn-tickets">ACQUISTA</button>
         </div>
         <?php } ?>
   </div>
   <div>
     <img class="photo" src="foto-giraffa.png">
   </div>
 </div>
  <br>
 <div class="tag openingtime">
   <div>
          <img class="photo" src="foto-tucano.png">
   </div>
   <div class="buy-tickets-container">
    <!--Modifica dinamica dell'orario di ingresso tramite una funzione php che permette di ricavare la data corrente e di confrontarla con le
    date di inizio e fine dell'orario estivo/invernale. Il confronto viene effettuato trasformando le date nel formato Unix timestamp in modo da
    avere una quantità intera da poter inserire in una condizione if. La parte di tariffe resta statica.-->
      <?php 
      $today = date("d-m-Y");
      $current_year = date("Y");
      $winterstart_time = "1-11-" . ($current_year-1);
      $winterend_time = "31-3-" . $current_year;
      $summerstart_time = "1-4-" . $current_year;
      $summerend_time = "31-10-" . $current_year;
      if( (strtotime($today) > strtotime($winterstart_time) && strtotime($today) < strtotime($winterend_time) ) || ( strtotime($today) == strtotime($winterstart_time) || strtotime($today) == strtotime($winterend_time))) {
      ?>
      <div class="hours">
        <img src="foto-winter.png">
        <h2>Orario Invernale</h2>
        <div>Dal 1° Novembre al 31 Marzo: 9:30 - 17:30</div>
        <div>Weekend e festivi invariati</div>
      </div>
      <?php 
      }else if ( (strtotime($today) > strtotime($summerstart_time) && strtotime($today) < strtotime($summerend_time)) || ( strtotime($today) == strtotime($summerstart_time) || strtotime($today) == strtotime($summerend_time))){
      ?>
      <div class="hours">
        <img src="foto-summer.png">
        <h2>Orario Estivo</h2>
        <div>Dal 1° Aprile al 31 Ottobre: 10:00 - 18:00</div>
        <div>Weekend e festivi: 9:30 - 19:00</div>
      </div>
      <?php
      }else{
      ?>
      <div class="hours">
        <img src="foto-winter.png">
        <h2>Orario Invernale</h2>
        <div>Dal 1° Novembre al 31 Marzo: 9:30 - 17:30</div>
        <div>Weekend e festivi invariati</div>
      </div>
      <?php
      }
      ?>
      <div class="price">
        <img src="foto-tickets.png">
        <h2>Tariffe</h2>
        <div>-Intero: 15€</div>
        <div>-Ridotto: 10€ (4-10 anni, persone con disabilità inferiore al 100%)</div>
        <div>-Gratuito: Under 3, over 70 e disabili 100% con accompagnatori</div>
      </div>
      <div class="price">
        <div class="btn-tickets-container">
          <button class="btn-tickets">LEGGI DI PIÙ</button>
        </div>
      </div>
   </div>
  </div>
  <br>
  <div class="tag map">
      <div class="buy-tickets-container1">
        <div class="map-text">
          <div>
            <img src="1.png" width="35%">
            <h2>Consulta la nostra mappa</h2>
            Scopri tutte le aree dei nostri animali ed i nostri servizi
          </div>
        </div>
        <div class="map-content">
          <img src="zoo-map.png" width="100%">
        </div>
      </div>
  </div>
  <br>
  <br>
  </body>
      <script src="https://code.jquery.com/jquery-latest.min.js"></script>
      <script type="text/javascript">
      var $ = jQuery;
      $(document).on("scroll", function() {
        var pageTop = $(document).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var tags = $(".tag");

        for (var i = 0; i < tags.length; i++) {
          var tag = tags[i];
          if ($(tag).position().top < pageBottom) {
            $(tag).addClass("visible");
          } else {
            $(tag).removeClass("visible");
          }
        }
      });
      </script>
    </html>
