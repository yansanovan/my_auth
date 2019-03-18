<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Users</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?= validation_errors();?>
						<?= $this->session->flashdata('gagal');?>
						<?=  form_open_multipart('superadmin/update');?>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="hidden" name="id" value="<?= $data->id;?>" class="form-control" id="exampleInputEmail1">

								<input type="text" name="username" value="<?= $data->username;?>" class="form-control" id="exampleInputEmail1" placeholder="masukan username">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">email</label>
								<input type="email" name="email" class="form-control" value="<?= $data->email;?>" id="exampleInputEmail1" placeholder="masukan email">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">password </label>
								<input type="password" name="password" class="form-control"  id="exampleInputEmail1" placeholder="masukan password">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Pilih level baru</label>
								<div class="form-group">
									<select class="form-control" name="level">
									  <option value="kepolisian">Kepolisian</option>
									  <option value="kejaksaan">Kejaksaan</option>
									  <option value="pengadilan">Pengadilan</option>
									  <option value="lapas">Lapas</option>
									</select>
									<br>
								</div>
							</div>

						</div>

						<div class="col-md-12">
							<center>
								<button class="btn btn-primary">Submit</button>
							</center><br>
						</div>

					</div>
					<?= form_close();?>
				</div>
			</div>
		</div>
	</section>
</div>