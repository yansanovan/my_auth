<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Tambah jadwal Lapas</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
						<?= validation_errors();?>
						<?= $this->session->flashdata('berhasil');?>
						<?= $this->session->flashdata('gagal_simpan');?>
						<?= $this->session->flashdata('deskripsi');?>
						<?= $this->session->flashdata('file_eksekusi');?>
						<?= $this->session->flashdata('file_isi_putusan');?>
						<?= $this->session->flashdata('file_pembebasan_bersyarat');?>
						<?= $this->session->flashdata('file_remisi');?>
						<?= $this->session->flashdata('file_bebas');?>

						<?=  form_open_multipart('lapas/simpan');?>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Deskripsi Perkara</label>
								<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi">
							</div>
						</div>

						<!-- Eksekusi  -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="eksekusi" class="form-control">
									  <option value="eksekusi" selected="selected">Eksekusi</option>
									  <option value="isi putusan">Isi Putusan</option>
									  <option value="pembebasan bersyarat">Pembebasan Bersyarat</option>
									  <option value="remisi">Remisi</option>
									  <option value="bebas">Bebas</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Eksekusi</label>
									<input type="file" name="file_eksekusi" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Eksekusi</label>
									<input type="date" name="tanggal_eksekusi" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- isi putusan -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="isi_putusan" class="form-control">
									  <option value="eksekusi">Eksekusi</option>
									  <option value="isi putusan" selected="selected">Isi Putusan</option>
									  <option value="pembebasan bersyarat">Pembebasan Bersyarat</option>
									  <option value="remisi">Remisi</option>
									  <option value="bebas">Bebas</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File isi putusan</label>
									<input type="file" name="file_isi_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Isi Putusan</label>
									<input type="date" name="tanggal_isi_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Pembebasan Bersyarat -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="pembebasan_bersyarat" class="form-control">
								   	  <option value="eksekusi">Eksekusi</option>
									  <option value="isi putusan">Isi Putusan</option>
									  <option value="pembebasan bersyarat" selected="selected">Pembebasan Bersyarat</option>
									  <option value="remisi">Remisi</option>
									  <option value="bebas">Bebas</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Pembebasan Bersyarat</label>
									<input type="file" name="file_pembebasan_bersyarat" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Pembebasan Bersyarat</label>
									<input type="date" name="tanggal_pembebasan_bersyarat" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Remisi -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="remisi" class="form-control">
									  <option value="eksekusi">Eksekusi</option>
									  <option value="isi putusan">Isi Putusan</option>
									  <option value="pembebasan bersyarat">Pembebasan Bersyarat</option>
									  <option value="remisi" selected="selected">Remisi</option>
									  <option value="bebas">Bebas</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Remisi</label>
									<input type="file" name="file_remisi" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Remisi</label>
									<input type="date" name="tanggal_remisi" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Bebas -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="bebas" class="form-control">
									  <option value="eksekusi">Eksekusi</option>
									  <option value="isi putusan">Isi Putusan</option>
									  <option value="pembebasan bersyarat">Pembebasan Bersyarat</option>
									  <option value="remisi">Remisi</option>
									  <option value="bebas" selected="selected">Bebas</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Bebas</label>
									<input type="file" name="file_bebas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Bebas</label>
									<input type="date" name="tanggal_bebas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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