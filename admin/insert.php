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

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Panti</label>
                    <input type="text" name="nama_panti" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Nama Pimpinan</label>
                  <select name='pemilik_panti' class='form-control'>
                    <option>Pilih Nama Pimpinan</option>
                    <?php
                      $ambil = $insert->select('pemilik_panti');
                      foreach ($ambil as $pecah) {
                    ?>
                    <option value="<?php echo $pecah['id_pemilik']?>"><?php echo $pecah['nama_pemilik']?></option>  
                      <?php } ?>
                  </select>
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
                    <label>Status Panti</label>
                    <select name="status_panti" class="form-control">
                        <option>Pilih Status Panti</option>
                        <option value="pending">Pending</option>
                        <option value="verified">Verified</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <button name="tambah" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['tambah'])) {
                      $idPemilik = $_POST['pemilik_panti'];
                      $foto = $_FILES['foto']['name'];
                      $lokasi = $_FILES['foto']['tmp_name'];
                      move_uploaded_file($lokasi, "foto/".$foto);
                      $namaPanti = $_POST['nama_panti'];
                      $info = $_POST['info'];
                      $jmlPenghuni = $_POST['jml_penghuni'];
                      $alamat = $_POST['alamat'];
                      $status_panti = $_POST['status_panti'];

                      $data = [
                        'id_pemilik' => $idPemilik,
                        'nama_panti' => $namaPanti,
                        'info' => $info,
                        'jml_penghuni' => $jmlPenghuni,
                        'alamat' => $alamat,
                        'foto' => $foto,
                        'status_panti' => $status_panti
                      ];

                      $insert->insert('panti', $data);

                      echo "<script> alert('Data berhasil ditambahkan'); </script>";
                      echo "<script> location='index.php'; </script>";
                      
                    }

                    require_once 'footer.php';
                  ?>