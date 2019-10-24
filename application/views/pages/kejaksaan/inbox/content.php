<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header"><br>
					<?= $this->session->flashdata('msgbox');?>            
					<div class="col-md-12">
						<nav class="navbar navbar-light">
							<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> INBOX </h3><br>
						</nav>
			            <div class="margin" align="center">
			                <div class="btn-group" style="margin-right: 10px;">
			                  	<button type="button" class="btn btn-app bg-blue" style="width: 320px; height: 100px" data-toggle="dropdown">
				                	<span class="badge bg-yellow count_spdp" style="font-size: 14px;"></span>
					               	<i class="fa fa-edit fa-4"></i> <h4>SPDP</h4>
			                  	</button>
			                  	<ul class="dropdown-menu">
									<li>
										<a href="<?= base_url('inbox/spdp_inbox');?>">
											<i class="fa fa-envelope-open-o"></i> SPDP Masuk 
											<span class="label label-warning count_spdp"></span>
										</a> 
									</li>
									 <li>
				                    	<a href="<?= base_url('inbox/spdp_inbox');?>"><i class="fa fa-history"></i>  History SPDP</a>
				                    </li>
			                  	</ul>
			                </div>

			                <div class="btn-group" style="margin-right: 10px">
			                  	<button type="button" class="btn btn-app bg-green" style="width: 320px;  height: 100px;" data-toggle="dropdown">
				                	<span class="badge bg-yellow count_perpanjangan_penahanan" style="font-size: 14px;"></span>
					            	<i class="fa fa-exchange"></i> <h4>Perpanjangan Penahanan</h4>
			                  	</button>
								<ul class="dropdown-menu">
									<li>
										<a href="<?= base_url('inbox/perpanjangan_penahanan_inbox');?>">
											<i class="fa fa-envelope-open-o"></i> Perpanjangan Penahanan Masuk
											<span class="label label-warning count_perpanjangan_penahanan"></span>
										</a> 
									</li>
									 <li>
				                    	<a href="<?= base_url('inbox/spdp_inbox');?>"><i class="fa fa-history"></i>  History Perpanjangan Penahanan</a>
				                    </li>
			                  	</ul>
			                </div>

			                <div class="btn-group" style="margin-right: 10px;">
								<button type="button" class="btn btn-app bg-red" style="width: 320px; height: 100px;" data-toggle="dropdown">
								   <span class="badge bg-yellow count_pengiriman_berkas_perkara"  style="font-size: 14px;"></span> 
								   <i class="fa fa-send"></i> <h4>Pengiriman Berkas Perkara</h4>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a href="<?= base_url('inbox/spdp_inbox');?>">
											<i class="fa fa-envelope-open-o"></i> Pengiriman Berkas Perkara Masuk
											<span class="label label-warning count_pengiriman_berkas_perkara"></span>
										</a> 
									</li>
									 <li>
				                    	<a href="<?= base_url('inbox/spdp_inbox');?>"><i class="fa fa-history"></i>  History Pengiriman Berkas Perkara</a>
				                    </li>
			                  	</ul>
			                </div>

			                <div class="btn-group" style="margin-right: 10px;">
			                  	<button type="button" class="btn btn-app" style="width: 320px;  height: 100px; background-color: rgb(130, 125, 122); color:white;" data-toggle="dropdown">
				                   <span class="badge bg-yellow count"></span> 
					               <i class="fa fa-medkit" aria-hidden="true"></i><h4> Sita Narkotika</h4>
			                  	</button>
			                  	<ul class="dropdown-menu" id="notifikasi" role="menu">
				                    <li>
				                    	<a href="#" data-toggle="modal" data-target="#exampleModal">
				                    	<i class="fa fa-edit"></i>  Input SPDP</a>
				                    </li>
									<li>
										<a href="#"   data-toggle="dropdown" class="polisi">
											<i class="fa fa-envelope-open-o"></i> SPDP Masuk 
											<span class="label label-warning count"></span>
										</a> 
									</li>
			                  	</ul>
			                </div>

			                <div class="btn-group" style="margin-right: 10px;">
				                <button type="button" class="btn btn-app bg-purple" style="width: 320px;  height: 100px;" data-toggle="dropdown">
									<span class="badge bg-yellow count"></span> 
						            <i class="fa fa-bullhorn"></i> <h4>Pemberitahuan Pengiriman Tersangka <br>& Barang Bukti</h4>
				                </button>
			                  	<ul class="dropdown-menu" id="notifikasi" role="menu">
				                    <li>
				                    	<a href="#" data-toggle="modal" data-target="#exampleModal">
				                    	<i class="fa fa-edit"></i>  Input SPDP</a>
				                    </li>
									<li>
										<a href="#"   data-toggle="dropdown" class="polisi">
											<i class="fa fa-envelope-open-o"></i> SPDP Masuk 
											<span class="label label-warning count"></span>
										</a> 
									</li>
			                  	</ul>
			                </div>

			                <div class="btn-group" style="margin-right: 10px;">
								<button type="button" class="btn btn-app bg-aqua" style="width: 320px;  height: 100px;" data-toggle="dropdown">
								   <span class="badge bg-yellow count"></span> 
								   <i class="fa fa-inbox"></i><h4> Pengiriman Tersangka & Barang Bukti</h4>
								</button>
			                  	<ul class="dropdown-menu" id="notifikasi" role="menu">
				                    <li>
				                    	<a href="#" data-toggle="modal" data-target="#exampleModal">
				                    	<i class="fa fa-edit"></i>  Input SPDP</a>
				                    </li>
									<li>
										<a href="#"   data-toggle="dropdown" class="polisi">
											<i class="fa fa-envelope-open-o"></i> SPDP Masuk 
											<span class="label label-warning count"></span>
										</a> 
									</li>
			                  	</ul>
			           		</div>
			           	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Form Input Data</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
      		<?php $submit// = array('id' => 'submit');?>
			<?php// echo form_open_multipart('', $submit);?>		
				<div class="form-group has_nama_tsk">
					<label class="control-label" for="inputError">Nama Tersangka <smal style="color:red">*</smal></label>
					<input type="text" name="nama_tersangka" class="form-control" placeholder="Nama Tersangka">
					<span id="nama_tersangka" class="help-block"></span>
				</div>
				<div class="form-group has_file">
					<label class="control-label" for="inputError"> Attachment <smal style="color:red">*</smal></label>
					<div class="input-group">
						<input type="text" id="file_path11" class="form-control" placeholder="Choose File">
						<span class="input-group-btn">
							<button class="btn btn-success" type="button" id="file_browser11">
							<i class="fa fa-upload"></i> Browse</button>
						</span>
					</div>
					<input type="file" class="hidden" id="file11" name="file">
					<span id="file" class="help-block"></span>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-block btn-submit">Submit</button>
				</div>
      		</div>
	      	<div class="modal-footer">
	        	<button type="reset" class="btn btn-warning" id="reset">Reset</button>
	        	<button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
	      	</div>
	      	<?php //echo form_close();?> -->
    	<!-- </div>
  	</div>
</div> -->


