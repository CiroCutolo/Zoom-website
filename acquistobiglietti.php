<?php

	// include('connessione.php');
	// session_start();

	// if(isset($_GET['action']) && ($_GET['action']=="salva")){
	// 	$emailReg=$_SESSION['isLogged'];
	// 	$validita=$_POST['datePicker'];

	// 	$query = "INSERT INTO biglietti(codice,prezzo,tipologia,validità) VALUES($emailReg$$$)";
	// 	$result = pg_query($conn,$query);
		
	// }

?>




<!DOCTYPE html>
<html lang="en">
	<head>			
		<title>Acquisto biglietti - Zoom</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./Css/acquistobiglietti.css?<?php echo rand();?>" type="text/css">
		<script src="JS\function.js" type="text/javascript" ></script>
		
	</head>
	<body class="acquisto_body">
		<?php include './header.php';?>

		<form method="post" action="acquistobiglietti.php?action=salva">
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
										<select id="numeroInteri" onchange="showDate();enable();carrello()">
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
										<select id="numeroRidotti" onchange="functionsNumberPicker()">
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
							<input id="datePicker" type="date" title="Data visita" onchange="carrello();enable()">
						</label>
					</div>
				</div>
			</div>

			<div class="container carrello hidden">
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
					<h3>Biglietti interi</h3>
				</div>
				<div id="datiRidotti">
					<h3>Biglietti ridotti</h3>
				</div>
				<label>
					<input type="checkbox">pryvacy.
				</label>
			</div>
			
			<!-- Dati di pagamento -->
			<div class="container pagamento hidden">
				<h2>Pagamento</h2>
				<h3>Metodo di pagamento</h3>
				<label>
					Nome sulla carta:
					<input type="text">
				</label>
				<label>
					Numero della carta:
					<input type="text">
				</label>
				<label>
					Mese:
					<select>
						<?php
						for($i=0;$i<=12;$i++)
							echo "<option value=\"$i\">$i</option>"
						?>
					</select>
				</label>
				<label>
					Anno:
					<select>
						<?php
							for($i=2024;$i<=2044;$i++)
								echo "<option value=\"$i\">$i</option>"
							?>
					</select>
				</label>				
			</div>
			
			<!-- Bottoni di navigazione -->			
			<label class="buttonContainer">
				<input class="naviButton" type="button" id="continueButton" value="Continua" disabled onclick="nextPage();generaCampi()">
			</label>
					
			<label class="buttonContainer hidden">
				<input class="naviButton" id="payButton" type="submit" value="Paga">
			</label>

			<label class="buttonContainer hidden">
				<input class="naviButton" type="button" id="backButton" value="Indietro" onclick="nextPage()">
			</label>
		</form>
	</body>
</html>
