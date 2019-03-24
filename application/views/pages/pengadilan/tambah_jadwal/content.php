<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Tambah jadwal Pengadilan</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
						<?= validation_errors();?>
						<?= $this->session->flashdata('berhasil');?>
						<?= $this->session->flashdata('deskripsi');?>
						<?= $this->session->flashdata('gagal_simpan');?>
						<?= $this->session->flashdata('file_pelimpahan_berkas');?>
						<?= $this->session->flashdata('file_penetapan_hari_sidang');?>
						<?= $this->session->flashdata('file_penahanan');?>
						<?= $this->session->flashdata('file_perpanjang_penahanan_I');?>
						<?= $this->session->flashdata('file_perpanjang_penahanan_II');?>
						<?= $this->session->flashdata('file_perpanjang_penahanan_III');?>
						<?= $this->session->flashdata('file_putusan');?>


						<?=  form_open_multipart('pengadilan/simpan');?>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Deskripsi Perkara</label>
								<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi">
							</div>
						</div>

			            <section class="content">
			              <div class="row">
			                <div class="col-md-12">
			                  <label for="exampleInputEmail1">Uraian Pokok</label>
			                  <div class="box box-info">
			                    
			                    <div class="box-header"><br>
			                      <div class="pull-right box-tools">
			                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse">
			                          <i class="fa fa-minus"></i>
			                        </button>
			                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
			                                title="Remove">
			                            <i class="fa fa-times"></i>
			                        </button>
			                      </div>
			                    </div>
			                    
			                    <div class="box-body pad">
			                      <textarea name="uraian_pokok" class="ckeditor"></textarea>
			                        <script>
			                          CKEDITOR.replace('uraian_pokok');
			                        </script>
			                    </div>

			                  </div>
			                </div>
			              </div>
			            </section>

			            <section class="content">
			              <div class="row">
			                <div class="col-md-12">
			                  <label for="exampleInputEmail1">Putusan Amar</label>
			                  <div class="box box-info">
			                    
			                    <div class="box-header"><br>
			                      <div class="pull-right box-tools">
			                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse">
			                          <i class="fa fa-minus"></i>
			                        </button>
			                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"title="Remove">
			                          <i class="fa fa-times"></i></button>
			                      </div>
			                    </div>
			                    
			                    <div class="box-body pad">
			                      <textarea name="putusan_amar" class="ckeditor"></textarea>
			                        <script>
			                          CKEDITOR.replace('putusan_amar');
			                        </script>
			                    </div>

			                  </div>
			                </div>
			              </div>
			            </section>

						<!-- Pelimpahan Berkas  -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="pelimpahan_berkas" class="form-control">
									  <option value="Pelimpahan Berkas" selected="selected">Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II">Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Pelimpahan Berkas</label>
									<input type="file" name="file_pelimpahan_berkas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Pelimpahan Berkas</label>
									<input type="date" name="tanggal_pelimpahan_berkas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Penetapan hari sidang -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="penetapan_hari_sidang" class="form-control">
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang" selected="selected">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II">Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Penetapan Hari Sidang</label>
									<input type="file" name="file_penetapan_hari_sidang" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Penetapan Hari Sidang</label>
									<input type="date" name="tanggal_penetapan_hari_sidang" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Penahanan -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="penahanan" class="form-control">
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan" selected="selected">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II">Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Penahanan</label>
									<input type="file" name="file_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Penahanan</label>
									<input type="date" name="tanggal_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Perpanjang penahanan I -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="perpanjang_penahanan_I" class="form-control">
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I" selected="selected">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II">Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Perpanjang Penahanan I</label>
									<input type="file" name="file_perpanjang_penahanan_I" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Perpanjang Penahanan I</label>
									<input type="date" name="tanggal_perpanjang_penahanan_I" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Perpanjang penahanan II -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
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
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Perpanjang Penahanan III</label>
									<input type="file" name="file_perpanjang_penahanan_II" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Perpanjang Penahanan II</label>
									<input type="date" name="tanggal_perpanjang_penahanan_II" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Perpanjangan penahanan III -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="perpanjang_penahanan_III" class="form-control">
									  <option value="Pelimpahan Berkas">Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II" >Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III" selected="selected">Perpanjang Penahanan III</option>
									  <option value="Putusan">Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Perpanjang Penahanan III</label>
									<input type="file" name="file_perpanjang_penahanan_III" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Perpanjang Penahanan III</label>
									<input type="date" name="tanggal_perpanjang_penahanan_III" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<!-- Putusan & file putusan & tanggal putusan -->

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="putusan" class="form-control">
									  <option value="Pelimpahan Berkas">Pelimpahan Berkas</option>
									  <option value="Penetapan Hari Sidang">Penetapan Hari Sidang</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjang Penahanan I">Perpanjang Penahanan I</option>
									  <option value="Perpanjang Penahanan II" >Perpanjang Penahanan II</option>
									  <option value="Perpanjang Penahanan III">Perpanjang Penahanan III</option>
									  <option value="Putusan" selected="selected" >Putusan</option>
									</select>
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Putusan</label>
									<input type="file" name="file_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Putusan</label>
									<input type="date" name="tanggal_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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