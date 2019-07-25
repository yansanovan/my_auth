<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header">
				<div class="col-md-12">
				<?= $this->session->flashdata('msgbox');?>  
				</div>
				<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
					<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT SURAT  </h3><br>
				</nav>
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<center><th>No</th></center>
								<th>Nama Tersangka</th>
								<th>Pasal</th>
								<th>No Sprindik</th>
								<th>Tanggal Balas</th>
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
								<td><?= $value->pasal;?></td>
								<td><?= $value->no_sprindik;?></td>
								<td>
	                                <i class="fa fa-calendar" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($value->tanggal_balas_kj)); ?>
								</td>
								<td>
									<a href="<?= base_url('kejaksaan/hapus_balasan/'.$value->id_surat_kj);?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> 
										<span class="glyphicon glyphicon-trash"></span> Hapus
									</a>
									<a href="<?= base_url('kejaksaan/edit_balas/'.base64_encode($value->id_surat_kj));?>" class="btn btn-warning btn-xs"> 
										<span class="glyphicon glyphicon-edit"></span> Edit
									</a>
								</td>
							</tr>           
							<?php endforeach;?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


