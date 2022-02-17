<?php

    //menyimpan data login
    session_start();

    //coding koneksi ke database
    $conn = mysqli_connect("localhost","root","","stock_barang");

    //  coding test koneksi
    // if ($conn) {
    //     echo "sukses!";
    
    
    //barang baru
    if(isset($_POST["addnewbarang"])){
        $namabarang = $_POST["namabarang"];
        $deskripsi = $_POST["deskripsi"];
        $stock = $_POST["stock"];

        $addtotable = mysqli_query($conn,"insert into stock (Nama_Barang, Deskripsi, Stock) values('$namabarang','$deskripsi','$stock')");
        if($addtotable){
            echo "berhasil gaes";
            header("location:index.php");
        } else{
            echo "Gagal";
            header("location:index.php");
        }
    };

    //barang masuk
    if(isset($_POST['barangmasuk'])){
        $barangnya = $_POST['barangnya'];
        $penerima = $_POST['penerima'];
        $qty = $_POST['qty'];

        $cekstocksekarang = mysqli_query($conn, "select * from stock where Id_Barang='$barangnya'");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

        $stocksekarang = $ambildatanya['Stock'];
        $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

        $addtomasuk = mysqli_query($conn,"insert into masuk (Id_Barang, Keterangan, qty) values('$barangnya','$penerima','$qty')");
        $updatestockmasuk = mysqli_query($conn, "update stock set Stock='$tambahkanstocksekarangdenganquantity' where Id_Barang='$barangnya'");
        if($addtomasuk&&$updatestockmasuk){
            echo "berhasil";
            header("location:masuk.php");
        } else{
            echo "Gagal";
            header("location:masuk.php");
        }
    };

    //barang keluar
    if(isset($_POST['addbarangkeluar'])){
        $barangnya = $_POST['barangnya'];
        $penerima = $_POST['penerima'];
        $qty = $_POST['qty'];

        $cekstocksekarang = mysqli_query($conn, "select * from stock where Id_Barang='$barangnya'");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

        $stocksekarang = $ambildatanya['Stock'];
        $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

        $addtomasuk = mysqli_query($conn,"insert into keluar (Id_Barang, Penerima, qty) values('$barangnya','$penerima','$qty')");
        $updatestockmasuk = mysqli_query($conn, "update stock set Stock='$tambahkanstocksekarangdenganquantity' where Id_Barang='$barangnya'");
        if($addtomasuk&&$updatestockmasuk){
            header("location:keluar.php");
        } else{
            echo "Gagal";
            header("location:keluar.php");
        }
    }
?>