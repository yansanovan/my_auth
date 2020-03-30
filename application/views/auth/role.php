<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1><i class="fa fa-pencil" aria-hidden="true"></i> CREATE ROLE</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= base_url('admin');?>" style="margin-bottom: 20px">
					<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back
				</a>
			</li>
			<li><a href="#"><i class="fa fa-pencil"></i> Create role</a></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header">
						<div class="col-md-4">
							<div class="register-box-body">
								<p class="login-box-msg">Create a new role</p>
								<?= $this->session->flashdata('msgbox');?>
								<?= form_open();?>
									<div class="form-group <?= form_error('role') ? 'has-error': null ?>">
										<?= form_label('role', 'role');?>
										<?= form_input(['type'=>'text', 'name' => 'role', 'value'=> set_value("role"), 'class'=>'form-control', 'placeholder'=>'role']);?>
										<?= form_error('role')?>
									</div>
									<div class="row">
										<div class="col-xs-4">
											<button type="submit" class="btn btn-primary btn-block btn-flat">Create</button>
										</div>
									</div>
								<?= form_close();?>
							</div>
						</div>
						<div class="col-md-8">
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
														<?= form_open('admin/delete_role/'.$role['id'], ['class'=> 'inline']);?>
															<button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-xs">Delete</button>
														<?= form_close();?>
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
					</div>
				</div>
			</div>
		</div>
	</section>
</div>