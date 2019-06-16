<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>         
          <?php echo form_open_multipart();?>

          <div class="col-md-12">
            <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form Balas</h1><br>
            <a href="<?= base_url('pengadilan');?>" class="btn btn-success btn-xs">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
            </a><br><br>
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
                  <td>No LP</td>
                  <td>
                    <div class="form-group">
                      <p><?= $value->no_lp; ?></p>
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
                      <?php echo form_error('ijin_geledah'); ?>
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
                      <?php echo form_error('setuju_geledah'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>TAP Sita</td>
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
                      <?php echo form_error('khusus'); ?>
                    </div>

                    <label for="exampleInputEmail1">Biasa</label>
                    <div class="input-group">
                        <input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="file_browser5">
                            <i class="fa fa-search"></i> Browse</button>
                        </span>
                    </div>
                    <input type="file" class="hidden" id="file5" name="biasa" value="<?php echo set_value('biasa');?>">
                    <?php echo form_error('biasa'); ?>
                  </td>
                </tr>
              
                <tr>
                  <td>Perpangjangan</td>
                  <td>
                    <label for="exampleInputEmail1">Pengadilan</label>
                      <div class="input-group">
                          <input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser8">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file8" name="pengadilan" value="<?php echo set_value('pengadilan');?>">
                      <?php echo form_error('pengadilan'); ?>
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


