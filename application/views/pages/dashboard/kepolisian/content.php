<section class="content-header">
	<h1>
		Dashboard
		<small>Home</small>
	</h1>
	<ol class="breadcrumb">
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
					<h3>Total : <?= $surat_masuk_polisi;?></h3>

					<p><?= $surat;?></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kepolisian/riwayat_surat');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>Total : <?= $surat_balasan_dari_kejaksaan;?></h3>

					<p><?= $surat_balasan_kejaksaan;?></p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('kepolisian');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>Total : <?= $surat_balasan_dari_pengadilan;?></h3>

					<p><?= $surat_balasan_pengadilan;?></p>
				</div>
				<div class="icon">
					<i class="ion ion-pricetag"></i>
				</div>
				<a href="<?= base_url('kepolisian');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
				<h3>Total : <?= $bon;?></h3>

				<p><?= $title_bon;?></p>
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
					<h3>Total : <?= $total_bon_dibalas;?></h3>
					<p><?= $bon_dibalas;?></p>
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
					<h3>Total : <?= $apl;?></h3>
					<p><?= $title_apl;?></p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="<?= base_url('apl/riwayat_apl');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box warna_apl_dibalas">
				<div class="inner">
					<h3>Total : <?= $total_apl_dibalas;?></h3>
					<p><?= $apl_dibalas;?></p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="<?= base_url('apl');?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

</section>
	