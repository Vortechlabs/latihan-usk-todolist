<?php 
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
};

$query = mysqli_query($conn, "SELECT * FROM `user` where `id_user` = '$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <main style="display: flex; justify-content: center; align-items: center; min-height: 90dvh;">
        <div class="form-container ">
            <center><h1>Profil</h1></center>
            <hr style="margin-bottom: 1rem;">
            <div >
                <p>Name : </p> 
                <h2 style="margin-bottom: 1rem;"><?= htmlspecialchars($user['name']) ?></h2>
                <p>Birth date : </p> 
                <h2 style="margin-bottom: 1rem;"><?= htmlspecialchars($user['birth_date']) ?></h2>
                <p>Username : </p> 
                <h2 style="margin-bottom: 1rem;">@<?= htmlspecialchars($user['name']) ?></h2>
                <p>Email :</p> 
                <h2 style="margin-bottom: 1rem;"><?= htmlspecialchars($user['email']) ?></h2>
                <a href="logout.php"><button class="btn-danger" style="width: 100%;">Logout</button></a>
            </div>
</body>
</html>