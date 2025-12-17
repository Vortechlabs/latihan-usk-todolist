<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];

if(!isset($id_user) && $id_user == ''){
    Header('Location: login.php');
}

$sqlcategory = 'SELECT * FROM category';
$querycategory = mysqli_query($conn, $sqlcategory);

if(isset($_GET['category_filter']) && $_GET['category_filter'] != ''){
    $id_category = $_GET['category_filter'];
    $sql = "SELECT todo.*, category.category as category_name FROM todo JOIN category WHERE todo.id_category = category.id_category AND todo.id_category = $id_category AND todo.id_user = $id_user";
    $query = mysqli_query($conn, $sql);
}else{
    $sql = "SELECT todo.*, category.category as category_name FROM todo JOIN category WHERE todo.id_category = category.id_category AND todo.id_user = $id_user";
    $query = mysqli_query($conn, $sql);
}

$row  =  mysqli_fetch_assoc($query);
$id_todo = $row['id_todo'];

// $sqlfavorites = mysqli_query($conn, "SELECT * FROM favorites WHERE id_todo = $id_todo");
// $queryfavorites = mysqli_num_rows($sqlfavorites) > 0;

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
    <main>

    <form method="GET" style="display: flex; gap: 0.5rem; align-items: center; justify-content: center;">
        <label for='category_filter'>Filter kategori</label>
        <select name="category_filter" id="category_filter" style="width: 10%;" onchange="this.form.submit()">
            <option value="">Semua</option>
            <?php while($row =  mysqli_fetch_assoc($querycategory)){ ?>
             <option value="<?= $row['id_category'] ?>">
             <?= isset($_GET['category_filter']) && $_GET['category_filter'] == $row['id_category'] ? 'selected' : ''?>
             <?= $row['category'] ?>
             </option>
            <?php }?>
        </select><br><br>
        <!-- <label for='status_filter'>Filter Status</label>
        <select name="status_filter" id="status_filter" style="width: 10%;" onchange="this.form.submit()">
            <option value="">Semua</option>
             <option value="done">
             <?= isset($_GET['status_filter']) && $_GET['status_filter'] == 'done' ? 'selected' : ''?>
             Done
             </option>
             <option value="pending">
             <?= isset($_GET['status_filter']) && $_GET['status_filter'] == 'pending' ? 'selected' : ''?>
             Pending
             </option>
        </select> -->
</form>

    <div style="display: flex; justify-content: center; margin: 1rem 0;">
            <a href="tambah-todo.php"><button class="btn-success" >[+] Tambah</button></a>
        </div>

        <div class="card-container">
            <?php while($row  =  mysqli_fetch_assoc($query)){ ?>
            <div class='card <?= $row['status'] == 'done' ? 'dark' : 'white' ?>'>
            <h3 class='<?= $row['status'] == 'done' ? 'line-through' : '' ?>'><?= $row['title'] ?></h3>
            <p  class='<?= $row['status'] == 'done' ? 'line-through' : '' ?>'><?= $row['description'] ?></p>
            <p  class='<?= $row['status'] == 'done' ? 'line-through' : '' ?>'><b>Kategori:</b> <?= $row['category_name'] ?></p>
            <p  class='<?= $row['status'] == 'done' ? 'line-through' : '' ?>'><b>Status:</b> <?= $row['status'] ?></p>
            <div style="display: flex; justify-content: space-between;">
                <div style='display: flex; gap: 1rem; align-items: center; margin-top: 1rem;'>
                    <a href='edit-todo.php?id_todo=<?= $row['id_todo'] ?>'><button class='btn-primary'>Edit</button></a>
                    <a href='hapus-todo.php?id_todo=<?= $row['id_todo'] ?>'><button class='btn-danger'>Hapus</button></a>
                </div>
                <div>
                    <!-- <?= $queryfavorites ? '<p>test</p>' : '<p>ggl</p>' ?> -->
                    <a href="add-to-wishlist.php?id_todo=<?= $row['id_todo'] ?>"><button style="border-radius: 100%; width: 2rem; height: 2rem; display: flex; justify-content: center;">💘</button></a>
                </div>
            </div>
            </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>