<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Jadwal IJin Geledah</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
			            <?= $this->session->flashdata('file_ijin_geledah');?>
						<?= validation_errors();?>
			            <?= $this->session->flashdata('berhasil_diubah');?>
			            
						<?=  form_open_multipart('ubah_data_kepolisian/update_file_ijin_geledah');?>
						<div class="col-md-12">
							<a href="<?= base_url('kepolisian/lihat_detail_jadwal/'. $data->url);?>" class="btn btn-info btn-sm">
								<span class="glyphicon glyphicon-arrow-left"></span> Kembali
							</a>
						</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="ijin_geledah" class="form-control">
									  <option value="Ijin Geledah">Ijin Geledah</option>
									  <option value="Penangkapan">Penangkapan</option>
									  <option value="Ijin Sita">Ijin Sita</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File</label>
									<input type="hidden" name="id_data" value="<?= $data->id_data;?>"  class="form-control">
									<input type="hidden" name="url" value="<?= $data->url;?>"  class="form-control">

									<input type="text" name="file_penangkapan_lama" value="<?= $data->file_ijin_sita;?>"  class="form-control">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Pilih File Ijin Geledah</label>
									<input type="file" name="file_ijin_geledah"  class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Ijin Geledah</label>
									<input type="date" name="tanggal_ijin_geledah" value="<?= $data->tanggal_ijin_geledah;?>" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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