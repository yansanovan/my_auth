<section class="content">
  	<div class="row">
    	<div class="col-md-12">
      		<div class="box">
        		<div class="box-header"><br>
	      			<?= $this->session->flashdata('msgbox');?>            
	      			<?= form_open_multipart();?>
		          		<div class="col-md-12">
		            		<p>
								<a href="<?= base_url('pengadilan_surat/riwayat_balas');?>" class="btn btn-warning btn-xs"> 
									<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
								</a>
				           		<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
				            		<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> FORM EDIT SURAT  </h3><br>
				            	</nav>
				            	<table  width="500px">
		              			<tbody>
		                			<tr>
		                    			<td><i class="fa fa-user" aria-hidden="true"></i> Balas Kepada</td>
		                    			<td width="10px">:</td>
		                    			<td width="250px"><?= $value->username;?></td>
		                			</tr>
		                			<tr>
					                    <td> <i class="fa fa-address-book-o" aria-hidden="true"></i> Level </td>
					                    <td width="10px">:</td>
					                    <td width="250px"><?= $value->level; ?></td>
					                </tr>
		                			<tr>
		                    			<td><i class="fa fa-user-o" aria-hidden="true"></i> Nama Tersangka</td>
		                    			<td width="10px">:</td>
		                    			<td width="250px"><?= $value->nama_tersangka;?></td>
		                			</tr>
		                			<tr>
		                    			<td><i class="fa fa-user-o" aria-hidden="true"></i> Nama Jaksa Penuntut Umum</td>
		                    			<td width="10px">:</td>
		                    			<td width="250px"><?= $value->nama_jpu;?></td>
		                			</tr>
		                			<tr>
		                    			<td><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Penahanan</td>
		                    			<td width="10px">:</td>
		                    			<td width="250px"><?= $value->tanggal_penahanan;?></td>
		                			</tr>
		              			</tbody>
	            			</table>
		            		</p>
		            		<table class="table table-bordered" >
		              			<thead>
		                			<tr bgcolor="#8e8d8d">
					                	<th class="col-sm-4" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
					                	<th class="col-sm-4" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
					                	<th class="col-sm-4" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form Edit </th>
					                </tr>
					            </thead>
				              	<tbody>
				                	<tr>
					                  	<td>T-6</td>
										<td>
											<div class="form-group">
						                    	<label for="exampleInputEmail1">T-6</label>
					                      		<p>
					                      			<a href="<?= base_url('kejaksaan/unduh/'.$value->t_10);?>" class="btn btn-primary btn-xs">
					                      				<i class="glyphicon glyphicon-download-alt"></i> 
					                      			</a>
					                        		<?= $value->t_6;?>
					                        	</p>  
						                    </div>
				                  		</td>
					                  	<td>
					                    	<div class="form-group">
					                      		<label for="file_path">T-6 (*)</label>
					                     		<div class="input-group">
					                          		<input type="text" id="file_path2" class="form-control" placeholder="Pilih file T-6">
					                          		<span class="input-group-btn">
					                              		<button class="btn btn-success" type="button" id="file_browser2">
					                              		<i class="fa fa-upload"></i> </button>
					                          		</span>
					                      		</div>
					                      		<input type="file" class="hidden" id="file2" name="t_6" value="<?= set_value('t_6'); ?>">
					                      		<?= form_error('t_6'); ?>
					                    	</div>
					                  	</td>
				                	</tr>
					                <tr>
					                	<td>T-7</td>
										<td>
											<div class="form-group">
						                    	<label for="exampleInputEmail1">T-7</label>
					                      		<p>
					                      			<a href="<?= base_url('kejaksaan/unduh/'.$value->t_10);?>" class="btn btn-primary btn-xs">
					                      				<i class="glyphicon glyphicon-download-alt"></i> 
					                      			</a>
					                        		<?= $value->t_7;?>
					                        	</p>  
						                    </div>
				                  		</td>
				                  		<td>
					                        <label for="exampleInputEmail1">T-7 (*)</label> 
				                          	<div class="input-group">
			                            		<input type="hidden" name="id_surat_balas" value="<?= $value->id_surat;?>">
			                            		<input type="text" id="file_path" class="form-control" placeholder="Pilih T-7">
			                              		<span class="input-group-btn">
				                                	<button class="btn btn-success" type="button" id="file_browser"><i class="fa fa-upload"></i> </button>
				                            	</span>
				                          	</div>
				                          	<input type="file" class="hidden" id="file" name="t_7" value="<?= set_value('t_7');?>">
					                        <?= form_error('t_7'); ?>
				                  		</td>
					                </tr>
				                	<tr>
				                  		<td>T-10</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">T-10</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->t_10);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->t_10;?></p>  
						                    </div>
				                  		</td>
				                  		<td>
				                    		<div class="form-group">
					                      		<label for="file_path">T-10 (*)</label>
					                      		<div class="input-group">
					                          		<input type="text" id="file_path3" class="form-control" placeholder="Pilih file T-10">
					                          		<span class="input-group-btn">
						                            	<button class="btn btn-success" type="button" id="file_browser3">
						                            	<i class="fa fa-upload"></i> </button>
						                          	</span>
					                      		</div>
					                      		<input type="file" class="hidden" id="file3" name="t_10" value="<?= set_value('t_10'); ?>">
					                      		<?= form_error('t_10'); ?>
				                    		</div>
				                  		</td>
				                	</tr>
				               		<tr>
				                  		<td>Surat Dakwaan</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">P-29</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->p_29);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->p_29;?></p>  
						                    </div>
				                  		</td>
				                  		<td>
				                    		<div class="form-group">
				                      			<label for="exampleInputEmail1">P-29 (*)</label>
				                      			<div class="input-group">
				                          			<input type="text" id="file_path4" class="form-control" placeholder="Pilih Kejaksaan">
				                          			<span class="input-group-btn">
				                              			<button class="btn btn-success" type="button" id="file_browser4">
				                              			<i class="fa fa-upload"></i> </button>
				                          			</span>
				                      			</div>
				                      			<input type="file" class="hidden" id="file4" name="p_29" value="<?= set_value('p_29');?>">
				                      			<?= form_error('p_29'); ?>
				                    		</div>
				                  		</td>
				                	</tr>
				                	<tr>
				                  		<td>P-31</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">P-31</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->p_48);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->p_31;?></p>  
						                    </div>
				                  		<td>
		                        			<label for="exampleInputEmail1">P-31 (*)</label>
		                          			<div class="input-group">
		                            			<input type="text" id="file_path5" class="form-control" placeholder="Pilih P-31">
		                              			<span class="input-group-btn">
		                                			<button class="btn btn-success" type="button" id="file_browser5"><i class="fa fa-upload"></i> </button>
		                              			</span>
		                          			</div>
		                          			<input type="file" class="hidden" id="file5" name="p_31" value="<?= set_value('p_31');?>">
		                          			<?= form_error('p_31'); ?>
				                  		</td>
				               		</tr>
				                	<tr>
				                  		<td>P-32</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">P-32</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->p_48);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->p_32;?></p>  
						                    </div>
										</td>
				                  		<td>
		                        			<label for="exampleInputEmail1">P-32 (*)</label>
		                          			<div class="input-group">
		                            			<input type="text" id="file_path6" class="form-control" placeholder="Pilih P-32">
		                              			<span class="input-group-btn">
		                                			<button class="btn btn-success" type="button" id="file_browser6"><i class="fa fa-upload"></i> </button>
		                              			</span>
		                          			</div>
					                        <input type="file" class="hidden" id="file6" name="p_32" value="<?= set_value('p_32');?>">
				                          	<?= form_error('p_32'); ?>
				                  		</td>
				                	</tr>
				                	<tr>
				                  		<td>Surat Tuntutan</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">P-42</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->p_48);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->p_42;?></p>  
						                    </div>
										</td>
				                  		<td>
				                    		<div class="form-group">
				                      			<label for="exampleInputEmail1">P-42 (*)</label>
				                      			<div class="input-group">
				                          			<input type="text" id="file_path7" class="form-control" placeholder="Pilih P-42">
				                          			<span class="input-group-btn">
				                              		<button class="btn btn-success" type="button" id="file_browser7">
				                              			<i class="fa fa-upload"></i> </button>
				                          			</span>
				                      			</div>
				                      			<input type="file" class="hidden" id="file7" name="p_42" value="<?= set_value('p_42');?>">
				                      			<?= form_error('p_42'); ?>
				                    		</div>
				                  		</td>
				                	</tr>
				                	<tr>
				                		<td>Eksekusi</td>
										<td>
											<div class="form-group">
						                      <label for="exampleInputEmail1">P-48</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->p_48);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->p_48;?></p>  
						                    </div>
						                    <br>
						                    <div class="form-group">
						                      <label for="exampleInputEmail1">BA-17</label>
						                      <p><a href="<?= base_url('kejaksaan/unduh/'.$value->ba_17);?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
						                        <?= $value->ba_17;?></p>  
						                    </div>
										</td>
				                  		<td>
				                    		<div class="form-group">
				                      			<label for="exampleInputEmail1">P-48 (*)</label>
				                      			<div class="input-group">
					                          		<input type="text" id="file_path8" class="form-control" placeholder="Pilih P-48">
					                          		<span class="input-group-btn">
					                              		<button class="btn btn-success" type="button" id="file_browser8">
					                              		<i class="fa fa-upload"></i> </button>
					                          		</span>
				                      			</div>
						                      	<input type="file" class="hidden" id="file8" name="p_48" value="<?= set_value('p_48');?>">
				                      			<?= form_error('p_48'); ?>
				                    		</div>
				                    		<div class="form-group">
				                      			<label for="exampleInputEmail1">BA-17 (*)</label>
				                      			<div class="input-group">
				                          			<input type="text" id="file_path9" class="form-control" placeholder="Pilih file BA-17">
				                          			<span class="input-group-btn">
				                              			<button class="btn btn-success" type="button" id="file_browser9">
				                              			<i class="fa fa-upload"></i> </button>
				                          			</span>
				                      			</div>
				                      			<input type="file" class="hidden" id="file9" name="ba_17" value="<?= set_value('ba_17');?>">
				                      			<?= form_error('ba_17'); ?>
				                    		</div>
				                  		</td>
				                	</tr>
		              			</tbody>
		          	  		</table>
		           	 	</div>
			            <center><button class="btn btn-primary" name="<?= $action;?>" value="<?= $action;?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button></center><br>
					<?= form_close();?>
        		</div>
     		</div>
    	</div>
	</div>
</section>
