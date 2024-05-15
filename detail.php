<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$detail_nrp = $_POST['nrp'];

if(!empty($detail_nrp)) {
    include 'connect.php';
    $sql = "SELECT * FROM datasiswa WHERE nrp='$detail_nrp';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $nrp = $row['nrp'];
    $nama = $row['nama'];
    $j_kelamin = $row['jenis_kelamin'];
    $agama = $row['agama'];
    $tempat_lahir = $row['tempat_lahir'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $no_telp = $row['no_telp'];
    $email = $row['email'];
    $alamat = $row['alamat'];
    $asal_sekolah = $row['asal_sekolah'];
    $srcfoto = $row['foto'];

    if ($srcfoto == "") {
        $srcfoto = "https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_640.png";
    }
}

if (isset($_POST['delete'])) {
    include 'connect.php';

    $nrp = $_POST['nrp'];
    $sql = "DELETE FROM datasiswa WHERE nrp='$nrp';";

    if (mysqli_query($conn, $sql)) {
        header('Location: data_mahasiswa.php');
    } else {
        echo "Gagal, Error : " . mysqli_error($conn);
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
    <title>Information Center</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Selamat Datang di Halaman Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="main_admin.php" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Profile</a>
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
                    <a href="main_admin.php" class="nav-link">Overview</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile User</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link  active rounded-0">Data Mahasiswa</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10 p-3">
            <div class="text-center mb-3">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NRP</th>
                                <td><?php echo $nrp; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $j_kelamin; ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?php echo $agama; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $tempat_lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $tanggal_lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?php echo $no_telp; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td><?php echo $asal_sekolah; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row g-0">
                        <div class="col-sm-3">
                            <form action="edit_data.php" method="post">
                                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary btn-lg">Edit Data</button>
                                <input type="hidden" value=<?php echo "'$nrp'" ?> name="edit_nrp">
                                <input type="hidden" value="1" name="back_val">
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#delModal">Delete Data</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src=<?php echo "'$srcfoto'" ?> class="img-thumbnail mx-auto d-block" width="320" height="320">
                </div>
            </div>  
        </div>
    </div>
    <div class="modal" id="delModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">Ingin hapus data ini?</div>
                    <div class="modal-footer">
                        <form method="post" action="">
                            <input type="submit" value="Ya" class="btn btn-danger" data-bs-dismiss="modal" name="delete"></input>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                            <input type="hidden" name="nrp" value=<?php echo "'$nrp'" ?>></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>