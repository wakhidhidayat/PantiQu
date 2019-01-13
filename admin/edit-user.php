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

if(isset($_GET['id'])) {
    $uid = $_GET['id'];
    $edit = new CRUD();
    $result = $edit->selectOne('pemilik_panti', $uid, 'id_pemilik');
}
?>

           <form method="post">
                <input type="hidden" name="id_pemilik" value="<?php echo $result['id_pemilik']?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_pemilik" value="<?php echo $result['nama_pemilik']?>" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $result['username']?>" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $result['password']?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $result['email']?>" class="form-control"/>
                  </div>
                  <div class="form-group">
                  <label>No Hp</label>
                  <input type="number" name="no_hp" value="<?php echo $result['no_hp']?>" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>No Rekening</label>
                  <input type="number" name="no_rekening" value="<?php echo $result['no_rekening']?>" class="form-control"/>
                </div>
                  <div class="form-group">
                  <button name="edit" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['edit'])) {
                        $namaPemilik = $_POST['nama_pemilik'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $noHp = $_POST['no_hp'];
                        $noRekening = $_POST['no_rekening'];
  
                        $fields = [
                          'nama_pemilik' => $namaPemilik,
                          'username' => $username,
                          'password' => $password,
                          'email' => $email,
                          'no_hp' => $noHp,
                          'no_rekening' => $noRekening
                        ];

                      $id = $_POST['id_pemilik'];

                      $edit = new CRUD();
                      $edit->update('pemilik_panti', $fields, $id, 'id_pemilik');

                      echo "<script> alert('Data berhasil diubah'); </script>";
                      echo "<script> location='user.php'; </script>";
                      
                    }

                    require_once 'footer.php';
                  ?>