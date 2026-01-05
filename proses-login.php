<?php
Error_reporting(E_ALL);
 ini_set("display_errors", 1);
session_start();
require "./koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = md5('$password')";
$query = mysqli_query($conn, $sql);

if($query){
    $user = mysqli_fetch_assoc($query);
    $_SESSION['id_user'] = $user['id_user'];
    $name = $user['name'];
    header("Location: index.php?message=Berhasil Login! Selamat Datang $name!");
    exit;
}else{
    header("Location: login.php?message=Gagal Login");
    exit;
}
?>
<script>
    console.log($id_category);
</script>