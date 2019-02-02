<?php
function __autoload($class) {
  require_once "../$class.php";
}

if(isset($_GET['id'])) {
    $uid = $_GET['id'];
    $edit = new CRUD();
    $result = $edit->selectOne('event', $uid, 'id_event');
}
?>
        <h2>Edit Event</h2> <br>
           <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_event" value="<?php echo $result['id_event']?>">
                <div class="form-group">
                    <label>Judul Event</label>
                    <input type="text" name="judul" value="<?php echo $result['judul']?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $result['tempat']?>" class="form-control">
                  </div> 
                  <div class="form-group">
                    <label>Info</label>
                    <input type="text" name="info" value="<?php echo $result['info']?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tgl" value="<?php echo $result['tgl']?>" class="form-control">
                  </div> 
                  <div class="form-group">
                    <img src="foto/<?php echo $result['gambar']?>" width="200px"/>
                  </div>
                  <div class="form-group">
                    <label>Edit Gambar</label>
                    <input type="file" name="gambar" value="<?php echo $result['gambar']?>" class="form-control">
                  </div>
                  <div class="form-group">
                  <button name="edit" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['edit'])) {
                      $gambar = $_FILES['gambar']['name'];
                      $lokasi = $_FILES['gambar']['tmp_name'];
                      $judul = $_POST['judul'];
                      $info = $_POST['info'];
                      $tempat = $_POST['alamat'];
                      $tgl = $_POST['tgl'];

                      $array = [
                        'judul' => $judul,
                        'info' => $info,
                        'gambar' => $gambar,
                        'tempat' => $tempat,
                        'tgl' => $tgl
                      ];

                      $array2 = [
                        'judul' => $judul,
                        'info' => $info,
                        'tempat' => $tempat,
                        'tgl' => $tgl
                      ];

                      $id = $_POST['id_event'];

                      $edit = new CRUD();

                      if(!empty($lokasi)) { 
                        move_uploaded_file($lokasi, "foto/".$gambar);
                        $edit->update('event', $array, $id, 'id_event');
                      }
                      else {
                        $edit->update('event', $array2, $id, 'id_event');
                      }

                      echo "<script> alert('Data berhasil diubah'); </script>";
                      echo "<script> location='index.php?page=event'; </script>";
                      
                    }
                  ?>