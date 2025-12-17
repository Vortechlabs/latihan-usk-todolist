
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "navbar-no-auth.php"; ?>
    <main style="display: flex; justify-content: center; align-items: center; min-height: 90dvh;">
        <div class="form-container ">
            <center><h1>Login</h1></center>
            <form action="proses-login.php" method="POST">
                <div>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" >
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
            <h4 style="margin: 1rem; display: flex; justify-content: center; gap: 0.5rem;">Pengguna baru?<span><a href="daftar.php" style="color: blue; ">Sign Up</a></span></h4>
        </div>
    </main>
</body>
</html>