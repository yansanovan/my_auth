<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
						<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT SURAT  </h3><br>
					</nav>
					<a href="<?php echo base_url('kepolisian/form');?>" class="btn btn-success btn-xs"> 
						<span class="glyphicon glyphicon-edit"></span> Entry Data
					</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tersangka</th>
									<th>No Sprindik</th>
									<th>Diposting Oleh</th>
									<th>Tanggal Posting</th>
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
								<td><?= $value->no_sprindik;?></td>
								<td><?= $value->username;?></td>
								<td>
									<i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($value->tanggal_posting)); ?>
								</td>
								<td>
									<a href="<?= base_url('kepolisian/hapus/'.$value->id_data);?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> 
										<span class="glyphicon glyphicon-trash"></span> Hapus
									</a>
									<a href="<?= base_url('kepolisian/edit/'.$value->id_data);?>" class="btn btn-warning btn-xs"> 
										<span class="glyphicon glyphicon-edit"></span> Edit
									</a>
								</td>
							</tr>           
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



