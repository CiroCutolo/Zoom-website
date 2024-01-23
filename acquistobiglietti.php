<!DOCTYPE html>
<html lang="en">
	<head>			
		<title>Acquisto biglietti - Zoom</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./Css/acquistobiglietti.css?<?php echo rand();?>" type="text/css">
		<script type = "text/javascript" src="JS\filterSelection.js"></script>
	</head>
	<body class="acquisto_body">
		<?php include './header.html';?>

		<div class="container tipologia">
			<h1>Biglietti</h1>
			<h2>Tipologie di biglietto</h2>
			<ul>
				<li>Intero a data fissa: € 15,00</li>
				<li>Ridotto a data fissa: € 10,00 per bambini di altezza superiore a 1 mt e fino a 10 anni.</li>
				<li>Gratuito: Bambini di altezza inferiore a 1 mt, Over 70, disabili e loro accompagnatori.</li>
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
			<h3>Acquista il tuo biglietto</h3>
			<p>
			I biglietti di ingresso non sono in alcun modo rimborsabili.
			Non è possibile effettuare un cambio data.
			Una volta selezionati tipologia e numero di biglietti, apparirà un calendario per la selezione della data.
			</p>
			<div class="selezione">
				<form method="post" action="">
					<div class="interi">
					<fieldset>
							<legend class="interi-text">INTERI</legend>
							<div class="content">
								<div class="intero-image">
									<img src="img\man_woman.png" alt="men_woman_image"/>
								</div>
								<a href="#" class="information" onclick="moreInfo()">
									<i class="fa fa-info-circle"></i>
								</a>
								<div class="price">
									<span>€ 15,00</span>
								</div>
								<div class="numberPicker">
									<select >
										<option value="0" selected>0</option>
										<option value="1" label="1"></option>
										<option value="2" label="2">2</option>
										<option value="3" label="3">3</option>
										<option value="4" label="4">4</option>
										<option value="5" label="5">5</option>
										<option value="6" label="6">6</option>
										<option value="7" label="7">7</option>
										<option value="8" label="8">8</option>
										<option value="9" label="9">9</option>
										<option value="10" label="10">10</option>
									</select>
								</div>
								<div class="note">
									<p>
										Adulti e ragazzi dai 10 anni in su
									</p>
								</div>
							</div>
							<div id="infoPanel" style="display: block;">
								<p>
								Il biglietto d’ingresso non è in alcun caso rimborsabile, né modificabile ad eccezione di eventi straordinari per cui la struttura rimarrà chiusa.<br/>
								Puoi acquistare online il tuo biglietto entro le ore 23.59 del giorno precedente alla tua visita.
								</p>
							</div>
						</fieldset>	
					</div>
				
					<div class="ridotti">
						<fieldset>
							<legend class="ridotti-text">RIDOTTI</legend>
							<div class="content">
								<div class="ridotto-image">
									<img src="img\elder_child.png" alt="elder_child_image"/>
								</div>
								<a href="#" class="information" onclick="moreInfo()">
									<i class="fa fa-info-circle"></i>
								</a>
								<div class="price">
									<span>€ 10,00</span>
								</div>
								<div class="numberPicker">
									<select >
										<option value="0" selected>0</option>
										<option value="1" label="1"></option>
										<option value="2" label="2">2</option>
										<option value="3" label="3">3</option>
										<option value="4" label="4">4</option>
										<option value="5" label="5">5</option>
										<option value="6" label="6">6</option>
										<option value="7" label="7">7</option>
										<option value="8" label="8">8</option>
										<option value="9" label="9">9</option>
										<option value="10" label="10">10</option>
									</select>
								</div>
								<div class="note">
									<p>
										Adulti e ragazzi dai 10 anni in su
									</p>
								</div>
							</div>
						</fieldset>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
