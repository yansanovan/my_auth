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

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
  <a href="" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
    <span class="logo-lg">
      <?php if($this->session->userdata('level') =='kejaksaan')
      {
        echo "<b> Kejaksaan </b>";
      }
      else if ($this->session->userdata('level') =='kepolisian') 
      {
        echo "<b> Kepolisian </b>";
      }
      else if ($this->session->userdata('level') =='pengadilan') 
      {
        echo "<b> Pengadilan </b>";
      }
      else if ($this->session->userdata('level') =='lapas') 
      {
        echo "<b> Lapas </b>";
      }
      else if ($this->session->userdata('level') =='superadmin') 
      {
        echo "<b> Superadmin </b>";
      }
      ;?>
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
            <span class="hidden-xs"></span>
          </a>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $this->session->userdata('email');?>
            </a>
          </li>
        </li>
      </ul>
    </div>
  </nav>
</header>

