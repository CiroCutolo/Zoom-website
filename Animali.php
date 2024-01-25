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
            <div class="animal All Anfibi Africa">
                <div class="animal-image-section" id="show-details-ranamuta">
                <img src="https://cdn.sci.news/images/enlarge10/image_11627e-Hyperolius-ukaguruensis.jpg" alt="">
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
            <div class="animal All Anfibi Europa">
                <div class="animal-image-section" id="show-details-raganellapadana">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Hyla_perrini_Casalbeltrame.jpg/150px-Hyla_perrini_Casalbeltrame.jpg" alt="">
                <h1>Raganella padana</h1>
                </div>
            </div>
            <div class="animal All Mammiferi Europa">
                <div class="animal-image-section" id="show-details">
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
        </div>
        <script src="https://code.jquery.com/jquery-latest.min.js "></script>
        <script src="JS/filterSelection.js"></script>
        
    </body>
</html>