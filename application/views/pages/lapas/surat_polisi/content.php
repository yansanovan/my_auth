<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>  
					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
						<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i>  SURAT POLISI  </h3><br>
					</nav>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Tersangka</th>
								<th>Dikirim Oleh</th>
								<th>Status Balas</th>
								<th>Tanggal Dikirim</th>
								<th>Detail</th>
							</tr>
							</thead>
							<tbody> 
							<?php 
							$no = 1;
							foreach ($kepolisian as $key => $value) 
							{
							?>
							<tr>
								<td><?= $no++;?></td>
								 <td><?= $value->nama_tersangka; ?></td>

								<td>
									<?= $value->username;?>
								</td>
								<td>
								<?php if ($value->status_kj == 1) { ?>
									<span class="label label-success"> 
										 Sudah dibalas
									</span>
								<?php } else { ?>
									<span class="label label-danger"> 
										Belum dibalas 
									</span>
								<?php
								}
								?>
								</td>

								<td>
									<i class="fa fa-calendar" aria-hidden="true"></i> <?=  date('d-m-Y ', strtotime($value->tanggal_posting)); ?>
								</td>

								<td>
									<a href="<?=  base_url('surat/detail_polisi/'. base64_encode($value->url));?>" class="btn btn-info btn-xs"> 
										<span class="glyphicon glyphicon-eye-open"></span> Detail
									</a>
								</td>
							</tr>           
							<?php 
							} 
							?>
							</tbody>
						</table>
					</div>
				</div>   
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</section>

