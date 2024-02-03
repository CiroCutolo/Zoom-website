<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <title>Animali - Zoom</title>
        <meta charset="utf-8">
        <meta name="author" content="Ciro Cutolo">
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
            <!-- <div class="animal All Mammiferi Africa" > 
                <div class="animal-image-section" id="show-details-leone">
                        <a href="javascript:showAnimalPopup('leone')"><img src="leone.jpg" alt=""></a>
                    <h1>Leone di Aldo</h1>
                </div>
            </div> -->
            <div class="animal All Anfibi Africa" > 
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('ranamuta')"><img src="img/ranamuta.jpg" alt=""></a>
                    <h1>Rana muta della tanzania</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('giraffareticolata')"><img src="img/giraffareticolata.jpg" alt=""></a>
                    <h1>Giraffa reticolata</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('leoneafricano')"><img src="img/leoneafricano.jpg" alt=""></a>
                    <h1>Leone africano</h1>
                </div>
            </div>
            <div class="animal All Rettili Africa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('coccodrillodelnilo')"><img src="img/coccodrillodelnilo.jpg" alt=""></a>
                    <h1>Coccodrillo del nilo</h1>
                </div>
            </div>
            <div class="animal All Volatili Africa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('faraonacrestata')"><img src="img/faraonacrestata.jpg" alt=""></a>
                    <h1>Faraona crestata</h1>
                </div>
            </div>
            <div class="animal All Pesci Africa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('neolamprologus')"><img src="img/neolamprologus.jpg" alt=""></a>
                    <h1>Neolamprologus</h1>
                </div>
            </div>
            <div class="animal All Anfibi America">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('ranafreccia')"><img src="image_slider/anfibi.jpg" alt=""></a>
                    <h1>Rana freccia</h1>
                </div>
            </div>
            <div class="animal All Mammiferi America">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('coyote')"><img src="img/coyote.jpg" alt=""></a>
                    <h1>Coyote</h1>
                </div>
            </div>
            <div class="animal All Rettili America">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('iguanadaitubercoli')"><img src="image_slider/rettili.jpg" alt=""></a>
                    <h1>Iguana dai tubercoli</h1>
                </div>
            </div>
            <div class="animal All Volatili America">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('anatramuta')"><img src="img/anatramuta.jpg" alt=""></a>
                    <h1>Anantra muta</h1>
                </div>
            </div>
            <div class="animal All Pesci America">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('guppy')"><img src="img/guppy.jpg" alt=""></a>
                    <h1>Guppy</h1>
                </div>
            </div>
            <div class="animal All Anfibi Asia">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('atelopusvarius')"><img src="img/atelopusvarius.jpg" alt=""></a>
                    <h1>Rana pagliaccio</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Asia">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('tigremalese')"><img src="img/tigremalese.jpg" alt=""></a>
                    <h1>Tigre malese</h1>
                </div>
            </div>
            <div class="animal All Rettili Asia">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('gekotokai')"><img src="img/gekotokai.jpg" alt=""></a>
                    <h1>Geko tokai</h1>
                </div>
            </div>
            <div class="animal All Volatili Asia">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('aironecenerino')"><img src="img/aironecenerino.jpg" alt=""></a>
                    <h1>Airone cenerino</h1>
                </div>
            </div>
            <div class="animal All Pesci Asia">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('bettasplendens')"><img src="img/bettasplendens.jpg" alt=""></a>
                    <h1>Betta splendens</h1>
                </div>
            </div>
            <div class="animal All Anfibi Europa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('raganellapadana')"><img src="img/raganellapadana.jpg" alt=""></a>
                    <h1>Raganella padana</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Europa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('riccioeuropeo')"><img src="img/riccioeuropeo.jpg" alt=""></a>
                    <h1>Riccio europeo</h1>
                </div>
            </div>
            <div class="animal All Rettili Europa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('tartarugacaretta')"><img src="img/tartarugacaretta.jpg" alt=""></a>
                    <h1>Tartaruga caretta</h1>
                </div>
            </div>
            <div class="animal All Volatili Europa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('gruccionecomune')"><img src="image_slider/volatili.jpg" alt=""></a>
                    <h1>Gruccione comune</h1>
                </div>
            </div>
            <div class="animal All Pesci Europa">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('ippocampo')"><img src="img/ippocampo.jpg" alt=""></a>
                    <h1>Ippocampo</h1>
                </div>
            </div>
            <div class="animal All Anfibi Oceania">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('rospodellecanne')"><img src="img/rospodellecanne.jpg" alt=""></a>
                    <h1>Rospo delle canne</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Oceania">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('dingo')"><img src="img/dingo.jpg" alt=""></a>
                    <h1>Dingo</h1>
                </div>
            </div>
            <div class="animal All Rettili Oceania">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('clamidosauro')"><img src="img/clamidosauro.jpg" alt=""></a>
                    <h1>Clamidosauro</h1>
                </div>
            </div>
            <div class="animal All Volatili Oceania">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('emu')"><img src="img/emu.jpg" alt=""></a>
                    <h1>Emù</h1>
                </div>
            </div>
            <div class="animal All Pesci Oceania">
                <div class="animal-image-section">
                        <a href="javascript:showAnimalPopup('pescesanpietro')"><img src="img/pescesanpietro.jpg" alt=""></a>
                    <h1>Pesce San Pietro</h1>
                </div>
            </div>
        </div>

        <div id="popup-container">

        </div>

        <?php
            include 'footer.php'
        ?>

        <script src="https://code.jquery.com/jquery-latest.min.js?<?php echo rand();?>"></script>
        <script src="JS/filterSelection.js?<?php echo rand();?>"></script>

    </body>
</html>