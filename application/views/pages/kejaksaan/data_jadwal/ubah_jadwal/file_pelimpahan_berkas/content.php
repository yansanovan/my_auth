<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Data jadwal Pelimpahan Berkas</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
			            <?= $this->session->flashdata('file_pelimpahan_berkas');?>
			            <?= $this->session->flashdata('berhasil_diubah');?>
			            
						<?= validation_errors();?>
						<?=  form_open_multipart('ubah_data_kejaksaan/update_file_pelimpahan_berkas');?>
						<div class="col-md-12">
							<a href="<?= base_url('kejaksaan/lihat_detail_jadwal/'. $data->url);?>" class="btn btn-info btn-sm">
								<span class="glyphicon glyphicon-arrow-left"></span> Kembali
							</a>
						</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="pelimpahan_berkas" class="form-control">
									  <option value="Pelimpahan Berkas" selected="selected">Pelimpahan Berkas</option>
									  <option value="Tahap I">Tahap I</option>
									  <option value="Tahap II">Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1"> File Pelimpahan Berkas</label>
									<input type="hidden" name="id_data" value="<?= $data->id_data;?>"  class="form-control">
									<input type="hidden" name="url" value="<?= $data->url;?>"  class="form-control">
									
									<input type="text" name="file_pelimpahan_berkas_lama" value="<?= $data->file_pelimpahan_berkas;?>"  class="form-control">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Pilih File Pelimpahan Berkas</label>
									<input type="file" name="file_pelimpahan_berkas"  class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Pelimpahan Berkas</label>
									<input type="date" name="tanggal_pelimpahan_berkas" value="<?= $data->tanggal_pelimpahan_berkas;?>" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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