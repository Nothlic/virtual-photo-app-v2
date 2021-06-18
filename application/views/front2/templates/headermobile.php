<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo base_url() ?>assets/assetsfront2/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7COpen+Sans:400,600,700%7CSource+Code+Pro:300,400,500,600,700,900%7CNothing+You+Could+Do%7CPoppins:400,500">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront2/css/fonts.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront3/css/stylee.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront3/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/assetsfront3/css/philipscss.css?v=1.1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background : url('<?php echo base_url()?>assets/assetsfront3/images/bgPhilips.png')  no-repeat fixed right">
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
    </div>
  </div>

  <div class="page">
    <!-- Page Header-->
    <nav class="navbar navbar-expand-lg navbar-dark philips-color-custom">
      <div class="row">
        <button class="navbar-toggler" style="border-color:transparent" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <a class="nav-link nav-link-custom"><i class="fas fa-user-circle" style="font-style:normal !important"></i> &nbsp; <?php echo $user['name'] ?></a>
        </button>
        <div class="navbar-toggler navbar-custom">
          <a class="nav-link nav-link-custom">Philips 3D Printed Webinar 2020 <span class="sr-only">(current)</span></a>
        </div>
      </div>
   
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <!-- <a class="navbar-brand" href="#"></a> -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active hidden-content-mob">
            <a class="nav-link ml-5" href="#">Philips 3D Printed Webinar 2020 <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form method="post" action="<?= base_url('auth/logout'); ?>" class="form-inline my-2 my-lg-0 form-content ">
          <input type="text" id="id" name="id" value="<?php echo $user['id'] ?>" hidden>
          <a class="nav-link hidden-content-mob" style="color:white"><i class="fas fa-user-circle" style="font-style:normal !important"></i> &nbsp; <?php echo $user['name'] ?></a>
          <button class="btn btn-primary my-2 my-sm-0 btn-logout-custom " type="submit">Logout</button>
        </form>
      </div>
    </nav>