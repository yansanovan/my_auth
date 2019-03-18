<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Data Jadwal Eksekusi Putusan</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
			            <?= $this->session->flashdata('file_eksekusi_putusan');?>
						<?= validation_errors();?>
			            <?= $this->session->flashdata('berhasil_diubah');?>
			            
						<?=  form_open_multipart('ubah_data_kejaksaan/update_file_eksekusi_putusan');?>
						<div class="col-md-12">
							<a href="<?= base_url('kejaksaan/lihat_detail_jadwal/'. $data->url);?>" class="btn btn-info btn-sm">
								<span class="glyphicon glyphicon-arrow-left"></span> Kembali
							</a>
						</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="tahap_II" class="form-control">
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I">Tahap I</option>
									  <option value="Tahap II" >Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan" selected="selected">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File </label>
									<input type="hidden" name="id_data" value="<?= $data->id_data;?>"  class="form-control">

									<input type="text" name="file_eksekusi_putusan_lama" value="<?= $data->file_eksekusi_putusan;?>"  class="form-control">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Pilih File Eksekusi</label>
									<input type="file" name="file_eksekusi_putusan"  class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Eksekusi</label>
									<input type="date" name="tanggal_eksekusi_putusan" value="<?= $data->tanggal_eksekusi_putusan;?>" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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