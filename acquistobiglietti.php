<?php
	ini_set('display_errors', 0);
	include('connessione.php');
	session_start();

	if(isset($_GET['action']) && ($_GET['action']=="salva")){
		
		if(isset($_POST['interiToDb'])){
			$numInteri = $_POST['interiToDb'];
			for($i=1;$i<=$numInteri;$i++){

				$nome=$_POST['inp-nomeIntero' . $i];
				$cognome=$_POST['inp-cognomeIntero' . $i];
				$validita=$_POST['d-date'];	
				$prezzo=$_POST['priceIntero'];
				$tipologia=$_POST['tipologiaIntero'];		
				$user=$_SESSION['isLogged'];
				
				$query = "INSERT INTO biglietti_acquistati(nome, cognome, validita, prezzo, tipologia, utente) 
						VALUES($1, $2, $3, $4, $5, $6)";
				$result = pg_prepare($conn, "InsertBigliettoAcquistato", $query);
				
				if(!$result){
					echo pg_last_error($conn);
				}else{
					$result = pg_execute($conn, "InsertBigliettoAcquistato", array($nome, $cognome, $validita, $prezzo, $tipologia, $user));
					if(!$result){
						echo pg_last_error($conn);
					}
				}
			}
		}else{
			echo "non funziono";
		}
		if(isset($_POST['ridottiToDb'])){
			$numRidotti = $_POST['ridottiToDb'];
			for($i=1;$i<=$numRidotti;$i++){
				$nome=$_POST['inp-nomeRidotto' . $i];
				$cognome=$_POST['inp-cognomeRidotto' . $i];
				$validita=$_POST['d-date'];	
				$prezzo=$_POST['priceRidotto'];	
				$tipologia=$_POST['tipologiaRidotto'];		
				$user=$_SESSION['isLogged'];
			
				$query = "INSERT INTO biglietti_acquistati(nome, cognome, validita, prezzo, tipologia, utente) 
						VALUES('$nome', '$cognome', '$validita', '$prezzo', '$tipologia', '$user')";
		
				$result = pg_query($conn,$query);
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
		<meta name="author" content="Gaetano Frasca">
		<meta charset="utf-8">
		<link rel="stylesheet" href="./Css/acquistobiglietti.css?<?php echo rand();?>" type="text/css">
		<script src="JS\function.js?<?php echo rand();?>" type="text/javascript" ></script>
		<script src="https://code.jquery.com/jquery-latest.min.js?<?php echo rand();?>"></script>
	
	</head>
	<body class="acquisto_body">
		<?php include './header.php';?>
		<script>
				
			cNumeroInteri=getCookie("numeroInteri");
			cNumeroRidotti=getCookie("numeroRidotti");
			cDatePicker=getCookie("datePicker");
				
		</script>	
		<form id="frmPaga" method="post" action="acquistobiglietti.php?action=salva">
			<!-- Informazioni sui biglietti -->
			<div class="container informazioni">
				<h1>Biglietti</h1>
				<h2>Tipologie di biglietto</h2>
				<ul>
					<li>Intero: € 15.00</li>
					<li>Ridotto: € 10.00 per bambini da 4 a 10 anni, persone con disabilità inferiore al 100%.</li>
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
					<i class='fas fa-exclamation-circle'></i>
					</span>
					<strong> Ultimo ingresso:</strong> 60 min prima dell'orario di chiusura del parco.
				</p>

			</div>

			<!-- Acquisto biglietti -->
			<div class="container acquisto">
				<h2>Acquista il tuo biglietto</h2>
				<h3>Seleziona il numero di biglietti</h3>
				<p>
				I biglietti di ingresso non sono in alcun modo rimborsabili.<br>
				Non è possibile effettuare un cambio data.<br>
				<b>Una volta selezionati tipologia e numero di biglietti, sarà possibile selezionare la data della visita.</b>
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
									<a href="#." class="information" onclick="moreInfo('infoPanel-1')">
										<i class="fa fa-info-circle"></i>
									</a>
									<div class="price">
										<span>€ 15.00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroInteri" onclick="functionsNumberPicker()">
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
									<a href="#." class="information" onclick="moreInfo('infoPanel-2')">
										<i class="fa fa-info-circle"></i>
									</a>
									<div class="price">
										<span>€ 10.00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroRidotti" name="sel-ridotti" onclick="functionsNumberPicker()">
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
											<strong>Attenzione:</strong> Ingresso gratuito per bambini di altezza inferiore a 1 metro<br>(da confermare all'ingresso del parco previa misurazione).
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
					<div id="dateContainer">
						<fieldset>
							<legend class="data-text">DATA DI VISITA</legend>
							<p>Seleziona per procede all'acquisto.</p>
						<label for="ticketDate" >
							<input id="datePicker" name="d-date" <?php if(isset($_POST['selectOption'][2])) {?> value = "<?php echo $_POST['selectOption'][2]; ?>" <?php } ?>type="date" title="Data visita" min="<?php echo date('Y-m-d');?>" onchange="functionDataPicker()">
						</label>
						</fieldset>
					</div>
				</div>
			</div>

			<!-- Carrello -->
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
					<input name="priceIntero" type="hidden" value="15.00">
					<input name="tipologiaIntero" type="hidden" value="intero">
				</div>
				<div id="datiRidotti">
					<input name="priceRidotto" type="hidden" value="10.00">
					<input name="tipologiaRidotto" type="hidden" value="ridotto">
				</div>
				<div style="margin:30px 0px 0px 0px;">
					<input id="PoliticheContrattuali" name="privacy" type="checkbox" onfocus="onFocus()">Accetta le politiche contrattuali.
				</div>
			</div>
			
			<div id="mess" style="display:none"></div>

			<!-- Dati di pagamento -->
			<div class="container pagamento hidden">
				<h2>Metodo di pagamento</h2>
				<div class="payment-header">
					<span class="payment-text"><h3>Carta di credito</h3></span>
					<span><img class="payMethod" src="img/payment.png" alt="payment_method_image"></span>
				</div>
				<div class="payInfo">
					<div>
						<span>Intestatario:</span>
						<input id="intestatario" name="inp-intestatario" type="text" autocomplete="off" onfocus="onFocus()">
					</div>
					<div>
						<span>Numero della carta:</span>
						<input id="cardNumber" name="inp-carta" type="number" autocomplete="off" onfocus="onFocus()">
					</div>
					<div>
						<span>Mese di scadenza:</span>
						<select id="meseScadenza" name="mese" autocomplete="off">
							<?php
							for($i=1;$i<=12;$i++)
								echo "<option value=\"$i\">$i</option>"
							?>
						</select>
					</div>
					<div>
						<span>Anno di scadenza:</span>
						<select id="annoScadenza" name="anno" autocomplete="off">
							<?php
								for($i=2024;$i<=2044;$i++)
									echo "<option value=\"$i\">$i</option>"
								?>
						</select>
					</div>	
					<div>
						<span>CVV:</span>
						<input id="cvv" name="cvv-carta" type="password" maxlength="3" autocomplete="off" onfocus="onFocus()">
					</div>
				</div>			
			</div>
			
			<!-- Bottoni di navigazione -->			
			<label class="buttonContainer">
				<a id="continua" ><input class="naviButton" type="button" id="continueButton" value="Continua" disabled onclick="salvaCookie();generaCampi();controlla()"></a>
			</label>

			<label class="buttonContainer hidden">
				<input class="naviButton" id="payButton" type="button" value="Paga" onclick="controllaCampiVuoti()">
			</label>

			<label class="buttonContainer hidden">
				<input class="naviButton" type="button" id="backButton" value="Indietro" onclick="nextPage();removeOldElements()">
			</label>
		</form>

		<?php //include('footer.php');?>


		<script>
			function salvaCookie(){
				setCookie("numeroInteri", document.getElementById("numeroInteri").value,7);
				setCookie("numeroRidotti", document.getElementById("numeroRidotti").value,7);
				setCookie("datePicker", document.getElementById("datePicker").value,7);	
			}
			if (cNumeroInteri!=null)
				document.getElementById("numeroInteri").value=cNumeroInteri;
			if (cNumeroRidotti!=null)
				document.getElementById("numeroRidotti").value=cNumeroRidotti;
			if (cDatePicker!=null)
				document.getElementById("datePicker").value=cDatePicker;
		</script>
	</body>
</html>
