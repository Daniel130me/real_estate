<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Buy, sell and rent properties with ease</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/style.css?v=1">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <div class="container">
            <a href="home" class="logo"><img src="dist/img/logo.png" width="50" height="50"></a>
            <div class="menu">
                <a href="home">Home</a>
                <a href="about" class="active">About Us</a>
                <a href="properties">Properties</a>
                <a href="contact">Contact</a>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!--/ Nav End /-->



    <!--/ About Star /-->
    <section class="" style="margin-top: 150px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <img src="dist/img/slide-2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="image_tag">
                        <h3 class="">Estate Agency
                            <br> Since 2017
                        </h3>
                        <p class="text-white font-weight-bold">Comfort & Luxury</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ About End /-->
    <section class="p-120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-2">
                                <h3 class="text-color font_times">Our Mission
                                </h3>
                                <hr class="underline">
                            </div>
                            <p class="text-color">
                                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo,
                                lacinia eget
                            </p>
                            <div class="mt-5 mb-2">
                                <h3 class="text-color font_times">Our Vision
                                </h3>
                                <hr class="underline">
                            </div>
                            <p class="text-color">
                                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo,
                                lacinia eget
                            </p>
                            <div class="mt-5 mb-0">
                                <h3 class="text-color font_times">Our Core Values
                                </h3>
                                <hr class="underline">
                            </div>
                            <ul class="usp_class pl-0">
                                <li><img src="dist/img/check-circle-fill.png" class="mr-3">Honesty</li>
                                <li><img src="dist/img/check-circle-fill.png" class="mr-3">Commitment</li>
                                <li><img src="dist/img/check-circle-fill.png" class="mr-3">Loyalty
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="p-120 footer">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="text-center">
                        <div class="">
                            <img src="dist/img/logo.png" width="100">
                        </div>
                        <div class="">
                            <p class="font-weight-bold font_times">Paphet Business Enterprise</p>
                        </div>
                        <div class="">
                            <a href="https://facebook.com/Business-Savvy-155953808412057/"><img
                                    src="dist/img/facebook-with-circle.png" class="mr-3"></a>
                            <a href="https://instagram.com/savvypeterside/"><img src="dist/img/instagram.png"
                                    class="mr-3"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="text-center">
                        <h4 class="text-white">Get in touch</h4>
                        <div class="mt-2">
                            <p class="mb-1">Phone:
                                <a href="tel:+2348055824173" class="">+2348055824173</a>
                            </p>
                            <p class="mb-1">Email:
                                <a href="mailto:info@paphetenterprise.com" class="">info@paphetenterprise.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="text-center">
                        <div class="">
                            <h4 class="text-white">Menu</h4>
                        </div>
                        <div class="">
                            <ul class="menu_list pl-0">
                                <li><a href="home" class="footer_active">Home</a>
                                </li>
                                <li><a href="properties">Properties</a>
                                </li>
                                <li><a href="contact">Contact</a>
                                </li>
                                <li><a href="about">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <p class="">
                        &copy; Copyright
                        <span class=""><?=date("Y")?></span> <br>All Rights Reserved.
                    </p>
                </div>
                <div class="text-center">
                    <p>Designed by <a href="https://nieldigital.com/">nieldigital.com</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Libraries -->
    <script src="plugins/lib/aos/aos.js"></script>
    <script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector(".topnav");
        header.classList.toggle("sticky", window.scrollY > 0)
    });

    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive sticky";
        } else if (x.className === "topnav sticky") {
            x.className = "topnav sticky responsive";
        } else if (x.className === "topnav responsive") {
            x.className = "topnav";
        } else if (x.className === "topnav sticky responsive" || x.className === "topnav responsive sticky") {
            x.className = "topnav sticky";
        }
    }
    </script>

</body>

</html>