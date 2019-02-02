<?php
function __autoload($class) {
  require_once "../$class.php";
}
$insert = new CRUD();
?>
        <h2>Tambah Event</h2> <br>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul Event</label>
                    <input type="text" name="judul" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                  </div> 
                  <div class="form-group">
                    <label>Info</label>
                    <input type="text" name="info" class="form-control">
                  </div>
                  <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                  </div>
                  <div class="form-group">
                  <button name="tambah" class="btn btn-success">Kirim Data</button>
                  </div>
            </form>
            <?php

                    if(isset($_POST['tambah'])) {
                      $gambar = $_FILES['gambar']['name'];
                      $lokasi = $_FILES['gambar']['tmp_name'];
                      move_uploaded_file($lokasi, "foto/".$gambar);
                      $judul = $_POST['judul'];
                      $info = $_POST['info'];
                      $alamat = $_POST['alamat'];
                      $tgl = $_POST['tgl'];

                      $data = [
                        'judul' => $judul,
                        'info' => $info,
                        'tgl' => $tgl,
                        'tempat' => $alamat,
                        'gambar' => $gambar
                      ];

                      $insert->insert('event', $data);

                      echo "<div class='alert alert-info'>Data Berhasil Ditambahkan</div>";
                      echo "<meta http-equiv='refresh' content='1;url=index.php?page=event'>";
                      
                    }
                  ?>