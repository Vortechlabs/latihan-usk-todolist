<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
};

$id_todo = $_POST['id_todo'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$id_category = $_POST['category'];
$id_user = $id_user;

$sql = "UPDATE `todo` SET
        `title` = '$title', `description` = '$description', `status` = '$status', `id_category` = '$id_category', `id_user` = '$id_user', `updated_at` = NOW()
        WHERE `id_todo` = '$id_todo'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php?message=Berhasil Edit Tugas");
    exit;
}else{
    header("Location: edit-todo.php?message=Gagal Edit Tugas");
    exit;
}
?>
<script>
    console.log($id_category);
</script>