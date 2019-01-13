<?php
session_start();
session_destroy();
echo "<script> alert('Succes logout'); </script>";
echo "<script> location='index.php'; </script>";
?>