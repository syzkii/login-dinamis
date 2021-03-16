<?php
	error_reporting(0);
	$conn = @mysql_connect("localhost","root","");
	@mysql_select_db("penilaian_mahasiswa", $conn);
	
	if ($_POST["simpan"]<>"")
	{
		$qry_insert = "insert into mata_pelajaran (mapel,id_jurusan) values('".$_POST["mapel"]."','".$_POST["id_jurusan"]."')";
		$insert = @mysql_query($qry_insert, $conn) or die (mysql_error());

		header("Location: view_matapelajaran.php"); 
	}
?>
<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:login.php");
} 
?>
<html lang="en">
 <head>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>
  <title>Tambah Data Mahasiswa</title>
  <style>
		td 
		{
			padding: 10px;
		}

		body
		{
			color: #555555;
			font-size: 15px; 
			font-weight: normal;
			font-family:  Segoe UI;
		}
  </style>
 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">
  <table cellpadding='0' cellspacing='0' width='100%' align='center'>
		<td>
			<h5>Mata Pelajaran</h5>
			<br>
			<table border="0" cellpadding='5' class='table table-bordered'>
			<form method="POST" action="add_matapelajaran.php" >
			<tr>
				<td width='50%'>
					<strong>Mapel : </strong><input type="text" class="form-control" name="mapel">
				</td>
			</tr>
            <tr>
				<td width='50%'>
					<strong>ID Jurusan : </strong><input type="text" class="form-control" name="id_jurusan">
				</td>
			</tr>

			<tr>
				<td width='50%'>
					<input type="submit" value="simpan" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>
					<form>
					<input type="button" class="btn btn-danger fa fa-trash-o" value="Kembali" onclick="window.location.href='view_matapelajaran.php'" />
					</form>
				</td>
			</tr>
			</form>
			</table>
		</td>
	</tr>
  </table>
 </body>
</html>