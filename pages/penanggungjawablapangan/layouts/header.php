<?php
  session_start();

  if(!isset($_SESSION['jabatan'])){
    header("location:".$lvl);
  }else {
    if(strtolower(str_replace(' ', '', $_SESSION['jabatan'])) != 'penanggungjawablapangan'){
      header("location:".$lvl);
    }
  }

  include $lvl."functions/config.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>PT. Hilal Mitra Perkasa </title>

    <!-- Bootstrap -->
    <link href="<?php echo $lvl?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $lvl?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $lvl?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo $lvl?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <?php css($lvl) ?>

    <!-- Custom Theme Style -->
    <link href="<?php echo $lvl?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>PT. Hilal Mitra Perkasa</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $lvl?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['nama_user'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li class="<?php echo $active[0]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li class="<?php echo $active[1]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/dataproyek"><i class="fa fa-desktop"></i> Data Proyek</a></li>
                  <li class="<?php echo $active[2]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/jadwal"><i class="fa fa-calendar"></i> Jadwal</a></li>
                  <li class="<?php echo $active[3]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/resiko"><i class="fa fa-bug"></i> Resiko</a></li>
                  <li class="<?php echo $active[4]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/biayaresiko"><i class="fa fa-money"></i> Biaya Resiko</a></li>
                  <li class="<?php echo $active[5]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/evaluasi"><i class="fa fa-bar-chart-o"></i> Evaluasi</a></li>
                  <li class="<?php echo $active[6]?>"><a href="<?php echo $lvl?>pages/penanggungjawablapangan/laporan"><i class="fa fa-book"></i> Laporan</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $lvl?>assets/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo $lvl?>functions/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
