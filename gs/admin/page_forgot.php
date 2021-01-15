<?php
    include "../../conn.php";
    if(isset($_GET["url"])){
        $url = mysqli_real_escape_string($conn, $_GET["url"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot | Cek Paketan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<?php
  session_start();

  if(isset($_SESSION["pesan_aktivasi"])){
    echo "<script>
        alert('Cek email untuk aktivasi akun');
    </script>";
  }
?>
<?php
  if(isset($_SESSION["pesan_akun_aktif"])):
    $pesan_akun_aktif = $_SESSION["pesan_akun_aktif"];
?>
    <script>
        alert(" <?= $pesan_akun_aktif ?> ");
    </script>
<?php endif ?>
<?php
  unset($_SESSION["pesan_aktivasi"]);
  unset($_SESSION["pesan_akun_aktif"]);
?>


<div class="login-box">
  <div class="login-logo">
    <a href="adminlte/index2.html"><b>Lupa</b> Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="color: red;">
      <?php 
        if(isset($_SESSION["pesan"])){
          echo $_SESSION["pesan"];
          unset($_SESSION["pesan"]);
        } 
      ?>
      </p>

      <form action="process.php" method="post">
    
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password1" placeholder="Password 1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password2" placeholder="Password 2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="forgot_process" class="btn btn-primary btn-block">Ganti</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p></p>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="login.php" class="text-center">Already have an account ?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
