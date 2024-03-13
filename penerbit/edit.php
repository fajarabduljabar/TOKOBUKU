<?php
require "../config.php";
$id = $_GET['id'];





$query = "SELECT * FROM penerbit WHERE id=$id";
$penerbit = mysqli_query($connect, $query);



// simpan data nya ke database
// 1. tombol simpan di klik
if (isset($_POST["ubah"])) {
    // tangkap kiriman dari user
    $kode = htmlspecialchars(($_POST["kode"]));
    $nama = htmlspecialchars(($_POST["nama"]));
    $alamat = htmlspecialchars(($_POST["alamat"]));
    $kota = htmlspecialchars(($_POST["kota"]));
    $telepon = htmlspecialchars(($_POST["telepon"]));
    // lakukan query update
    $query = "UPDATE penerbit set kode='$kode',nama='$nama',nama='$nama',alamat='$alamat',kota='$kota',telepon='$telepon' WHERE id=$id";
    // eksekusi query
    mysqli_query($connect, $query);
    // redirect halaman ke index.php
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
                <h5 class="fw-bold">Edit Data Penerbit</h5>
                <div class="card mt-4">
                    <div class="card-body">
                        <?php
                        foreach ($penerbit as $data) {
                        ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode</label>
                                    <input type="text" name="kode" value="<?= $data['kode'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kota</label>
                                    <input type="text" name="kota" value="<?= $data['kota'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telepon</label>
                                    <input type="text" name="telepon" value="<?= $data['telepon'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
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