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
<body class="single-page news-page">
    <header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                            <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/logo.jpg" width="210px" height="29px" alt="logo"></a>
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
                    <h1>Berita Panti</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="news-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                <?php
                    function __autoload($class) {
                      require_once "$class.php";
                    }

                    $berita = new CRUD();
                    $tampil = $berita->list_panti();
                    foreach($tampil as $pecah) {
                    ?>
                    <div class="news-content">



                        <a href="detail-panti.php?id=<?php echo $pecah['id_panti']?>"><img src="admin/foto/<?php echo $pecah['foto'];?>" alt="Image Panti" height="390px"></a>

                        <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                            <div class="header-elements">
                                <h2 class="entry-title"><?php echo $pecah['nama_panti'];?></h2>

                                <div class="post-metas d-flex flex-wrap align-items-center">
                                    <span class="post-author"><?php echo $pecah['alamat'];?></span>
                                </div>
                            </div>

                            <div class="donate-icon">
                                <img src="images/donate-icon.png" alt="">
                            </div>
                        </header>

                        <div class="entry-content">
                            <p><?php echo $pecah['info']?></p>
                        </div>

                        <footer class="entry-footer">
                            <a href="detail-panti.php?id=<?php echo $pecah['id_panti']?>" class="btn gradient-bg">Detail Info</a>
                        </footer>

                        
                    </div>
                    <?php } ?>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="sidebar">
                        <div class="search-widget">
                            <form class="flex flex-wrap align-items-center">
                                <input type="search" placeholder="Search...">
                                <button type="submit" class="flex justify-content-center align-items-center">GO</button>
                            </form><!-- .flex -->
                        </div><!-- .search-widget -->

                        <div class="upcoming-events">
                            <h2>Upcoming Events</h2>

                            <ul class="p-0">

                                <?php
                                    $events = new CRUD;
                                    $tampil = $events->select('event');
                                    foreach($tampil as $event) {
                                ?>

                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><img src="admin/foto/<?php echo $event['gambar']?>" alt="Image Event" width="120px" height="120px"></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><?php echo $event['judul']?></h3>

                                        <div class="post-metas d-flex flex-wrap align-items-center">
                                            <span class="posted-date"><?php echo $event['tgl']?></span>
                                            <span class="event-location"><?php echo $event['tempat']?></span>
                                        </div>

                                        <p><?php echo $event ['info']?></p>
                                    </div>
                                </li>

                                <?php } ?>


                            </ul>
                        </div><!-- .cat-links -->
                    </div><!-- .sidebar -->
                </div><!-- .col -->
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