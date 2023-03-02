<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <style>
            #img1{
                height: 50vh;
            }
            #moretatoo{
                background: rgba(255, 255, 255, 0.6) /* Green background with 30% opacity */
            }
            #moretatoo a:hover{
                background: rgba(255, 255, 255, 1.0) /* Green background with 30% opacity */
            }
        </style>
    </head>
<body>
<?php include "header.php"; ?>

    <!-- Slide Show -->
     <div class="w3-content w3-display-container">
        <center> <img class="img" id="img1" src="img/tatto1.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto2.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto3.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto4.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto5.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto6.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto7.png"> </center>
        <center> <img class="img" id="img1" src="img/tatto8.png"> </center> 
    </div>
    
    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(1)">&#10094;</div>
            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(6)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(7)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(8)"></span>
    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("img");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-white";
        }
    </script>
    <div class="container">
        <div class="item">
            <br> <br>
            <center><a id="moretatoo" href='tattos.php'>Ver mais tatuagens</a></center>
        </div>
    </div>
</body>

</html>
