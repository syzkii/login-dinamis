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
		$nim=$_POST["nim"];
        $nama=$_POST["nama"];
        $alamat=$_POST["alamat"];
		$no_telp=$_POST["no_telp"];
		$no_hp=$_POST["no_hp"];
		$hobi=$_POST["hobi"];
		$id_jurusan=$_POST["id_jurusan"];



		$q_simpan="update mahasiswa set nim='".$nim."', nama='".$nama."', alamat='".$alamat."', no_telp='".$no_telp."', no_hp='".$no_hp."', hobi='".$hobi."', id_jurusan='".$id_jurusan."' where id='".$_GET["id"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_mahasiswa.php");
	}

	$show="select * from mahasiswa where id='".$_GET["id"]."'";
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

<a href="view_mahasiswa.php" class="btn btn-lg btn-danger btn-kembali text-uppercase font-weight-bolder">Kembali</a>
 <form method="post" action="edit_mahasiswa.php?id=<?php echo $data["id"];?>">
  <table>
			<tr>
				<td width='100%'>
					NIM : <input type="text" class="form-control mb-3" name="nim"  value='<? echo $data["nim"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					Nama : <input type="text" class="form-control mb-3" name="nama"  value='<? echo $data["nama"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
				    Alamat : <input type="text" class="form-control mb-3" name="alamat"  value='<? echo $data["alamat"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					NO Telp : <input type="text" class="form-control mb-3" name="no_telp"  value='<? echo $data["no_telp"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					NO HP : <input type="text" class="form-control mb-3" name="no_hp"  value='<? echo $data["no_hp"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					Hobi : <input type="text" class="form-control mb-3" name="hobi"  value='<? echo $data["hobi"];?>'>
				</td>
			</tr>
            <tr>
				<td width='100%'>
					ID Jurusan : <input type="text" class="form-control mb-3" name="id_jurusan"  value='<? echo $data["id_jurusan"];?>'>
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

