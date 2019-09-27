<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('cek');?>
					<?= $this->session->flashdata('berhasil');?>
					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
						<h3 align="center"><i class="fa fa-inbox" aria-hidden="true"></i> BON BALASAN</h2><br>
					</nav>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<center><th>No</th></center>
								<th>Nama Tersangka</th>
								<th>File Bon Balasan</th>
								<th>Keterangan</th>
								<th>Tanggal Balas</th>
								<th>User Lapas</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$no = 1;
							foreach ($data as $key => $value) { ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $value->nama_tersangka;?></td>
								<td>
									<a href="<?= base_url('bon/unduh/'.$value->file_pengajuan_bon);?>" onclick="return confirm('mau download?')" class="btn btn-primary btn-xs">
										<i class="glyphicon glyphicon-download-alt"></i> 
									</a> <?= $value->file_pengajuan_bon;?>
								</td>
								<td><?= $value->keterangan;?></td>
								<td><i class="fa fa-calendar" aria-hidden="true"></i> <?= date('d-m-Y ', strtotime($value->tanggal_balas_bon)); ?></td>
								<td><?= $value->username;?></td>	
							</tr>
							<?php } ?> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

