<?php
include "koneksi.php";

$queryuser = mysqli_query($conn, "SELECT * FROM `user` where `id_user` = '$id_user'");
$user = mysqli_fetch_assoc($queryuser);
$name = $user['name'];
?>

<nav>
    <h2>TodoList</h2>
    <div class="nav-menu">

        <?php
        
        if(!isset($id_user) && $id_user == ''){
            echo "<a href='login.php'>Login</a>";
        }else{
            echo "Hallo, $name 👋";
            echo "<a href='profil.php'>Profil</a>";
                echo "<a href='logout.php'>Logout</a>";

        }
        ?>
    </div>
</nav>