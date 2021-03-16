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



		$q_simpan="update penilaian set id_mahasiswa='".$id_mahasiswa."', id_mapel='".$id_mapel."', nilai='".$nilai."', tgl_ujian='".$tgl_ujian."' where id='".$_GET["id"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_penilaian.php");
	}

	$show="select * from penilaian where id='".$_GET["id"]."'";
	$query=mysql_query($show,$conn);
	$data=mysql_fetch_array($query);
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <style>
	  .btn-kembali {
    font-size: 15px;
    letter-spacing: 1px;
    padding: 10px -10px 10px;
    border-radius: 2rem;
    float: right;
    margin-right: 20px;
    position: absolute;
    right: 1px;
 }
 </style>
 </head>
 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-10 col-xl-9 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">

<a href="view_penilaian.php" class="btn btn-lg btn-danger btn-kembali text-uppercase font-weight-bolder">Kembali</a>
 <form method="post" action="edit_penilaian.php?id=<?php echo $data["id"];?>">
  <table>
			<tr>
				<td width='100%'>
					ID Mahasiswa : <input type="text" class="form-control mb-3" name="id_mahasiswa"  value='<? echo $data["id_mahasiswa"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					ID Mapel : <input type="text" class="form-control mb-3" name="id_mapel"  value='<? echo $data["id_mapel"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
				    Nilai : <input type="text" class="form-control mb-3" name="nilai"  value='<? echo $data["nilai"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					Tanggal Ujian : <input type="date" class="form-control mb-3" name="tgl_ujian"  value='<? echo $data["tgl_ujian"];?>'>
				</td>
			</tr>
			
<tr>
	<td colspan='3'>
		<input type="submit" name='simpan' value='simpan' class="btn btn-success"><i class="fa fa-save"></i></td>
  </tr>
  </table>	
 </form>
 </body>
</html>

