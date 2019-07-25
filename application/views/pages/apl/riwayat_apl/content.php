<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
						<h3 align="center"> <i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT APL </h3><br>
					</nav>
					<a href="<?php echo base_url('apl/form_apl');?>" class="btn btn-success btn-xs"> 
						<span class="glyphicon glyphicon-edit"></span> Entry APl 
					</a><br>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="bon" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tersangka</th>
									<th>File APL</th>
									<th>Status Balas</th>
									<th>Tanggal Permintaan</th>
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
										<a href="<?= base_url('apl/unduh/'.$value->file_apl);?>" class="btn btn-primary btn-xs">
											<i class="glyphicon glyphicon-download-alt"></i> 
										</a> <?= $value->file_apl;?>
									</td>  
									<td><?php if($value->status_balas == 1) :?> 
											<span class="label label-success"> Sudah dibalas</span> 
											<?php  else :?>
											<span class="label label-danger"> Belum dibalas</span>
										<?php endif; ?>
									</td>
									<td><i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($value->tanggal_apl));?></td>
									<td>
										<a href="<?= base_url('apl/hapus/'.$value->id_apl);?>" class="btn btn-danger btn-xs" onclick="return confirm('Mau hapus Apl ini ?')"> 
											<span class="glyphicon glyphicon-trash" ></span> Hapus
										</a>             
										<a href="<?= base_url('apl/edit/'. base64_encode($value->id_apl));?>" class="btn btn-warning btn-xs"> 
											<span class="glyphicon glyphicon-edit" ></span></i>Edit
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



