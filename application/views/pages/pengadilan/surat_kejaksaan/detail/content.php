<section class="content">
	<div class="row">
    	<div class="col-xs-12">
      		<div class="box">
        		<div class="box-header">
          			<div class="col-md-12">
		          		<?= $this->session->flashdata('msgbox');?>  
		          		<P><br>    
		            		<a href="<?= base_url('pengadilan_surat');?>" class="btn btn-warning btn-xs">
		               			<i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Kembali
		            		</a>
            				<div class="panel panel-info">
							  	<div class="panel-heading">
							  		<h3 align="center" style="color: black"><i class="fa fa-envelope" aria-hidden="true"></i> DETAIL SURAT KEJAKSAAN </h3><br>
							  	</div>
							  	<div class="panel-body">
									<table  width="500px">
			              				<tbody>
			                			<tr>
			                    			<td><i class="fa fa-user-o" aria-hidden="true"></i> Dikirim Oleh</td>
			                    			<td width="10px">:</td>
			                    			<td width="250px"><?= $data->username;?></td>
			                			</tr>
			                			<tr>
			                    			<td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Penahanan T-7 </td>
			                    			<td width="10px">:</td>
						                    <td width="250px">
												<?php date_default_timezone_set('Asia/Jakarta');
										    	echo date('d-m-Y',(strtotime($data->tgl_jatuh_tempo)));
										    	?>
												<?php 
												$tgl_posting    = new DateTime($data->tanggal_posting);
											 	$tgl_penahanan  = new DateTime($data->tanggal_penahanan);
												$difference 	= $tgl_posting->diff($tgl_penahanan);
												if ($data->selisih <= 10) { ?>
											  		<span class="label label-warning"> <?php echo 'Masa Penahanan sisa '. ($data->selisih); ?></span> 
												<?php 
												}else if ($data->selisih <= 5) { ?>
											  		<span class="label label-danger"> <?php echo 'Harus diperpanjang';?></span> 
												<?php 
												}else if ($data->selisih <= 0) { ?>
											  		<span class="label label-danger"> <?php echo 'Masa penahanan sudah habis';?></span> 
												<?php 
												}else { ?>
											  		<span class="label label-success"> <?= $data->selisih . ' Hari' ?></span> 
												<?php } ?>
											</td>
						                </tr>
						                <tr>
						                    <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Pelimpahan Perkara P-31 </td>
						                    <td width="10px">:</td>
						                    <td width="250px"><?= date('d-m-Y', strtotime($data->tanggal_pelimpahan_p31)); ?></td>
						                </tr>
						                <tr>
						                    <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Pelimpahan Perkara P-32</td>
						                    <td width="10px">:</td>
						                    <td width="250px"><?= date('d-m-Y', strtotime($data->tanggal_pelimpahan_p32)); ?></td>
						                </tr>
			              				</tbody>
		            				</table><br>
		          					<table class="table table-bordered">
			            				<thead class="thead-dark">
			              					<tr bgcolor="#8e8d8d">
			                					<th class="col-sm-5" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
							                	<th class="col-sm-7" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> Lampiran</th>
							              	</tr>
			            				</thead>
			            				<tbody>
			              					<tr>
			                					<td>Nama Tersangka</td>
			                					<td><?= $data->nama_tersangka;?></td>
			              					</tr>
								            <tr>
								                <td>Nama Jaksa Penuntut Umum (P-16A)</td>
								                <td><?= $data->nama_jpu;?></td>
								            </tr>
			              					<tr>  
			                					<td>T-6</td>
			                					<td>
			                  						<div class="form-group">
				                    					<label for="exampleInputEmail1">T-6</label>
				                    					<p>
				                      						<a href="<?= base_url('pengadilan_surat/unduh/'. $data->t_6);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
				                      							<i class="glyphicon glyphicon-download-alt"></i> 
				                      						</a> <?= $data->t_6;?>
				                    					</p>
			                  						</div>
			                					</td>
			              					</tr>
			              					<tr>  
								                <td>T-7</td>
								                <td>
								                	<div class="form-group">
								                    	<label for="exampleInputEmail1">T-7</label>
								                    	<p>
								                      		<a href="<?= base_url('pengadilan_surat/unduh/'. $data->t_7);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
								                      			<i class="glyphicon glyphicon-download-alt"></i> 
								                      		</a> <?= $data->t_7;?>
								                    	</p>
								                  	</div>
								                </td>
											</tr>
								            <tr>  
			                					<td>T-10</td>
			                					<td>
			                  						<div class="form-group">
									                    <label for="exampleInputEmail1">T-10</label>
									                    <p>
									                      	<a href="<?= base_url('pengadilan_surat/unduh/'. $data->t_10);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i> 
									                    	</a> <?= $data->t_10;?>
									                    </p>
									                </div>
												</td>
											</tr>
											<tr>
												<td>Surat Dakwaan</td>  
												<td>
													<div class="form-group">
														<label for="exampleInputEmail1">P-29</label>
														<p>
															<a href="<?= base_url('pengadilan_surat/unduh/'. $data->p_29);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i> 
															</a> <?= $data->p_29;?>
														</p>
													</div>
												</td>
											</tr>
			              					<tr>  
			                					<td>P-31</td>
			                					<td>
								                	<div class="form-group">
								                    	<label for="exampleInputEmail1">P-31</label>
								                    	<p>
								                      		<a href="<?= base_url('pengadilan_surat/unduh/'. $data->p_31);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
								                      			<i class="glyphicon glyphicon-download-alt"></i> 
								                      		</a> <?= $data->p_31;?>
								                    	</p>
								                  	</div>
								                </td>
								            </tr>
											<tr>  
												<td>P-32</td>
												<td>
													<div class="form-group">
														<label for="exampleInputEmail1">P-32</label>
														<p>
															<a href="<?= base_url('pengadilan_surat/unduh/'. $data->p_32);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i>
															</a> <?= $data->p_32;?>
														</p>
													</div>
												</td>
											</tr>
			              					<tr>  
			                					<td>Surat Dakwaan</td>  
			                					<td>
			                  						<div class="form-group">
														<label for="exampleInputEmail1">P-42</label>
														<p>
															<a href="<?= base_url('pengadilan_surat/unduh/'. $data->p_42);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i> 
															</a> <?= $data->p_42;?>
														</p>
													</div>
												</td>
											</tr>
											<tr>  
												<td>Eksekusi</td>
												<td>
													<div class="form-group">
														<label for="exampleInputEmail1">P-48</label>
														<p>
															<a href="<?= base_url('pengadilan_surat/unduh/'. $data->p_48);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i> 
															</a> <?= $data->p_48;?>
														</p>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">BA-17</label>
														<p>
															<a href="<?= base_url('pengadilan_surat/unduh/'. $data->ba_17);?>" class="btn btn-primary btn-xs" onclick="return confirm('Mau download ?')">
																<i class="glyphicon glyphicon-download-alt"></i> 
															</a> <?= $data->ba_17;?>
														</p>
													</div>
												</td>
											</tr>            
			            				</tbody>
		          					</table>
          						</div>
							</div>
          				</p>
          			</div>
        		</div>
      		</div>
    	</div>
  	</div>
</section>
