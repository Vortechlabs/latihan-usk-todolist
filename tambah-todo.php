<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$sql = 'SELECT * FROM category';
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <main style="display: flex; justify-content: center; align-items: center; border-radius: 0.2rem; min-height: 90dvh;">
        <div class="form-container">
            <center><h1>Tambah Tugas</h1></center>
            <form action="proses-tambah.php" method="POST">
                <div>
                    <label for="title">Judul</label><br>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <label for="description">Deskripsi</label><br>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div>
                    <label for="category">Kategori</label><br>
                    <select name="category" id="category">
                        <?php while($row = mysqli_fetch_assoc($query)){
                            echo "<option value=".$row['id_category'].">".$row['category']."</option>";
                        }?>
                        <option value=""></option>
                    </select>
                </div>
                <div>
                    <label for="status">Status</label><br>
                    <select name="status" id="status">
                        <option value="pending">Pending</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <button type="submit" class="btn-success">Tambah</button>
            </form>
        </div>
    </main>
</body>
</html>