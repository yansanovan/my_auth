<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
          <?= $this->session->flashdata('terhapus');?>
          <?= $this->session->flashdata('berhasil');?>
          
          <h1 align="center"> Edit Surat Polisi </h1>
          <div class="col-md-12">
          <a href="<?php echo base_url('kepolisian/riwayat_surat');?>" class="btn btn-success btn-sm"> 
            <i class="fa fa-undo" aria-hidden="true"></i> Kembali
          </a>
          <br><br>
          <?= form_open_multipart();?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="col-sm-4">Nama File</th>
                <th class="col-sm-4">File Lama</th>
                <th class="col-sm-4">Form Edit</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key => $value) { ?>
              
              <tr>
                <td>Nama Tersangka</td>
                <td><?= $value->nama_tersangka ;?></td>
                <td>
                    <div class="form-group">
                      <input type="hidden" name="id_data"  class="form-control">
                      <input type="text" name="nama_tersangka" value="<?= $value->nama_tersangka;?>" class="form-control">
                      <?php echo form_error('nama_tersangka','<span class="span" style="color:red;">','</span>'); ?>
                    </div>
                  </td>
              </tr>
              
              <tr>
                <td>Pasal</td>
                <td><?= $value->pasal ;?></td>
                <td>
                    <div class="form-group">
                      <input type="text" name="pasal" value="<?= $value->pasal;?>" class="form-control">
                      <?php echo form_error('pasal','<span class="span" style="color:red;">','</span>'); ?>
                    </div>
                </td>
              </tr>

              <tr>
                <td>No Sprindik</td>
                <td><?= $value->no_sprindik ;?></td>
                <td>
                    <div class="form-group">
                      <input type="text" name="no_sprindik" value="<?= $value->no_sprindik;?>" class="form-control">
                      <?php echo form_error('no_sprindik','<span class="span" style="color:red;">','</span>'); ?>
                    </div>
                </td>
              </tr>

              <tr>
                <td>Spdp</td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Spdp</label>
                    <input type="hidden" name="old_spdp" value="<?= $value->spdp;?>">
                    <p><?= $value->spdp;?></p>
                  </div>
                </td>
                <td>
                    <div class="form-group">
                      <label for="file_path">Spdp</label>
                      <div class="input-group">
                        <input type="hidden" name="old_spdp" value="<?= $value->spdp;?>" >
                        <input type="text" id="file_path" class="form-control" placeholder="Pilih file Spdp">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="file_browser">
                            <i class="fa fa-search"></i> Browse</button>
                        </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="ganti_spdp" value="<?php echo set_value('ganti_spdp'); ?>">
                      <?php echo form_error('ganti_spdp','<span class="span" style="color:red;">','</span>'); ?>
                    </div>
                  </td>
              </tr>

              <tr>
                <td>Penggeledahan</td>
                <td>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Ijin Geledah </label>
                      <p><?= $value->ijin_geledah;?></p>
                    </div>

                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Setuju Geledah </label>
                      <p><?= $value->setuju_geledah;?></p>
                    </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="file_path1">Ijin Geledah</label>
                    <div class="input-group">
                      <input type="hidden" name="old_ijin_geledah" value="<?= $value->ijin_geledah;?>" >
                      <input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser2">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file2" name="ganti_ijin_geledah" value="<?php echo set_value('ganti_ijin_geledah'); ?>">
                    <?php echo form_error('ganti_ijin_geledah','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="file_path1">Setuju Geledah</label>
                    <div class="input-group">
                      <input type="hidden" name="old_setuju_geledah" value="<?= $value->setuju_geledah;?>" >
                      <input type="text" id="file_path3" class="form-control" placeholder="Pilih Setuju geledah">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser3">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file3" name="ganti_setuju_geledah" value="<?php echo set_value('ganti_setuju_geledah'); ?>">
                    <?php echo form_error('ganti_setuju_geledah','<span class="span" style="color:red;">','</span>'); ?>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>Tap Sita</td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Khusus</label>
                    <p><?= $value->khusus;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biasa</label>
                    <p><?= $value->biasa;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Narkotika</label>
                    <p><?= $value->narkotika;?></p>
                  </div>
                </td>
                <td>
                  
                  <div class="form-group">
                    <label for="file_path1">Khusus</label>
                    <div class="input-group">
                      <input type="hidden" name="old_khusus" value="<?= $value->biasa;?>" >
                      <input type="text" id="file_path4" class="form-control" placeholder="Pilih Khusus">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser4">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file4" name="ganti_khusus" value="<?php echo set_value('ganti_khusus');?>">
                    <?php echo form_error('ganti_khusus','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="file_path1">Biasa</label>
                    <div class="input-group">
                      <input type="hidden" name="old_biasa" value="<?= $value->biasa;?>" >
                      <input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser5">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file5" name="ganti_biasa" value="<?php echo set_value('ganti_biasa');?>">
                    <?php echo form_error('ganti_biasa','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Narkotika</label>
                    <div class="input-group">
                      <input type="hidden" name="old_narkotika" value="<?= $value->narkotika;?>" >
                      <input type="text" id="file_path6" class="form-control" placeholder="Pilih Narkotika">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser6">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file6" name="ganti_narkotika" value="<?php echo set_value('ganti_narkotika');?>">
                    <?php echo form_error('ganti_narkotika','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                </td>
              </tr>

              <tr>
                <td>Perpanjangan</td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kejaksaan</label>
                    <p><?= $value->kejaksaan;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pengadilan</label>
                    <p><?= $value->pengadilan;?></p>  
                  </div>
                </td>
                
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kejaksaan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_kejaksaan" value="<?= $value->kejaksaan;?>" >
                      <input type="text" id="file_path7" class="form-control" placeholder="Pilih Kejaksaan">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser7">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file7" name="ganti_kejaksaan" value="<?php echo set_value('ganti_kejaksaan');?>">
                    <?php echo form_error('ganti_kejaksaan','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Pengadilan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_pengadilan" value="<?= $value->pengadilan;?>" >
                      <input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser8">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file8" name="ganti_pengadilan" value="<?php echo set_value('ganti_pengadilan');?>">
                      <?php echo form_error('ganti_pengadilan','<span class="span" style="color:red;">','</span>'); ?>
                  </div>
                </td>
              </tr>

              <tr>
                <td>Pengiriman Berkas</td>

                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">P-18</label>
                      <p><?= $value->p_18;?></p>
                  </div><br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">P-21</label>
                    <p><?= $value->p_21;?></p>  
                  </div>
                </td>

                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">P-18</label>
                    <div class="input-group">
                      <input type="hidden" name="old_p_18" value="<?= $value->p_18;?>" >
                      <input type="text" id="file_path9" class="form-control" placeholder="Pilih P-18">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser9">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file9" name="ganti_p_18" value="<?php echo set_value('ganti_p_18');?>">
                      <?php echo form_error('ganti_p_18','<span class="span" style="color:red;">','</span>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">P-21</label>
                    <div class="input-group">
                      <input type="hidden" name="old_p_21" value="<?= $value->p_21;?>">
                      <input type="text" id="file_path10" class="form-control" placeholder="Pilih P-18">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser10">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file10" name="ganti_p_21" value="<?php echo set_value('ganti_p_21');?>">
                      <?php echo form_error('ganti_p_21','<span class="span" style="color:red;">','</span>'); ?>
                  </div>
                </td>
              </tr>

              <tr>
                <td>Pelimpahan</td>
                <td>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Pelimpahan</label>
                      <p><?= $value->pelimpahan;?></p>  
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pelimpahan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_pelimpahan" value="<?= $value->pelimpahan;?>" >
                      <input type="text" id="file_path11" class="form-control" placeholder="Pilih P-21">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser11">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file11" name="ganti_pelimpahan" value="<?php echo set_value('ganti_pelimpahan');?>">
                      <?php echo form_error('ganti_pelimpahan','<span class="span" style="color:red;">','</span>'); ?>
                  </div>
                </td>
              </tr> 
              <?php } ?>
            </tbody>
          </table>
          </div>
          <center>
            <button class="btn btn-primary">Submit</button>
          </center><br>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>




