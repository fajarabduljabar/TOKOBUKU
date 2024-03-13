<?php
require "config.php";

$query = "SELECT penerbit.nama, buku.* FROM buku INNER JOIN penerbit on buku.penerbit_id = penerbit.id ORDER BY stok ASC ";

$buku = mysqli_query($connect, $query);


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
                            <li><a href="../TOKOBUKU/index.php" style="text-decoration: none;" class="text-dark">Home</a></li>
                            <li><a href="../TOKOBUKU/admin.php" style="text-decoration: none;" class="text-dark">Admin</a></li>
                            <li><a href="../TOKOBUKU/pengadaan.php" style="text-decoration: none;" class="text-light fw-bold">Pengadaan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body bg-info">

                        <h4 class="fw-bold">Data Urutan Stok Buku Paling Sedikit</h4>
    
                        <table class="table mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                  
                                    
                                    <th scope="col">Nama Buku</th>
                                    
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
                                      
                                       
                                        <td><?= $data["nama_buku"] ?></td>
                                       
                                        <td><?= $data["stok"] ?></td>
                                        <td><?= $data["nama"] ?></td>
                                        
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