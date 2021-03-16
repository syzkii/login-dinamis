<?
	error_reporting(0);

	//KONEKSI PHP MYSQL
	$database="penilaian_mahasiswa";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);

	if ($_POST["simpan"])
	{
		//SIMPAN DATA

        $id_mahasiswa=$_POST["id_mahasiswa"];
        $id_mapel=$_POST["id_mapel"];
        $nilai=$_POST["nilai"];
        $tgl_ujian=$_POST["tgl_ujian"];


		$q_simpan="insert into penilaian (id_mahasiswa,id_mapel,nilai,tgl_ujian) values ('".$id_mahasiswa."','".$id_mapel."','".$nilai."','".$tgl_ujian."')";
		$sql_simpan = mysql_query($q_simpan, $conn);
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
<!doctype html>
<html lang="en">
 <head>
 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Mahasiswa</title>
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

		.btn-kere {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-left: 100px;
			position: absolute;
			left: 560px;
			top: 30px;
		}

		.btn-kere2 {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: -1px;
			top: 30px;
		}

		.btn-kere3 {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: 720px;
			top: 30px;
		}

		.btn-kanan {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 10px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: 390px;
			top: 150px;
		}
  </style>
 </head>
 <body>
 <div class="container">
 <footer class="bg-light text-center text-lg-start"></footer>
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">
  <table cellpadding='0' cellspacing='0' width='100%' align='center'>
	<tr>
		<td width='100%'>
			<br><br>
			<table width='100%'>
			<form method='post' action='view_penilaian.php'>
			<tr>
				<td>Cari Data
				<br><br>
				<input type="text" class="form-control mb-3" name="keyword" size="50" placeholder=" Cari data.."  title="cari data.."></td>
				<br>
				<input type="submit" name="cari" class='btn btn-dark btn-kanan' value="Search" title="cari"></td>
				<td >
				<?

				$sql = " select * from penilaian ";
				$qry = mysql_query($sql);
		
				?>
				</td>
				<td width='50%' align='left'>
					<a href='opsipilih.php' class='btn btn-dark btn-kere'><i class="fa fa-bars">Menu</a></i>
					<a href="logout.php" class="btn btn-lg btn-danger btn-kere3 text-uppercase font-weight-bold mb-2">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
					<a href='add_penilaian.php' class='btn btn-dark btn-kere2'><i class="fa fa-address-book-o">Tambah Data</a></i>
				</td>
			</tr>
			</form>
			</table>
			<br>
			<TABLE width='100%' cellspacing='0' cellpadding='5' border='0'' class='table table-striped table-dark'>
				<thead>
				<TR>
					<th><center>ID</th>
                    <th><center>ID Mahasiswa</th>
                    <th><center>ID Mapel</th>
                    <th><center>Nilai</th>
                    <th><center>Tanggal Ujian</th>
					<th><center>Opsi</th>
				</TR>
				</thead>
				<?
			if($_POST["cari"])
			{
				$sql_cari = "where (id like '%".$_POST["keyword"]."%' or id_mahasiswa like '%".$_POST["keyword"]."%' or id_mapel like '%".$_POST["keyword"]."%' or nilai like '%".$_POST["keyword"]."%' or tgl_ujian like '%".$_POST["keyword"]."%') ";
			}
			$result = mysql_query("SELECT * FROM penilaian");

			$show = " select * from penilaian ".$sql_cari." ORDER BY id ";
			$query = mysql_query($show, $conn);
			
			while ($data = mysql_fetch_assoc($query))
					{
				?>
				<TR>
					<TD align='center'><?php echo $data["id"];?></TD>
					<TD align='center'><?php echo $data["id_mahasiswa"];?></TD>
                    <TD align='center'><?php echo $data["id_mapel"];?></TD>
                    <TD align='center'><?php echo $data["nilai"];?></TD>
                    <TD align='center'><?php echo $data["tgl_ujian"];?></TD>
					<TD><center>
						<a href='edit_penilaian.php?id=<?php echo $data["id"]; ?>' class="btn btn-warning"><i class="fa fa-edit">Edit</a></i>
						<a href='delete_penilaian.php?id=<?php echo $data["id"]; ?>' class="btn btn-danger"><i class="fa fa-eraser">Delete</a></i>
					</TD>
				</TR>				
				<?
					}
				?>
		</td>
	</tr>
  </table>
  <div class="footer">
  	<div class="text-center mt-5">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0);">
     2021 All Rights Reserved By
    <a href="#">RifkiArdian </p></a>
  </div>
</div>
</footer>
 </body>
</html>
