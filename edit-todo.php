<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] == '') {
    header('Location: login.php');
    exit;
}

$id_todo = (int)$_GET['id_todo'];

$sqltodo = "
SELECT todo.*, category.category 
FROM todo 
JOIN category ON todo.id_category = category.id_category 
WHERE todo.id_todo = $id_todo 
AND todo.id_user = $id_user
";

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
            <center>
                <h1>Edit Tugas</h1>
            </center>
            <form action="proses-edit.php" method="POST">
                <input type="hidden" name="id_todo" value="<?= htmlspecialchars($id_todo) ?>">
                <div>
                    <label for="title">Judul</label><br>
                    <input type="text" name="title" id="title" value="<?= htmlspecialchars($todo['title']) ?>">
                </div>
                <div>
                    <label for="description">Deskripsi</label><br>
                    <textarea name="description" id="description"><?= htmlspecialchars($todo['description']) ?></textarea>
                </div>
                <div>
                    <label for="category">Kategori</label><br>
                    <select name="category" id="category">
                        <?php while ($row = mysqli_fetch_assoc($querycategory)) { ?>
                            <option
                                value="<?= $row['id_category'] ?>"
                                <?= ($row['id_category'] == $todo['id_category']) ? 'selected' : '' ?>>
                                <?= $row['category'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="status">Status</label><br>
                    <select name="status" id="status">
                        <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>
                            Pending
                        </option>
                        <option value="done" <?= $todo['status'] == 'done' ? 'selected' : '' ?>>
                            Done
                        </option>
                    </select>

                </div>
                <button type="submit" class="btn-success">Edit</button>
            </form>
        </div>
    </main>

</body>

</html>