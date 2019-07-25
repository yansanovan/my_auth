<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><br>
                    <?= $this->session->flashdata('msgbox');?>            
                    <?= form_open_multipart();?>
                        <div class="col-md-12">
                            <a href="<?php echo base_url('kepolisian/riwayat_surat');?>" class="btn btn-success btn-xs"> 
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Surat
                            </a><br><br>
                            <nav class="navbar navbar-light" style="background-color:#e3f2fd;">
                                <h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> FORM ENTRY SURAT  </h3><br>
                            </nav>
                            <table class="table table-bordered" >
                                <thead>
                                    <tr bgcolor="#8e8d8d">
                                        <th class="col-sm-5" style="color: white">
                                            <i class="fa fa-file-text" aria-hidden="true"></i> Nama File
                                        </th>
                                        <th class="col-sm-7" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Tersangka</td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user-o"></i>
                                                </div>
                                                <input type="text" name="nama_tersangka" value="<?php echo set_value('nama_tersangka'); ?>" class="form-control" placeholder="nama tersangka">
                                            </div>
                                            <?php echo form_error('nama_tersangka'); ?>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <td>Pasal</td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </div>
                                                <input type="text" name="pasal" value="<?php echo set_value('pasal'); ?>" class="form-control" placeholder="Pasal">
                                            </div> 
                                            <?php echo form_error('pasal'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No Sprindik</td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></div>
                                                <input type="text" name="no_sprindik" value="<?php echo set_value('no_sprindik'); ?>" class="form-control" placeholder="no sprindik">
                                            </div> 
                                            <?php echo form_error('no_sprindik'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No LP</td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></div>
                                                <input type="text" name="no_lp" value="<?php echo set_value('no_lp'); ?>" class="form-control" placeholder="No lp">
                                            </div> 
                                            <?php echo form_error('no_lp'); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Spdp</td>
                                        <td>
                                            <div class="form-group">
                                            <label for="file_path">Spdp <small><smal style="color:red">*</small></label>
                                      <div class="input-group">
                                        <!-- <div class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></div> -->
                                        <input type="text" id="file_path" class="form-control" placeholder="Pilih file Spdp">
                                        <span class="input-group-btn">
                                          <button class="btn btn-success" type="button" id="file_browser">
                                            <i class="fa fa-search"></i> Browse
                                          </button>
                                        </span>
                                      </div>
                                      <input type="file" class="hidden" id="file" name="spdp" value="<?php echo set_value('spdp'); ?>">
                                      <?php echo form_error('spdp'); ?>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Penggeledahan</td>
                                  <td>
                                    <div class="form-group">
                                      <label for="file_path">ijin geledah <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                        <!-- <div class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></div> -->
                                        <input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
                                        <span class="input-group-btn">
                                          <button class="btn btn-success" type="button" id="file_browser2">
                                            <i class="fa fa-search"></i> Browse
                                          </button>
                                        </span>
                                      </div>
                                      <input type="file" class="hidden" id="file2" name="ijin_geledah" value="<?php echo set_value('ijin_geledah'); ?>">
                                      <?php echo form_error('ijin_geledah'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Setuju geledah <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path3" class="form-control" placeholder="Pilih setuju geledah">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser3">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file3" name="setuju_geledah" value="<?php echo set_value('setuju_geledah'); ?>">
                                      <?php echo form_error('setuju_geledah'); ?>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Tap Sita</td>
                                  <td>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Khusus <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path4" class="form-control" placeholder="Pilih Khusus">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser4">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file4" name="khusus" value="<?php echo set_value('khusus');?>">
                                      <?php echo form_error('khusus'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Biasa <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser5">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file5" name="biasa" value="<?php echo set_value('biasa');?>">
                                      <?php echo form_error('biasa'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Narkotika <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path6" class="form-control" placeholder="Pilih Narkotika">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser6">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file6" name="narkotika" value="<?php echo set_value('narkotika');?>">
                                      <?php echo form_error('narkotika'); ?>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Perpanjangan</td>
                                  <td>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Kejaksaan <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path7" class="form-control" placeholder="Pilih Kejaksaan">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser7">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file7" name="kejaksaan" value="<?php echo set_value('kejaksaan');?>">
                                      <?php echo form_error('kejaksaan'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Pengadilan <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser8">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file8" name="pengadilan" value="<?php echo set_value('pengadilan');?>">
                                      <?php echo form_error('pengadilan'); ?>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Pengiriman Berkas</td>
                                  <td>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">P-18 <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path9" class="form-control" placeholder="Pilih P-18">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser9">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file9" name="p_18" value="<?php echo set_value('p_18');?>">
                                      <?php echo form_error('p_18'); ?>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">P-21 <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                          <input type="text" id="file_path10" class="form-control" placeholder="Pilih P-21">
                                          <span class="input-group-btn">
                                              <button class="btn btn-success" type="button" id="file_browser10">
                                              <i class="fa fa-search"></i> Browse</button>
                                          </span>
                                      </div>
                                      <input type="file" class="hidden" id="file10" name="p_21" value="<?php echo set_value('p_21');?>">
                                      <?php echo form_error('p_21'); ?>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Pelimpahan</td>
                                  <td>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Pelimpahan <smal style="color:red">*</smal></label>
                                      <div class="input-group">
                                        <input type="text" id="file_path11" class="form-control" placeholder="Pilih Pelimpahan">
                                        <span class="input-group-btn">
                                          <button class="btn btn-success" type="button" id="file_browser11">
                                          <i class="fa fa-search"></i> Browse</button>
                                        </span>
                                      </div>
                                      <input type="file" class="hidden" id="file11" name="pelimpahan" value="<?php echo set_value('pelimpahan');?>">
                                      <?php echo form_error('pelimpahan'); ?>
                                    </div>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                        </div>

                        <center>
                            <button class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                        </center><br>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>
