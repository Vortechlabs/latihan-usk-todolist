<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$id_todo = $_GET['id_todo'];
$sqltodo = "SELECT todo.*, category.* FROM todo JOIN category WHERE todo.id_category = category.id_category AND todo.id_todo = $id_todo";
$querytodo = mysqli_query($conn, $sqltodo);
$todo = mysqli_fetch_assoc($querytodo);

$sqlcategory = 'SELECT * FROM category';
$querycategory = mysqli_query($conn, $sqlcategory);
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
            <center><h1>Edit Tugas</h1></center>
            <form action="proses-edit.php" method="POST">
                <input type="hidden" name="id_todo" value="<?= htmlspecialchars($id_todo)?>">
                <div>
                    <label for="title">Judul</label><br>
                    <input type="text" name="title" id="title" value="<?= htmlspecialchars($todo['title']) ?>">
                </div>
                <div>
                    <label for="description">Deskripsi</label><br>
                    <textarea name="description" id="description" ><?= htmlspecialchars($todo['description']) ?></textarea>
                </div>
                <div>
                    <label for="category">Kategori</label><br>
                    <select name="category" id="category">
                        <option value="<?= htmlspecialchars($todo['id_category']) ?>"><?= htmlspecialchars($todo['category']) ?></option>
                        <?php while($row = mysqli_fetch_assoc($querycategory)){
                            echo "<option value=".$row['id_category'].">".$row['category']."</option>";
                        }?>
                    </select>
                </div>
                <div>
                    <label for="status">Status</label><br>
                    <select name="status" id="status">
                        <option value="<?= htmlspecialchars($todo['status']) ?>"><?= htmlspecialchars($todo['status']) ?></option>
                        <option value="pending">Pending</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <button type="submit" class="btn-success">Edit</button>
            </form>
        </div>
    </main>

</body>
</html>