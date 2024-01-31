<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <title>Animali - Zoom</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/9491817803.js" crossorigin="anonymous"></script>
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
                <div class="animal-image-section" id="show-details-ranamuta">
                    <form id="animal-form" action="" method="POST">
                        <button id="show-details-ranamuta" value="ranamuta" name="animal"><a><img src="https://cdn.sci.news/images/enlarge10/image_11627e-Hyperolius-ukaguruensis.jpg" alt=""></a></button>
                    </form>
                    <h1>Rana muta della tanzania</h1>
                </div>

            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section" id="show-details-giraffa">
                <img src="https://www.naturephoto-cz.com/photos/andera/giraffa-reticolata-32x_zir5.jpg" alt="">
                <h1>Giraffa reticolata</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section" id="show-details-leone">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Lion_%28Panthera_leo%29_%2816757912564%29_%28Zoomed%29.jpg" alt="">
                <h1>Leone africano</h1>
                </div>
            </div>
            <div class="animal All Rettili Africa">
                <div class="animal-image-section" id="show-details-coccodrillodelnilo">
                <img src="https://www.djerbaexplore.com/wp-content/uploads/2022/01/DSC_9872.jpg" alt="">
                <h1>Coccodrillo del nilo</h1>
                </div>
            </div>
            <div class="animal All Volatili Africa">
                <div class="animal-image-section" id="show-details-faraonacrestata">
                <img src="https://picturebirdai.com/wiki-image/1080/153974637733085220.jpeg" alt="">
                <h1>Faraona crestata</h1>
                </div>
            </div>
            <div class="animal All Pesci Africa">
                <div class="animal-image-section" id="show-details-neolamprologus">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Neolamprologus_tretocephalus.jpg/345px-Neolamprologus_tretocephalus.jpg" alt="">
                <h1>Neolamprologus</h1>
                </div>
            </div>
            <div class="animal All Anfibi America">
                <div class="animal-image-section" id="show-details-ranafreccia">
                <img src="image_slider/anfibi.jpg" alt="">
                <h1>Rana freccia</h1>
                </div>
            </div>
            <div class="animal All Mammiferi America">
                <div class="animal-image-section" id="show-details-coyote">
                <img src="https://cdn.britannica.com/45/125545-050-B705597E/Coyote.jpg" alt="">
                <h1>Coyote</h1>
                </div>
            </div>
            <div class="animal All Rettili America">
                <div class="animal-image-section" id="show-details-iguana">
                <img src="image_slider/rettili.jpg" alt="">
                <h1>Iguana dai tubercoli</h1>
                </div>
            </div>
            <div class="animal All Volatili America">
                <div class="animal-image-section" id="show-details-anatramuta">
                <img src="https://s3.animalia.bio/animals/photos/full/1.25x1/KdFYpl5NDyCN1Bj9OsxB.webp" alt="">
                <h1>Anantra muta</h1>
                </div>
            </div>
            <div class="animal All Pesci America">
                <div class="animal-image-section" id="show-details-guppy">
                <img src="https://www.zooplus.it/magazine/wp-content/uploads/2023/09/guppy.jpeg" alt="">
                <h1>Guppy</h1>
                </div>
            </div>
            <div class="animal All Anfibi Asia">
                <div class="animal-image-section" id="show-details-atelopusvarius">
                <img src="https://s3.animalia.bio/animals/photos/full/original/atelopus-varius.webp" alt="">
                <h1>Atelopus varius</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Asia">
                <div class="animal-image-section" id="show-details-tigre">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Panthera_tigris_jacksoni_at_Parc_des_F%C3%A9lins_15.jpg/375px-Panthera_tigris_jacksoni_at_Parc_des_F%C3%A9lins_15.jpg" alt="">
                <h1>Tigre malese</h1>
                </div>
            </div>
            <div class="animal All Rettili Asia">
                <div class="animal-image-section" id="show-details-gekotokai">
                <img src="https://s3.animalia.bio/animals/photos/full/original/Iyu7bRsJKFSL7y4peqO1.webp" alt="">
                <h1>Geko tokai</h1>
                </div>
            </div>
            <div class="animal All Volatili Asia">
                <div class="animal-image-section" id="show-details-aironecenerino">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Airone_cinerino_Tenuta_S._Rossore_%28Pisa%2C_Italy%29.jpg/1280px-Airone_cinerino_Tenuta_S._Rossore_%28Pisa%2C_Italy%29.jpg" alt="">
                <h1>Airone cenerino</h1>
                </div>
            </div>
            <div class="animal All Pesci Asia">
                <div class="animal-image-section" id="show-details-bettasplendens">
                <img src="https://www.viridea.it/wp-content/uploads/2009/09/Pesce-combattente-Betta-splendens.jpg" alt="">
                <h1>Betta splendens</h1>
                </div>
            </div>
            <div class="animal All Anfibi Europa">
                <div class="animal-image-section" id="show-details-raganellapadana">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Hyla_perrini_Casalbeltrame.jpg/150px-Hyla_perrini_Casalbeltrame.jpg" alt="">
                <h1>Raganella padana</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Europa">
                <div class="animal-image-section" id="show-details-riccioeuropeo">
                <img src="https://www.ecomuseomartesana.it/wp-content/uploads/2020/10/PPPAFA0141-image0.jpg" alt="">
                <h1>Riccio europeo</h1>
                </div>
            </div>
            <div class="animal All Rettili Europa">
                <div class="animal-image-section" id="show-details-tartarugacaretta">
                <img src="https://s3.animalia.bio/animals/photos/full/original/2560px-carett-zak1.webp" alt="">
                <h1>Tartaruga caretta</h1>
                </div>
            </div>
            <div class="animal All Volatili Europa">
                <div class="animal-image-section" id="show-details-merope">
                <img src="image_slider/volatili.jpg" alt="">
                <h1>Gruccione comune</h1>
                </div>
            </div>
            <div class="animal All Pesci Europa">
                <div class="animal-image-section" id="show-details-ippocampo">
                <img src="https://media.istockphoto.com/id/115883723/photo/sea-horse.jpg?s=612x612&w=0&k=20&c=Qy9aiIYrEnaR6M5jVvHeNgcS77VUW8fTBOxBAnqtoyQ=" alt="">
                <h1>Ippocampo</h1>
                </div>
            </div>
            <div class="animal All Anfibi Oceania">
                <div class="animal-image-section" id="show-details-rospodellecanne">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Canetoadfemale.jpg/345px-Canetoadfemale.jpg" alt="">
                <h1>Rospo delle canne</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Oceania">
                <div class="animal-image-section" id="show-details-dingo">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Taronga-3.jpg/330px-Taronga-3.jpg" alt="">
                <h1>Dingo</h1>
                </div>
            </div>
            <div class="animal All Rettili Oceania">
                <div class="animal-image-section" id="show-details-clamidosauro">
                <img src="https://s3.animalia.bio/animals/photos/full/original/H7JP61A5wGfCoQX8VqHX.webp" alt="">
                <h1>Clamidosauro</h1>
                </div>
            </div>
            <div class="animal All Volatili Oceania">
                <div class="animal-image-section" id="show-details-emu">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Emu_1_-_Tidbinbilla.jpg/330px-Emu_1_-_Tidbinbilla.jpg" alt="">
                <h1>Emù</h1>
                </div>
            </div>
            <div class="animal All Pesci Oceania">
                <div class="animal-image-section" id="show-details-pescesanpietro">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Zeus.faber_2.jpg/330px-Zeus.faber_2.jpg" alt="">
                <h1>Pesce San Pietro</h1>
                </div>
            </div>
        </div>

        <?php
            $animal = $_POST["animal"];

            switch($animal){
                case "ranamuta":
                    require('AnimalsPopupsMods/ranamuta.php');
                break; 
                case "giraffareticolata":
                    require('AnimalsPopupsMods/giraffareticolata.php');
                break; 
                case "leoneafricano":
                    require('AnimalsPopupsMods/leoneafricano.php');
                break; 
                case "coccodrillodelnilo":
                    require('AnimalsPopupsMods/coccodrillodelnilo.php');
                break; 
                case "faraonacrestata":
                    require('AnimalsPopupsMods/faraonacrestata.php');
                break; 
                case "neolamprologus":
                    require('AnimalsPopupsMods/neolamprologus.php');
                break; 
                case "ranafreccia":
                    require('AnimalsPopupsMods/ranafreccia.php');
                break; 
                case "coyote":
                    require('AnimalsPopupsMods/coyote.php');
                break; 
                case "iguanadaitubercoli":
                    require('AnimalsPopupsMods/iguanadaitubercoli.php');
                break; 
                case "anatramuta":
                    require('AnimalsPopupsMods/anatramuta.php');
                break; 
                case "guppy":
                    require('AnimalsPopupsMods/guppy.php');
                break; 
                case "atelopusvarius":
                    require('AnimalsPopupsMods/atelopusvarius.php');
                break; 
                case "tigremalese":
                    require('AnimalsPopupsMods/tigremalese.php');
                break; 
                case "gekotokai":
                    require('AnimalsPopupsMods/gekotokai.php');
                break; 
                case "aironecenerino":
                    require('AnimalsPopupsMods/aironecenerino.php');
                break; 
                case "bettasplendens":
                    require('AnimalsPopupsMods/bettasplendens.php');
                break; 
                case "raganellapadana":
                    require('AnimalsPopupsMods/raganellapadana.php');
                break; 
                case "riccioeuropeo":
                    require('AnimalsPopupsMods/riccioeuropeo.php');
                break; 
                case "tartarugacaretta":
                    require('AnimalsPopupsMods/tartarugacaretta.php');
                break; 
                case "gruccionecomune":
                    require('AnimalsPopupsMods/gruccionecomune.php');
                break; 
                case "ippocampo":
                    require('AnimalsPopupsMods/ippocampo.php');
                break; 
                case "rospodellecanne":
                    require('AnimalsPopupsMods/rospodellecanne.php');
                break; 
                case "dingo":
                    require('AnimalsPopupsMods/dingo.php');
                break; 
                case "clamidosauro":
                    require('AnimalsPopupsMods/clamidosauro.php');
                break; 
                case "emu":
                    require('AnimalsPopupsMods/emu.php');
                break; 
                case "pescesanpietro":
                    require('AnimalsPopupsMods/pescesanpietro.php');
                break; 
            }
        ?> 

        <div class="animal-details-popup" id="animal-details-popup">
            <div class="popup-text-container">
                <h1><?php echo $animaldetails['animal.title'] ?></h1>
                <p><?php echo $animaldetails['animal.description'] ?></p>
                <button id="close-button">Chiudi la scheda</button>
            </div>    
        </div>

        <script src="https://code.jquery.com/jquery-latest.min.js "></script>
        <script src="JS/filterSelection.js?<?php echo rand();?>"></script>
        
    </body>
</html>