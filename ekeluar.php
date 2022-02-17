<?php 
 
require "function.php"; //memanggil database
$id = $_POST['id'];
$keterangan = $_POST['Keterangan'];
 
$update = mysqli_query($conn,"update keluar set Penerima='$keterangan' WHERE Id_Keluar='$id'");

header("location:keluar.php");

?>