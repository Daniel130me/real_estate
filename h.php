<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="styl.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body>
    <header id="l">

        <a href="home" class="logo"><img src="dist/img/logo.png" width="50" height="50"></a>
        <div class="menutoggle" onclick="toggleMenu();">.</div>
        <ul class="navigation">
            <li style="border-bottom: 1px solid black;"><a href="home" class="active">Home</a></li>
            <li><a href="property">Properties</a></li>
            <li><a href="contact">Contact Us</a></li>
            <li><a href="about">About Us</a></li>
            <li>
                <div class="row justify-content-center d-lg-none">
                    <a href="tel:+234805824173" class="btn btn-bl">Call us now</a>
                </div>
            </li>
        </ul>
    </header>
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
                    <button class="btn btn-bl text-center">OUR PROPERTIES</button>
                </div>
            </div>
        </div>
    </section>
    <section style="height:1000px">
    </section>
    <script type="text/javascript">
    window.addEventListener('scroll', function() {
        const header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0)
    });

    function toggleMenu() {
        const menutoggle = document.querySelector(".menutoggle");
        const nav = document.querySelector(".navigation");
        menutoggle.classList.toggle('active');
        nav.classList.toggle('active');
    }
    </script>
</body>