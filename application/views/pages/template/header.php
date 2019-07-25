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
	#warna{
		background-color: rgb(130, 125, 122);
		/*pointer-events: none;*/
		color:white;
	}

	.warna_apl_dibalas{
		background-color: rgb(100, 49, 117);
		pointer-events: none;
		color:white;
	}
	.apl_pn{
		background-color: rgb(240, 92, 0);
		/*pointer-events: none;*/
		color:white;
	}
	.breadcrumb-color  {
	 color: black;
	}
	 
	/*.jumbotron{
		color: white;
		background-color:rgb(71, 163, 254);
	}*/

	.jumbotron{
		color: black;
		background-color:white;
	}
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
		<span class="logo-lg"><b><i class="fa fa-envelope"></i> APLIKASI SURAT</b> </span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php if ($this->session->userdata("level") == "kepolisian") {?>
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
					</a>
					<ul class="dropdown-menu" id="notifikasi"></ul>
				</li>
				<?php } ?>
				
				<?php  if ($this->session->userdata("level") == "kejaksaan"){ ?>
				 <li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
					</a>
					<ul class="dropdown-menu" id="kepolisian_kj"></ul>
				</li>

				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bullhorn"></i><span class="label label-danger hitung_surat_kj_dibalas_pn"></span> 
					</a>
					<ul class="dropdown-menu" id="surat_kj_dibalas_pn"></ul>
				</li>
				<?php } ?>

				<?php if ($this->session->userdata("level") == "pengadilan") { ?>
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i><span class="label label-danger count"></span> 
						</a>
						<ul class="dropdown-menu" id="kepolisian_pn"></ul>
					</li>

					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i><span class="label label-danger"></span> 
						</a>
						<ul class="dropdown-menu"></ul>
					</li> 
				<?php } ?>

				<?php  if ($this->session->userdata("level") == "kejaksaan" OR $this->session->userdata("level") == "kepolisian" OR $this->session->userdata("level") == "pengadilan"){ ?>
						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i><span class="label label-danger count_bon"></span> 
							</a>
							<ul class="dropdown-menu" id="bon_balasan"></ul>
						</li> 
				<?php } ?>

				<?php  if ($this->session->userdata("level") == "lapas"){ ?>
				 <li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Bon <i class="fa fa-bell-o"></i><span class="label label-danger count"></span> 
					</a>
					<!-- <input type="hidden" name="csrf" id="csrf_token"> -->
					<ul class="dropdown-menu" id="bon_masuk"></ul>
				</li>
				<?php } ?>
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-flag-o"></i><span class="label label-danger"></span> 
					</a>
					<ul class="dropdown-menu" id="apl">
						hahaha
					</ul>
				</li>
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php
							$this->db->where('id', $this->session->userdata('id'));
							$image = $this->db->get('tbl_users')->row();
						?>
						<img src="<?= base_url('asset/img/'.$image->image)?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?= $this->session->userdata('username');?></span>
					</a>
					<ul class="dropdown-menu" id="profile">
						<!-- User image -->
						<li class="user-header">
							<img  src="<?= base_url('asset/img/'.$image->image);?>" class="img-circle" alt="User Image">

							<p>
								<?= $this->session->userdata('email');?>
								<small>level : <?= $this->session->userdata('email');?></small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?= base_url('profile');?>" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?= base_url('auth/sign_out');?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>

