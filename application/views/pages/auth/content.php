<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/Ionicons/css/ionicons.min.css');?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('asset/dist/css/AdminLTE.min.css');?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/iCheck/square/blue.css');?>">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href=""><b>Form </b>Login</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Entry Your E-mail & Password</p>
		<?= $this->session->flashdata('msgbox');?>
		<?= form_open();?>
			<div class="form-group has-feedback">
				<input type="email"  name="email" value="<?= set_value('email');?>" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<?= form_error('email');?>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?= form_error('password');?>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
				</div>
			</div>
		<?= form_close();?>
		<br><i class="fa fa-key"></i><a href="<?= base_url('forgot');?> "> Forgot Password</a><br>
	</div>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?= base_url('asset/plugins/iCheck/icheck.min.js');?>"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});


	  window.setTimeout(function() {
	      $(".auth_validate").fadeTo(500, 0).slideUp(700, function(){
	          $(this).remove(); 
	      });
	  }, 3000);

	window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(300, function(){
					$(this).remove(); 
			});
	}, 2000);

</script>
</body>
</html>
