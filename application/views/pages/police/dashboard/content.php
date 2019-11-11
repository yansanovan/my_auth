<section class="content-header">
	<h1>
		Dashboard
		<small>Home</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i> Last login : <?= date('d-m-Y / H:i:a', strtotime($last_login->last_login));?></a></li>
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<!-- Main content -->

<section class="content">
	<?= $this->session->flashdata('msgbox');?>
	<div class="jumbotron">
		<center>
			<h1 class="display-4">Selamat Datang!</h1>
			<p class="lead">Anda Login sebagai <strong><?=  strtoupper($this->session->userdata('level'));?></strong>, Terima kasih!</p>
		</center>
	</div>
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>Total :</h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kejaksaan');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>Total : </h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kejaksaan/riwayat_balas');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>Total : </h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kejaksaan_surat/riwayat_surat');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Total : </h3>

					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kejaksaan_surat');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>Total : </h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-pricetag-outline"></i>
				</div>
				<a href="<?= base_url('bon/riwayat_bon');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box " id="warna">
				<div class="inner">
					<h3>Total : </h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-pricetag-outline"></i>
				</div>
				<a href="<?= base_url('bon');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>Total : </h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="<?= base_url('apl/riwayat_apl');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h3>Total :</h3>
					<p></p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="<?= base_url('apl');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

</section>
	