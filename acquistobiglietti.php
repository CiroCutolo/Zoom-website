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

		<div class="container tipologia">
			<h1>Biglietti</h1>
			<h2>Tipologie di biglietto</h2>
			<ul>
				<li>Intero a data fissa: € 15,00</li>
				<li>Ridotto a data fissa: € 10,00 per bambini da 4 a 10 anni, persone con disabilita' inferiore al 100%.</li>
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

		<div class="container acquisto">
			<h2>Acquista il tuo biglietto</h2>
			<h3>Seleziona il numero di biglietti</h3>
			<p>
			I biglietti di ingresso non sono in alcun modo rimborsabili.
			Non è possibile effettuare un cambio data.
			Una volta selezionati tipologia e numero di biglietti, apparirà un calendario per la selezione della data.
			</p>
			<div class="selezione">
				<form method="post" action="">
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
										<span>€ 15,00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroInteri" onchange="showDate('numeroInteri','numeroRidotti');enable()">
											<?php
											for($i=0;$i<=10;$i++)
												echo "<option value=\"$i\">$i</option>"
											?>
										</select>
									</div>
									<div class="note">
										<p>
											Adulti e ragazzi dai 10 anni in su
										</p>
									</div>
								</div>
								<div id="infoPanel-1" class="hidden">
									<p>
									Il biglietto d’ingresso non è in alcun caso rimborsabile, né modificabile ad eccezione di eventi straordinari per cui la struttura rimarrà chiusa.
									</p>
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
										<span>€ 10,00</span>
									</div>
									<div class="numberPicker">
										<select id="numeroRidotti" onchange="showDate('numeroInteri','numeroRidotti');enable()">
											<?php
												for($i=0;$i<=10;$i++)
												echo "<option value=\"$i\">$i</option>"
											?>
										</select>
									</div>
									<div class="note">
										<p>
											NB: Ingresso gratuito per bambini di altezza inferiore a 1 metro (da confermare all'ingresso del parco previa misurazione)
										</p>
									</div>
								</div>
								<div id="infoPanel-2" class="hidden">
									<p>
									Il biglietto d’ingresso non è in alcun caso rimborsabile, né modificabile ad eccezione di eventi straordinari per cui la struttura rimarrà chiusa.
									</p><p>
									Puoi acquistare online il tuo biglietto entro le ore 23.59 del giorno precedente alla tua visita.
									</p>
								</div>
							</fieldset>
						</label>
					</div>
					<div id="dateContainer" class="hidden">
						<h3>Seleziona la data</h3>

						<label for="ticketDate" >
							<input id="datePicker" type="date" title="Data visita" onchange="enable()">
						</label>
					</div>

					<div class="container carrello">
						<h2>Carrello</h2>
						<table>
							<tr>
								<th>Prodotto</th>
								<th>Quantità</th>
								<th>Data</th>
								<th>Prezzo</th>
								<th>Totale</th>
							</tr>
							<tr>
								<td>Biglietti Interi</td>
								<td id="tableInteri">Quantità</td>
								<td id="tableDate">Data</td>
								<td>€15,00</td>
								<td>Totale</td>
							</tr>
							<tr>
								<td>Biglietti Ridotti</td>
								<td>Quantità</td>
								<td>Data</td>
								<td>€10,00</td>
								<td>Totale</td>
							</tr>
							<tr>
								<td>TOTALE</td>
							</tr>
						</table>
					</div>
					<label class="buttonContainer">
						<input type="button" id="continueButton" value="Continua" disabled onclick="showCart();ridotti()">
					</label>
				</form>
			</div>
		</div>

		<div class="datiBieglietti">
			<h2>Dati biglietti</h2>
			<h3>Biglietti interi</h3>
			<h4>Partecipante 1</h4>
			<form action="">
				<label>
					Nome:
					<input type="text">
				</label>
				<label>
					Cognome:
					<input type="text">
				</label>
			</form>
			<h2>Pagamento</h2>
			<h3>Metodo di pagamento</h3>
			<form action="">
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
			</form>
		</div>
	</body>
</html>
