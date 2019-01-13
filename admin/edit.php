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
    $result = $edit->selectOne('panti', $uid, 'id_panti');
}
?>

           <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_panti" value="<?php echo $result['id_panti']?>">
                <div class="form-group">
                    <label>Nama Panti</label>
                    <input type="text" name="nama_panti" value="<?php echo $result['nama_panti']?>" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label>Jumlah Penghuni</label>
                    <input type="number" name="jml_penghuni" value="<?php echo $result['jml_penghuni']?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <img src="foto/<?php echo $result['foto']?>" width="200px"/>
                  </div>
                  <div class="form-group">
                    <label>Edit Foto</label>
                    <input type="file" name="foto" value="<?php echo $result['foto']?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $result['alamat']?>" class="form-control">
                  </div> 
                  <div class="form-group">
                    <label>Info Lengkap</label>
                    <textarea name="info" rows="10" class="form-control"><?php echo $result['info']?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status_panti" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="verified">Verified</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <button name="edit" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['edit'])) {
                      $foto = $_FILES['foto']['name'];
                      $lokasi = $_FILES['foto']['tmp_name'];
                      $namaPanti = $_POST['nama_panti'];
                      $info = $_POST['info'];
                      $jmlPenghuni = $_POST['jml_penghuni'];
                      $alamat = $_POST['alamat'];
                      $status = $_POST['status_panti'];

                      $array = [
                        'nama_panti' => $namaPanti,
                        'info' => $info,
                        'jml_penghuni' => $jmlPenghuni,
                        'alamat' => $alamat,
                        'foto' => $foto,
                        'status_panti' => $status
                      ];

                      $array2 = [
                        'nama_panti' => $namaPanti,
                        'info' => $info,
                        'jml_penghuni' => $jmlPenghuni,
                        'alamat' => $alamat,
                        'status_panti' => $status
                      ];

                      $id = $_POST['id_panti'];

                      $edit = new CRUD();

                      if(!empty($lokasi)) { 
                        move_uploaded_file($lokasi, "foto/".$foto);
                        $edit->update('panti', $array, $id, 'id_panti');
                      }
                      else {
                        $edit->update('panti', $array2, $id, 'id_panti');
                      }

                      echo "<script> alert('Data berhasil diubah'); </script>";
                      echo "<script> location='index.php'; </script>";
                      
                    }

                    require_once 'footer.php';
                  ?>