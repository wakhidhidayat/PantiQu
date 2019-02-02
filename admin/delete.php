<?php
    function __autoload($class) {
        require "../$class.php";
    }

      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $foto = $pecah['foto'];
        if(file_exists("foto/$foto"))
        {
          unlink("foto/$foto");
        }
        $delete = new CRUD();
        $delete->destroy('panti', $id, 'id_panti');
        echo "<script>location='index.php?page=panti';</script>";
      }
    ?> 