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
		$fakultas=$_POST["fakultas"];

		$q_simpan="update fakultas set fakultas='".$fakultas."' where id='".$_GET["id"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_fakultas.php");
	}

	$show="select * from fakultas where id='".$_GET["id"]."'";
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

<a href="view_fakultas.php" class="btn btn-lg btn-danger btn-kembali text-uppercase font-weight-bolder">Kembali</a>
 <form method="post" action="edit_fakultas.php?id=<?php echo $data["id"];?>">
  <table>
			<tr>
				<td width='100%'>
					Fakultas : <input type="text" class="form-control mb-3" name="fakultas"  value='<? echo $data["fakultas"];?>'>
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

