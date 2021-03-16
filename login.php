<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container-fluid">
  <form method="post" action="logincek.php">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4"><strong>Login Mahasiswa</h3></strong>
              <form action="logincek.php" method="POST">
                <div class="form-label-group">
                  <td>Username</td>
                  <td><input type="text" name="username" class="form-control mb-2" required autofocus></td>
                </div>
                <div class="form-label-group">
                <td>Password</td>
                  <td><input type="password" name="password" class="form-control mb-5" required></td>
                </div>
  
                <button class="btn btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
              </form>
              <?php if(isset($_GET['pesan'])) {  ?>
                  <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
              <?php } ?>	
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>