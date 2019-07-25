<section class="content">
	<div class="row">
		<div class="col-lg-12">
		 	<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
	                    <h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> BON MASUK </h3><br>
	                </nav>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<center><th>No</th></center>
								<th>Nama Tersangka</th>
								<th>File Pengajuan</th>
								<th>User Pemohon</th>
								<th>Level</th>
								<th>Status Balas</th>
								<th>Tanggal Posting</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$no = 1;
							foreach ($data as $key => $value) : ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $value->nama_tersangka;?></td>
								<td>
									<a href="<?= base_url('lapas/unduh/'.$value->file_pengajuan_bon);?>" onclick="return confirm('Mau download ?')" class="btn btn-primary btn-xs">
										<i class="glyphicon glyphicon-download-alt"></i> 
									</a> <?= $value->file_pengajuan_bon;?>
								</td>
								<td><?= $value->username;?></td>
								<td><?= $value->level;?></td>
								<td>
									<?php if ($value->status_balas == 0) :?><span class="label label-danger">Belum dibalas</span>
									<?php  else :?><span class="label label-success">Sudah dibalas </span> <?php endif; ?>
								</td>
								<td>
									<i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($value->tanggal_posting)); ?></td>
								<td><?= $value->keterangan;?></td>
								<td>
									<?php 
									if ($value->status_balas == 1) : ?>
										<a href="<?php echo base_url('lapas/form_balas/'.base64_encode($value->id_bon));?>" class="btn btn-success btn-xs"> 
											<i class="fa fa-lock" aria-hidden="true"></i> Balas
										</a>
									<?php else : ?>
										<a href="<?php echo base_url('lapas/form_balas/'.base64_encode($value->id_bon));?>" class="btn btn-danger btn-xs"> 
											<i class="fa fa-unlock" aria-hidden="true"></i> Balas
										</a>
									<?php endif; ?>
								</td>   
							</tr>
							<?php endforeach;?> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</section>

