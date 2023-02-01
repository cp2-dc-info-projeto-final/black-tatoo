<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/indexx.css">
        <style>
            .img {
                display: none
            }
            
            .w3-left,
            .w3-right,
            .w3-badge {
                cursor: pointer;
                background-color: black;
            }
            
            .w3-badge {
                height: 13px;
                width: 13px;
                padding: 0;
            }
        </style>
    </head>
<body>
<?php include "header.php"; ?>

    <!-- Slide Show -->
    <div class="w3-content w3-display-container" style="max-width:70%">
        <center> <img class="img" src="img/slide1.jpg" style="width:70%"> </center>
        <center> <img class="img" src="img/slide2.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/slide3.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem1.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem2.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem3.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem4.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem5.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem6.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem7.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem8.jpg" style="width:50%"> </center>
        <center> <img class="img" src="img/imagem9.jpg" style="width:50%"> </center>
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
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(9)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(10)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(11)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(12)"></span>
        </div>
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
</body>

</html>
