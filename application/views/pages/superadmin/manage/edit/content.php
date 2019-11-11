<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1><i class="fa fa-edit" aria-hidden="true"></i> EDIT USERS</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?= $this->session->flashdata('msgbox');?>
						<?=  form_open_multipart('superadmin/update');?>
							<div class="col-md-12">
								<a href="<?= base_url('superadmin');?>" class="btn btn-success btn-md" style="margin-bottom: 20px">
									<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back
								</a>
								<div class="form-group">
									<?= form_label('Username', 'Username');?>
									<?= form_input(['type'=> 'hidden', 'name'=>'id', 'value'=> $data->id, 'class'=> 'form-control']);?>
									<?= form_input(['type'=> 'text', 'name'=>'username', 'value'=> $data->username, 'class'=> 'form-control']);?>
									<?= form_error('username');?>
								</div>
								<div class="form-group">
									<?= form_label('Email', 'Email');?>
									<?= form_input(['type'=> 'email', 'name'=>'email', 'value'=> $data->email, 'class'=> 'form-control']);?>
									<?= form_error('email');?>
								</div>
								<div class="form-group">
									<?= form_label('Password', 'Password');?>
									<?= form_input(['type'=> 'password', 'name'=>'password', 'class'=> 'form-control', 'placeholder'=>'New Password']);?>
									<?= form_error('password');?>
								</div>
								<div class="form-group">
									<?= form_label('Level', 'Level');?>
									<div class="form-group">
										<select class="form-control" name="level">
											<option <?php if( $data->level =='kepolisian'){echo "selected"; } ?> value="kepolisian">Kepolisian</option>
											<option <?php if( $data->level =='kejaksaan'){echo "selected"; } ?> value="kejaksaan">Kejaksaan</option>
											<option <?php if( $data->level =='pengadilan'){echo "selected"; } ?> value="pengadilan">Pengadilan</option>
											<option <?php if( $data->level =='lapas'){echo "selected"; } ?> value="lapas">lapas</option>
										</select>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Activation</label>
									<div class="form-group">
										<select class="form-control" name="status_block">
											<option 
												<?php if( $data->login_attemps < 4){echo "selected"; } ?> value="0">
												<span class="label label-success"> Active </span>
											</option>
											<option 
												<?php if( $data->login_attemps >= 4){echo "selected"; } ?> value="4">
												<span class="label label-success"> Deactive </span>
											</option>
										</select>
										<br>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<center>
									<button class="btn btn-primary"><i class="fa fa-send" aria-hidden="true"></i> Submit</button>
								</center><br>
							</div>
						<?= form_close();?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>