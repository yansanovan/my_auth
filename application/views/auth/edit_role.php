
<div class="col-md-6 col-md-offset-3" style="margin-top: 40px">
	<a href="<?= base_url('admin/role');?>" style="margin-bottom: 20px" class="btn btn-info btn-md">Back</a>
    <div class="well bs-component">
        <?= $this->session->flashdata('msgbox');?>
        <h4 align="center" style="margin-bottom: 40px">Edit role</h4>
        <fieldset>
        	<?= form_open();?>
	        	<div class="form-group <?= form_error('username') ? 'has-error': null ?>">
	        		<?= form_label('role', 'role');?>
	        		<?= form_input(['type'=>'hidden', 'name' => 'id', 'class'=>'form-control', 'value'=>htmlspecialchars($data->id,ENT_QUOTES,'UTF-8')]);?>
	        		<?= form_input(['type'=>'text', 'name' => 'role', 'class'=>'form-control', 'value'=>htmlspecialchars($data->role,ENT_QUOTES,'UTF-8'), 'placeholder'=>'role']);?>
	        		<?= form_error('role')?>
	        	</div>
	        	<button type="submit" class="btn btn-primary btn-md">Edit</button>
        	<?= form_close();?>
        </fieldset>
    </div>
</div>