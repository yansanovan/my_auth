<div class="wrapper">
	<div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-user" aria-hidden="true"></i> MANAGAMENT USERS</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-user"></i> Managament users</a></li>
            </ol>
        </section>
    	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header ">
							<?= $this->session->flashdata('msgbox');?>
                            <div class="well">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="<?= base_url('superadmin/create');?>" class="btn btn-success btn-md"> 
                                                <span class="glyphicon glyphicon-edit"></span> Add Users
                                            </a>
                                            <a href="<?= base_url('superadmin/db_backup');?>" class="btn btn-info btn-md" onclick="return confirm('Mau Backup databas ini?')"> 
                                                <span class="glyphicon glyphicon-save"></span> Backup Database
                                            </a>
                                            <a href="<?= base_url('superadmin/project_backup');?>" onclick="return confirm('Yakin Mau Backup files ini?')" class="btn btn-warning btn-md"> 
                                                <span class="glyphicon glyphicon-save"></span> Backup Project
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Email</th>
										<th>Level</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
									</thead>
									<tbody> 
									<?php 
									$no = 1;
									foreach ($data as $key => $value) { ?>
									<tr>
										<td><?= $no++;?></td>
										<td><?= $value->username;?></td>
										<td><?= $value->email;?></td>
										<td><?= $value->level;?></td>
										<td>
											<?php if($value->login_attemps >= 4) { ?>
												<span class="label label-danger"> Deactive</span>
											<?php }else {?>
												<span class="label label-success"> Active </span>
											<?php } ?>
										</td>
										<td>
											<div class="btn-group" role="group" aria-label="...">
												<div class="btn-group" role="group">
												<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span>
												</button>
													<ul class="dropdown-menu" style="background-color: rgb(233, 235, 240);">
														<li>
															<a href="<?= base_url('superadmin/delete/'. $value->id);?>" onclick="return confirm('are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete
															</a>
														</li>
														<li>
															<a href="<?= base_url('superadmin/edit/'.$value->id);?>">
																<i class="fa fa-edit" aria-hidden="true"></i>Edit
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
									<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Level</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>

	</div>
</div>

