<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$id_category = $_POST['category'];
$id_user = $id_user;

$sql = "INSERT INTO `todo`
        (`title`, `description`, `status`, `id_category`, `id_user`, `created_at`, `updated_at`)
        VALUES ('$title', '$description', '$status', '$id_category', '$id_user', NOW(), NOW())";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php?message=Berhasil Tambah Tugas");
    exit;
}else{
    header("Location: tambah-todo.php?message=Gagal Tambah Tugas");
    exit;
}
?>
<script>
    console.log($id_category);
</script>