<?php
session_start();
require_once 'navbar.php';

if(!isset($_SESSION['admin'])) {
  echo"<script>location: login.php</script>;";
  header("location: login.php");
  exit();
}
?>
    <!-- Main component for a primary marketing message or call to action -->
      <table class="table">
        <tr>
          <td>No</td>
          <td>Nama Panti</td>
          <td>Alamat</td>
          <td>Info</td>
          <td>Jumlah Penghuni</td>
          <td>Nama Pimpinan</td>
          <td>No HP</td>
          <td>Foto Kondisi</td>
          <td>Status</td>
          <td colspan='2'><center>Aksi</center></td>
          
          
        </tr>
      
      <?php
      function __autoload($class) {
        require_once "../$class.php";
      }
      $tampil = new CRUD();
      $panti = $tampil->select_panti();
      $no = 1;
      foreach ($panti as $pecah) {
      ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $pecah['nama_panti']; ?></td>
            <td><?php echo $pecah['alamat']?></td>
            <td><?php echo $pecah['info']; ?></td>
            <td><?php echo $pecah['jml_penghuni'] ?></td>
            <td><?php echo $pecah['nama_pemilik']?></td>
            <td><?php echo $pecah['no_hp']?></td>
            <td><img src="foto/<?php echo $pecah['foto']?>" width="100px"/></td>
            <td><?php echo $pecah['status_panti']?></td>
            <td><a href='edit.php?id=<?php echo $pecah['id_panti']?>' class='btn btn-primary'>Edit</a></td>
            <td><a href='index.php?del=<?php echo $pecah['id_panti']?>' class='btn btn-danger' onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a></td>
            
        </tr>
    <?php
      }
    ?>
    </table>

    <?php
      if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $foto = $pecah['foto'];
        if(file_exists("foto/$foto"))
        {
          unlink("foto/$foto");
        }
        $delete = new CRUD();
        $delete->destroy('panti', $id, 'id_panti');
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
      }
    ?>  
    <a href='insert.php' class='btn btn-success' name='tambah'>Tambah Data</a>
    
<?php
require_once 'footer.php';
?>
