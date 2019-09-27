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
								<th>Pasal</th>
								<th>No Sprindik</th>
								<th>Dikirim Oleh</th>
								<th>Status Balas</th>
								<th>Tanggal Dikirim</th>
								<th>Detail</th>
								<th>Aksi</th>
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
							 	<td><?= $value->pasal;?></td>
							 	<td><?= $value->no_sprindik;?></td>
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
									<a href="<?=  base_url('kejaksaan/detail/'. base64_encode($value->url));?>" class="btn btn-info btn-xs"> 
										<span class="glyphicon glyphicon-eye-open"></span> Detail
									</a>
								</td>
								<td>
								<?php

								if ($value->status_kj == 1) 
								{
								?>
									<a href="<?=  base_url('kejaksaan/form_balas/'.base64_encode($value->id_data));?>" class="btn btn-success btn-xs"> 
										<i class="fa fa-lock" aria-hidden="true"></i> Balas
									</a>
								<?php 
								}
								else
								{
								?>
			
									<a href="<?=  base_url('kejaksaan/form_balas/'.base64_encode($value->id_data));?>" class="btn btn-danger btn-xs"> 
										<i class="fa fa-unlock" aria-hidden="true"></i> Balas
									</a>
								<?php  
								}
								?>
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

