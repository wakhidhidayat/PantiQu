<?php
session_start();
session_destroy();
echo "<script> alert('Berhasil Logout'); </script>";
echo "<script> location='login.php'; </script>";
?>