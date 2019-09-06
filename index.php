<?php
  include_once("assets/php/config.php");
  //error_reporting(0);
  //ini_set('display_errors', 0);
?>
<?php
    $data_siswa = mysqli_query($mysqli, "SELECT * FROM data_siswa ORDER BY NIS ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <!-- Bootstrap -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    
</head>
<body>
	<h2 class="text-center"> DATA SISWA </h2>
	<hr style="width: 20%;">
	<div class="container">
		<a href="tambah.php" class="btn btn-primary pull-right">
            <span class="glyphicon glyphicon-plus"></span> &nbspTambah Data Siswa
        </a>
    	<br><br>
    <div style="overflow-y:auto">
		<table class="table table-responsive table-bordered table-hover">
			<thead>
				<tr>
					<th style="vertical-align: middle;" class="text-center">NIS</th>
					<th style="vertical-align: middle;" class="text-center">Nama Siswa</th>
					<th style="vertical-align: middle;" class="text-center">Kelas</th>
					<th style="vertical-align: middle;" class="text-center">Alamat Siswa</th>
					<th style="vertical-align: middle;" class="text-center">Tempat Lahir</th>
					<th style="vertical-align: middle;" class="text-center">Tanggal Lahir</th>
					<th style="vertical-align: middle;" class="text-center">Nomor Telepon</th>
					<th style="vertical-align: middle;" class="text-center">&nbsp</th>
				</tr>
			</thead>
			<tbody>
			<?php
              while($user_data = mysqli_fetch_array($data_siswa)) {
              	$tgl_lahir = strtotime($user_data['tanggal_lahir']);
				$tgl_lahir = date("j F Y", $tgl_lahir);
                echo
                "<tr>",
                "<td style='vertical-align: middle;' class='text-center'>".$user_data['nis']."</td>",
                "<td style='vertical-align: middle;' class='text-center'>".$user_data['nama']."</td>",
                "<td style='vertical-align: middle;' class='text-center'>".$user_data['kelas']."</td>",
                "<td style='vertical-align: middle;'>".$user_data['alamat']."</td>",
                "<td style='vertical-align: middle;' class='text-center'>".$user_data['tempat_lahir']."</td>",
                "<td style='vertical-align: middle;' class='text-center'>".$tgl_lahir."</td>",
                "<td style='vertical-align: middle;' class='text-center'>".$user_data['no_telp']."</td>",
                "<td style='vertical-align: middle;' class='text-center'><a href='edit.php?nis=".$user_data['nis']."'class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></a> <a href='hapus.php?nis=".$user_data['nis']."' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a></td>",
                "</tr>";
              }
            ?>
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>