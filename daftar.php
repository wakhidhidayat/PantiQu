<?php
require_once 'navbar.php';
function __autoload($class) {
    require_once "$class.php";
  }
$daftar = new CRUD();
?>

<nav class="site-navigation d-flex justify-content-end align-items-center">
    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
        <li ><a href="index.php">Beranda</a></li>
        <li><a href="news.php">Panti</a></li>
        <li><a href="upload.php">Upload</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav><!-- .site-navigation -->

<?php
require_once ('navbar2.php');
?>

    <div class="news-wrap">
        <div class="container">
            <div class="row">
            
                <div class="col-12 col-lg-8">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_pemilik" class="form-control" maxlength="50"/>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" maxlength="20"/>
                </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" maxlength="100">
                  </div>
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="number" name="no_hp" class="form-control" maxlength="15">
                  </div> 
                  <div class="form-group">
                    <label>No Rekening (Opsional)</label>
                    <input type="number" name="no_rekening" class="form-control"/>
                  </div>
                  <div class="form-group">
                  <button name="tambah" class="btn gradient-bg">Daftar</button>
                  </div>
            </form>

        <?php

        if(isset($_POST['tambah'])) {
        $nama_pemilik = $_POST['nama_pemilik'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $no_rekening = $_POST['no_rekening'];

        $data = [
            'nama_pemilik' => $nama_pemilik,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'no_hp' => $no_hp,
            'no_rekening' => $no_rekening
        ];

        $daftar->insert('pemilik_panti', $data);

        echo "<script> alert('Berhasil Mendaftar'); </script>";
        echo "<script> location='login/login.php'; </script>";
        
        }

 
        ?>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>