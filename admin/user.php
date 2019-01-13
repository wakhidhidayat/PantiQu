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
          <td>Id User</td>
          <td>Nama</td>
          <td>Username</td>
          <td>Password</td>
          <td>Email</td>
          <td>No HP</td>
          <td>No Rekening</td>
          <td>Aksi</td>
        </tr>
      
      <?php
      function __autoload($class) {
        require_once "../$class.php";
      }
      $tampil = new CRUD();
      $user = $tampil->select('pemilik_panti');
      $no = 1;
      foreach ($user as $pecah) {
      ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $pecah['id_pemilik']; ?></td>
            <td><?php echo $pecah['nama_pemilik']?></td>
            <td><?php echo $pecah['username']; ?></td>
            <td><?php echo $pecah['password'] ?></td>
            <td><?php echo $pecah['email']?></td>
            <td><?php echo $pecah['no_hp']?></td>
            <td><?php echo $pecah['no_rekening']?></td>
            <td><a href='edit-user.php?id=<?php echo $pecah['id_pemilik']?>' class='btn btn-primary'>Edit</a>
            <a href='user.php?del=<?php echo $pecah['id_pemilik']?>' class='btn btn-danger' onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a></td>
            
        </tr>
    <?php
      }
    ?>
    </table>

    <?php
      if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $delete = new CRUD();
        $delete->destroy('pemilik_panti', $id, 'id_pemilik');
        echo "<meta http-equiv='refresh' content='1;url=user.php'>";
      }
    ?>  
    <a href='insert-user.php' class='btn btn-success' name='tambah'>Tambah Data</a>
    
<?php
require_once 'footer.php';
?>
