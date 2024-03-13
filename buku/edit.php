<?php

$id = $_GET['id'];

require "../config.php";

$query = "SELECT * FROM penerbit";
$penerbit = mysqli_query($connect, $query);

$query2 = "SELECT * FROM buku WHERE id=$id";
$buku = mysqli_query($connect, $query2);


// var_dump($berita)
if (isset($_POST["ubah"])) {
    $kode = htmlspecialchars(($_POST["kode"]));
    $kategori = htmlspecialchars(($_POST["kategori"]));
    $nama_buku = htmlspecialchars(($_POST["nama_buku"]));
    $harga = htmlspecialchars(($_POST["harga"]));
    $stok = htmlspecialchars(($_POST["stok"]));
    $penerbit = htmlspecialchars(($_POST["penerbit"]));
    $query = "UPDATE buku SET kode='$kode',kategori='$kategori',nama_buku='$nama_buku',harga='$harga',stok='$stok',penerbit_id='$penerbit' WHERE id=$id";
    mysqli_query($connect, $query);

    // memulai session
    session_start();
    // membuat session dengan variabel super global $_SESSION
    // session dibuat agar dapat digunakan di kode program yang lain
    // selama session tersebut belum di hapus
    $_SESSION['updated'] = "Selamat...!!";

    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03b0c5c9d8.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <a href="index.php">
                    <button type="button" class="btn btn-warning btn-sm float-end"><i class="fa fa-arrow-left"></i> Back</button>
                </a>
                <h5 class="fw-bold">Edit Data Buku</h5>
                <div class="card mt-4">
                    <div class="card-body">
                        <?php
                        foreach ($buku as $data) {
                        ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode</label>
                                    <input type="text" name="kode" value="<?= $data['kode'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                    <input type="text" name="kategori" value="<?= $data['kategori'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                                    <input type="text" name="nama_buku" value="<?= $data['nama_buku'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                                    <input type="text" name="harga" value="<?= $data['harga'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Stok</label>
                                    <input type="text" name="stok" value="<?= $data['stok'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Penerbit</label>
                                    <select class="form-select" name="penerbit" id="">
                                        <option hidden></option>
                                        <?php
                                        foreach ($penerbit as $datkat) {
                                        ?>
                                            <option <?= $datkat['id'] == $data['penerbit_id'] ? "selected" : "" ?> value="<?= $datkat['id'] ?>"><?= $datkat['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                
                                <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-paper-plane"></i>Update</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>