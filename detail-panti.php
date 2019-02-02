<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PantiQ</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="single-page about-page">
<header class="site-header">
    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.html" rel="home"><img class="d-block" width="210px" height="29px" src="images/logo.jpg" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li ><a href="index.php">Beranda</a></li>
                            <li class="current-menu-item"><a href="news.php">Panti</a></li>
                            <?php
                                if(isset($_SESSION['pemilik_panti'])):
                            ?>
                            <li><a href="logout.php">Logout</a></li>
                            <?php
                                else:
                            ?>
                            <li><a href="login/login.php">Login</a></li>
                            <?php
                                endif;
                            ?>
                        </ul>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Detail Panti</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

                <?php
                function __autoload($class) {
                    require_once "$class.php";
                  }
                  $detail = new CRUD();
                  $id_panti = $_GET['id'];
                  $tampil = $detail->detail_panti($id_panti);
                  foreach($tampil as $pecah);
                ?>

    <div class="welcome-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo $pecah['nama_panti']?></h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            
                                <p><i class="fa fa-user"></i> <span> <?php echo $pecah['nama_pemilik']?></span></p>
                                <p><i class="fa fa-phone"></i> <span> <?php echo $pecah['no_hp']?></span></p>
                                <p><i class="fa fa-envelope"></i> <span> <?php echo $pecah['email']?></span></p>
                                <p><i class="fa fa-map-marker"></i> <span> <?php echo $pecah['alamat']?></span></p>
                            
                            
                        </div><!-- .entry-content -->

                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 order-1 order-lg-2">
                    <img src="admin/foto/<?php echo $pecah['foto']?>" alt="Image Panti">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <div class="short-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="short-content">
                        <h3 class="entry-title">Deskripsi</h3>

                        <p><?php echo $pecah['info']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>

</body>
</html>