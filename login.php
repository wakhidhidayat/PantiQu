<?php
session_start();
require_once ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 01 Nov 2013 23:56:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus >
        <input type="password" class="form-control" placeholder="Password" name="password" required >
        Belum punya akun? <a href="daftar.php">Daftar</a><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>
      <?php
      if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $conn->query("SELECT * FROM pemilik_panti WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($query);
        if($cek > 0) {
            $akun = $query->fetch_array();
            $_SESSION['pemilik_panti'] = $akun;
            echo "<script>alert('Berhasil masuk');</script> ";
        	echo "<script> location='index.php'; </script>";
        }
        else {
            echo "<script>alert('Wrong username or password!');</script> ";
            echo "<script>location='login.php';</script>";
        }
      }
      ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>

<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 01 Nov 2013 23:56:11 GMT -->
</html>
