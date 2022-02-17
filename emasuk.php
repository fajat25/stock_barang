<?php 
 
require "function.php"; //memanggil database
$id = $_POST['id'];
$keterangan = $_POST['Keterangan'];
 
$update = mysqli_query($conn,"update masuk set Keterangan='$keterangan' WHERE Id_Masuk='$id'");

header("location:masuk.php");

?>