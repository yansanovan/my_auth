<section class="content">
  	<div class="row">
    	<div class="col-lg-12">
      		<div class="box">
        		<div class="box-header"><br>         
		        	<?= form_open_multipart();?>
		          		<div class="col-md-12">
		            		<p>
		              			<a href="<?= base_url('pengadilan');?>" class="btn btn-warning btn-xs">
		                			<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
		              			</a>
	              				<div class="panel panel-info">
							  		<div class="panel-heading">
							  			<h3 align="center" style="color: black">
							  				<i class="fa fa-envelope" aria-hidden="true"></i> FORM BALAS
							  			</h3><br>
							  		</div>
							  		<div class="panel-body">
				              			<table  width="380px">
				                			<tbody>
				                  				<tr>
				                    				<td><i class="fa fa-user-o" aria-hidden="true"></i> Balas Kepada</td>
							                    	<td width="10px">:</td>
							                    	<td width="250px"><?= $value->username;?></td>
							                  	</tr>
				                  				<tr>
				                    				<td><i class="fa fa-address-book-o" aria-hidden="true"></i> Level </td>
				                    				<td width="10px">:</td>
				                    				<td width="250px"><?= $value->level;?></td>
				                  				</tr>
				                  				<tr>
				                  					<td> <i class="fa fa-calendar" aria-hidden="true"></i>  Tanggal Balas  </td>
													<td width="10px">:</td>
													<td width="250px"><?= date('d-m-Y'); ?></td>
												</tr>
				                			</tbody>
				              			</table><br>
				            			<table class="table table-bordered">
					              			<thead>
					                			<tr bgcolor="#8e8d8d">
					                  				<th class="col-sm-5" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
					                  				<th class="col-sm-7" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form</th>
					                			</tr>
					              			</thead>
					              			<tbody>
					                			<tr>
					                  				<td>Nama Tersangka</td>
					                  				<td>
									                    <input type="hidden" name="id_polisi" value="<?= $value->id_users;?>">
									                    <input type="hidden" name="id_surat" value="<?= $value->id_data;?>">
									                    <p><?= $value->nama_tersangka; ?></p>
					                  				</td>
					                			</tr>                
							                	<tr>
							                  		<td>Pasal</td>
							                  		<td><p><?= $value->pasal; ?></p></td>
							                	</tr>
					                			<tr>
					                  				<td>No Sprindik</td>
					                  				<td>
					                  					<div class="form-group">
							                      			<p><?= $value->no_sprindik; ?></p>
							                    		</div>
							                  		</td>
							                	</tr>
					                			<tr>
					                  				<td>No LP</td>
					                  				<td>
					                    				<div class="form-group">
					                      					<p><?= $value->no_lp; ?></p>
					                    				</div>
					                  				</td>
					                			</tr>
					                			<tr>
								                  	<td style="padding-top: 50px">Penggeledahan</td>
								                  	<td>
								                    	<div class="form-group">
								                      		<label for="file_path">ijin geledah <small style="color:red">*</small></label>
								                      		<div class="input-group">
								                          		<input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
							                          			<span class="input-group-btn">
							                              			<button class="btn btn-success" type="button" id="file_browser2">
							                              			<i class="fa fa-upload"></i></button>
							                          			</span>
								                      		</div>
								                      		<input type="file" class="hidden" id="file2" name="ijin_geledah" value="<?= set_value('ijin_geledah'); ?>">
								                      		<?= form_error('ijin_geledah'); ?>
								                    	</div>
								                    	<div class="form-group">
								                      		<label for="exampleInputEmail1">Setuju geledah <small style="color:red">*</small></label>
								                      		<div class="input-group">
								                          		<input type="text" id="file_path3" class="form-control" placeholder="Pilih setuju geledah">
								                          		<span class="input-group-btn">
								                              		<button class="btn btn-success" type="button" id="file_browser3">
								                              		<i class="fa fa-upload"></i></button>
								                          		</span>
								                      		</div>
								                      		<input type="file" class="hidden" id="file3" name="setuju_geledah" value="<?= set_value('setuju_geledah'); ?>">
								                      		<?= form_error('setuju_geledah'); ?>
								                    	</div>
								                  	</td>
								                </tr>
								                <tr>
								                  	<td style="padding-top: 60px">Tap Sita</td>
								                  	<td>
								                    	<div class="form-group">
								                      		<label for="exampleInputEmail1">Khusus <small style="color:red">*</small></label>
								                      		<div class="input-group">
								                          		<input type="text" id="file_path4" class="form-control" placeholder="Pilih Khusus">
								                          		<span class="input-group-btn">
								                              		<button class="btn btn-success" type="button" id="file_browser4">
								                              		<i class="fa fa-upload"></i></button>
								                          		</span>
								                      		</div>
								                      		<input type="file" class="hidden" id="file4" name="khusus" value="<?= set_value('khusus');?>">
								                      		<?= form_error('khusus'); ?>
								                    	</div>

								                    	<label for="exampleInputEmail1">Biasa <small style="color:red">*</small></label>
								                    	<div class="input-group">
								                        	<input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
								                        	<span class="input-group-btn">
								                            	<button class="btn btn-success" type="button" id="file_browser5">
								                            	<i class="fa fa-upload"></i></button>
								                        	</span>
								                    	</div>
								                    	<input type="file" class="hidden" id="file5" name="biasa" value="<?= set_value('biasa');?>">
								                    	<?= form_error('biasa'); ?>
								                  	</td>
								                </tr>
					              
								                <tr>
								                	<td style="padding-top: 20px">Perpangjangan</td>
								                  	<td>
								                    	<label for="exampleInputEmail1">Pengadilan <small style="color:red">*</small></label>
								                      	<div class="input-group">
								                        	<input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
								                          	<span class="input-group-btn">
								                            	<button class="btn btn-success" type="button" id="file_browser8">
								                            	<i class="fa fa-upload"></i></button>
								                          	</span>
								                      	</div>
								                      	<input type="file" class="hidden" id="file8" name="pengadilan" value="<?= set_value('pengadilan');?>">
								                      	<?= form_error('pengadilan'); ?>
								                  	</td>
								                </tr>
					              			</tbody>
				            			</table>
					            		<p style="color: red" ><i class="fa fa-exclamation-circle"></i> <i> Note : Tanda (*) Wajib di isi</i></p>
						            	<center><button name="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button></center><br>
			            			</div>
			            		</div>
		            		</p>
		            	</div>
		          	<?= form_close();?>
        		</div>
      		</div>
    	</div>
  	</div>
</section>
