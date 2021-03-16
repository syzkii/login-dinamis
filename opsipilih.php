<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:login.php");
} 
?>
<html>
<head>
    <link rel="stylesheet" href="opsipilih.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script>
  function fakultas(){
    location.replace("view_fakultas.php")
  }

  function jurusan(){
    location.replace("view_jurusan.php")
  }

  function mahasiswa(){
    location.replace("view_mahasiswa.php")
  }

  function matapelajaran(){
    location.replace("view_matapelajaran.php")
  }

  function penilaian(){
    location.replace("view_penilaian.php")
  }
</script>
<title>Pilih Opsi</title>
</head>
<body>
    <div class="container">
          <div class="row">
              <div class="col-lg-10 col-xl-9 mx-auto">
                  <div class="card card-signin flex-row my-5">
                      <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
                       </div>
                           <div class="card-body mr-5">
                             <h4>Pilih?</h4>
                             <br>
                              <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-lighter mb-1" onclick="fakultas()" type="submit">Fakultas</button>
                                <br>
                              <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-lighter mb-1" onclick="jurusan()" type="submit">Jurusan</button>
                              <br>
                              <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-lighter mb-1" onclick="mahasiswa()" type="submit">Mahasiswa</button>
                              <br>
                              <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-lighter mb-1" onclick="matapelajaran()" type="submit">Mata pelajaran</button>
                              <br>
                              <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-lighter mb-1" onclick="penilaian()" type="submit">Penilaian</button>
                              
                           </div>
                       </form>
                   </div>
               </div>
            </div>
        </div>
      </div>
    </body>
</html>
