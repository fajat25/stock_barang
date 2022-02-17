<?php

    //menyimpan data login
    session_start();

    //coding koneksi ke database
    $conn = mysqli_connect("localhost","root","","stock_barang");

    $idb = $_GET['id'];

    $hapus = mysqli_query($conn, "delete from stock where Id_Barang='$idb'");
        if($hapus){
           header("location:index.php");
        } else{
           echo "Gagal";
            header("location:index.php");
        }
?>