<html>

<head>
<title>Edit Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php 
	require "function.php"; //memanggil database
	$id = $_GET['Id_Masuk'];
	$update = mysqli_query($conn,"select * from masuk where Id_Masuk='$id'");
    $i = 1;
    while($data=mysqli_fetch_array($update)){
    ?>
    <form action="emasuk.php" method="post">
        <div class="modal-body">
            <input type="hidden" class="form-control" name="id" value="<?php echo $data['Id_Masuk'] ?>">
            <br>
            <input type="text" class="form-control" name="Keterangan" value="<?php echo $data['Keterangan'] ?>">
            <br>
            <input type="submit" value="Simpan">
        </div>
    </form>
    <?php } ?>
</body>

</html>