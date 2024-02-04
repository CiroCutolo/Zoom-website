<?php
	include('connessione.php');
	session_start();

	if(isset($_GET['action']) && ($_GET['action']=="salva")){
		
		if(isset($_POST['interiToDb'])){
			echo $_POST['interiToDb'];
			$numInteri = $_POST['interiToDb'];
			for($i=1;$i<=$numInteri;$i++){

				$nome=$_POST['inp-nomeIntero' + $i];
				$cognome=$_POST['inp-cognomeIntero'+$i];
				$validita=$_POST['d-date'];	
				$prezzo=$_POST['priceIntero'];	
				$tipologia=$_POST['tipologiaIntero'];		
				$user=$_SESSION['isLogged'];
			
				$query = "INSERT INTO biglietti_acquistati(nome, cognome, validita, prezzo, tipologia, utente) 
						VALUES('$nome', '$cognome', '$validita', '$prezzo', '$tipologia', $user)";
				$result = pg_prepare($conn, "InsertBigliettoAcquistato", $query);
				$result = pg_execute($conn, "InsertBigliettoAcquistato", array($nome, $cognome, $validita, $prezzo, $tipologia, $user));
				if(!$result){
					echo pg_last_error($conn);
				}
			}
		}else{
			echo "non funziono";
		}
		if(isset($_POST['ridottiToDb'])){
			$numRidotti = $_POST['ridottiToDb'];
			for($i=1;$i<=$numRidotti;$i++){

				$nome=$_POST['inp-nomeRidotti' + $i];
				$cognome=$_POST['inp-cognomeRidotti'+$i];
				$validita=$_POST['d-date'];	
				$prezzo=$_POST['priceRidotto'];	
				$tipologia=$_POST['tipologiaRidotto'];		
				$user=$_SESSION['isLogged'];
			
				$query = "INSERT INTO biglietti_acquistati(nome, cognome, validita, prezzo, tipologia, utente, id_biglietto) 
						VALUES('$nome', '$cognome', '$validita', '$prezzo', '$tipologia', $user)";
				$result = pg_prepare($conn, "InsertBigliettoAcquistato", $query);
				$result = pg_execute($conn, "InsertBigliettoAcquistato", array($nome, $cognome, $validita, $prezzo, $tipologia, $user));
				if(!$result){
					echo pg_last_error($conn);
				}
			}
		}		
	}
	pg_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
	<head>			
		<title>Acquisto biglietti - Zoom</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./Css/acquistobiglietti.css?<?php echo rand();?>" type="text/css">
		<script src="JS\function.js?<?php echo rand();?>" type="text/javascript" ></script>
		<script src="https://code.jquery.com/jquery-latest.min.js?<?php echo rand();?>"></script>
		
	</head>
	<body class="acquisto_body">
		<?php include './header.php';?>

		<form id="frmPaga" method="post" action="acquistobiglietti.php?action=salva">
			<!-- Informazioni sui biglietti -->
			<div class="container informazioni">
				<h1>Biglietti</h1>
				<h2>Tipologie di biglietto</h2>
				<ul>
					<li>Intero a data fissa: € 15.00</li>
					<li>Ridotto a data fissa: € 10.00 per bambini da 4 a 10 anni, persone con disabilità inferiore al 100%.</li>
					<li>Gratuito: Under 3, Over 70 e disabili 100% con accompagnatori.</li>
				</ul>
		
				<h2>Orari</h2>
				<ul class="orari">
					<li>Orario invernale:</li>
					<ul>
						<li>Dal 1° Novembre al 31 Marzo: 9:30 – 17:00</li>
						<li>Weekend e festivi invariati</li>
					</ul>
					<li>Orario estivo:</li>
						<ul>
						<li>Dal 1° Aprile al 31 Ottobre: 10:00 – 18:00</li>
						<li>Weekend e festivi: 9:30 - 19:00</li>
						</ul>
				</ul>	
				<p class="lastaccess">
					<span class="warning">
					<i class='fas fa-exclamation-circle' style='font-size:15px'></i>
					</span>
					<strong> Ultimo ingresso:</strong> 60 min prima dell'orario di chiusura del parco.
				</p>

			</div>

			<!-- Acquisto biglietti -->
			<div class="container acquisto">
				<h2>Acquista il tuo biglietto</h2>
				<h3>Seleziona il numero di biglietti</h3>
				<p>
				I biglietti di ingresso non sono in alcun modo rimborsabili.
				Non è possibile effettuare un cambio data.
				Una volta selezionati tipologia e numero di biglietti, apparirà un calendario per la selezione della data.
				</p>
				<div class="selezione">
					<div class="ticketNumber">
						<label for="numeroInteri" class="interi">
							<fieldset>
								<legend class="interi-text">INTERI</legend>
								<div class="content">
									<div class="intero-image">
										<img src="img\man_woman.png" alt="men_woman_image"/>
									</div>
									<a href="#ciao" class="information" onclick="moreInfo('infoPanel-1')">
										<i class="fa fa-info-circle"></i>
									</a>
									<div class="price">
										<span>€ 15.00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroInteri" onchange="functionsNumberPicker()">
											<?php if(!isset($_POST['selectOption'][0])){ ?>
												<script>
												var i = 0;
												for (i = 0; i <= 10 ; i++){
													document.write("<option value=" + i +">" + i + "</option>");
												}
												</script>
											<?php }else{ ?>
												<option value="0" <?php if($_POST['selectOption'][0] == 0) echo ' selected="selected"'; ?>>0</option>
												<option value="1" <?php if($_POST['selectOption'][0] == 1) echo ' selected="selected"'; ?>>1</option>
												<option value="2" <?php if($_POST['selectOption'][0] == 2) echo ' selected="selected"'; ?>>2</option>
												<option value="3" <?php if($_POST['selectOption'][0] == 3) echo ' selected="selected"'; ?>>3</option>
												<option value="4" <?php if($_POST['selectOption'][0] == 4) echo ' selected="selected"'; ?>>4</option>
												<option value="5" <?php if($_POST['selectOption'][0] == 5) echo ' selected="selected"'; ?>>5</option>
												<option value="6" <?php if($_POST['selectOption'][0] == 6) echo ' selected="selected"'; ?>>6</option>
												<option value="7" <?php if($_POST['selectOption'][0] == 7) echo ' selected="selected"'; ?>>7</option>
												<option value="8" <?php if($_POST['selectOption'][0] == 8) echo ' selected="selected"'; ?>>8</option>
												<option value="9" <?php if($_POST['selectOption'][0] == 9) echo ' selected="selected"'; ?>>9</option>
												<option value="10" <?php if($_POST['selectOption'][0] == 10) echo ' selected="selected"'; ?>>10</option>
											<?php } ?>
										</select>
									</div>
									<div class="note">
										<p>
											Adulti e ragazzi dai 10 anni in su.
										</p>
									</div>
								</div>
								<div id="infoPanel-1" class="extraPanel hidden">
									<p>
									Puoi acquistare online il tuo biglietto entro le ore 23.59 del giorno precedente alla tua visita.
									</p>
								</div>
							</fieldset>	
						</label>
						
						<label for="numeroRidotti" class="ridotti">
							<fieldset>
								<legend class="ridotti-text">RIDOTTI</legend>
								<div class="content">
									<div class="ridotto-image">
										<img src="img\elder_child.png" alt="elder_child_image"/>
									</div>
									<a href="#ciao" class="information" onclick="moreInfo('infoPanel-2')">
										<i class="fa fa-info-circle"></i>
									</a>
									<div class="price">
										<span>€ 10.00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroRidotti" onchange="enable();functionsNumberPicker();">
											<?php if(!isset($_POST['selectOption'][0])){ ?>
												<script>
												var i = 0;
												for (i = 0; i <= 10 ; i++){
													document.write("<option value=" + i +">" + i + "</option>");
												}
												</script>
											<?php }else{ ?>
												<option value="0" <?php if($_POST['selectOption'][1] == 0) echo ' selected="selected"'; ?>>0</option>
												<option value="1" <?php if($_POST['selectOption'][1] == 1) echo ' selected="selected"'; ?>>1</option>
												<option value="2" <?php if($_POST['selectOption'][1] == 2) echo ' selected="selected"'; ?>>2</option>
												<option value="3" <?php if($_POST['selectOption'][1] == 3) echo ' selected="selected"'; ?>>3</option>
												<option value="4" <?php if($_POST['selectOption'][1] == 4) echo ' selected="selected"'; ?>>4</option>
												<option value="5" <?php if($_POST['selectOption'][1] == 5) echo ' selected="selected"'; ?>>5</option>
												<option value="6" <?php if($_POST['selectOption'][1] == 6) echo ' selected="selected"'; ?>>6</option>
												<option value="7" <?php if($_POST['selectOption'][1] == 7) echo ' selected="selected"'; ?>>7</option>
												<option value="8" <?php if($_POST['selectOption'][1] == 8) echo ' selected="selected"'; ?>>8</option>
												<option value="9" <?php if($_POST['selectOption'][1] == 9) echo ' selected="selected"'; ?>>9</option>
												<option value="10" <?php if($_POST['selectOption'][1] == 10) echo ' selected="selected"'; ?>>10</option>
											<?php } ?>
										</select>
									</div>
									<div class="note">
										<p>
											Bambini da 4 a 10 anni, persone con disabilità inferiore al 100%
										</p>
										<p>
											<strong>Attenzione:</strong> Ingresso gratuito per bambini di altezza inferiore a 1 metro (da confermare all'ingresso del parco previa misurazione).
										</p>
									</div>
								</div>
								<div id="infoPanel-2" class=" extraPanel hidden">
									<p>
									Puoi acquistare online il tuo biglietto entro le ore 23.59 del giorno precedente alla tua visita.
									</p>
								</div>
							</fieldset>
						</label>
					</div>
					<div id="dateContainer" class="hidden">
						<h3>Seleziona la data</h3>

						<label for="ticketDate" >
							<input id="datePicker" name="d-date" <?php if(isset($_POST['selectOption'][2])) {?> value = "<?php echo $_POST['selectOption'][2]; ?>" <?php } ?>type="date" title="Data visita" min="<?php echo date('Y-m-d');?>" onchange="carrello();enable()">
						</label>
					</div>
				</div>
			</div>

			<div class="carrello hidden">
				<h2>Carrello</h2>
				<table class="cartTable">
					<thead>
						<tr id="headerRow" class="cartHeader">
							<th class="lftCell">Prodotto</th>
							<th>Quantità</th>
							<th>Data</th>
							<th>Prezzo</th>
							<th>Totale</th>
						</tr>
					</thead>
					<tbody>
						<tr id="interiRow" class="cartRow hidden">
							<td class="lftCell">Biglietti Interi</td>
							<td id="tableInteri">0</td>
							<td id="tableDate1">gg/mm/aaaa</td>
							<td>€15.00</td>
							<td id="tableTotInteri">€0.00</td>
						</tr>
						<tr id="ridottiRow" class="cartRow hidden">
							<td class="lftCell">Biglietti Ridotti</td>
							<td id="tableRidotti">0</td>
							<td id="tableDate2">gg/mm/aaaa</td>
							<td>€10.00</td>
							<td id="tableTotRidotti">€0.00</td>
						</tr>
						<tr id="totalRow" class="cartRow">
							<td class="lftCell">TOTALE</td>
							<td id="totalPrice" colspan="4">€0.00</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- Inserimento dati biglietto -->
			<div class="container datiBiglietti hidden">
				<h2>Dati biglietti</h2>
				<div id="datiInteri">
					<h3>BIGLIETTI INTERI</h3>
					<input name="priceIntero" type="hidden" value="15.00">
					<input name="tipologiaIntero" type="hidden" value="intero">
				</div>
				<div id="datiRidotti">
					<h3>BIGLIETTI RIDOTTI</h3>
					<input name="priceRidotto" type="hidden" value="10.00">
					<input name="tipologiaRidotto" type="hidden" value="ridotto">
				</div>
				<div style="margin:30px 0px 0px 0px;">
					<input id="PoliticheContrattuali" name="privacy" type="checkbox" onfocus="onFocus()">Accetta le politiche contrattuali.
				</div>
			</div>
			
			<div id="mess" style="display:none; color: orange;"></div>

			<!-- Dati di pagamento -->
			<div class="container pagamento hidden">
				<h2>Pagamento</h2>
				<div>
					<h3 style="display: inline;">Metodo di pagamento</h3><img style="height: 15px; display: inline;" src="img/payment.png" alt="">
				</div>								
				<br>
				<div>
					<span>Intestatario:</span>
					<input id="Intestatario" name="inp-intestatario" type="text" onfocus="onFocus()">
				</div>
				<div>
					<span>Numero della carta:</span>
					<input id="Numero della carta" name="inp-carta" type="text" onfocus="onFocus()">
				</div>
				<div>
					<span>Mese di scadenza:</span>
					<select id="Mese di scadenza" name="mese">
						<?php
						for($i=1;$i<=12;$i++)
							echo "<option value=\"$i\">$i</option>"
						?>
					</select>
				</div>
				<div>
					<span>Anno di scadenza:</span>
					<select id="Anno di scadenza" name="anno">
						<?php
							for($i=2024;$i<=2044;$i++)
								echo "<option value=\"$i\">$i</option>"
							?>
					</select>
				</div>	
				<div>
					<span>CVV:</span>
					<input id="cvv" name="cvv-carta" type="password" onfocus="onFocus()">
				</div>			
			</div>
			
			<!-- Bottoni di navigazione -->			
			<label class="buttonContainer">
				<a id="continua" ><input class="naviButton" type="button" id="continueButton" value="Continua" disabled onclick="generaCampi();controlla()"></a>
			</label>

			<label class="buttonContainer hidden">
				<input class="naviButton" id="payButton" type="button" value="Paga" onclick="controllaCampiVuoti()">
			</label>

			<label class="buttonContainer hidden">
				<input class="naviButton" type="button" id="backButton" value="Indietro" onclick="nextPage();removeOldElements();onFocus()">
			</label>
		</form>

		<script>
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

			function onFocus() { //elimina il messaggio di errore riferito alle credenziali 
				obj=document.getElementById("mess");
				obj.style.display="none";
				obj.innerHTML="<div></div>";
      		}
		</script>										 
	</body>
</html>
