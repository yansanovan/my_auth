<section class="content">
	<div class="row">
    	<div class="col-md-12">
      		<div class="box">
        		<div class="box-header"><br>
      				<?= form_open_multipart();?>
          			<div class="col-md-12">
          				<?= $this->session->flashdata('msgbox');?>            
          				<p>
				            <a href="<?= base_url('kejaksaan_surat/riwayat_surat');?>" class="btn btn-warning btn-xs"> 
				            	<i class="fa fa-envelope" aria-hidden="true"></i> Riwayat Surat
				            </a><br>
          					<nav class="navbar navbar-light" style="background-color:#e3f2fd;">
            					<h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> EDIT SURAT  </h2><br>
          					</nav>
            				<table  width="500px">
								<tbody>
									<tr>
									    <td><i class="fa fa-user-o" aria-hidden="true"></i> Dikirim Oleh</td>
									    <td width="10px">:</td>
									    <td width="250px"><?= $data->username;?></td>
									</tr>
                                    <tr>
                                        <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Posting </td>
                                        <td width="10px">:</td>
                                        <td width="250px"> <?= $tgl_posting  = date('d-m-Y', strtotime($data->tanggal_posting));?></td>
                                    </tr>
									<tr>
									    <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Penahanan T-7 </td>
									    <td width="10px">:</td>
									    <td width="250px">
                                        <?php 
                                            $tgl_posting    = new DateTime($data->tanggal_posting);
                                            $tgl_penahanan  = new DateTime($data->tanggal_penahanan);
                                            $difference     = $tgl_posting->diff($tgl_penahanan);
                                             echo date('d-m-Y', strtotime($data->tanggal_penahanan)); ?><b> S/d </b> <?= date('d-m-Y', strtotime($data->tgl_jatuh_tempo)); ?> 
                                            <span class="label label-success"> <?= $data->selisih . ' Hari' ?></span> 
                                        </td>
									</tr>
									<tr>
									    <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Pelimpahan Perkara P-31 </td>
									    <td width="10px">:</td>
									    <td width="250px"><?= date('d-m-Y', strtotime($data->tanggal_pelimpahan_p31)); ?></td>
									</tr>
									<tr>
									    <td> <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal Pelimpahan Perkara P-32</td>
									    <td width="10px">:</td>
									    <td width="250px"><?= date('d-m-Y', strtotime($data->tanggal_pelimpahan_p32)); ?></td>
									</tr>
								</tbody>
            				</table>
            			</p>
            			<table class="table table-bordered" >
                 			<thead>
    							<tr bgcolor="#8e8d8d">
    								<th class="col-sm-3" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
    								<!-- <th class="col-sm-3" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama </th> -->
    								<th class="col-sm-9" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form </th>
    							</tr>
    						</thead>
                  			<tbody>
                    			<tr>
                      				<td>Nama Tersangka</td>
                                    <td>
                        				<input type="hidden" name="id_surat" id="id_surat" value="<?= $data->id_surat;?>" >
                        				<input type="text" name="nama_tersangka" id="nama_tersangka" class="form-control ui-autocomplete-input" placeholder="Nama Tersangka" autocomplete="off" value="<?= $data->nama_tersangka;?>">
                        				<?= form_error('nama_tersangka'); ?>
                      				</td>
                    			</tr>
                     			<tr>
    								<td>Nama Jaksa Penuntut Umum (P-16A)</td>
    								<!-- <td><?= $data->nama_jpu;?></td> -->
    								<td>
                        				<input type="text" name="nama_jpu"  class="form-control" placeholder="Nama Jaksa Penuntut Umum" value="<?= $data->nama_jpu;?>">
                        				<?= form_error('nama_jpu'); ?>
                      				</td>
                    			</tr>
                                <tr>
                                    <td>T-6</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="file_path">File Lama T-6 </label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                    <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                        <i class="glyphicon glyphicon-download-alt"></i> 
                                                    </a>  <?= $data->t_6;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="file_path">Form T-6</label>
                                                    <div class="input-group">
                                                        <input type="text" id="file_path2" class="form-control" placeholder="Pilih file T-6">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser2">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="old_t_6" value="<?= $data->t_6;?>">
                                                    <input type="file" class="hidden" id="file2" name="t_6" value="<?= set_value('t_6'); ?>">
                                                    <?= form_error('t_6'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>T-7</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="file_path">File Lama T-7 </label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                    <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                        <i class="glyphicon glyphicon-download-alt"></i> 
                                                    </a>  <?= $data->t_7;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Tgl Penahanan</label>
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" name="tanggal_penahanan"  value="<?= $data->tanggal_penahanan;?>" class="form-control pull-right"  >
                                                    </div><?= form_error('tanggal_penahanan'); ?>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="file_path">Form T-7</label>
                                                    <div class="input-group">
                                                        <input type="text" id="file_path2" class="form-control" placeholder="Pilih file T-7">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser2">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="old_t_7" value="<?= $data->t_7;?>">
                                                    <input type="file" class="hidden" id="file2" name="t_7" value="<?= set_value('t_7'); ?>">
                                                    <?= form_error('t_7'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>T-10</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="file_path">File Lama T-10 </label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                        <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>  <?= $data->t_10;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="file_path">Form T-10</label>
                                                    <div class="input-group">
                                                        <input type="text" id="file_path3"  class="form-control" placeholder="Pilih file T-10">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser3">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="old_t_10" value="<?= $data->t_10;?>">
                                                    <input type="file" class="hidden" id="file3" name="t_10" value="<?= set_value('t_10'); ?>">
                                                    <?= form_error('t_10'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Dakwaan</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="exampleInputEmail1">File Lama P-29 </label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                        <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>  <?= $data->p_29;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Form P-29</label>
                                                    <div class="input-group">
                                                        <input type="text" id="file_path4" class="form-control"   placeholder="Pilih Kejaksaan">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser4">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="old_p_29" value="<?= $data->p_29;?>">
                                                    <input type="file" class="hidden" id="file4" name="p_29" value="<?= set_value('p_29');?>">
                                                    <?= form_error('p_29'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>P-31</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="file_path">File Lama P-31</label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                        <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>  <?= $data->p_31;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tgl Pelimpahan Perkara P-31</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" name="tanggal_pelimpahan_p31"  value="<?= $data->tanggal_pelimpahan_p31;?>" class="form-control pull-right" placeholder="Tgl Pelimpahan Perkara P31">
                                                </div><?= form_error('tanggal_pelimpahan_p31'); ?>  
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputEmail1">Form P-31</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" id="file_path5" class="form-control"  placeholder="Pilih P-31">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser5">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="old_p_31" value="<?= $data->p_31;?>">
                                                    <input type="file" class="hidden" id="file5" name="p_31" value="<?= set_value('p_31');?>">
                                                    <?= form_error('p_31'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>P-32</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <label for="file_path">File Lama P-32 </label>
                                            <div class="form-group">
                                                <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                    <i class="glyphicon glyphicon-download-alt"></i> 
                                                </a>  <?= $data->p_32;?>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                                <label>Tgl Pelimpahan Perkara P-32</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" name="tanggal_pelimpahan_p32"  value="<?= $data->tanggal_pelimpahan_p32;?>" class="form-control pull-right" placeholder="Tgl Pelimpahan Perkara P32" >
                                                </div>
                                                <?= form_error('tanggal_pelimpahan_p32'); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputEmail1">Form P-32</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" id="file_path6" class="form-control"  placeholder="Pilih P-32">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser6">
                                                                <i class="fa fa-upload"></i> 
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden"  name="old_p_32" value="<?= $data->p_32;?>">
                                                    <input type="file" class="hidden" id="file6" name="p_32" value="<?= set_value('p_32');?>">
                                                </div>
                                                <?= form_error('p_32'); ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Tuntutan</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="file_path">File Lama P-42</label>
                                                    <div class="form-group">
                                                        <!-- <p class="form-control"> -->
                                                          <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                              <i class="glyphicon glyphicon-download-alt"></i> 
                                                          </a> <?= $data->p_42;?>
                                                        <!-- </p> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <label for="exampleInputEmail1">Form P-42</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" id="file_path7" class="form-control" placeholder="Pilih P-42">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser7">
                                                                <i class="fa fa-upload"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden"   name="old_p_42" value="<?= $data->p_42;?>">
                                                    <input type="file" class="hidden" id="file7" name="p_42" value="<?= set_value('p_42');?>">
                                                    <?= form_error('p_42'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Eksekusi</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">  
                                                <label for="file_path">File Lama P-48 </label>
                                                <div class="form-group">
                                                    <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                      <i class="glyphicon glyphicon-download-alt"></i> 
                                                    </a> <?= $data->p_48;?>
                                                </div>
                                                <br>
                                                <label for="file_path">File Lama BA-17 </label>
                                                <div class="form-group">
                                                    <!-- <p class="form-control"> -->
                                                      <a href="<?= base_url();?>" class="btn btn-primary btn-xs">
                                                          <i class="glyphicon glyphicon-download-alt"></i> 
                                                      </a> <?= $data->ba_17;?>
                                                    <!-- </p> -->
                                                </div>
                                            </div>
                                            <div class="col-md-8">  
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Form P-48</label>
                                                  <div class="input-group">
                                                      <input type="text" id="file_path8" class="form-control"  placeholder="Pilih P-48">
                                                      <span class="input-group-btn">
                                                          <button class="btn btn-success" type="button" id="file_browser8">
                                                          <i class="fa fa-upload"></i> </button>
                                                      </span>
                                                  </div>
                                                  <input type="hidden"  name="old_p_48" value="<?= $data->p_48;?>">
                                                  <input type="file" class="hidden" id="file8" name="p_48" value="<?= set_value('p_48');?>">
                                                  <?= form_error('p_48'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-8">  
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Form BA-17</label>
                                                  <div class="input-group">
                                                      <input type="text" id="file_path9" class="form-control" placeholder="Pilih file BA-17">
                                                      <span class="input-group-btn">
                                                          <button class="btn btn-success" type="button" id="file_browser9">
                                                          <i class="fa fa-upload"></i> </button>
                                                      </span>
                                                  </div>
                                                  <input type="hidden"  name="old_ba_17" value="<?= $data->ba_17;?>">
                                                  <input type="file" class="hidden" id="file9" name="ba_17" value="<?= set_value('ba_17');?>">
                                                  <?= form_error('ba_17'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <center>
                    <button class="btn btn-primary" name="<?= $action;?>" value="true"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                    </center><br>
                    <?= form_close();?>
       			 </div>
      		</div>
    	</div>
  	</div>
</section>