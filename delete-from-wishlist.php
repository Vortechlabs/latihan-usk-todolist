<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$id_todo = $_GET['id_todo'];
$id_user = $id_user;

$cek = mysqli_query($conn, 
    "SELECT * FROM favorites 
     WHERE id_todo = $id_todo AND id_user = $id_user"
);

if(mysqli_num_rows($cek) == 0){
    header("Location: index.php?message=Tidak ada di favorit");
    exit;
}

$sql = "DELETE FROM `favorites`
        WHERE id_todo = '$id_todo' AND id_user = '$id_user'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php?message=Berhasil Hapus dari Favorit");
    exit;
}else{
    header("Location: index.php?message=Gagal Hapus dari Favorit");
    exit;
}
?>