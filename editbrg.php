<?php 
 
require "function.php"; //memanggil database
$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['Keterangan'];
 
$update = mysqli_query($conn,"update stock set Nama_Barang='$nama', Deskripsi='$keterangan' WHERE Id_Barang='$id'");

header("location:index.php");

?>