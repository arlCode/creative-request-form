<!DOCTYPE html>
<div class="lightbox">
  <div class="container">
      <div class="asset-display">
        <img src="#" />
      </div>
  </div>
</div>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="../assets/css/style.css" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <link href="http://adblot.com/images/faviablot.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.5.2/dom-to-image.js"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
    <script>
      var OneSignal = window.OneSignal || [];
      OneSignal.push(["init", {
        appId: "f4c8ce84-0573-4049-8e30-b4ab810cff47",
        autoRegister: true, /* Set to true to automatically prompt visitors */
        httpPermissionRequest: {
          enable: true
        },
        notifyButton: {
            enable: true /* Set to false to hide */
            
        }
      }]);
    </script>
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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
    </div><!-- /.container-fluid -->
  </nav>
  </div>
</div>
<?php

require('../model/variables.php');

// TODO: Create Header 
?>