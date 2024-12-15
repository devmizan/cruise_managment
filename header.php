<?php session_start();
  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("libraries/library.php");
  require_once("models/model.php");
  require_once("controllers/controller.php");
  
  if(!isset($_SESSION["uid"])) header("location:$base_url");
  $uid=$_SESSION["uid"];
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template">
  <meta name="keywords"
    content="admin template, ra-admin admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="la-themes">
  <link rel="icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">
  <title>Cruise Management</title>

  <!-- Animation css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/animation/animate.min.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">

  <!-- wheather icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/weather/weather-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/weather/weather-icons-wind.css">

  <!--flag Icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/flag-icons-master/flag-icon.css">

  <!-- tabler icons-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/tabler-icons/tabler-icons.css">

  <!-- prism css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/prism/prism.min.css">

  <!-- apexcharts css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/apexcharts/apexcharts.css">

  <!-- glight css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/glightbox/glightbox.min.css">

  <!-- slick css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/slick/slick.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/slick/slick-theme.css">

  <!-- Data Table css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/datatable/jquery.dataTables.min.css">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/bootstrap/bootstrap.min.css">

  <!-- vector map css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/vector-map/jquery-jvectormap.css">

  <!-- apexcharts css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/apexcharts/apexcharts.css">

  <!-- simplebar css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/simplebar/simplebar.css">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/style.css">

  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/responsive.css">
  
  <!-- Font Awesome css-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- editor css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/trumbowyg/trumbowyg.min.css">


</head>

<body>
  <div class="app-wrapper">
<!-- 
    <div class="loader-wrapper">
      <div class="loader_16"></div>
    </div> -->
    
<?php include("views/layout/main_sidebar.php");?>
<div class="app-content">
<div class="">
<?php include("views/layout/navbar.php");?>
<main>
    <div class="container-fluid">
      <div class="row">
    