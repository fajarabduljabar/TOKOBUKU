<?php
require "../config.php";
$book = mysqli_query($connect, "SELECT * FROM buku");
$terbit = mysqli_query($connect, "SELECT * FROM penerbit");
$query = "SELECT penerbit.nama, buku.* FROM buku INNER JOIN penerbit on buku.penerbit_id = penerbit.id";

$buku = mysqli_query($connect, $query);

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $cari = "SELECT * FROM buku
    WHERE nama_buku LIKE '%$search%'";


    $buku = mysqli_query($connect, $cari);
    // cek kalau pencarian data tidak ditemukan
    if (mysqli_num_rows($buku) == 0) {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <script src="https://kit.fontawesome.com/03b0c5c9d8.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03b0c5c9d8.js"></script>
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/03b0c5c9d8.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="mt-2 text-center">Aplikasi Toko Buku</h3>
        <p class="text-center">Copyright by Fajar Abdul Jabar @2024</p>

        <div class="row mt-5 mb-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-info">
                        <h5 class="fw-bold">Main Menu</h5>
                        <ul>
                            <li><a href="../index.php" style="text-decoration: none;" class="text-dark">Home</a></li>
                            <li><a href="../admin.php" style="text-decoration: none;" class="text-light fw-bold">Admin</a></li>
                            <li><a href="../pengadaan.php" style="text-decoration: none;" class="text-dark">Pengadaan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body bg-info">

                        <!-- TAMBAH BUKU -->
                        <?php

                        if (isset($_POST["simpan"])) {
                            $kode = htmlspecialchars(($_POST["kode"]));
                            $kategori = htmlspecialchars(($_POST["kategori"]));
                            $nama_buku = htmlspecialchars(($_POST["nama_buku"]));
                            $harga = htmlspecialchars(($_POST["harga"]));
                            $stok = htmlspecialchars(($_POST["stok"]));
                            $penerbit = htmlspecialchars(($_POST["penerbit"]));
                            $query = "INSERT INTO buku(kode,kategori,nama_buku,harga,stok,penerbit_id) VALUES ('$kode','$kategori','$nama_buku','$harga','$stok','$penerbit')";
                            mysqli_query($connect, $query);

                            // memulai session
                            session_start();
                            // membuat session dengan variabel super global $_SESSION
                            // session dibuat agar dapat digunakan di kode program yang lain
                            // selama session tersebut belum di hapus
                            $_SESSION['status'] = "Horeee...!!";

                            header("location:../buku/index.php");
                        }
                        ?>
                        <h4 class="fw-bold">Data Buku</h4>
                        <form method="GET" class="row float-end row-cols-lg-auto g-2 align-items-center">
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="text" name="search" class="form-control" placeholder="Search" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="cari" class="btn btn-success">
                                    <i class="fa fa-search"></i> Cari</button>
                            </div>
                        </form>
                        <!-- Button trigger modal -->
                        <a href="../admin.php">
                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i></button>
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Buku</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Kode</label>
                                                <input type="text" name="kode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                                                <input type="text" name="nama_buku" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                                <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Stok</label>
                                                <input type="number" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Penerbit</label>
                                                <select class="form-select" name="penerbit" id="">
                                                    <?php
                                                    foreach ($terbit as $tr) {
                                                    ?>
                                                        <option value="<?= $tr['id'] ?>"><?= $tr['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Penerbit</th>
                                    <th style="width: 10%;"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                // kenapa gk pake id ? karena kalau pake id rentan tidak
                                foreach ($buku as $data) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $data["kode"] ?></td>
                                        <td><?= $data["kategori"] ?></td>
                                        <td><?= $data["nama_buku"] ?></td>
                                        <td><?= $data["harga"] ?></td>
                                        <td><?= $data["stok"] ?></td>
                                        <td><?= $data["nama"] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <a href="hapus.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus ?')" style="text-decoration: none;">
                                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
