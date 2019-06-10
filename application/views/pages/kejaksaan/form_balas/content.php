<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>         
          <?php echo form_open_multipart();?>
          <div class="col-md-12">
            <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form Balas</h1><br>
            <a href="<?= base_url('kejaksaan');?>" class="btn btn-success btn-xs">
              <i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Kembali
            </a><br><br>
            <table class="table table-bordered">
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
                    <input type="hidden" name="id_polisi" value="<?= $value->id_users;?>">
                    <input type="hidden" name="id_surat" value="<?= $value->id_data;?>">
                    <p><?= $value->nama_tersangka; ?></p>
                  </td>
                </tr>
                
                <tr>
                  <td>Pasal</td>
                  <td> 
                    <p><?= $value->pasal; ?></p>
                  </td>
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
                  <td>Spdp</td>
                  <td>
                    <div class="form-group">
                      <div class="form-group">
                      <label for="file_path">Spdp</label>
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control" value="<?php echo set_value('spdp'); ?>" placeholder="Pilih file Spdp">
                          <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="file_browser">
                            <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="spdp" value="<?php echo set_value('spdp'); ?>">
                      <?php echo form_error('spdp'); ?>
                    </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
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
                      <?php echo form_error('narkotika'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                     <label for="exampleInputEmail1">Kejaksaan</label>
                      <div class="input-group">
                          <input type="text" id="file_path7" class="form-control" placeholder="Pilih Kejaksaan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser7">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file7" name="kejaksaan" value="<?php echo set_value('kejaksaan');?>">
                      <?php echo form_error('kejaksaan'); ?>
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
                      <?php echo form_error('p_18'); ?>
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
                      <?php echo form_error('p_21'); ?>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
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
                      <?php echo form_error('pelimpahan'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>P-17</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-17</label>
                      <div class="input-group">
                          <input type="text" id="file_path8" class="form-control" placeholder="Pilih P-17">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser8">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file8" name="p_17" value="<?php echo set_value('p_17)');?>">
                      <?php echo form_error('p_17'); ?>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
            </div>
        
            <center>
              <button name="submit" class="btn btn-primary">Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


