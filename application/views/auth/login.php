<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
</head>
<body>
<div>
	<div>
		<a href=""><b>Form </b>Login</a>
	</div>
	<div>
		<p >Entry Your E-mail & Password</p>
		<?= $this->session->flashdata('msgbox');?>
		<?= form_open();?>
			<div>
				<?= form_input(['type'=>'email', 'name' => 'email', 'value'=> set_value("email"), 'placeholder'=>'Email']);?>
				<?= form_error('email')?>
			</div>
			<div>
				<?= form_input(['type'=>'password', 'name' => 'password', 'autocomplete'=>'off', 'placeholder'=>'password']);?>
				<?= form_error('password');?>
			</div>
			<div> 			
				<div>
					<button type="submit"> Login</button>
				</div>
			</div>
		<?= form_close();?>
		<br><a href="<?= base_url('login/forgot');?> "> Forgot Password</a>
	</div>
</div>
</body>
</html>
