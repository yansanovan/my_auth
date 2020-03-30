
<li>
	<a href="<?= base_url('admin');?>" style="margin-bottom: 20px">
	 Back
	</a>
</li>
<p>Register a new membership</p>
<?= $this->session->flashdata('msgbox');?>
<?= form_open();?>
<div>
	<?= form_label('username', 'username');?>
	<?= form_input(['type'=>'text', 'name' => 'username', 'value'=> set_value("username"), 'placeholder'=>'username']);?>
	<?= form_error('username')?>
</div>
<div>
	<?= form_label('email', 'email');?>
	<?= form_input(['type'=>'email', 'name' => 'email', 'value'=> set_value("email"), 'placeholder'=>'Email']);?>
	<?= form_error('email')?>
</div>
<div>
	<?= form_label('role', 'role');?>
	<?= form_dropdown('role', $role, set_value('role'), 'class="form-control"');?>
	<?= form_error('role');?>
</div>
<div>
	<?= form_label('password', 'password');?>
	<?= form_input(['type'=>'password', 'name' => 'password', 'autocomplete'=>'off', 'placeholder'=>'password']);?>
	<?= form_error('password');?>
</div>
<div>
	<?= form_label('confirm password', 'confirm password');?>
	<?= form_input(['type'=>'password', 'name' => 'confirm_password', 'autocomplete'=>'off', 'placeholder'=>'confirm password']);?>
	<?= form_error('confirm_password');?>
</div>
	<button type="submit">Register</button>
<?= form_close();?>
</div>
