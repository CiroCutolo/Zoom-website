<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Animali - Zoom</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/9491817803.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Css/Fonts.css">
        <link rel="stylesheet" href="Css/Animali.css">
        <link rel="stylesheet" href="header.css">
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
                <div class="animal-image-section">

                </div>
                <h1>pippo AAf</h1>
            </div>
            <div class="animal All Mammiferi Africa">
                <div class="animal-image-section">

                </div>
                <h1>pippo MAf</h1>
            </div>
            <div class="animal All Rettili Africa">
                <div class="animal-image-section">

                </div>
                <h1>pippo RAf</h1>
            </div>
            <div class="animal All Volatili Africa">
                <div class="animal-image-section">

                </div>
                <h1>pippo VAf</h1>
            </div>
            <div class="animal All Anfibi America">
                <div class="animal-image-section">

                </div>
                <h1>pippo AMm</h1>
            </div>
            <div class="animal All Mammiferi America">
                <div class="animal-image-section">

                </div>
                <h1>pippo MAm</h1>
            </div>
            <div class="animal All Rettili America">
                <div class="animal-image-section">

                </div>
                <h1>pippo RAm</h1>
            </div>
            <div class="animal All Volatili America">
                <div class="animal-image-section">

                </div>
                <h1>pippo VAm</h1>
            </div>
            <div class="animal All Anfibi Asia">
                <div class="animal-image-section">

                </div>
                <h1>pippo AAs</h1>
            </div>
            <div class="animal All Mammiferi Asia">
                <div class="animal-image-section">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Panthera_tigris_jacksoni_at_Parc_des_F%C3%A9lins_15.jpg/375px-Panthera_tigris_jacksoni_at_Parc_des_F%C3%A9lins_15.jpg" alt="">
                </div>
                <h1>Tigre malese</h1>
            </div>
            <div class="animal All Rettili Asia">
                <div class="animal-image-section">

                </div>
                <h1>pippo RAs</h1>
            </div>
            <div class="animal All Volatili Asia">
                <div class="animal-image-section">

                </div>
                <h1>pippo VAs</h1>
            </div>
            <div class="animal All Anfibi Europa">
                <div class="animal-image-section">

                </div>
                <h1>pippo AE</h1>
            </div>
            <div class="animal All Mammiferi Europa">
                <div class="animal-image-section">

                </div>
                <h1>pippo ME</h1>
            </div>
            <div class="animal All Rettili Europa">
                <div class="animal-image-section">

                </div>
                <h1>pippo RE</h1>
            </div>
            <div class="animal All Volatili Europa">
                <div class="animal-image-section">

                </div>
                <h1>pippo VE</h1>
            </div>
            <div class="animal All Anfibi Oceania">
                <div class="animal-image-section">

                </div>
                <h1>pippo AO</h1>
            </div>
            <div class="animal All Mammiferi Oceania">
                <div class="animal-image-section">

                </div>
                <h1>pippo MO</h1>
            </div>
            <div class="animal All Rettili Oceania">
                <div class="animal-image-section">

                </div>
                <h1>pippo RO</h1>
            </div>
            <div class="animal All Volatili Oceania">
                <div class="animal-image-section">

                </div>
                <h1>pippo VO</h1>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-latest.min.js "></script>
        <script src="JS/filterSelection.js"></script>
        
    </body>
</html>