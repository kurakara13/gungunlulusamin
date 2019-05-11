<?php
  session_start();

  include "functions/config.php";
  if(isset($_SESSION['username'])){
    header("location:pages/".strtolower(str_replace(' ', '', $_SESSION['jabatan']))."/");
  }else if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $login = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
    $result = mysqli_fetch_array($login);
    $cek = mysqli_num_rows($login);

    if($cek > 0){
    	session_start();
      $_SESSION['id'] = $result['id'];
      $_SESSION['username'] = $result['username'];
      $_SESSION['nama_user'] = $result['nama_user'];
      $_SESSION['email'] = $result['email'];
    	$_SESSION['jabatan'] = $result['jabatan'];

    	header("location:pages/".strtolower(str_replace(' ', '', $result['jabatan']))."/");
    }else{
    	header("location:index.php");
    }
  }


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> PT. Hilal Mitra Perkasa </h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
