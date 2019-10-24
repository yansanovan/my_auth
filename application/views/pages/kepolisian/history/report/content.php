<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<!-- Bootstrap 3.3.7 -->
	<!-- <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>"> -->
	<!-- Bootstrap 3.3.7 -->
	<!-- <script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script> -->

	<style type="text/css">
		.to{
			margin-left:370px;
			margin-bottom: 30px; 
		}
		.assign{
			margin-left:300px;
			margin-bottom: 10px; 
		}
		#style{
			  font-family: Arial, Helvetica, sans-serif;
			  font-size: 14px;
		}
	</style>
</head>
<body>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<div class="box-header">
						<div class="col-md-12" id="style">
							<img src="asset/img/police.jpg" width="100px" style="margin-left: 70px;">
							<p style="margin-bottom: 40px;">
								<div>
									KEPOLISIAN DAERAH KOTA BARU <br>
								</div>
								<div style="margin-left: 40px">
									<u>RESORT KOTA BARU</u>
								</div>
							</p>
							<div style="text-align:right;">Kota Baru, <?= date('d F Y', strtotime($data->date));?></div>
							<table  width="70%" style="margin-bottom: 20px">
						        <tbody>
						            <tr>
						                <td style="width:10%">No. Pol.</td><td style="width:2%">:</td><td style="width:50%"><?= $data->no_pol;?></td>
						            </tr>
						            <tr>
						                <td style="width:10%">Klasifikasi</td><td style="width:2%">:</td><td>Biasa</td>
						            </tr>
						            <tr>
						                <td style="width:10%">Perihal</td><td style="width:2%">:</td><td style="width:50%">Surat Pemberitahuan dimulainya penyidikan</td>
						            </tr>
						        </tbody>
						    </table>
						    <div class="to">
								<div style="margin-left: 35px"> Kepada</div>
								<div style="margin-left: 5px">Yth. KEPALA KEJAKSAAN NEGERI KOTABARU</div>
								<div style="margin-left: 35px">Di - </div>
								<div style="margin-left: 55px">KOTA BARU</div>
						    </div>
						    <div>
					    		<?= $data->rujukan;?>
						    </div>
						    <div class="assign" style="margin-top: 40px; text-align: center">
								<div>KEPALA KEPOLISIAN SEKTOR KOTA BARU</div>
								<div>Selaku penyidik</div>
								<div style="margin-top: 100px;">M. BUDHI SETYADI,S.I.K, M.M</div>
								<div>AJUN KOMISARIS POLISI NRP. 77121082</div>
						    </div>
						    <div>
								Tembusan :
								<div>
								1.	Kapolres L U <br>
								2.	Ketua PN Kotabumi.
								</div>                
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</body>
</html>

