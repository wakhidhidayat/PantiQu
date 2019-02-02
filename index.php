<?php
require_once ('navbar.php');
?>

<nav class="site-navigation d-flex justify-content-end align-items-center ">
    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center nav navbar-nav navbar-right">
        <li class="current-menu-item"><a href="index.php">Beranda</a></li>
        <li><a href="news.php">Panti</a></li>
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

<?php
require_once ('navbar2.php');
?>

    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">
                <img src="images/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h2>Donasi Untuk Mereka</h2>
                                    
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p><br/><br/></p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <?php
                                        if(isset($_SESSION['pemilik_panti'])):
                                    ?>
                                    <a href="upload.php" class="btn gradient-bg mr-2">Upload Panti</a>
                                    <a href="news.php" class="btn gradient-bg mr-2">Donasi Sekarang</a>
                                    <?php
                                        else:
                                    ?>
                                    <a href="news.php" class="btn gradient-bg mr-2">Donasi Sekarang</a>
                                    <?php
                                        endif;
                                    ?>
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            
        </div><!-- .swiper-wrapper -->


        <!-- Add Arrows -->

    </div><!-- .hero-slider -->

    <div class="home-page-icon-boxes">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <figure class="d-flex justify-content-center">
                            <img src="images/hands-gray.png" alt="">
                            <img src="images/hands-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Jadilah Donatur</h3>
                        </header>

                        <div class="entry-content">
                            <p>Jadilah donatur untuk teman teman kita yang membutuhkan. </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <figure class="d-flex justify-content-center">
                            <img src="images/donation-gray.png" alt="">
                            <img src="images/donation-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Berbagi Dengan Mereka</h3>
                        </header>

                        <div class="entry-content">
                            <p>Dengan PantiQ, berdonasi jadi lebih mudah. </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <figure class="d-flex justify-content-center">
                            <img src="images/charity-gray.png" alt="">
                            <img src="images/charity-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Berbagi Kebahagiaan</h3>
                        </header>

                        <div class="entry-content">
                            <p>Mari bebagi kebahagian dengan teman kita yang membutuhkan bersama PantiQ</p>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <div class="home-page-welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">Selamat Datang Di PantiQ</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p>PantiQ adalah aplikasi yang membantu para donatur untuk menyalurkan donasinya kepada panti-panti yang membutuhkan. Dengan PantiQ, donatur akan mudah mengetahui panti-panti mana yang membutuhkan bantuan mereka sehingga memudahkan mereka dalam berdonasi. Disisi lain, PantiQ juga membantu pihak panti yang membutuhkan donasi.</p>
                        </div><!-- .entry-content -->
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                    <img src="images/welcome.jpg" alt="welcome">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    



        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                        </p>
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