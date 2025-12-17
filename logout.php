<?php
session_start();

session_destroy();
$_SESSION['id_loggedin'] = false;

Header("Location: index.php?message=Berhasil Logout");
?>