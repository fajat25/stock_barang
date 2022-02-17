<?php

    //menyimpan data login
    session_start();

    //coding koneksi ke database
    $conn = mysqli_connect("localhost","root","","stock_barang");

    $idb = $_GET['id'];

    $hapus = mysqli_query($conn, "delete from masuk where Id_Masuk='$idb'");
        if($hapus){
           header("location:masuk.php");
        } else{
           echo "Gagal";
            header("location:index.php");
        }
?>