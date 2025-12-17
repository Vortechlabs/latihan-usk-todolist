<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$id_todo = $_GET['id_todo'];
$id_user = $id_user;

$sql = "INSERT INTO `favorites`
        (`id_todo`, `id_user`)
        VALUES ('$id_todo', '$id_user')";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php?message=Berhasil Tambah ke Favorit");
    exit;
}else{
    header("Location: index.php?message=Gagal Tambah ke Favorit");
    exit;
}
?>