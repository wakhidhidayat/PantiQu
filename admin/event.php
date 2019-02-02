<h2>Daftar Event</h2> <br>
      <table class="table">
        <tr>
          <td>No</td>
          <td>Judul</td>
          <td>Alamat</td>
          <td>Info</td>
          <td>Tanggal</td>
          <td>Gambar</td>
          <td colspan='2'><center>Aksi</center></td>
        </tr>
      
      <?php
      function __autoload($class) {
        require_once "../$class.php";
      }
      $tampil = new CRUD();
      $panti = $tampil->select('event');
      $no = 1;
      foreach ($panti as $pecah) {
      ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $pecah['judul']; ?></td>
            <td><?php echo $pecah['tempat']?></td>
            <td><?php echo $pecah['info']; ?></td>
            <td><?php echo $pecah['tgl'] ?></td>
            <td><img src="foto/<?php echo $pecah['gambar']?>" width="100px"/></td>
            <td><a href='index.php?page=edit-event&id=<?php echo $pecah['id_event']?>' class='btn btn-primary'>Edit</a></td>
            <td><a href='index.php?page=delete-event&id=<?php echo $pecah['id_event']?>' class='btn btn-danger' onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a></td>
            
        </tr>
    <?php
      }
    ?>
    </table>

 
    <a href='index.php?page=insert-event' class='btn btn-success' name='tambah'>Tambah Data</a>
    

