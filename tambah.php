<?php
  include_once("assets/php/config.php");
  //error_reporting(0);
  //ini_set('display_errors', 0);
?>
<?php
    if (isset($_POST['submitdata'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $no_telp = $_POST['no_telp'];
        $result = mysqli_query($mysqli, "INSERT INTO data_siswa VALUES($nis,'$nama','$kelas','$alamat','$tempat_lahir','$tanggal_lahir','$no_telp')");
        header('Location: index.php');
        if (!$result) {
            die('Invalid query: ' . mysqli_error($mysqli));
        }
    }
    //$data_siswa = mysqli_query($mysqli, "SELECT * FROM data_siswa ORDER BY NIS ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa - PHP NATIVE CRUD</title>
    <!-- Bootstrap -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    
</head>
<body>
	<h2 class="text-center"> TAMBAH DATA SISWA </h2>
	<hr style="width: 20%;">
	<div class="container" style="border: 2px solid white; border-radius: 10px;">
        <div class="row">
            <form action="tambah.php" method="post" style="padding: 12px;">
              <div class="form-group col-md-2">
                <label for="NIS">NIS</label>
                <input maxlength="10" type="number" class="form-control dfc" name="nis" placeholder="NIS">
              </div>
              <div class="form-group col-md-6">
                <label for="Nama">Nama Siswa</label>
                <input type="text" class="form-control dfc" name="nama" placeholder="Nama Siswa">
              </div>
              <div class="form-group col-md-4">
                <label for="Kelas">Kelas</label>
                <input maxlength="12" type="text" class="form-control dfc" name="kelas" placeholder="Kelas">
              </div>
              <div class="form-group col-md-6">
                <label for="Tempat Lahir">Tempat Lahir</label>
                <input type="text" class="form-control dfc" name="tempat_lahir" placeholder="Tempat Lahir">
              </div>
              <div class="form-group col-md-2">
                <label for="Tanggal Lahir">Tanggal Lahir</label>
                <input type="date" class="form-control dfc" name="tanggal_lahir" placeholder="Tanggal Lahir">
              </div>
              <div class="form-group col-md-4">
                <label for="Nomor Telepon">Nomor Telepon</label>
                <input maxlength="15" type="number" class="form-control dfc" name="no_telp" placeholder="Nomor Telepon">
              </div>
              <div class="form-group col-md-12">
                <label for="Alamat">Alamat Siswa</label>
                <input type="text" class="form-control dfc" name="alamat" placeholder="Alamat Siswa">
              </div>
              <div class="form-group col-md-12">
              <input type="submit" name="submitdata" class="btn btn-dark col-md-12">
              </div>
            </form>
	   </div>
	</div>
</body>
</html>