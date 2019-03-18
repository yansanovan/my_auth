<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
		<h1>Tambah jadwal Kejaksaan</h1>
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
						<?= $this->session->flashdata('uraian_tuntutan');?>
						<?= $this->session->flashdata('uraian_dakwaan');?>
						<?= $this->session->flashdata('gagal_simpan');?>
						<?= $this->session->flashdata('file_pelimpahan_berkas');?>
						<?= $this->session->flashdata('file_tahap_I');?>
						<?= $this->session->flashdata('file_tahap_II');?>
						<?= $this->session->flashdata('file_pelimpahan');?>
						<?= $this->session->flashdata('file_penahanan');?>
						<?= $this->session->flashdata('file_perpanjang_penahanan');?>
						<?= $this->session->flashdata('file_eksekusi_putusan');?>
						<?=  form_open_multipart('kejaksaan/simpan');?>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Deskripsi Perkara</label>
								<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi">
							</div>
						</div>

						<section class="content">
			              <div class="row">
			                <div class="col-md-12">
			                  <label for="exampleInputEmail1">Uraian Tuntutan</label>
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
			                      <textarea name="uraian_tuntutan" class="ckeditor"></textarea>
			                        <script>
			                          CKEDITOR.replace('uraian_tuntutan');
			                        </script>
			                    </div>

			                  </div>
			                </div>
			              </div>
			            </section>

			            <section class="content">
			              <div class="row">
			                <div class="col-md-12">
			                  <label for="exampleInputEmail1">Uraian Dakwaan</label>
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
			                      <textarea name="uraian_dakwaan" class="ckeditor"></textarea>
			                        <script>
			                          CKEDITOR.replace('uraian_dakwaan');
			                        </script>
			                    </div>

			                  </div>
			                </div>
			              </div>
			            </section>

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="pelimpahan_berkas" class="form-control">
									  <option value="Pelimpahan Berkas">Pelimpahan Berkas</option>
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
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Pelimpahan Berkas</label>
									<input type="file" name="file_pelimpahan_berkas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Penangkapan</label>
									<input type="date" name="tanggal_pelimpahan_berkas" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="tahap_I" class="form-control">
									  <option value="Tahap I">Tahap I</option>
									  <option value="pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap II">Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Tahap I</label>
									<input type="file" name="file_tahap_I" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Tahap I</label>
									<input type="date" name="tanggal_tahap_I" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="tahap_II" class="form-control">
									  <option value="Tahap II">Tahap II</option>
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I" >Tahap I</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Tahap II</label>
									<input type="file" name="file_tahap_II" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Tahap II</label>
									<input type="date" name="tanggal_tahap_II" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>	
						</div>

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="pelimpahan" class="form-control">
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I" >Tahap I</option>
									  <option value="Tahap II" >Tahap II</option>
									  <option value="Penahanan">Penahanan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Pelimpahan</label>
									<input type="file" name="file_pelimpahan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Pelimpahan</label>
									<input type="date" name="tanggal_pelimpahan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>	
						</div>

						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="penahanan" class="form-control">
									  <option value="Penahanan">Penahanan</option>
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I" >Tahap I</option>
									  <option value="Tahap II" >Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>

							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File penahanan</label>
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


						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="perpanjang_penahanan" class="form-control">
									  <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I" >Tahap I</option>
									  <option value="Tahap II" >Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan" >Penahanan</option>
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File perpanjang penahanan</label>
									<input type="file" name="file_perpanjang_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Perpanjang Penahanan</label>
									<input type="date" name="tanggal_perpanjang_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
						</div>


						<div class="col-md-12">
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Berkas</label>
									<select name="eksekusi_putusan" class="form-control">
									  <option value="Eksekusi Putusan">Eksekusi Putusan</option>
									  <option value="Pelimpahan Berkas" >Pelimpahan Berkas</option>
									  <option value="Tahap I" >Tahap I</option>
									  <option value="Tahap II" >Tahap II</option>
									  <option value="Pelimpahan">Pelimpahan</option>
									  <option value="Penahanan" >Penahanan</option>
									  <option value="Perpanjangan Penahanan" >Perpanjangan Penahanan</option>
									</select>
									<!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
									<br>
								</div>
							</div>
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">File Eksekusi Putusan</label>
									<input type="file" name="file_eksekusi_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
								</div>
							</div>
							
							<div class="col-md-4"><br>
								<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Eksekusi Putusan</label>
									<input type="date" name="Eksekusi_putusan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
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