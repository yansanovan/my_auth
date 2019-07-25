<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header"><br>
					<?= $this->session->flashdata('msgbox');?>                        
					<?= form_open_multipart();?>
						<div class="panel panel-info">
							<div class="panel-heading">
									<h3 align="center" style="color: black">
											<i class="fa fa-envelope" aria-hidden="true"></i> FORM EDIT
									</h3><br>
							</div>
						<div class="panel-body">
							<div class="col-md-12">
								<a href="<?= base_url('lapas/riwayat_balas_bon');?>" class="btn btn-warning btn-xs"> 
									<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
								</a><br><br>
								<input type="hidden" class="form-control" name="tanggal_balas_bon" value="<?= $data->tanggal_balas_bon;?>">
								<table  width="380px">
									<tbody>
										<tr>
											<td><i class="fa fa-user-circle" aria-hidden="true"></i> Dibalas Kepada</td>
											<td width="10px">:</td>
											<td width="250px"><?= $data->username;?></td>
										</tr>
										<tr>
											<td><i class="fa fa-user-plus" aria-hidden="true"></i> Level </td>
											<td width="10px">:</td>
											<td width="250px"><?= $data->level;?></td>
										</tr>
										<tr>
											<td><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Dibalas </td>
											<td width="10px">:</td>
											<td width="250px"><?= date('d-m-Y', strtotime($data->tanggal_balas_bon));?></td>
										</tr>
									</tbody>
								</table>
								<br>
								<table class="table table-bordered">
									<thead>
										<tr>
											<tr bgcolor="#8e8d8d">
											<th class="col-sm-3" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama Tersangka</th>
											<th class="col-sm-3" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> File Lama</th>
											<th class="col-sm-3" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form</th>
											<th class="col-sm-3" style="color: white"><i class="fa fa-info-circle" aria-hidden="true"></i> Keterangan</th>
										</tr>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="hidden" name="id_bon_balasan" value="<?= $data->id_bon_balasan; ?>"  class="form-control" >
												<div class="form-group"><p class="form-control"> <?= $data->nama_tersangka;?> </p></div>
											</td>
											<td>
												<div class="form-group">
													 <input type="hidden" class="form-control" name="old_bon_balasan" value="<?= $data->file_pengajuan_bon;?>">
													<p class="form-control"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $data->file_pengajuan_bon;?> </p>
												</div>
											</td>
											<td>
												<div class="form-group">
													<div class="input-group">
														<input type="text" id="file_path" class="form-control" placeholder="Pilih file Bon">
														<span class="input-group-btn">
															<button class="btn btn-success" type="button" id="file_browser"><i class="fa fa-search"></i> Browse</button>
														</span>
													</div>
													<input type="file" class="hidden" id="file" name="file_edit_balas_bon" value="<?= $data->file_pengajuan_bon;?>">
													<?php echo form_error('file_edit_balas_bon'); ?>
												</div>
											</td>
											<td>              
												<div class="form-group">
													<p class="form-control"> <?= $data->keterangan;?> </p>
												</div>
												<input type="hidden" name="keterangan" class="form-control" value="<?= $data->keterangan;?>" readonly>
											</td>
										</tr>
									</tbody>
								</table>
								</div>
						<center>
							<button class="btn btn-primary" value="<?= $action;?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
						</center><br>
					<?= form_close();?>
				</div>
			</div>
		</div>
	</div>
</section>

