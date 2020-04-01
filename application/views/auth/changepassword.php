<div class="col-md-6 col-md-offset-3" style="margin-top: 40px">
    <div class="well bs-component">
        <?= $this->session->flashdata('msgbox');?>
        <h4 align="center" style="margin-bottom: 40px">Please change your password</h4>
        <fieldset>
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
						<button type="submit" name="change_password" value="true" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Submit</button>
					</div>
				</div>
			<?= form_close();?>
        </fieldset>
    </div>
</div>