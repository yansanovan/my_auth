<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>
          <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('terhapus');?>            
          <?= form_open_multipart('bon/simpan');?>
          <h1 align="center"> Form <?= $page ;?> Bon </h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('bon/riwayat_bon');?>" class="btn btn-success btn-sm"> 
              <i class="fa fa-history"></i> Riwayat Bon
            </a><br><br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-4">Nama Tersangka</th>
                  <th class="col-sm-4">File Pengajuan</th>
                  <th class="col-sm-4">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="form-group">
                    <input type="text" name="nama_tersangka" class="form-control" placeholder="nama tersangka" id="nama_tersangka">
                    <?php echo form_error('nama_tersangka','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control" placeholder="Pilih file Bon">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="file_pengajuan_bon" value="<?php echo set_value('file_pengajuan_bon'); ?>">
                    <?php echo form_error('file_pengajuan_bon','<p class="validate" style="color:red;">','</p>'); ?>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <select class="form-control" name="keterangan">
                        <option>Bon</option>
                        <option>Ijin Besuk</option>
                        <option>Bon Hari Sidang (P-38)</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <center>
              <button class="btn btn-primary btn-sm">Submit</button>
            </center><br><br><br>
          </div>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


