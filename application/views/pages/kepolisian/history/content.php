<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<nav class="navbar navbar-light">
						<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> HISTORY SPDP </h3><br>
					</nav>
					<a href="<?php echo base_url('kepolisian/form');?>" class="btn btn-success btn-xs"> 
						<i class="fa fa-undo" aria-hidden="true"></i> Back
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
									<th>File</th>
									<th>Date & Time</th>
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
								<td><?= $value->file;?></td>
								<td><?= date('d-m-Y H:i:s', strtotime($value->date));?></td>
								<td>
									<a href="<?= base_url('kepolisian/hapus/'.$value->id);?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> 
										<span class="glyphicon glyphicon-trash"></span> Delete
									</a>
									<a href="<?= base_url('kepolisian/edit/'. base64_encode($value->id));?>" class="btn btn-warning btn-xs"> 
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



