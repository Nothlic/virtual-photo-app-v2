<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Home</title>

  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo base_url() ?>assets/assetsfront2/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7COpen+Sans:400,600,700%7CSource+Code+Pro:300,400,500,600,700,900%7CNothing+You+Could+Do%7CPoppins:400,500">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront2/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront2/css/fonts.css?v=1.3">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront2/css/style.css?v=2.8">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront2/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="css/site.css" />
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
    </div>
  </div>
  <div class="page">
    <!-- Page Header-->
    <header class="section page-header">
      <!--RD Navbar-->
      <div class="rd-navbar-wrap" style="position: absolute;">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
              <!--RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!--RD Navbar Toggle-->
                <!--RD Navbar Brand-->
                <div class="container">
                  <center>
                    <a class="brand" href="#" style="font-size:small;font-family:centraleregular; margin-bottom: -25px;"><b>Philips HUE Virtual Gathering 2020</b></a>
                  </center>

                  <a class="rd-nav-item" style="color:white;font-size:xx-small"><i class="fas fa-user-circle"></i> <?php echo $user['name'] ?></a>
                </div>
                <div class="rd-navbar-brand" style="background-color:transparent">

                </div>

              </div>
              <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
          
                  </ul>
                </div>
              </div>
              <div class="rd-navbar-collapse">
                <ul class="socialite-list" style="background-color:white;">
                  <!--<li class="rd-nav-item" style="color:black"><a><i><?php echo $user['name'] ?></i></a></li>-->
                  <li id="logout" class="rd-nav-item">
                    <form class="user" method="post" action="<?= base_url('auth/logout'); ?>">
                      <input type="text" class="form-control form-control-user" id="id" name="id" value="<?php echo $user['id'] ?>" hidden>

                      <button class="rd-nav-link" style="color:white;background-color:black;border:none">
                        <b>Logout</b>
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>