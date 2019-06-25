<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>
          <?= $this->session->flashdata('msgbox');?>               
          <?= form_open_multipart();?>
          <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form Edit</h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('lapas_apl/riwayat_balas_apl');?>" class="btn btn-warning btn-xs"> 
              <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
            </a><br><br>
            <table  width="380px">
              <tbody>
                <tr>
                    <td><i class="fa fa-user-o" aria-hidden="true"></i> Dibalas Kepada</td>
                    <td width="10px">:</td>
                    <td width="250px"><?= $data->username;?></td>
                </tr>
                <tr>
                    <td><i class="fa fa-address-book-o" aria-hidden="true"></i> Level </td>
                    <td width="10px">:</td>
                    <td width="250px"><?= $data->level;?></td>
                </tr>
              </tbody>
            </table><br>
            <table class="table table-bordered">
              <thead>
                <tr bgcolor="#8e8d8d">
                  <th class="col-sm-4" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama Tersangka</th>
                  <th class="col-sm-4" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                  <th class="col-sm-4" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="hidden" name="id_apl_balasan" value="<?= $data->id_apl_balasan; ?>"  class="form-control" >
                    <input type="hidden" name="id_users_pemohon" value="<?= $data->id_users_pemohon; ?>"  class="form-control" >
                    <input type="hidden" name="nama_tersangka" class="form-control" value="<?= $data->nama_tersangka;?>" readonly>
                    <div class="form-group"><p class="form-control"> <?= $data->nama_tersangka;?> </p></div>
                  </td>
                  <td>
                    <input type="hidden" name="nama_tersangka" class="form-control" value="<?= $data->nama_tersangka;?>" readonly>
                    <div class="form-group">
                      <p class="form-control"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $data->file_apl_balasan;?> </p>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" id="file_path" class="form-control" placeholder="Pilih file APL">
                          <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="file_browser"><i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="hidden" class="form-control" name="old_apl_balasan" value="<?= $data->file_apl_balasan;?>">
                      <input type="file" class="hidden" id="file" name="file_apl_balasan" value="<?php echo set_value('file_apl_balasan'); ?>">
                      <?php echo form_error('file_apl_balasan'); ?>
                    </div>
                  </td>
              </tbody>
            </table>
            </div>
            <center>
              <button class="btn btn-primary" name="edit" value="<?= $action;?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>

