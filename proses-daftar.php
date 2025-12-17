<?php 
require "koneksi.php";

$name = $_POST['name'];
$username = $_POST['username'];
$bd = $_POST['bd'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO `user`
        (`name`, `username`, `birth_date`, `email`, `password`)
        VALUES ('$name', '$username', '$bd', '$email', md5($password))";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: login.php?message=Berhasil Daftar");
    exit;
}else{
    header("Location: daftar.php?message=Gagal Daftar");
    exit;
}
?>
<script>
    console.log($id_category);
</script>