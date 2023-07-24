<?php
include_once('db_connect.php');
$url = rtrim($_SERVER["REQUEST_URI"],"/");
$url = urldecode($url);
$parameter = explode("/", $url);
$title = str_replace('_',' ',$parameter[3]);

$get_ppt_data = mysqli_query($connect, "SELECT p.*, s.status,t.type FROM property p, property_status s, property_type t WHERE p.type_id=t.id AND p.status_id=s.id AND p.title='$title'");
if($row = mysqli_fetch_array($get_ppt_data)) {
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | <?=$row['title']?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/style.css?v=2">
</head>
<body>

    <div class="topnav" id="myTopnav">
        <div class="container">
            <a href="home" class="logo"><img src="../dist/img/logo.png" width="50" height="50"></a>
            <div class="menu">
                <a href="../home" class="active">Home</a>
                <a href="../about">About Us</a>
                <a href="../properties">Properties</a>
                <a href="../contact">Contact</a>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>


    <section class="p-120" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="ppg_title"><?=$row['title']?></h3>
                    <p class="ppg_location"><img src="../dist/img/location-black.png" style="margin-bottom: 5px; opacity: .5;">
                        <?=$row['city']?>, <?=$row['state']?>
                </div>
                <div class="col-md-3">
                    <h3 class="ppg_price">&#8358; <?=number_format($row['price'],0,',')?></h3>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="details col-md-12 col-lg-8 col-12 mb-5">
                    <div class="mySlides">
                        <img src="../uploads/<?=$row['main_photo']?>" style="width:100%; object-fit: cover">
                    </div>
                    <?php
                    if(!empty($row['other_photos'])) {
                        $photos_array = explode("*",$row['other_photos']);
                        foreach($photos_array as $photo) {
                    ?>
                    <div class="mySlides">
                        <img src="../uploads/<?=$photo?>" style="width:100%; object-fit: cover;">
                    </div>
                    <?php
                    }
                    }
                    ?>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    <div class="d-none d-md-flex">
                        <div class="column">
                            <img class="demo cursor" src="../uploads/<?=$row['main_photo']?>"
                                style="width:100%; height: 100px; object-fit: cover;" onclick="currentSlide(1)"
                                alt="The Woods">
                        </div>
                        <?php
                        if(!empty($row['other_photos'])) {
                        for($i=0; $i<count($photos_array); $i++) {
                        ?>
                        <div class="column">
                            <img class="demo cursor" src="../uploads/<?=$photos_array[$i]?>"
                                style="width:100%;  height: 100px; object-fit: cover;"
                                onclick="currentSlide(<?=$i+2?>)">
                        </div>
                        <?php
                        }
                        }
                        ?>
                    </div>
                    <div class="features_details mt-5">
                        <p class="font-weight-bold" style="color:black;">Description</p>
                        <p class="text-color"><?=empty($row['description']) ? "Nil" : $row['description']?>
                        <p>
                            <hr>
                        <p class="font-weight-bold" style="color:black;">Address</p>
                        <div class="d-flex flex-wrap flex-column flex-md-row justify-content-between">
                            <p><span>Street:</span> <?=empty($row['street']) ? "Nil": $row['street']?></p>
                            <p><span>City:</span> <?=empty($row['city']) ? "Nil" : $row['city']?></p>
                            <p><span>State:</span> <?=empty($row['state']) ? "Nil" : $row['state']?></p>
                            <p><span>Country:</span> <?=empty($row['country']) ? "Nil" : $row['country']?></p>
                        </div>
                        <hr>
                        <p class="font-weight-bold" style="color:black;">Features</p>
                        <div class="d-flex flex-wrap flex-column flex-md-row justify-content-between">
                            <p><span>Rooms:</span> <?=empty($row['room']) ? "Nil" : $row['room']?></p>
                            <p><span>Bedrooms:</span> <?=empty($row['bedroom']) ? "Nil" : $row['bedroom']?></p>
                            <p><span>Bathrooms:</span> <?=empty($row['bathroom']) ?  "Nil" : $row['bathroom']?></p>
                            <p><span>Size:</span> <?=empty($row['size']) ? "Nil" : $row['size']." Sqm"?></p>
                        </div>
                    </div>
                </div>
                <div class="btns_form col-md-12 col-lg-3 col-12 ">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="#" class="btn btn-bl">Call us now</a>
                        <a href="#" class="btn btn-outline">Whatsapp</a>
                    </div>
                    <div class="contact_form_box" style="padding:30px; border: 1px solid #ced4da;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="font-weight-bold mb-0">MAKE A REQUEST</p>
                            <img src="../dist/img/handshake-o-blue.png" class="buy_sell_card_icon">
                        </div>
                        <form class="form-a contactForm" action="" method="post" role="form">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" name="fullname"
                                            class="form-control form-control-lg form-control-a" placeholder="Full Name"
                                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input name="email" type="email"
                                            class="form-control form-control-lg form-control-a"
                                            placeholder="Email address" data-rule="email"
                                            data-msg="Please enter a valid email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input name="number" type="number"
                                            class="form-control form-control-lg form-control-a"
                                            placeholder="Phone number" data-rule="phone"
                                            data-msg="Please enter a valid email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" cols="45" rows="3"
                                            data-rule="required" data-msg="Please write something for us"
                                            placeholder="Comment"></textarea>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-bl col-12">SEND REQUEST</button>
                                </div>
                            </div>
                            <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
                            <div id="errormessage"></div>
                        </form>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php
}
?> 
<section class="p-120" style="background-color: #eeeef966;">
<div class="container">
    <div class="row contact_us_info_form align-items-center">
        <div class="col-12 col-md-6">
            <h3 class="title">Get in touch</h3>
            <p>We are ready and available to answer any questions you may have.<br>
                Simply reach out via phone or email now.</p>
            <ul class="address_list_class pl-0 mt-4 mb-4">
                <li><a href="tel:+2348055824173"><img src="../dist/img/call_icon.png"
                            class="mr-3">+2348055824173</a></li>
                <li><a href="mailto:info@paphetenterprise.com"><img src="../dist/img/email_icon.png"
                            class="mr-3">info@paphetenterprise.com</a>
                </li>
            </ul>
            <p class="font-weight-bold mb-0 font_times">ADDRESS</p>
            <hr class="underline">
            <p>
                25, Ogunjobi Street, <br>Fadeyi, Off
                Ikorodu Road, <br>Lagos, Nigeria</p>
            <div>
                <p class="font-weight-bold font_times">Social Media</p>
                <a href="https://facebook.com/Business-Savvy-155953808412057/"><img
                        src="../dist/img/facebook-with-circle.png" class="mr-3"></a>
                <a href="https://instagram.com/savvypeterside/"><img src="../dist/img/instagram.png"
                        class="mr-3"></a>
            </div>

        </div>
        <div class="col-12 col-md-6 mt-4 mt-md-0">
            <div class="contact_form_box">
                <form class="form" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="fistname" class="form-control" placeholder="First Name"
                                    id="firstname" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name"
                                    id="lastname">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control"
                                    placeholder="Email address" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input name="number" type="number" class="form-control"
                                    placeholder="Phone number" id="phone">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" name="message"
                                    cols="45" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submit_form" class="btn btn-bl">Send Message</button>
                        </div>
                    </div>
                    <div id="sendmessage"></div>
                    <div id="errormessage"></div>
                </form>
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
                    <img src="../dist/img/logo.png" width="100">
                </div>
                <div class="">
                    <p class="font-weight-bold font_times">Paphet Business Enterprise</p>
                </div>
                <div class="">
                    <a href="https://facebook.com/Business-Savvy-155953808412057/"><img src="../dist/img/facebook-with-circle.png" class="mr-3"></a>
                    <a href="https://instagram.com/savvypeterside/"><img src="../dist/img/instagram.png"
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
</body>
<script src="../plugins/jquery/jquery.min.js"></script>
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

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    // var captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    // captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>

</html>