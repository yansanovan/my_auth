<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Profile</h1>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header">
						<div class="col-md-4">
							<center>
								<img width="200px" src="<?php echo base_url('asset/img/users.jpg');?>" alt="Card image cap">
							</center>
						</div>
						<div class="col-md-8">
						<?php echo $this->session->flashdata('password_berhasil_dirubah');?>
						<?php echo $this->session->flashdata('password_berbeda');?>
						<?php echo validation_errors(); ?>
							<?php foreach ($users as $key => $value) { ?>
								<?php echo form_open('profile/ubah_password');?>
								<div class="form-group row">
									<div class="col-sm-10">
										<input type="hidden" name="id" value="<?php echo $value->id;?>" class="form-control" id="inputPassword" placeholder="Password" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputPassword" class="col-sm-3 col-form-label">E-mail</label>
									<div class="col-sm-9">
										<input type="text" name="email" value="<?php echo $value->email;?>" class="form-control" id="inputPassword" placeholder="Email" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputPassword" class="col-sm-3 col-form-label">Level</label>
									<div class="col-sm-9">
										<input type="text" value="<?php echo $value->level;?>" class="form-control" id="inputPassword" readonly>
									</div>
								</div>
								
								<div class="form-group row">
									<label for="inputPassword" class="col-sm-3 col-form-label">Password Lama</label>
									<div class="col-sm-9">
										<input type="password" name="password_lama" class="form-control" id="inputPassword" placeholder="password lama">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputPassword" class="col-sm-3 col-form-label">Password Baru</label>
									<div class="col-sm-9">
										<input type="password" name="password_baru" class="form-control" id="inputPassword" placeholder="password baru">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-9">
										<input type="submit" name="" class="btn btn-primary" value="Save" style="width: 100px">
									</div>
								</div>
								<?php echo form_close();?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

