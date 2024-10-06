<?php
ob_start();
require_once('../db/init.php');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>       
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Xsales</title>

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="changecss/alt.css">
        <link rel="icon" type="image/x-icon" href="image/logo.jpg">

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="../js/scripts.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        
    </head>
    
    <body>            
     <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #006280!important;">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Xsales</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link text-white" href="index.php"><i class='fa fa-shopping-cart'></i>3</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="cust_signin.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    