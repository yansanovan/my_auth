
<div class="col-md-6 col-md-offset-3" style="margin-top: 40px">
	<a href="<?= base_url('admin');?>" style="margin-bottom: 20px" class="btn btn-info btn-md">Back</a>
    <div class="well bs-component">
        <?= $this->session->flashdata('msgbox');?>
        <h4 align="center" style="margin-bottom: 40px">Register new user</h4>
        <fieldset>
        	<?= form_open();?>
	        	<div class="form-group <?= form_error('username') ? 'has-error': null ?>">
	        		<?= form_label('username', 'username');?>
	        		<?= form_input(['type'=>'text', 'name' => 'username', 'class'=> 'form-control', 'value'=> set_value("username"), 'placeholder'=>'username']);?>
	        		<?= form_error('username')?>
	        	</div>
	        	<div class="form-group <?= form_error('email') ? 'has-error': null ?>">
	        		<?= form_label('email', 'email');?>
	        		<?= form_input(['type'=>'email', 'name' => 'email', 'class'=> 'form-control', 'value'=> set_value("email"), 'placeholder'=>'Email']);?>
	        		<?= form_error('email')?>
	        	</div>
	        	<div class="form-group <?= form_error('role') ? 'has-error': null ?>">
	        		<?= form_label('role', 'role');?>
	        		<?= form_dropdown('role', $role, set_value('role'), 'class="form-control"');?>
	        		<?= form_error('role');?>
	        	</div>
	        	<div class="form-group <?= form_error('password') ? 'has-error': null ?>">
	        		<?= form_label('password', 'password');?>
	        		<?= form_input(['type'=>'password', 'name' => 'password', 'class'=> 'form-control',  'autocomplete'=>'off', 'placeholder'=>'password']);?>
	        		<?= form_error('password');?>
	        	</div>
	        	<div class="form-group <?= form_error('confirm_password') ? 'has-error': null ?>">
	        		<?= form_label('confirm password', 'confirm password');?>
	        		<?= form_input(['type'=>'password', 'name' => 'confirm_password', 'class'=> 'form-control', 'autocomplete'=>'off', 'placeholder'=>'confirm password']);?>
	        		<?= form_error('confirm_password');?>
	        	</div>
	        	<button type="submit" class="btn btn-primary btn-md">Register</button>
        	<?= form_close();?>
        </fieldset>
    </div>
</div>

