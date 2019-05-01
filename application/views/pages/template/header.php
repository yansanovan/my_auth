<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">

    <!-- jquery ui-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('asset/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- DataTables-->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/skins/_all-skins.min.css');?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
  <style type="text/css">
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
  <a href="" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
    <span class="logo-lg">
      <?php if($this->session->userdata('level') =='kejaksaan')
      {
      ?>
      <b> Kejaksaan </b>
      <?php
      }
      else if ($this->session->userdata('level') =='kepolisian') 
      {
      ?>
      <b> Polisi </b>
      <?php
      }
      else if ($this->session->userdata('level') =='pengadilan') 
      {
      ?> 
      <b> Pengadilan </b>
      <?php
      }
      else if ($this->session->userdata('level') =='lapas') 
      {
      ?>
      <b> Lapas </b>
      <?php
      }
      else if ($this->session->userdata('level') =='superadmin') 
      {
      ?> <b> Superadmin </b>;
      <?php
      }
      ?>
    </span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('asset/img/avatar.png');?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $this->session->userdata('username');?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                <?= $this->session->userdata('email');?>
                <small>Level : <?= $this->session->userdata('level');?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= base_url('profile');?>" class="btn btn-default btn-flat"> <i class="fa fa-user"></i> Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url('auth/sign_out');?>" class="btn btn-default btn-flat"  onclick="return confirm('Mau Logout?')"> 
                  <i class="fa fa-sign-out"></i>Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

