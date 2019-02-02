<?php
    function __autoload($class) {
        require "../$class.php";
    }

      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $gambar = $pecah['gambar'];
        if(file_exists("foto/$gambar"))
        {
          unlink("foto/$gambar");
        }
        $delete = new CRUD();
        $delete->destroy('event', $id, 'id_event');
        echo "<script>location='index.php?page=event';</script>";
      }
    ?> 