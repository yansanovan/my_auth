<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Lupa Password</title>
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
		<b>Form </b>Forgot Password
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Please Entry Your E-mail</p>
		<?= $this->session->flashdata('msgbox');?>  
		<?= form_open();?>
			<div class="form-group has-feedback">
				<input type="email"  name="email" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<?= form_error('email');?>
			<div class="row">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
				</div>
			</div>
		<?= form_close();?>
		<br><i class="fa fa-sign-in"></i> <a href="<?= site_url('auth');?>" >Login</a>
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
	  $(".alert").fadeTo(500, 0).slideUp(300, function(){
		  $(this).remove(); 
	  });
  }, 2000);

</script>
</body>
</html>
