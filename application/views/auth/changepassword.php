<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | change password</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/Ionicons/css/ionicons.min.css');?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css');?>">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url('asset/plugins/iCheck/square/blue.css');?>">
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<b>Form</b> Reset Password
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Fill New Password</p>
		<?= $this->session->flashdata('msgbox');?>
		<?= form_open();?>
			<div class="form-group <?= form_error('new_password') ? 'has-error': null ?>">
				<?= form_input(['type'=>'password', 'name' => 'new_password', 'value'=> set_value("new_password"), 'class'=>'form-control', 'placeholder'=>'new_password']);?>
				<?= form_error('new_password')?>
			</div>
			<div class="form-group <?= form_error('confirm_password') ? 'has-error': null?>">
				<?= form_input(['type'=>'password', 'name' => 'confirm_password', 'autocomplete'=>'off', 'class'=>'form-control', 'placeholder'=>'confirm_password']);?>
				<?= form_error('confirm_password');?>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<button type="submit" name="change_password" value="true" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
				</div>
			</div>
		<?= form_close();?>
	</div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('asset/plugins/iCheck/icheck.min.js');?>"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});


	window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(300, function(){
					$(this).remove(); 
			});
	}, 2000);

</script>
</body>
</html>
