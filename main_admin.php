<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$usn = $_SESSION['usn'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Information Center</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Selamat Datang di Halaman Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
                <form class="d-flex mt-3">
                    <input type="search" class="form-control me-2" placeholder="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row g-0">
        <div class="col-sm-2 bg-light" style="height: 100vh;">
            <ul class="nav nav-pills flex-column mt-3">
                <li class="nav-item ml-0">
                    <a href="#" class="nav-link active rounded-0">Overview</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile User</a>
                </li>
                <li class="nav-item">
                    <a href="data_mahasiswa.php" class="nav-link">Data Mahasiswa</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10 p-3">
            <h1>Selamat Datang di Halaman Admin</h1>
        </div>
    </div>
</body>
</html>