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
	<!-- AdminLTE Skins. Choose a skin from the css/skins -->
	<link rel="stylesheet" href="<?php echo base_url('asset/dist/css/skins/_all-skins.min.css');?>">
	<!-- Tinymce-->
	<script src="https://cdn.tiny.cloud/1/yoj8vphh5duzpjnhguky9m4yz2pc8n78krh4iftcwgngu1du/tinymce/5/tinymce.min.js"></script>
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<!-- fancy box css -->
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<!-- css stle -->
	<style type="text/css">
		textarea#mentions {
		  height: 350px;
		}

		#panel_height {
		  height: 450px;
		}

		div.card,
		.tox div.card {
		  width: 240px;
		  background: white;
		  border: 1px solid #ccc;
		  border-radius: 3px;
		  box-shadow: 0 4px 8px 0 rgba(34, 47, 62, .1);
		  padding: 8px;
		  font-size: 14px;
		  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
		}

		div.card::after,
		.tox div.card::after {
		  content: "";
		  clear: both;
		  display: table;
		}

		div.card h1,
		.tox div.card h1 {
		  font-size: 14px;
		  font-weight: bold;
		  margin: 0 0 8px;
		  padding: 0;
		  line-height: normal;
		  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
		}

		div.card p,
		.tox div.card p {
		  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
		}

		div.card img.avatar,
		.tox div.card img.avatar {
		  width: 48px;
		  height: 48px;
		  margin-right: 8px;
		  float: left;
		}

	.spdp .badge {
	  position: absolute;
	  top: -8px;
	  right: -8px;
	  padding: 5px 10px;
	  border-radius: 50%;
	  background: rgb(242, 171, 48);
	  color: white;
	}

	#warna{
		background-color: rgb(130, 125, 122);
		/*pointer-events: none;*/
		color:white;
	}

	.warna_apl_dibalas{
		background-color: rgb(100, 49, 117);
		/*pointer-events: none;*/
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
		<span class="logo-lg"><b><img src="<?= base_url('asset/img/apps.png');?>" width="30px"> APPS CJS</b> </span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">		
				<li class="dropdown notifications-menu">
					<?php if ($this->session->userdata('level') == 'kepolisian') : ?>
						<a href="#" class="read_notification_police" data-toggle="dropdown">
							Notification <i class="fa fa-bell-o"></i>  <span class="label label-danger count_police"></span> 
						</a>
						<ul class="dropdown-menu" id="notify_to_police"></ul>
					<?php endif; ?>
					<?php if ($this->session->userdata('level') == 'kejaksaan') : ?>
						<a href="#" class="read_notification_judicary" data-toggle="dropdown">
							Notification <i class="fa fa-bell-o"></i>  <span class="label label-danger count_judiciary"></span> 
						</a>
						<ul class="dropdown-menu" id="notify_to_judicary"></ul>
					<?php endif;?> 
				</li>
				<li class="dropdown user user-menu" >
					<a href="#" class="profile" data-toggle="dropdown">
						<?php $data = $this->db->get_where('tbl_users', array('id'=> $this->session->userdata('id')))->row();?>
						<img src="<?= base_url('asset/img/'.$data->image)?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?= $data->username;?></span>
					</a>
					<ul class="dropdown-menu" id="profile">
						<!-- User image -->
						<li class="user-header">
							<img  src="<?= base_url('asset/img/'.$data->image);?>" class="img-circle" alt="User Image">
							<p>
								<?= $data->email?>
								<small>level : <?= $data->level?></small>
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
