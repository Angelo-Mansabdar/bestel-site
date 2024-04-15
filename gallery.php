<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Gallerij</title>
    <style>
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .top-sliders-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1000px;
            margin-bottom: 20px;
        }

        .bottom-slider-container {
            width: 100%;
            max-width: 1000px;
        }

        .slider {
            flex: 1;
            margin-right: 70px; 
            margin-left: 70px;
        }

        .mySlides {
            display: none;
            transition: opacity 0.7s ease;
        }

        .slideshow-container img {
            width: 100%;
            height: 50vh;
            margin-top: 6rem;
        }
    </style>
</head>

<?php
    session_start();
    include('header.php');
    include('connections.php');
?>

<body>
    <main>
        <div class="slideshow-container">
            <div class="top-sliders-container">
                <div class="slider" id="slider1">
                    <div class="mySlides">
                        <img src="assets/img/left-3.png" alt="Image 1">
                    </div>

                    <div class="mySlides">
                        <img src="assets/img/left2.jpg" alt="Image 2">
                    </div>
                </div>

                <div class="slider" id="slider2">
                    <div class="mySlides">
                        <img src="assets/img/gal1.png" alt="Image 3">
                    </div>

                    <div class="mySlides">
                        <img src="assets/img/gal2.png" alt="Image 4">
                    </div>
                </div>
            </div>

            <div class="bottom-slider-container">
                <div class="slider" id="slider3">
                    <div class="mySlides">
                        <img src="assets/img/wide-1.jpg" alt="Image 5">
                    </div>

                    <div class="mySlides">
                        <img src="assets/img/wide-2.jpg" alt="Image 6">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        var slideIndex1 = 0;
        var slideIndex2 = 0;
        var slideIndex3 = 0;

        showSlides("slider1");
        showSlides("slider2");
        showSlides("slider3");

        function showSlides(containerId) {
            var i;
            var slides = document.getElementById(containerId).getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            if (containerId === "slider1") {
                slideIndex1++;
                if (slideIndex1 > slides.length) { slideIndex1 = 1 }
                slides[slideIndex1 - 1].style.display = "block";
            } else if (containerId === "slider2") {
                slideIndex2++;
                if (slideIndex2 > slides.length) { slideIndex2 = 1 }
                slides[slideIndex2 - 1].style.display = "block";
            } else if (containerId === "slider3") {
                slideIndex3++;
                if (slideIndex3 > slides.length) { slideIndex3 = 1 }
                slides[slideIndex3 - 1].style.display = "block";
            }
            setTimeout(function () { showSlides(containerId) }, 4000); // Change image every 2 seconds
        }
    </script>

</body>

<?php
    include('footer.php');
?>

</html>
