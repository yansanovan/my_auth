<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
        		<div class="box-header">
			  		<?= $this->session->flashdata('msgbox');?>
	          		<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
	            		<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> SURAT BALASAN PENGADILAN </h2><br>
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
							        <th>Status Balas</th>
							        <th>Tgl Balas</th>
							        <th>Tgl Penahanan</th>
							        <th>Aksi</th>
							    </tr>
							</thead>
							<tbody> 
	             			<?php $no = 1; foreach ($data as $key => $value) :?>
	              			<tr>
								<td><?= $no++;?></td>
								<td><?= $value->nama_tersangka;?></td>
								<td><?= $value->nama_jpu;?></td>
								<td>
									<?php if ($value->status_balas == 1): ?>
								  		<span class="label label-success"> Sudah dibalas </span>
									<?php else : ?>
										<span class="label label-danger"> Belum dibalas</span>
									<?php endif; ?>
								</td>
								<td>
	              					<i class="fa fa-calendar" aria-hidden="true"></i>
									<?= date('d-m-Y',(strtotime($value->tanggal_balas)));?>
								</td>
								<td>
	              					<i class="fa fa-calendar" aria-hidden="true"></i>
									<?php $tanggal = date('d-m-Y',(strtotime($value->tanggal_penahanan)));
									echo date('d-m-Y',(strtotime($value->tanggal_penahanan)));
									?>
								</td>
                				<td>
				                 	<a href="<?= base_url('kejaksaan_surat/detail/'.base64_encode($value->id_surat));?>" class="btn btn-info btn-xs">
				                 		<span class="glyphicon glyphicon-eye-open"></span> Detail
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


