<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><br>
                    <div class="col-md-12">
                        <?= $this->session->flashdata('msgbox');?>            
                        <?= form_open_multipart();?>
                        <nav class="navbar navbar-light" style="background-color:#e3f2fd;">
                            <h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> FORM ENTRY SURAT  </h3><br>
                        </nav>
                        <table class="table table-bordered">
                            <thead>
                                <tr bgcolor="#8e8d8d">
                                    <th class="col-sm-6" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
                                    <th class="col-sm-6" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form Entry </th>
                                </tr>
                            </thead>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Nama Tersangka <small style="color: red">*</small></label> 
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-o" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" name="nama_tersangka" id="nama_tersangka" class="form-control ui-autocomplete-input" placeholder="Nama Tersangka"   value="<?= set_value('nama_tersangka'); ?>"  autocomplete="off">
                                </div>
                                <?= form_error('nama_tersangka'); ?><br>
                                <label for="exampleInputEmail1">Nama Jaksa Penuntut Umum (P-16 A)<small style="color: red">*</small></label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" name="nama_jpu" value="<?= set_value('nama_jpu'); ?>" class="form-control" placeholder="Nama Jaksa Penuntut Umum">
                                </div>
                                <?= form_error('nama_jpu'); ?>
                                <br>
                                <label for="file_path">T-6 <small style="color: red">*</small></label>
                                <div class="input-group">
                                    <input type="text" id="file_path2" class="form-control" placeholder="Pilih file T-6">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" id="file_browser2">
                                            <i class="fa fa-upload"></i> 
                                        </button>
                                    </span>
                                </div>
                                <input type="file" class="hidden" id="file2" name="t_6" value="<?= set_value('t_6'); ?>">
                                <?= form_error('t_6'); ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal Penahanan <small style="color: red">*</small></label> 
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        <input type="date" name="tanggal_penahanan" class="form-control pull-right"  value="<?=set_value('tanggal_penahanan'); ?>" placeholder="Tanggal Penahanan">
                                    </div>
                                    <?= form_error('tanggal_penahanan'); ?>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">T-7 <small style="color: red">*</small></label> 
                                        <div class="input-group">
                                            <input type="text" id="file_path" class="form-control" placeholder="Pilih T-7">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="file_browser"><i class="fa fa-upload"></i> </button>
                                            </span>
                                        </div>
                                        <input type="file" class="hidden" id="file" name="t_7" value="<?= set_value('t_7');?>">
                                        <?= form_error('t_7'); ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="file_path">T-10 <small style="color: red">*</small></label>
                                        <div class="input-group">
                                            <input type="text" id="file_path3" class="form-control" placeholder="Pilih file T-10">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="file_browser3">
                                                    <i class="fa fa-upload"></i> 
                                                </button>
                                            </span>
                                        </div>
                                        <input type="file" class="hidden" id="file3" name="t_10" value="<?= set_value('t_10'); ?>">
                                        <?= form_error('t_10'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">P-29 <small style="color: red">*</small></label>
                                        <div class="input-group">
                                            <input type="text" id="file_path4" class="form-control" placeholder="Pilih Kejaksaan">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="file_browser4">
                                                    <i class="fa fa-upload"></i> 
                                                </button>
                                            </span>
                                        </div>
                                        <input type="file" class="hidden" id="file4" name="p_29" value="<?= set_value('p_29');?>">
                                        <?= form_error('p_29'); ?>       
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal Pelimpahan Perkara <small style="color: red">*</small></label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="tanggal_pelimpahan_p31" value="<?= set_value('tanggal_pelimpahan_p31');?>" class="form-control pull-right" placeholder="Tgl Pelimpahan Perkara P31">
                                        </div><?= form_error('tanggal_pelimpahan_p31'); ?>  
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">P-31 <small style="color: red">*</small></label>
                                        <div class="input-group">
                                            <input type="text" id="file_path5" class="form-control" placeholder="Pilih P-31">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="file_browser5"><i class="fa fa-upload"></i> </button>
                                            </span>
                                        </div>
                                        <input type="file" class="hidden" id="file5" name="p_31" value="<?= set_value('p_31');?>">
                                        <?= form_error('p_31'); ?>
                                    </div>
                                </div>
                                <br>
                                      
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Tanggal Pelimpahan Perkara <small style="color: red">*</small></label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="date" name="tanggal_pelimpahan_p32" value="<?= set_value('tanggal_pelimpahan_p32');?>" class="form-control pull-right" placeholder="Tgl Pelimpahan Perkara P32" >
                                    </div><?= form_error('tanggal_pelimpahan_p32'); ?>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">P-32 <small style="color: red">*</small></label>
                                      <div class="input-group">
                                        <input type="text" id="file_path6" class="form-control" placeholder="Pilih P-32">
                                          <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" id="file_browser6"><i class="fa fa-upload"></i> </button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file6" name="p_32" value="<?= set_value('p_32');?>">
                                      <?= form_error('p_32'); ?>
                                  </div>
                                </div>
                                <br>
                                <label for="exampleInputEmail1">P-42 <small style="color: red">*</small></label>
                                <div class="input-group">
                                    <input type="text" id="file_path7" class="form-control" placeholder="Pilih P-42">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" id="file_browser7">
                                        <i class="fa fa-upload"></i> </button>
                                    </span>
                                </div>
                                <input type="file" class="hidden" id="file7" name="p_42" value="<?= set_value('p_42');?>">
                                <?= form_error('p_42'); ?>
                                
                                <br>
                                <label for="exampleInputEmail1">P-48 <small style="color: red">*</small></label>
                                <div class="input-group">
                                <input type="text" id="file_path8" class="form-control" placeholder="Pilih P-48">
                                <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="file_browser8">
                                <i class="fa fa-upload"></i> </button>
                                </span>
                                </div>
                                <input type="file" class="hidden" id="file8" name="p_48" value="<?= set_value('p_48');?>">
                                <?= form_error('p_48'); ?>
                                <br>
                                <label for="exampleInputEmail1">BA-17 <small style="color: red">*</small></label>
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
  
                                </div>
                            <div style="margin-top: 50px; margin-bottom: 50px;">
                                <center>
                                    <button class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                </center>
                            </div>

                            <!-- </div> -->

                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>