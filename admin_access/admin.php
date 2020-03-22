<!DOCTYPE html>
<html lang="id">
<head>
	<title>Peduli Pedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../Images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="../CSS/style-login.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
</head>
<body>

    <div class="box">
        <h2>Login</h2>
        <form method="POST">
            <div class="inputBox">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
                <input type="submit" name="loginPanitia">
        </form>
    </div>

    <?php
        session_start();
        if (empty($_SESSION) || count($_COOKIE) == 0) {
           if (isset($_POST['loginPanitia'])) {
                require "../PHP/config.php";
                include "../PHP/injection.php";
                $user = injection($_POST['username']);
                $query = "SELECT password, username FROM panitia WHERE username='$user' OR email='$user'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) === 1) {
                    $hasil = mysqli_fetch_assoc($result);
                    if (password_verify($_POST['password'], $hasil['password'])) {
                        setcookie('username', $hasil['username'], time() + (86400), '/');
                        $_SESSION['user'] = $hasil['username'];
                        $_SESSION['panitia'] = true;
                        $_SESSION['loginPanitia'] = true;
                        if (count($_COOKIE) > 0) {
                            echo "<script>alert('Login Berhasil dengan Cookies Aktif.');document.location.href='../home.php';</script>";
                        } else {
                            echo "<script>alert('Login Berhasil dengan Cookies Tidak Aktif.');document.location.href='../home.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Username/password tidak cocok.');</script>";
                    }
                }else {
                         echo "<script>alert('Akun tidak ditemukan...');</script>";
                }
            }
        }
    ?>

</body>
</html>