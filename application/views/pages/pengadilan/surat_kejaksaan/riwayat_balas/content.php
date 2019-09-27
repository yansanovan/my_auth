<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
        		<div class="box-header">
	          		<?= $this->session->flashdata('msgbox');?>
	          		<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
	            		<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT BALAS </h2><br>
	          		</nav>
        		</div>
        		<div class="box-body">
          			<div class="table-responsive">
            			<table id="example1" class="table table-bordered table-striped"  style="width:100%">
              				<thead>
              					<tr>
							        <th>No</th>
							        <th>Nama Tersangka</th>
							        <th>Nama Jaksa Penuntut Umum</th>
							        <th>Dibalas Kepada</th>
							        <th>Tanggal Dibalas</th>
							        <th>Aksi</th>
							    </tr>
							</thead>
							<tbody> 
		             			<?php $no = 1; foreach ($data as $key => $value) : ?>
		              			<tr>
									<td><?= $no++;?></td>
									<td><?= $value->nama_tersangka;?></td>
									<td><?= $value->nama_jpu;?></td>
									<td><?= $value->username; ?> (<?= $value->level ?>)</td>
									<td>
		              					<i class="fa fa-calendar" aria-hidden="true"></i>
										<?php $tanggal = date('d-m-Y',(strtotime($value->tanggal_balas)));
										echo $tanggal;?>
									</td>
	                				<td>
	                    				<a href="<?= base_url('pengadilan_surat/hapus/'.base64_encode($value->id_surat));?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus')">
											<i class="fa fa-trash" aria-hidden="true"></i> Hapus
					                    </a>
	                    				<a href="<?= base_url('pengadilan_surat/edit/'.base64_encode($value->id_surat));?>" class="btn btn-warning btn-xs"> 
	                      					<i class="fa fa-edit" aria-hidden="true"></i> Edit
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


