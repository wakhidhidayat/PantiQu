<?php
require_once 'navbar.php';
if(!isset($_SESSION['pemilik_panti'])) {
  echo"<script>alert('Anda Harus Login Dulu!');</script>";
  echo"<script>location: login/login.php</script>;";
  header("location: login/login.php");
  exit();
}
?>
<nav class="site-navigation d-flex justify-content-end align-items-center">
    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
        <li ><a href="index.php">Beranda</a></li>
        <li><a href="news.php">Panti</a></li>
        <li  class="current-menu-item"><a href="upload.php">Upload</a></li>
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
<?php
function __autoload($class) {
  require_once "$class.php";
}
$insert = new CRUD();
?>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Panti</label>
                    <input type="text" name="nama_panti" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label>Jumlah Penghuni</label>
                    <input type="number" name="jml_penghuni" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Foto Panti</label>
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                  </div> 
                  <div class="form-group">
                    <label>Info Lengkap</label>
                    <textarea name="info" rows="10" class="form-control">Isikan gambaran kondisi panti beserta kondisi keuangannya</textarea>
                  </div>
                  <div class="form-group">
                  <button name="tambah" class="btn gradient-bg">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['tambah'])) {
                      $idPemilik = $_SESSION['pemilik_panti']['id_pemilik'];
                      $foto = $_FILES['foto']['name'];
                      $lokasi = $_FILES['foto']['tmp_name'];
                      move_uploaded_file($lokasi, "admin/foto/".$foto);
                      $namaPanti = $_POST['nama_panti'];
                      $info = $_POST['info'];
                      $jmlPenghuni = $_POST['jml_penghuni'];
                      $alamat = $_POST['alamat'];

                      $data = [
                        'id_pemilik' => $idPemilik,
                        'nama_panti' => $namaPanti,
                        'info' => $info,
                        'jml_penghuni' => $jmlPenghuni,
                        'alamat' => $alamat,
                        'foto' => $foto
                      ];

                      $insert->insert('panti', $data);

                      echo "<script> alert('Data berhasil ditambahkan, menunggu persetujuan Admin'); </script>";
                      echo "<script> location='news.php'; </script>";
                      
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