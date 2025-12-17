<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$id_todo = $_GET['id_todo'];

$sql = "DELETE FROM `todo` WHERE `id_todo` = '$id_todo'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php?message=Berhasil Hapus Tugas");
    exit;
}else{
    header("Location: index.php?message=Gagal Hapus Tugas");
    exit;
}
?>