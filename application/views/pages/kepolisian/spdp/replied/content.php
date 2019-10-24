<section class="content-header">
    <h1> <i class="fa fa-inbox" aria-hidden="true"></i> SPDP REPLIED</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i> SPDP REPLIED</a></li>
  	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<div class="well">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<a href="<?php echo base_url('kepolisian/form');?>" class="btn btn-success btn-md"> 
										<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back
									</a>
									<!-- <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-md"> 
										<i class="fa fa-plus" aria-hidden="true"></i> Input SPDP
									</a> -->
								</div>
								<!-- <div class="col-lg-3">
									<form id="form-filter" class="form-group">
					                    <div class="form-group">
				                            <input type="text" class="form-control" id="nama_tersangka" placeholder="Filter Here ..">
					                    </div>
					                </form>
								</div>
								<div class="col-lg-2 no-padding-left">
		                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
		                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="tbl_replied_spdp" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tersangka</th>
									<th>Message</th>
									<th>Replied By</th>
									<th>Date & Time Replied</th>
									<th>File</th>
									<th>Action</th>
								</tr>
								</thead>
							<tbody> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


