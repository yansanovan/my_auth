

<div class="col-md-4">
    <div class="well bs-component">
        <?= $this->session->flashdata('msgbox');?>
        <h4 align="center">create new role</h4>
        <fieldset>
        	<?= form_open();?>
	        	<div class="form-group <?= form_error('role') ? 'has-error': null ?>">
	        		<?= form_label('role', 'role');?>
	        		<?= form_input(['type'=>'text', 'name' => 'role', 'value'=> set_value("role"), 'class'=>'form-control', 'placeholder'=>'role']);?>
	        		<?= form_error('role')?>
	        	</div>
	        	<button type="submit" class="btn btn-primary btn-md">Create</button>
        	<?= form_close();?>
        </fieldset>
    </div>
</div>

<div class="col-md-8">
	<section>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('admin');?>"><i class="fa fa-sign-in"></i> Back</a></li>
		</ol>
	</section>
	<div class="box-body">
		<div class="table-responsive">
			<p class="login-box-msg">Data role</p>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Role</th>
						<th>Created at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody> 
					<?php $no = 1 ?>
					<?php foreach ($data as $key => $role) :?>
						<tr>
							<td><?= $no++?></td>
							<td><?= $role['role']?></td>
							<td><?= $role['created_at']?></td>
							<td>
								<div style="display: inline-block;">
									<?= form_open('admin/delete_role/'.$role['id'], ['class'=> 'inline']);?>
										<button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-xs">Delete</button>
									<?= form_close();?>
								</div>
								<a href="<?= site_url('admin/edit_role/'.$role['id'])?>" class="btn btn-warning btn-xs">Edit</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Role</th>
						<th>Created at</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>