<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Ubah Jadwal Lapas Isi Putusan</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
			            <?= $this->session->flashdata('file_isi_putusan');?>
						<?= validation_errors();?>
			            <?= $this->session->flashdata('berhasil_diubah');?>
			            
						<?= form_open_multipart('ubah_data_lapas/update_file_isi_putusan');?>
							
							<div class="col-md-12">
								<a href="<?= base_url('lapas/lihat_detail_jadwal/'. $data->url);?>" class="btn btn-info btn-sm">
									<span class="glyphicon glyphicon-arrow-left"></span> Kembali
								</a>
							</div>

							<!-- Isi Putusan  -->

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="isi_putusan" class="form-control">
									  <option value="isi putusan">Isi Putusan</option>
									  <option value="eksekusi">Eksekusi</option>
									  <option value="pembebasan bersyarat">Pembebasan Bersyarat</option>
									  <option value="remisi">Remisi</option>
									  <option value="bebas">Bebas</option>
									</select>
									<br>
								</div>
							</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File </label>
									<input type="hidden" name="id_data" value="<?= $data->id_data;?>" class="form-control" id="exampleInputEmail1">
									<input type="text" name="file_isi_putusan_lama" value="<?= $data->file_isi_putusan;?>" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>

							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Isi Putusan</label>
									<input type="file" name="file_isi_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-3"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Isi Putusan</label>
									<input type="date" name="tanggal_isi_putusan" class="form-control" value="<?= $data->tanggal_isi_putusan;?>" id="exampleInputEmail1">
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