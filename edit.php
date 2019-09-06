<?php
  include_once("assets/php/config.php");
  //error_reporting(0);
  //ini_set('display_errors', 0);
?>
<?php
    if (isset($_POST['submitdata'])) {
        $nis = $_GET['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $no_telp = $_POST['no_telp'];
        $result = mysqli_query($mysqli, "UPDATE data_siswa SET nama='$nama', kelas='$kelas', alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_telp='$no_telp' WHERE nis=$nis");
        header('Location: index.php');
        if (!$result) {
            die('Invalid query: ' . mysqli_error($mysqli));
        }
    }
    $nis = $_GET['nis'];
    $data_siswa = mysqli_query($mysqli, "SELECT * FROM data_siswa WHERE nis = $nis");
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
	<h2 class="text-center"> UBAH DATA SISWA </h2>
	<hr style="width: 20%;">
	<div class="container" style="border: 2px solid white; border-radius: 10px;">
    <?php
        while($user_data = mysqli_fetch_array($data_siswa)) {
          echo
          '<div class="row">',
            '<form action="edit.php?nis='.$nis.'" method="post" style="padding: 12px;">',
              '<div class="form-group col-md-2">',
                '<label for="NIS">NIS</label>',
                '<input maxlength="10" type="number" class="form-control dfc" name="nis" placeholder="NIS" value="'.$user_data["nis"].'" disabled>',
             '</div>',
              '<div class="form-group col-md-6">',
                '<label for="Nama">Nama Siswa</label>',
                '<input type="text" class="form-control dfc" name="nama" placeholder="Nama Siswa" value="'.$user_data["nama"].'">',
              '</div>',
              '<div class="form-group col-md-4">',
                '<label for="Kelas">Kelas</label>',
                '<input maxlength="12" type="text" class="form-control dfc" name="kelas" placeholder="Kelas" value="'.$user_data["kelas"].'">',
              '</div>',
              '<div class="form-group col-md-6">',
                '<label for="Tempat Lahir">Tempat Lahir</label>',
                '<input type="text" class="form-control dfc" name="tempat_lahir" placeholder="Tempat Lahir" value="'.$user_data["tempat_lahir"].'">',
              '</div>',
              '<div class="form-group col-md-2">',
                '<label for="Tanggal Lahir">Tanggal Lahir</label>',
                '<input type="date" class="form-control dfc" name="tanggal_lahir" placeholder="Tanggal Lahir" value="'.$user_data["tanggal_lahir"].'">',
              '</div>',
              '<div class="form-group col-md-4">',
                '<label for="Nomor Telepon">Nomor Telepon</label>',
                '<input maxlength="15" type="number" class="form-control dfc" name="no_telp" placeholder="Nomor Telepon" value="'.$user_data["no_telp"].'">',
              '</div>',
              '<div class="form-group col-md-12">',
                '<label for="Alamat">Alamat Siswa</label>',
                '<input type="text" class="form-control dfc" name="alamat" placeholder="Alamat Siswa" value="'.$user_data["alamat"].'">',
              '</div>',
              '<div class="form-group col-md-12">',
              '<input type="submit" name="submitdata" class="btn btn-dark col-md-12">',
              '</div>',
            '</form>',
          '</div>';
        }
    ?>

	</div>
</body>
</html>