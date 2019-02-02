<?php
session_start();
require '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="../css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../style.css">
	
	
</head>
<body>
<body class="single-page about-page">
<header class="site-header">
    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.php" rel="home"><img class="d-block"  width="210px" height="29px" src="../images/logo.jpg" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li ><a href="../index.php">Beranda</a></li>
                            <li><a href="../news.php">Panti</a></li>
                            <?php
                                if(isset($_SESSION['pemilik_panti'])):
                            ?>
                            <li><a href="../logout.php">Logout</a></li>
                            <?php
                                else:
                            ?>
                            <li  class="current-menu-item"><a href="login.php">Login</a></li>
                            <?php
                                endif;
                            ?>
                        </ul>
                    </nav><!-- .site-navigation -->
	
	

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-0 p-b-120">
				<form class="login100-form validate-form" method="post">
					
					

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="btn gradient-bg mr-1" name="masuk">
							<font color="#ff5a00">......................................</font>Login<font color="#ff5a00"> ...............................</font>
						</button>
					</div>

					<div class="login-more p-t-30">
							<span class="txt1">
								Belum punya akun? <a href="../daftar.php" class="txt2">Daftar</a>
							</span>


					</div>
				</form>
				 <?php
    if(isset($_POST['masuk']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $query = mysqli_query($conn, "SELECT * FROM pemilik_panti WHERE username='$username' AND password='$password'");
      $cek = mysqli_num_rows($query);
      
      if($cek == 1)
      {
        $akun = mysqli_fetch_array($query);
        $_SESSION['pemilik_panti'] = $akun;
        echo "<script>alert('Berhasil masuk');</script> ";
        echo "<script> location='../index.php'; </script>";
      }
      else
      {
        echo "<script>alert('Wrong username or password!');</script> ";
        echo "<script>location='login.php';</script>";
      }
    }
  ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>