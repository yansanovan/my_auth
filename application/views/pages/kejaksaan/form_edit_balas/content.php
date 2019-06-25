<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>         
          <?php echo form_open_multipart();?>
          <div class="col-md-12">
            <?= $this->session->flashdata('msgbox');?>
            <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Surat Balasan</h1><br>
            <a href="<?= base_url('kejaksaan/riwayat_balas');?>" class="btn btn-warning btn-xs">
              <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
            </a><br><br>
            <table  width="450px">
              <tbody>
                <tr>
                  <td> <i class="fa fa-user-o" aria-hidden="true"></i> Nama Tersangka</td>
                  <td width="10px">:</td>
                  <td width="250px"><?= $data->nama_tersangka?></td>
                </tr>
                <tr>
                  <td> <i class="fa fa-folder-open-o" aria-hidden="true"></i> Pasal </td>
                  <td width="10px">:</td>
                  <td width="250px"><?= $data->pasal?></td>
                </tr>
                <tr>
                  <td><i class="fa fa-newspaper-o" aria-hidden="true"></i> No Sprindik </td>
                  <td width="20px">:</td>
                  <td width="250px"><?= $data->no_sprindik?></td>
                </tr>  
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr bgcolor="#8e8d8d">
                  <th class="col-sm-4" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
                  <th class="col-sm-4" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                  <th class="col-sm-4" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form Edit</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>Spdp</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path">Spdp</label>
                      <input type="hidden"  class="form-control" name="id_surat_kj" value="<?= $data->id_surat_kj;?>">
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->spdp_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->spdp_kj;?>
                      </p>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label for="file_path">Form Spdp</label>
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control"  placeholder="Pilih file Spdp">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_spdp" value="<?= $data->spdp_kj;?>">
                      <input type="file" class="hidden" id="file" name="spdp" value="<?php echo set_value('spdp'); ?>">
                      <?php echo form_error('spdp','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path"> Narkotika</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->narkotika_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->narkotika_kj;?>
                      </p>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Form Narkotika</label>
                      <div class="input-group">
                          <input type="text" id="file_path6" class="form-control" placeholder="Pilih Narkotika">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser6">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_narkotika" value="<?= $data->narkotika_kj;?>">
                      <input type="file" class="hidden" id="file6" name="narkotika" value="<?php echo set_value('narkotika');?>">
                      <?php echo form_error('narkotika','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path">Kejaksaan</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->kejaksaan_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->kejaksaan_kj;?>
                      </p>
                    </div>
                  </td>
                  <td>
                     <label for="exampleInputEmail1">Form Kejaksaan</label>
                      <div class="input-group">
                          <input type="text" id="file_path7" class="form-control" placeholder="Pilih Kejaksaan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser7">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_kejaksaan" value="<?= $data->kejaksaan_kj;?>">
                      <input type="file" class="hidden" id="file7" name="kejaksaan" value="<?php echo set_value('kejaksaan');?>">
                      <?php echo form_error('kejaksaan','<p class="validate" style="color:red;">','</p>'); ?>
                  </td>
                </tr>

                <tr>
                  <td>Pengiriman Berkas</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path"> P-18</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->p_18_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->p_18_kj;?>
                      </p>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="file_path"> P-21</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->p_21_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->p_21_kj;?>
                      </p>
                    </div>
                  </td>
                  
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Form P-18</label>
                      <div class="input-group">
                          <input type="text" id="file_path9" class="form-control" placeholder="Pilih P-18">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser9">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_p_18" value="<?= $data->p_18_kj;?>">
                      <input type="file" class="hidden" id="file9" name="p_18" value="<?php echo set_value('p_18');?>">
                      <?php echo form_error('p_18','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Form P-21</label>
                      <div class="input-group">
                          <input type="text" id="file_path10" class="form-control" placeholder="Pilih P-21">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser10">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_p_21" value="<?= $data->p_21_kj;?>">
                      <input type="file" class="hidden" id="file10" name="p_21" value="<?php echo set_value('p_21');?>">
                      <?php echo form_error('p_21','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path"> Pelimpahan</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->pelimpahan_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->pelimpahan_kj;?>
                      </p>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Form Pelimpahan</label>
                      <div class="input-group">
                          <input type="text" id="file_path11" class="form-control" placeholder="Pilih Pelimpahan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser11">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_pelimpahan" value="<?= $data->pelimpahan_kj;?>">
                      <input type="file" class="hidden" id="file11" name="pelimpahan" value="<?php echo set_value('pelimpahan');?>">
                      <?php echo form_error('pelimpahan','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>P-17</td>
                  <td>
                    <div class="form-group">
                      <label for="file_path"> P-17</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$data->p_17_kj);?>" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $data->p_17_kj;?>
                      </p>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Form P-17</label>
                      <div class="input-group">
                          <input type="text" id="file_path8" class="form-control" placeholder="Pilih P-17">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser8">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" name="old_p_17" value="<?= $data->p_17_kj;?>">
                      <input type="file" class="hidden" id="file8" name="p_17" value="<?php echo set_value('p_17)');?>">
                      <?php echo form_error('p_17','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <center>
              <button name="edit" value="true" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


