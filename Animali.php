<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <title>Animali - Zoom</title>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-latest.min.js?<?php echo rand();?>"></script>
        <script src="https://kit.fontawesome.com/9491817803.js?<?php echo rand();?>" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Css/Fonts.css?<?php echo rand();?>">
        <link rel="stylesheet" href="Css/Animali.css?<?php echo rand();?>">
        <link rel="stylesheet" href="header.css?<?php echo rand();?>">
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="filter-container" id="filters">
            <div class="filter-column">
                <select class="filter-selector" id="typeDropdown">
                    <option value="All">Seleziona una categoria di animali</option>
                    <option value="Anfibi">Anfibi</option>
                    <option value="Mammiferi">Mammiferi</option>
                    <option value="Rettili">Rettili</option>
                    <option value="Volatili">Volatili</option>
                    <option value="Pesci">Pesci</option>
                </select>
            </div>
            <div class="filter-column">
                <select class="filter-selector" id="regionDropdown">
                    <option value="All">Seleziona un'area geografica</option>
                    <option value="Africa">Africa</option>
                    <option value="America">America</option>
                    <option value="Asia">Asia</option>
                    <option value="Europa">Europa</option>
                    <option value="Oceania">Oceania</option>
                </select>
            </div>
        </div> 
        <div class="Animals-Container" id="animalsContainer">
            <div class="animal All Anfibi Africa" > 
                <div class="animal-image-section">
                    <form id="animal-form" action="Animali.php?action=ranamuta">
                        <button type="button" id="show_details_ranamuta" value="ranamuta" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/ranamuta.jpg" alt=""></a></button>
                    <h1>Rana muta della tanzania</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section">
                    <form id="animal-form" action="Animali.php?action=giraffareticolata">
                        <button type="button" id="show-details-giraffareticolata" value="giraffareticolata" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/giraffareticolata.jpg" alt=""></a></button>
                    <h1>Giraffa reticolata</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-leoneafricano" value="leoneafricano" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/leoneafricano.jpg" alt=""></a></button>
                    <h1>Leone africano</h1>
                </div>
            </div>
            <div class="animal All Rettili Africa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-coccodrillodelnilo" value="coccodrillodelnilo" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/coccodrillodelnilo.jpg" alt=""></a></button>
                    <h1>Coccodrillo del nilo</h1>
                </div>
            </div>
            <div class="animal All Volatili Africa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-faraonacrestata" value="faraonacrestata" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/faraonacrestata.jpg" alt=""></a></button>
                    <h1>Faraona crestata</h1>
                </div>
            </div>
            <div class="animal All Pesci Africa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-neolamprologus" value="neolamprologus" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/neolamprologus.jpg" alt=""></a></button>
                    <h1>Neolamprologus</h1>
                </div>
            </div>
            <div class="animal All Anfibi America">
                <div class="animal-image-section">
                        <button type="button" id="show-details-ranafreccia" value="ranafreccia" name="animal-button" onclick="popupFunc(this)" ><a><img src="image_slider/anfibi.jpg" alt=""></a></button>
                    <h1>Rana freccia</h1>
                </div>
            </div>
            <div class="animal All Mammiferi America">
                <div class="animal-image-section">
                        <button type="button" id="show-details-coyote" value="coyote" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/coyote.jpg" alt=""></a></button>
                    <h1>Coyote</h1>
                </div>
            </div>
            <div class="animal All Rettili America">
                <div class="animal-image-section">
                        <button type="button" id="show-details-iguanadaitubercoli" value="iguanadaitubercoli" name="animal-button" onclick="popupFunc(this)" ><a><img src="image_slider/rettili.jpg" alt=""></a></button>
                    <h1>Iguana dai tubercoli</h1>
                </div>
            </div>
            <div class="animal All Volatili America">
                <div class="animal-image-section">
                        <button type="button" id="show-details-anatramuta" value="anatramuta" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/anatramuta.jpg" alt=""></a></button>
                    <h1>Anantra muta</h1>
                </div>
            </div>
            <div class="animal All Pesci America">
                <div class="animal-image-section">
                        <button type="button" id="show-details-guppy" value="guppy" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/guppy.jpg" alt=""></a></button>
                    <h1>Guppy</h1>
                </div>
            </div>
            <div class="animal All Anfibi Asia">
                <div class="animal-image-section">
                        <button type="button" id="show-details-atelopusvarius" value="atelopusvarius" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/atelopusvarius.jpg" alt=""></a></button>
                    <h1>Atelopus varius</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Asia">
                <div class="animal-image-section">
                        <button type="button" id="show-details-tigremalese" value="tigremalese" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/tigremalese.jpg" alt=""></a></button>
                    <h1>Tigre malese</h1>
                </div>
            </div>
            <div class="animal All Rettili Asia">
                <div class="animal-image-section">
                        <button type="button" id="show-details-gekotokai" value="gekotokai" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/gekotokai.jpg" alt=""></a></button>
                    <h1>Geko tokai</h1>
                </div>
            </div>
            <div class="animal All Volatili Asia">
                <div class="animal-image-section">
                        <button type="button" id="show-details-aironecenerino" value="aironecenerino" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/aironecenerino.jpg" alt=""></a></button>
                    <h1>Airone cenerino</h1>
                </div>
            </div>
            <div class="animal All Pesci Asia">
                <div class="animal-image-section">
                        <button type="button" id="show-details-bettasplendens" value="bettasplendens" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/bettasplendens.jpg" alt=""></a></button>
                    <h1>Betta splendens</h1>
                </div>
            </div>
            <div class="animal All Anfibi Europa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-raganellapadana" value="raganellapadana" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/raganellapadana.jpg" alt=""></a></button>
                    <h1>Raganella padana</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Europa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-riccioeuropeo" value="riccioeuropeo" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/riccioeuropeo.jpg" alt=""></a></button>
                    <h1>Riccio europeo</h1>
                </div>
            </div>
            <div class="animal All Rettili Europa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-tartarugacaretta" value="tartarugacaretta" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/tartarugacaretta.jpg" alt=""></a></button>
                    <h1>Tartaruga caretta</h1>
                </div>
            </div>
            <div class="animal All Volatili Europa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-gruccionecomune" value="gruccionecomune" name="animal-button" onclick="popupFunc(this)" ><a><img src="image_slider/volatili.jpg" alt=""></a></button>
                    <h1>Gruccione comune</h1>
                </div>
            </div>
            <div class="animal All Pesci Europa">
                <div class="animal-image-section">
                        <button type="button" id="show-details-ippocampo" value="ippocampo" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/ippocampo.jpg" alt=""></a></button>
                    <h1>Ippocampo</h1>
                </div>
            </div>
            <div class="animal All Anfibi Oceania">
                <div class="animal-image-section">
                        <button type="button" id="show-details-rospodellecanne" value="rospodellecanne" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/rospodellecanne.jpg" alt=""></a></button>
                    <h1>Rospo delle canne</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Oceania">
                <div class="animal-image-section">
                        <button type="button" id="show-details-dingo" value="dingo" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/dingo.jpg" alt=""></a></button>
                    <h1>Dingo</h1>
                </div>
            </div>
            <div class="animal All Rettili Oceania">
                <div class="animal-image-section">
                        <button type="button" id="show-details-clamidosauro" value="clamidosauro" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/clamidosauro.jpg" alt=""></a></button>
                    <h1>Clamidosauro</h1>
                </div>
            </div>
            <div class="animal All Volatili Oceania">
                <div class="animal-image-section">
                        <button type="button" id="show-details-emu" value="emu" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/emu.jpg" alt=""></a></button>
                    <h1>Emù</h1>
                </div>
            </div>
            <div class="animal All Pesci Oceania">
                <div class="animal-image-section">
                        <button type="button" id="show-details-pescesanpietro" value="pescesanpietro" name="animal-button" onclick="popupFunc(this)" ><a><img src="img/pescesanpietro.jpg" alt=""></a></button>
                    <h1>Pesce San Pietro</h1>
                </div>
            </div>
        </div>

        <div class="animal-details-popup" id="animal-details-popup">
            <div class="popup-text-container">
                <h1><?php echo $animaldetails['animal.title'] ?></h1>
                <p><?php echo $animaldetails['animal.description'] ?></p>
                <button id="close-button">Chiudi la scheda</button>
            </div>    
        </div>

        <script src="JS/filterSelection.js?<?php echo rand();?>"></script>
        
    </body>
</html>