<!DOCTYPE html>
<div class="lightbox">
  <div class="container">
    <div class="asset-display">
      <img src="#" />
    </div>
  </div>
</div>

<head>
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="../assets/js/jquery.min.js" ></script>
  <link href="http://adblot.com/images/faviablot.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="../assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.5.2/dom-to-image.js"></script>

</head>
<?php require('assetloader.php'); ?>

<?php require('sidebar.php'); ?>



<div class="navbar-wrapper">
  <div class="sidebar-button">
    <span class="glyphicon glyphicon-menu-hamburger"></span>
  </div>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="#"><img src='../assets/img/logo.jpg' width='120' style="margin-right:10px;" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="navbar-view-controls" id="submitARequest" data-target="#post-data" data-toggle="modal"><a href="#submitARequest">Submit A Request</span></a></li>
            <li class="navbar-view-controls" id="generateAssets" data-target="#headline-modal" data-toggle="modal"><a href="#generateAssets">Generate Assets</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="update-top-creatives"><a>Update Top Creatives</a></li>
          </ul>
        </div>
        <!-- /.container-fluid -->
    </nav>
    </div>
  </div>
  <?php

require('../model/variables.php');

// TODO: Create Header 
?>