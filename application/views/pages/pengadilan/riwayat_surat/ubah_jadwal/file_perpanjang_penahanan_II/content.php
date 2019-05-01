<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Jadwal Perpanjang Penahanan II</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
			            <?= $this->session->flashdata('file_perpanjang_penahanan_II');?>
						<?= validation_errors();?>
			            <?= $this->session->flashdata('berhasil_diubah');?>
			            
						<?=  form_open_multipart('ubah_data_pengadilan/update_file_perpanjang_penahanan_II');?>
						<div class="col-md-12">
							<a href="<?= base_url('pengadilan/lihat_detail_jadwal/'.$data->url);?>" class="btn btn-info btn-sm">
								<span class="glyphicon glyphicon-arrow-left"></span> Kembali
							</a>
						</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="perpanjang_penahanan_II" class="form-control">
									  <option value="Pelimpahan Berkas">Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II" selected="selected">Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File</label>
									<input type="hidden" name="id_data" value="<?= $data->id_data;?>"  class="form-control">
									<input type="hidden" name="url" value="<?= $data->url;?>" class="form-control">
									
									<input type="text" name="file_perpanjang_penahanan_II_lama" value="<?= $data->file_perpanjang_penahanan_II;?>"  class="form-control">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Pilih File Pelimpahan</label>
									<input type="file" name="file_perpanjang_penahanan_II"  class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Pelimpahan</label>
									<input type="date" name="tanggal_perpanjang_penahanan_II" value="<?= $data->tanggal_perpanjang_penahanan_II;?>" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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