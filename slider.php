<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Css/slider.css">
    <title>Slider</title>
  </head>
  <body>
    <div class="slidershow-container">
        <div class="mySlides fade">
            <p class="text1-anfibi">Vieni a trovarci!</p>
            <p class="text2-anfibi">Esplora il nostro parco</p>
            <p><a href="acquistobiglietti.php"><button class="button-anfibi">SCOPRI COME</button></a></p>
            <p class="icon-area">
              <a href="Animali.php"><img class="icon" src="image_slider\icona-anfibi.png"></a>
              <span class="text-area">Anfibi</span>
            </p>
            <img src="image_slider\anfibi.jpg" width="100%">
        </div>
        <div class="mySlides fade">
          <p class="text1-mammiferi">Consulta la nostra sezione animali</p>
          <p class="text2-mammiferi">Riconoscili tutti!</p>
          <p><a href="Animali.php"><button class="button-mammiferi">LEGGI ORA</button></a></p>
          <p class="icon-area">
            <a href="#"><img class="icon" src="image_slider\icona-mammiferi.png"></a>
            <span class="text-area-mammiferi">Mammiferi</span>
          </p>
            <img src="image_slider/mammiferi.jpg" width="100%">
        </div>
        <div class="mySlides fade">
          <p class="icon-area">
            <a href="Animali.php"><img class="icon" src="image_slider\icona-rettili.png"></a>
            <span class="text-area">Rettili</span>
          </p>
            <img src="image_slider/rettili.jpg" width="100%">
        </div>
        <div class="mySlides fade">
          <p class="icon-area">
            <a href="Animali.php"><img class="icon" src="image_slider\icona-volatili.png"></a>
            <span class="text-area">Volatili</span>
          </p>
            <img src="image_slider/volatili.jpg" width="100%">
        </div>
        <div class="mySlides fade">
          <p class="icon-area">
            <a href="Animali.php"><img class="icon" src="image_slider\icona-pesci.png"></a>
            <span class="text-area">Pesci</span>
          </p>
            <img src="image_slider/pesci.jpg" width="100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <br>

    <div class="dot_image">
        <span class="dot act" onclick="currentSlides(0)"></span>
        <span class="dot" onclick="currentSlides(1)"></span>
        <span class="dot" onclick="currentSlides(2)"></span>
        <span class="dot" onclick="currentSlides(3)"></span>
        <span class="dot" onclick="currentSlides(4)"></span>
    </div>
    <br>
    <script>
        var slideIndex = 0;
        const interval = 5000;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        slides[slideIndex].style.display = "block";

        var timer = setInterval(showSlides, interval);

        function plusSlides(n){
            showSlides(slideIndex + n);
        }

        function currentSlides(n){
            showSlides(slideIndex = n);
        }

        function showSlides(n){
            var i;
            for(i = 0; i < slides.length ; i++){
                slides[i].style.display = "none";
            }
            for(i = 0; i < dots.length; i++){
                dots[i].className = dots[i].className.replace(" act","");
            }

            slideIndex = (slideIndex + 1 ) % slides.length;
            if (n != undefined) {
              clearInterval(timer);
              timer = setInterval(showSlides, interval);
              slideIndex = n;
              if(n >= slides.length){
                slideIndex = 0;
              }
              if(n < 0){
                slideIndex = slides.length -1;
              }
            }

            slides[slideIndex].style.display = "block";
            dots[slideIndex].className += " act";

        }

    </script>


  </body>
</html>
