<h2>Daftar User</h2> <br>
    <!-- Main component for a primary marketing message or call to action -->
      <table class="table">
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Username</td>
          <td>Password</td>
          <td>Email</td>
          <td>No HP</td>
          <td>No Rekening</td>
          <td colspan='2'><center>Aksi</center></td>
          
          
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
            <td><?php echo $pecah['nama_pemilik']; ?></td>
            <td><?php echo $pecah['username']?></td>
            <td><?php echo $pecah['password']; ?></td>
            <td><?php echo $pecah['email'] ?></td>
            <td><?php echo $pecah['no_hp']?></td>
            <td><?php echo $pecah['no_rekening']?></td>
            <td><a href='index.php?page=edit-user&id=<?php echo $pecah['id_pemilik']?>' class='btn btn-primary'>Edit</a></td>
            <td><a href='index.php?page=delete-user&id=<?php echo $pecah['id_pemilik']?>' class='btn btn-danger' onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a></td>
            
        </tr>
    <?php
      }
    ?>
    </table>

 
    <a href='index.php?page=insert-user' class='btn btn-success' name='tambah'>Tambah Data</a>
    

