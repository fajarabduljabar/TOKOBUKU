<?php


// mengambil data dari file config.php
require "../config.php";
// mengambil data berdasarkan id
$id = $_GET["id"];

$query = "DELETE FROM penerbit WHERE id=$id";
$edit = mysqli_query($connect, $query);

header("location:index.php")
?>

