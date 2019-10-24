<section class="content-header">
    <h1> <i class="fa fa-book" aria-hidden="true"></i> HISTORY SPDP</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i> History Spdp</a></li>
  	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
				<!-- 	<nav class="navbar navbar-light">
						<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> HISTORY SPDP </h3><br>
					</nav> -->
					<div class="well">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<a href="<?php echo base_url('kepolisian/form');?>" class="btn btn-success btn-md"> 
										<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back
									</a>
									<button class="btn btn-danger btn-md"> 
										<i class="fa fa-trash" aria-hidden="true"></i> Delete Selected
									</button>
								</div>
								<div class="col-lg-3">
									<form id="form-filter" class="form-group">
					                    <div class="form-group">
				                            <input type="text" class="form-control" id="nama_tersangka" placeholder="Filter Here ..">
					                    </div>
					                </form>
								</div>
								<div class="col-lg-3 no-padding-left">
		                            <button type="button" id="btn-filter" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
		                            <button type="button" id="btn-reset" class="btn btn-warning"> <i class="fa fa-undo"></i> Reset</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tersangka</th>
									<th>Rujukan</th>
									<th>Date & Time</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Form Input Data</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
      		<?php $submit = array('id' => 'submit');?>
			<?php echo form_open_multipart('', $submit);?>		
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
	        	<!-- <button type="reset" class="btn btn-warning" id="reset">Reset</button> -->
	        	<button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
	      	</div>
	      	<?= form_close();?>
    	</div>
  	</div>
</div>

