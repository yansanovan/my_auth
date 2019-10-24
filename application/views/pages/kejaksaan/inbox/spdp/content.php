<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?= $this->session->flashdata('msgbox');?>
					<a href="<?php echo base_url('inbox');?>" class="btn btn-success btn-xs"  style="float:right;"> 
						<i class="fa fa-undo" aria-hidden="true"></i> Back
					</a><br><br>

					<nav class="navbar navbar-light" style="background-color:#8e8d8d;">
						<h3 style="color: white; text-align: center;"><i class="fa fa-envelope" aria-hidden="true"></i>  SPDP </h3>
						<br>
					</nav>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="table2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Tersangka</th>
									<th>File</th>
									<th>Date & Time</th>
									<!-- <th>Status</th> -->
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

<div class="modal fade" id="modal_reply_spdp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Form Reply Spdp</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body" id="modal_reply">
      		<?php $submit_reply_spdp = array('id' => 'submit_reply_spdp');?>
			<?php echo form_open_multipart('', $submit_reply_spdp);?>		
				<div class="form-group">
					<input type="hidden" name="id_spdp" class="form-control" placeholder="Id Spdp">
					<input type="text" name="id_police" class="form-control" placeholder="Id Police">
				</div>
				<div class="form-group has_reply_spdp">
					<label class="control-label" for="inputError">Reply Spdp <smal style="color:red">*</smal></label>
					<input type="text" name="reply_spdp" class="form-control" placeholder="Reply Spdp">
					<span id="reply_spdp" class="help-block"></span>
				</div>
				<div class="form-group has_file_reply_spdp">
					<label class="control-label" for="inputError"> Attachment <smal style="color:red">*</smal></label>
					<div class="input-group">
						<input type="text" id="file_path3" class="form-control" placeholder="Choose File">
						<span class="input-group-btn">
							<button class="btn btn-success" type="button" id="file_browser3">
							<i class="fa fa-upload"></i> Browse</button>
						</span>
					</div>
					<input type="file" class="hidden" id="file3" name="file_reply_spdp">
					<span id="file_reply_spdp" class="help-block"></span>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-block btn-submit">Submit</button>
				</div>
      		</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      	</div>
	      	<?= form_close();?>
    	</div>
  	</div>
</div>



