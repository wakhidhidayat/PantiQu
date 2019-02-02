<?php
    function __autoload($class) {
        require "../$class.php";
    }

      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = new CRUD();
        $delete->destroy('pemilik_panti', $id, 'id_pemilik');
        echo "<script>location='index.php?page=user';</script>";
      }
    ?> 