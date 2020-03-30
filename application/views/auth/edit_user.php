
<li>
	<a href="<?= base_url('admin');?>" style="margin-bottom: 20px">Back</a>
</li>

<p class="login-box-msg">Edit users</p>
<?= $this->session->flashdata('msgbox');?>
<?= form_open();?>
<div>
	<?= form_label('username', 'username');?>
	<?= form_input(['type'=>'hidden', 'name' => 'id', 'value'=> $data->id_users]);?>
	<?= form_input(['type'=>'text', 'name' => 'username', 'value'=> $data->username, 'placeholder'=>'username']);?>
	<?= form_error('username')?>
</div>
<div>
	<?= form_label('email', 'email');?>
	<?= form_input(['type'=>'email', 'name' => 'email', 'value'=> $data->email, 'placeholder'=>'email']);?>
	<?= form_error('email')?>
</div>
<div>
	<?= form_label('role', 'role');?>
	<?= form_dropdown('role', $role, $data->role_id);?>
	<?= form_error('role');?>
</div>
<div>
	<?= form_label('password', 'password');?>
	<?= form_input(['type'=>'password', 'name' => 'password', 'placeholder'=>'password']);?>
	<?= form_error('password')?>
</div>
<div>
	<?= form_label('confirm password', 'confirm password');?>
	<?= form_input(['type'=>'password', 'name' => 'confirm_password', 'placeholder'=>'confirm_password']);?>
	<?= form_error('confirm_password')?>
</div>
<div>
	<?= form_label('activation', 'activation');?>
	<div class="radio">
		<label>
			<input type="radio" name="activation" value="" <?php echo ($data->active  == null) ?  "checked" : "" ;?>/> active
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" name="activation" value="1" <?php echo ($data->active == 1) ?  "checked" : "" ;?>/> deactive
		</label>
	</div>
</div>
<div>
	<div >
		<button type="submit">Edit</button>
	</div>
</div>
<?= form_close();?>
