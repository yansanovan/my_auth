<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Forgot Password</title>
</head>
<body>
<div>
	<div>
		<b>Form </b>Forgot Password
	</div>
	<div>
		<p>Please Entry Your E-mail</p>
		<?php echo $this->session->flashdata('msgbox');?>  
		<?= form_open();?>
			<div>
				<?= form_input(['type'=>'email', 'name' => 'email', 'value'=> set_value("email"), 'placeholder'=>'Email']);?>
				<?= form_error('email');?>
			</div>
			<div>
				<div>
					<button type="submit">Submit</button>
				</div>
			</div>
		<?= form_close();?>
		<br><a href="<?= site_url('login');?>" >Login</a>
	</div>
</div>
</body>
</html>
