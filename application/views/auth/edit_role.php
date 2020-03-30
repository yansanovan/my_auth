<a href="<?= base_url('admin/role');?>" style="margin-bottom: 20px">
	Back
</a>

<div>
	<p>Edit role</p>
	<?= $this->session->flashdata('msgbox');?>
	<?= form_open();?>
	<div>
		<?= form_label('role', 'role');?>
		<?= form_input(['type'=>'hidden', 'name' => 'id', 'value'=> $data->id]);?>
		<?= form_input(['type'=>'text', 'name' => 'role', 'value'=> $data->role, 'placeholder'=>'role']);?>
		<?= form_error('role')?>
	</div>

	<button type="submit">Edit</button>
	<?= form_close();?>
</div>
