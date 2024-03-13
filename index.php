<?php
require "config.php";


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                        <li><a href="../TOKOBUKU/index.php" style="text-decoration: none;" class="text-light fw-bold">Home</a></li>
                            <li><a href="../TOKOBUKU/admin.php" style="text-decoration: none;" class="text-dark">Admin</a></li>
                            <li><a href="../TOKOBUKU/pengadaan.php" style="text-decoration: none;" class="text-dark">Pengadaan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body bg-info">
                        <?php
                        // cek jika session status itu ada
                        if (isset($_SESSION['status'])) {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>" . $_SESSION['status'] . "</strong> Data berhasil di tambah
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";

                            // session dihapus
                            session_destroy();
                        } elseif (isset($_SESSION['updated'])) {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>" . $_SESSION['updated'] . "</strong> Data berhasil di ubah
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                            // session dihapus
                            session_destroy();
                        }
                        ?>
                        <h2 class="fw-bold">Data Buku</h2>
                        <form method="GET" class="row float-end row-cols-lg-auto g-2 align-items-center mb-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="text" name="search" class="form-control" placeholder="Search"  >
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="cari" class="btn btn-success">
                                    <i class="fa fa-search"></i> Cari</button>
                            </div>
                        </form>
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
                                    </tr>
                                <?php
                                }
                                ?>


                                <?php
                                if (isset($error)) {
                                    echo "<tr><td colspan='5' class='text-center text-muted'>
                                    data tidak ditemukan
                                    </td></tr>";
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
</body>

</html>