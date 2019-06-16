<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('msgbox');?>
          <h1 align="center"><i class="fa fa-edit" aria-hidden="true"></i> Edit Surat Polisi </h1>
          <div class="col-md-12">
          <a href="<?php echo base_url('kepolisian/riwayat_surat');?>" class="btn btn-warning btn-xs"> 
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
          </a>
          <br><br>
          <?= form_open_multipart();?>
          <table class="table table-bordered">
            <thead>
               <tr bgcolor="#8e8d8d">
                <th class="col-sm-4" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
                <th class="col-sm-4" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                <th class="col-sm-4" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form Edit</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key => $value) { ?>
              
              <tr>
                <td>Nama Tersangka</td>
                <td><?= $value->nama_tersangka ;?></td>
                <td>
                  <input type="hidden" name="id_data"  class="form-control">
                  <input type="text" name="nama_tersangka" value="<?= $value->nama_tersangka;?>" class="form-control">
                  <?php echo form_error('nama_tersangka'); ?>
                </td>
              </tr>
              
              <tr>
                <td>Pasal</td>
                <td><?= $value->pasal ;?></td>
                <td>
                  <input type="text" name="pasal" value="<?= $value->pasal;?>" class="form-control">
                  <?php echo form_error('pasal'); ?>
                </td>
              </tr>

              <tr>
                <td>No Sprindik</td>
                <td><?= $value->no_sprindik ;?></td>
                <td>
                  <input type="text" name="no_sprindik" value="<?= $value->no_sprindik;?>" class="form-control">
                  <?php echo form_error('no_sprindik'); ?>
                </td>
              </tr>

               <tr>
                <td>No LP</td>
                <td><?= $value->no_lp ;?></td>
                <td>
                  <input type="text" name="no_lp" value="<?= $value->no_lp;?>" class="form-control">
                  <?php echo form_error('no_lp'); ?>
                </td>
              </tr>

              <tr>
                <td>Spdp</td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Spdp</label>
                    <input type="hidden" name="old_spdp" value="<?= $value->spdp;?>">
                    <p>
                      <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a> 
                        <?= $value->spdp ;?>
                    </p>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="file_path">Form Spdp</label>
                    <div class="input-group">
                      <input type="hidden" name="old_spdp" value="<?= $value->spdp;?>" >
                      <input type="text" id="file_path" class="form-control" placeholder="Pilih file Spdp">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser">
                          <i class="fa fa-search"></i> Browse</button>
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
                    <label for="exampleInputEmail1">Ijin Geledah </label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a> 
                        <?= $value->ijin_geledah;?>
                    </p>
                  </div>

                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Setuju Geledah </label>
                      <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
                        <?= $value->setuju_geledah;?>
                      </p>
                    </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="file_path1">Form Ijin Geledah</label>
                    <div class="input-group">
                      <input type="hidden" name="old_ijin_geledah" value="<?= $value->ijin_geledah;?>" >
                      <input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="button" id="file_browser2">
                          <i class="fa fa-search"></i> Browse</button>
                      </span>
                    </div>
                    <input type="file" class="hidden" id="file2" name="ijin_geledah" value="<?php echo set_value('ijin_geledah'); ?>">
                    <?php echo form_error('ijin_geledah'); ?>
                  </div>

                  <div class="form-group">
                    <label for="file_path1">Form Setuju Geledah</label>
                    <div class="input-group">
                      <input type="hidden" name="old_setuju_geledah" value="<?= $value->setuju_geledah;?>" >
                      <input type="text" id="file_path3" class="form-control" placeholder="Pilih Setuju geledah">
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
                    <label for="exampleInputEmail1">Khusus</label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a>
                    <?=$value->khusus;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biasa</label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->biasa;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Narkotika</label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->narkotika;?></p>
                  </div>
                </td>
                <td>
                  
                <div class="form-group">
                  <label for="file_path1">Form Khusus</label>
                  <div class="input-group">
                    <input type="hidden" name="old_khusus" value="<?= $value->biasa;?>" >
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
                  <label for="file_path1">Form Biasa</label>
                  <div class="input-group">
                    <input type="hidden" name="old_biasa" value="<?= $value->biasa;?>" >
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
                  <label for="exampleInputEmail1">Form Narkotika</label>
                  <div class="input-group">
                    <input type="hidden" name="old_narkotika" value="<?= $value->narkotika;?>" >
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
                    <label for="exampleInputEmail1">Kejaksaan</label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
                        <?= $value->kejaksaan;?></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pengadilan</label>
                    <p><a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
                        <?= $value->pengadilan;?></p>  
                  </div>
                </td>
                
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Form Kejaksaan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_kejaksaan" value="<?= $value->kejaksaan;?>" >
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
                    <label for="exampleInputEmail1">Form Pengadilan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_pengadilan" value="<?= $value->pengadilan;?>" >
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
                    <label for="exampleInputEmail1">P-18</label>
                    <p>
                      <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
                      <?= $value->p_18;?>
                    </p>
                  </div><br>
                  <div class="form-group">
                    <label for="exampleInputEmail1">P-21</label>
                    <p>
                      <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a>
                      <?= $value->p_21;?>
                    </p>  
                  </div>
                </td>

                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Form P-18</label>
                    <div class="input-group">
                      <input type="hidden" name="old_p_18" value="<?= $value->p_18;?>" >
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
                    <label for="exampleInputEmail1">Form P-21</label>
                    <div class="input-group">
                      <input type="hidden" name="old_p_21" value="<?= $value->p_21;?>">
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
                    <label for="exampleInputEmail1">Pelimpahan</label>
                    <p>
                      <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i> </a> 
                      <?= $value->pelimpahan;?>
                    </p>  
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Form Pelimpahan</label>
                    <div class="input-group">
                      <input type="hidden" name="old_pelimpahan" value="<?= $value->pelimpahan;?>" >
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
              <?php } ?>
            </tbody>
          </table>
          </div>
          <center>
            <button class="btn btn-primary" name="edit"  value="true"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
          </center><br>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>




