<section class="content-header">
	<h1>Profile</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<div class="col-md-4">
						<center>
							<img width="200px" src="<?php echo base_url('asset/img/users.jpg');?>" alt="Card image cap">
						</center>
					</div>
					<div class="col-md-8">
					<?php echo $this->session->flashdata('password_berhasil_dirubah');?>
					<?php echo $this->session->flashdata('password_berbeda');?>
						<?php foreach ($users as $key => $value) { ?>
							<?php echo form_open();?>
							<div class="form-group row">
								<div class="col-sm-10">
									<input type="hidden" name="id" value="<?php echo $value->id;?>" class="form-control" id="inputPassword" placeholder="Password" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label"> <i class="fa fa-envelope"></i> E-mail</label>
								<div class="col-sm-9">
									<input type="text" name="email" value="<?php echo $value->email;?>" class="form-control" id="inputPassword" placeholder="Email" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label"> <i class="fa fa-users"></i>  Level</label>
								<div class="col-sm-9">
									<input type="text" value="<?php echo $value->level;?>" class="form-control" id="inputPassword" readonly>
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
								<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-key"></i>  Password Baru</label>
								<div class="col-sm-9">
									<input type="password" name="password_baru" class="form-control" id="inputPassword" placeholder="password baru">
									<?= form_error('password_baru');?>
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa fa-image"></i>  Ganti Foto Profile</label>
								<div class="col-sm-9">
		                          <div class="input-group">
		                            <input type="text" id="file_path" class="form-control" placeholder="Pilih Foto Profile Baru">
		                              <span class="input-group-btn">
		                                <button class="btn btn-danger" type="button" id="file_browser"><i class="fa fa-search"></i> Browse</button>
		                              </span>
		                          </div>
		                          <input type="file" class="hidden" id="file" name="foto_baru" value="<?= set_value('foto_baru');?>">
		                          <?= form_error('foto_baru'); ?>
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
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


