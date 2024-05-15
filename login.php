<!DOCTYPE html>
<?php
session_start();
$errorMsg = '';

if (isset($_POST['usn']) && isset($_POST['pwd'])) {
    include 'connect.php';
    $usn = $_POST['usn'];
    $pwd = md5($_POST['pwd']);

    $sql = "SELECT usn FROM datasiswa
            WHERE usn='$usn' AND pwd='$pwd';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['usn'] = $usn;
        header('Location: main_admin.php');
    } else {
        $errorMsg = "username / password salah!";
    }
    mysqli_close($conn);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="bg-primary" style="height: 100vh;">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card border rounded-5 shadow p-5">
                <div class="text-center">
                    <h2>Hallo!</h2>
                    <h5>Login untuk melanjutkan</h5>
                    <br>
                    <form action="" method="post">
                        <input type="text" class="form-control form-control-lg mb-2" placeholder="Masukkan Username" name="usn" required>
                        <input type="password" class="form-control form-control-lg mb-2" placeholder="Masukkan Password" name="pwd" required>
                        <?php
                        if ($errorMsg != '') {
                            echo '<p align="center">
                                <strong>
                                    <font color="#FF0000">
                                        '.$errorMsg.'
                                    </font>
                                </strong>
                            </p>';
                        }
                        ?>
                        <button class="btn btn-lg btn-primary mt-4 mb-4 w-100" type="submit" name="login">Login</button>
                        <p>Belum punya akun? <a href="signup.php">Sign Up sekarang!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>