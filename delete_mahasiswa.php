<?
	error_reporting(0);
  $conn = @mysql_connect("localhost","root","");
  @mysql_select_db("penilaian_mahasiswa", $conn);

  $str_hapus = "delete from mahasiswa where id='".$_GET["id"]."'";
  $qry_hapus = @mysql_query ($str_hapus, $conn);

  header("Location: view_mahasiswa.php"); 
?>