<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header"><br>
          <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('gagal_simpan');?>            
          <?= form_open_multipart('kepolisian/simpan',  array('id' => 'insert_form' ));?>
          <h1 align="center"> Form Surat Polisi </h1><br>
          <div class="col-md-12">
            <a href="<?php echo base_url('kepolisian/riwayat_surat');?>" class="btn btn-success btn-sm"> 
              <i class="fa fa-history"></i> Riwayat Surat
            </a><br><br>
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th class="col-sm-5">Nama File</th>
                  <th class="col-sm-7">Form </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Nama Tersangka</td>
                  <td>
                    <input type="text" name="nama_tersangka" value="<?php echo set_value('nama_tersangka'); ?>" class="form-control" id="exampleInputEmail1" placeholder="nama tersangka">
                    <?php echo form_error('nama_tersangka','<p class="validate" style="color:red;">','</p>'); ?>
                  </td>
                </tr>
                
                <tr>
                  <td>Pasal</td>
                  <td> 
                    <input type="text" name="pasal" value="<?php echo set_value('pasal'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Pasal">
                    <?php echo form_error('pasal','<p class="validate" style="color:red;">','</p>'); ?>
                  </td>
                </tr>

                <tr>
                  <td>No Sprindik</td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="no_sprindik" value="<?php echo set_value('no_sprindik'); ?>" class="form-control" id="exampleInputEmail1" placeholder="no sprindik">
                      <?php echo form_error('no_sprindik','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Spdp</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path">Spdp</label>
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control" placeholder="Pilih file Spdp">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="spdp" value="<?php echo set_value('spdp'); ?>">
                      <?php echo form_error('spdp','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Penggeledahan</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path">ijin geledah</label>
                      <div class="input-group">
                          <input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser2">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file2" name="ijin_geledah" value="<?php echo set_value('ijin_geledah'); ?>">
                      <?php echo form_error('ijin_geledah','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Setuju geledah</label>
                      <div class="input-group">
                          <input type="text" id="file_path3" class="form-control" placeholder="Pilih setuju geledah">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser3">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file3" name="setuju_geledah" value="<?php echo set_value('setuju_geledah'); ?>">
                      <?php echo form_error('setuju_geledah','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Khusus</label>
                      <div class="input-group">
                          <input type="text" id="file_path4" class="form-control" placeholder="Pilih Khusus">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser4">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file4" name="khusus" value="<?php echo set_value('khusus');?>">
                      <?php echo form_error('khusus','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Biasa</label>
                      <div class="input-group">
                          <input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser5">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file5" name="biasa" value="<?php echo set_value('biasa');?>">
                      <?php echo form_error('biasa','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Narkotika</label>
                      <div class="input-group">
                          <input type="text" id="file_path6" class="form-control" placeholder="Pilih Narkotika">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser6">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file6" name="narkotika" value="<?php echo set_value('narkotika');?>">
                      <?php echo form_error('narkotika','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kejaksaan</label>
                      <div class="input-group">
                          <input type="text" id="file_path7" class="form-control" placeholder="Pilih Kejaksaan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser7">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file7" name="kejaksaan" value="<?php echo set_value('kejaksaan');?>">
                      <?php echo form_error('kejaksaan','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pengadilan</label>
                      <div class="input-group">
                          <input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser8">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file8" name="pengadilan" value="<?php echo set_value('pengadilan');?>">
                      <?php echo form_error('pengadilan','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Pengiriman Berkas</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-18</label>
                      <div class="input-group">
                          <input type="text" id="file_path9" class="form-control" placeholder="Pilih P-18">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser9">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file9" name="p_18" value="<?php echo set_value('p_18');?>">
                      <?php echo form_error('p_18','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">P-21</label>
                      <div class="input-group">
                          <input type="text" id="file_path10" class="form-control" placeholder="Pilih P-21">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser10">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file10" name="p_21" value="<?php echo set_value('p_21');?>">
                      <?php echo form_error('p_21','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pelimpahan</label>
                      <div class="input-group">
                          <input type="text" id="file_path11" class="form-control" placeholder="Pilih Pelimpahan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser11">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file11" name="pelimpahan" value="<?php echo set_value('pelimpahan');?>">
                      <?php echo form_error('pelimpahan','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
            </div>
        
            <center>
              <button class="btn btn-primary">Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>
