<?php
include_once("db_connect.php")
?>
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
    <link rel="stylesheet" href="dist/css/style.css?v=2">
    <link rel="stylesheet" href="plugins/lib/aos/aos.min.css">

</head>

<body>

    <div class="topnav" id="myTopnav">
        <div class="container">
            <a href="home" class="logo"><img src="dist/img/logo.png" width="50" height="50"></a>
            <div class="menu">
                <a href="home" class="active">Home</a>
                <a href="about">About Us</a>
                <a href="properties">Properties</a>
                <a href="contact">Contact</a>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <section class="heading-section">
        <div class="banner_image">
            <div class="overlay"></div>
            <div class="container heading text-center">
                <div class="d-flex flex-column align-items-center">
                    <h1 class="h1_heading">Find Your Dream Home</h1>
                    <h2 class="h2_heading">We are recognized for exceeding client expectations and delivering great
                        results
                        through dedication, ease of process, and extraordinary services to our worldwide clients.</h2>
                </div>
                <hr class="head_line">
                <div>
                    <a href="properties" class="btn btn-bl text-center">OUR PROPERTIES</a>
                </div>
            </div>
        </div>
    </section>
    <section class="p-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-5 col-12">
                    <h3 class="title">Top Real Estate Agency</h3>
                    <p class="text-color mb-4 mt-4 short-about-text">
                        With many years of experience marketing prestigious properties, we are the top luxury producer
                        in the sector. We are one of the top agents in Nigeria as a result of our unmatched performance,
                        knowledge, and commitment.
                    </p>
                    <div>
                        <button class="btn btn-bl">MORE ABOUT US</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-12 pt-5 pt-md-0" style="position: relative;">
                    <img src="dist/img/decor_nice-1-835x467.jpg" data-aos="fade-left" data-aos-duration="1000" class="overlap_img1" alt="">
                    <img src="dist/img/interior35-525x328.jpg"  data-aos="fade-up" data-aos-duration="2000"  class="overlap_img2" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="p-120" style="padding-top: 80px;  background-color:#eeeef966;">
        <div class="container">
            <div class="row justify-content-between align-items-center ml-3 mr-3 mb-3 mb-xl-0">
                <h3 class="title col-12 col-xl-6 text-center text-xl-left">Latest Properties</h3>
                <div class="col-12 col-xl-6 text-center text-xl-right">
                    <a href="properties" class="btn btn-bl d-none d-sm-inline-block">MORE PROPERTIES</a>
                </div>
            </div>
            <div class="row justify-content-center align-items-start">
                <?php
        $sql = "SELECT p.*,t.type,s.status FROM property p, property_type t, property_status s WHERE p.type_id=t.id AND p.status_id=s.id ORDER BY date_created DESC LIMIT 8";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result)<1) {
    echo "NO Result";
}
while($rows = mysqli_fetch_array($result)) {
?>
                <!-- <div> -->
                <div class="col-lg-4 mx-sm-3 my-sm-5 mx-3 my-4 mb-4 col-12 ppt_card" data-aos="fade-up" data-aos-duration="1500">
                    <a href="property/<?=$rows['title']?>" class="ppt_link">
                        <div style="position:relative; width: 90%; top: -20px; left: 5%; box-shadow: 0 3px 12px rgba(0,0,0,.16); border-radius: 10px; margin-bottom: -20px;">
                            <div class="ppt_label" style="display: flex; position:absolute; right:10px; top:10px;">
                                <p class="card_ppt_status">
                                    <?=$rows['type']?>
                                </p>
                                <p class="card_ppt_type"><?=$rows['status']?></p>
                            </div>

                            <img src="uploads/<?=$rows['main_photo']?>" class="card_ppt_image">
                            
                        </div>
                        <div class="p-3">
                            <p class="card_ppt_title"><?=$rows['title']?></p>
                            
                            <p class="card_ppt_desc"><?=$rows['description']?></p>
                            <hr>
                            <!-- <p class="card_ppt_features">Rooms: <span><=$rows['room']?></span> Toilets:
                                <span><=$rows['toilet']?></span> Size: <span><=$rows['size']?> Sqm</span>
                            </p> -->
                            <div class="d-flex justify-content-between">
                            <p class="card_ppt_price">&#8358; <?=number_format($rows['price'],0,',')?></p>
                            <p class="card_ppt_location"><img src="dist/img/location-black.png" style="margin-bottom: 5px; opacity: .5;">
                                <?=$rows['city']?>, <?=$rows['state']?>
                            </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- </div> -->
                

                <?php
    
}
?>
            </div>
            <!-- <div class="d-flex justify-content-center align-items-center mt-3">
            <a href="properties">More properties</a>
</div> -->
        </div>
    </section>
    <section class="p-120">
        <div class="container">
            <div class="row justify-content-center sell_buy_flex_row">
                <div class="col-md-12 col-lg-5 col-12">
                    <h3 class="title">We help our clients sell,
                        buy or rent properties</h3>
                    <p class="text-color mb-4 mt-4 short-about-text">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum.
                    </p>
                    <ul class="usp_class pl-0">
                        <li><img src="dist/img/check-circle-fill.png" class="mr-3">24/7 support available</li>
                        <li><img src="dist/img/check-circle-fill.png" class="mr-3">Free submission on our website</li>
                        <li><img src="dist/img/check-circle-fill.png" class="mr-3">Expert legal support from us</li>
                        <li><img src="dist/img/check-circle-fill.png" class="mr-3">Home loans assistance
                        </li>
                    </ul>
                    <div>
                        <button class="btn btn-bl">CONTACT US</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12 pt-5 mt-md-4" style="position: relative;">
                    <div class="background_for_cards"></div>
                    <div class="buy_sell_card mb-5" style="position: relative;" data-aos="fade-up" data-aos-duration="1000">
                        <p><img src="dist/img/home.png" class="buy_sell_card_icon"></p>
                        <p class="font-weight-bold">Sell a Property</p>
                        <p>We do a free evaluation to ensure you want to start selling. Get started now</p>
                        <button class="btn btn-bl w-100">Call us now</button>
                    </div>
                    <div class="buy_sell_card position" data-aos="fade-left" data-aos-duration="1000">
                        <p><img src="dist/img/handshake-o.png" class="buy_sell_card_icon bgdanger"></p>
                        <p class="font-weight-bold">Buy a Property</p>
                        <p>We have a host of homes, hotels, and lands available for purchase</p>
                        <a href="property" class="btn btn-bl w-100">Our properties</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-120">
        <div class="container">
            <h3 class="title text-center">Testimonials</h3>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-11 col-md-6 buy_sell_card testimonial m-4">
                    <p>It has been a great plaesure working with paphet neterprises, they did not only help me find a suitable apartment, the went further to make it a home worth living.</p>
                    <p class="font-weight-bold mb-0">Daniel Kosoko</p>
                    <p class="mb-0">Happy Buyer</p>
                </div>
                <div class="col-lg-3 col-11 col-md-6 buy_sell_card testimonial m-4">
                    <p>I stumbled on paphet enterprise accidently, I decided to give them a trial, and since then, I have been their No. 1 customer. I have no regret working with them, they take time to listen and find a suitable property.</p>
                    <p class="font-weight-bold mb-0">Daniel Kosoko</p>
                    <p class="mb-0">Happy Buyer</p>
                </div>
            </div>
        </div>
    </section>
    <section class="p-120" style="background-color: #eeeef966;">
        <div class="container">
            <div class="row contact_us_info_form align-items-center">
                <div class="col-12 col-md-6">
                    <h3 class="title">Get in touch</h3>
                    <p>We are ready and available to answer any questions you may have.<br>
                        Simply reach out via phone or email now.</p>
                    <ul class="address_list_class pl-0 mt-4 mb-4">
                        <li><a href="tel:+2348055824173"><img src="dist/img/call_icon.png"
                                    class="mr-3">+2348055824173</a></li>
                        <li><a href="mailto:info@paphetenterprise.com"><img src="dist/img/email_icon.png"
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
                                src="dist/img/facebook-with-circle.png" class="mr-3"></a>
                        <a href="https://instagram.com/savvypeterside/"><img src="dist/img/instagram.png"
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/lib/aos/aos.js"></script>
    <script type="text/javascript">
    AOS.init();
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