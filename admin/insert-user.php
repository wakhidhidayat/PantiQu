<?php
function __autoload($class) {
  require_once "../$class.php";
}
$insert = new CRUD();
?>
        <h2>Tambah User</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control"/>
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
                    <label>No Rekening (Opsional)</label>
                    <input type="number" name="no_rekening" class="form-control">
                  </div> 
                  <div class="form-group">
                  <button name="tambah" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['tambah'])) {
                      $nama = $_POST['nama'];
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $email = $_POST['email'];
                      $no_hp = $_POST['no_hp'];
                      $no_rekening = $_POST['no_rekening'];

                      $data = [
                        'nama_pemilik' => $nama,
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'no_hp' => $no_hp,
                        'no_rekening' => $no_rekening
                      ];

                      $insert->insert('pemilik_panti', $data);

                      echo "<div class='alert alert-info'>Data Berhasil Ditambahkan</div>";
                      echo "<meta http-equiv='refresh' content='1;url=index.php?page=user'>";
                      
                    }
                  ?>