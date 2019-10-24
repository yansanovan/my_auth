<section class="content-header">
    <h1> <i class="fa fa-user" aria-hidden="true"></i> PROFILE</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li>
  	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">PROFILE</div>
								<div class="panel-body">
									<?php  
										if(!empty($success_msg)){
											echo '<div class="alert alert-success alert-dismissible">
						                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                        	<h4><i class="fa fa-check" aria-hidden="true"></i> Berhasil!</h4>'.$success_msg.
						                    	'</div>' ;
										}elseif(!empty($error_msg)){
											echo '<div class="alert alert-danger alert-dismissible">
						                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                        	<h4><i class="fa fa-times" aria-hidden="true"></i> Opps!</h4>'.$error_msg.
						                    	'</div>' ;
										}?>
										<?= form_open_multipart('profile/upload');?>
											<div class="box-body box-profile">
												<img class="profile-user-img img-responsive img-circle" src="<?= base_url('asset/img/'.$users->image);?>" alt="User profile picture">
												<h3 class="profile-username text-center"><?= $users->username;?></h3>
												<ul class="list-group list-group-unbordered">
													<li class="list-group-item">
														<b>Email</b> <a class="pull-right"><?= $users->email;?></a>
													</li>
													<li class="list-group-item">
														<b>Level</b> <a class="pull-right"><?= $users->level;?></a>
													</li>
												</ul>
												<div class="input-group">
													<input type="text"  id="file_path9" class="form-control" placeholder="Pilih Foto Profile">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button" id="file_browser9">
															<i class="fa fa-upload"></i> 
														</button>
													</span>
												</div>
												<input type="file" class="hidden" id="file9" name="file" value="<?= set_value('file');?>">
												<?php echo form_error('file'); ?></p>
												<br>
												<button class="btn btn-primary btn-block" name="uploadFile" value="true">
													<i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
												</button>
											</div>
							        	<?= form_close();?>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-primary">
								<div class="panel-heading">CHANGE PASSWORD</div>
									<div class="panel-body">
										<?= $this->session->flashdata('msgbox');?>
					                    <?= form_open_multipart('change_password');?>
										<input type="hidden" name="email" value="<?php echo $users->email;?>" class="form-control"placeholder="email" readonly>
										<div class="form-group row">
											<div class="col-sm-10">
												<input type="hidden" name="id" value="<?php echo $users->id;?>" class="form-control" id="inputPassword" placeholder="Password" readonly>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-user"></i>  Username</label>
											<div class="col-sm-9">
												<input type="text" name="username" class="form-control" id="inputPassword" value="<?= $users->username;?>">
												<?= form_error('username');?>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-lock"></i>  Password Lama</label>
											<div class="col-sm-9">
												<input type="password" name="password_lama" class="form-control" id="inputPassword" placeholder="password lama">
												<?= form_error('password_lama');?>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-lock"></i>  Password Baru</label>
											<div class="col-sm-9">
												<input type="password" name="password_baru" class="form-control" id="inputPassword" placeholder="password baru">
												<?= form_error('password_baru');?>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-lock"></i>  Confirm Password </label>
											<div class="col-sm-9">
												<input type="password" name="password_confirm" class="form-control" id="inputPassword" placeholder="password confirm">
												<?= form_error('password_confirm');?>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3">
											</div>
											<div class="col-sm-9">
												 <button class="btn btn-primary" value="true"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
											</div>
										</div>
									<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


