<section class="content-header">
    <h1> <i class="fa fa-folder-open-o" aria-hidden="true"></i> MASTER DATA</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
  	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"><br>
					<?= $this->session->flashdata('msgbox');?>          
					<div class="col-md-12" style="text-align: center;">
						<div class="row">
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box bg-aqua"> 
										<span class="info-box-icon  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1">
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
										</span>
										<div class="info-box-content dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
											<span class="info-box-text"><h4 align="center" style="margin-top:  30px">SPDP</h4></span>
										</div>
										<ul class="dropdown-menu">
											<li>
											 	<?= anchor('inbox/spdp_inbox', '<i class="fa fa-inbox"></i> Inbox SPDP');?>
											</li>
											 <li>
											 	<?= anchor('kepolisian/history', '<i class="fa fa-history"></i> History SPDP');?>
						                    </li>
					                  	</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box bg-green">
										<span class="info-box-icon  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1">
											<i class="fa fa-exchange"></i>
										</span>
										<div class="info-box-content  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
										  <span class="info-box-text"  style="margin-top:  10px"> <h4>Perpanjangan <br> Penahanan</h4></span>
										</div>
										<ul class="dropdown-menu" role="menu">
											<li>
						                    	<a href="#" data-toggle="modal" data-target="#modal_perpanjangan_penahanan">
						                    	<i class="fa fa-edit"></i>  Input Perpanjangan Penahanan</a>
						                    </li>
											<li>
												<a href="#"   data-toggle="dropdown">
													<i class="fa fa-envelope-open-o"></i> Perpanjangan Penahanan Masuk 
													<span class="label label-warning"></span>
												</a> 
											</li>
											<li>
						                    	<a href="<?= base_url('kepolisian/history');?>"><i class="fa fa-history"></i>  History Perpanjangan Penahanan</a>
						                    </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box bg-red">
										<span class="info-box-icon"><i class="fa fa-send"></i></span>
										<div class="info-box-content  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
										  <span class="info-box-text"  style="margin-top:  10px"> <h4>Pengiriman <br>Berkas Perkara</h4></span>
										</div>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="#">Separated link</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box bg-purple">
										<span class="info-box-icon"><i class="fa fa-lock fa-6" aria-hidden="true"></i></span>
										<div class="info-box-content  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
										  <span class="info-box-text"><h4 align="center" style="margin-top:  30px">Sita Narkotika</h4></span>
										</div>
										<ul class="dropdown-menu">
						                    <li>
						                    	<a href="#" data-toggle="modal" data-target="#exampleModal">
						                    	<i class="fa fa-edit"></i>  Input SPDP</a>
						                    </li>
											<li>
												<a href="#" data-toggle="dropdown">
													<i class="fa fa-envelope-open-o"></i> SPDP Masuk 
													<span class="label label-warning"></span>
												</a> 
											</li>
											 <li>
											 	<?= anchor('kepolisian/history', '<i class="fa fa-history"></i> History SPDP');?>
						                    </li>
					                  	</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box bg-yellow ">
										<span class="info-box-icon"><i class="fa fa-user"></i></span>
										<div class="info-box-content  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
										  <span class="info-box-text"> <h4>Pengiriman <br>  tersangka & <br>  barang bukti</h4></span>
										</div>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="#">Separated link</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dropdown">
									<div class="info-box" style="background-color: rgb(130, 125, 122); color:white;">
										<span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
										<div class="info-box-content  dropdown-toggle" data-toggle="dropdown"  id="dropdownMenu1" >
										  <span class="info-box-text"> <h4>Pemberitahuan <br> Pengiriman Tersangka <br> & Barang Bukti</h4></span>
										</div>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="#">Separated link</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

