<?php
session_start();
require_once 'navbar.php';
if(!isset($_SESSION['admin'])) {
  echo"<script>location: login.php</script>;";
  header("location: login.php");
  exit();
}
function __autoload($class) {
  require_once "../$class.php";
}
$insert = new CRUD();
?>

      
            <form method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_pemilik" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="number" name="no_hp" class="form-control">
                  </div> 
                  <div class="form-group">
                    <label>No Rekening</label>
                    <input type="number" name="no_rekening" class="form-control">
                  </div>
                  <div class="form-group">
                  <button name="tambah" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['tambah'])) {
                      $namaPemilik = $_POST['nama_pemilik'];
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $email = $_POST['email'];
                      $noHp = $_POST['no_hp'];
                      $noRekening = $_POST['no_rekening'];

                      $data = [
                        'nama_pemilik' => $namaPemilik,
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'no_hp' => $noHp,
                        'no_rekening' => $noRekening
                      ];

                     $simpan = $insert->insert('pemilik_panti', $data);
                        
                            echo "<script> alert('Data berhasil ditambahkan'); </script>";
                            echo "<script> location='user.php'; </script>";
                        
                      
                    }

                    require_once 'footer.php';
                  ?>