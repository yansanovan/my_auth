<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>
          <?= $this->session->flashdata('gagal_simpan');?>
          <?= $this->session->flashdata('berhasil');?>                        
          <?= form_open_multipart();?>
          <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form Balas</h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('lapas');?>" class="btn btn-success btn-xs"> 
              <i class="fa fa-history"></i> Kembali
            </a><br><br>
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
                    <input type="hidden" name="id_bon" value="<?= $data->id_bon; ?>"  class="form-control" >
                    <input type="hidden" name="id_users_pemohon" value="<?= $data->id_users_pemohon; ?>"  class="form-control" >
                    <input type="hidden" name="nama_tersangka" class="form-control" value="<?= $data->nama_tersangka;?>" readonly>
                    <div class="form-group"><p class="form-control"> <?= $data->nama_tersangka;?> </p></div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" id="file_path" class="form-control" placeholder="Pilih file Bon">
                          <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="file_browser"><i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="file_pengajuan_bon" value="<?php echo set_value('file_pengajuan_bon'); ?>">
                      <?php echo form_error('file_pengajuan_bon'); ?>
                    </div>
                  </td>
                  <td>              
                    <div class="form-group">
                      <p class="form-control"> <?= $data->keterangan;?> </p>
                    </div>
                    <input type="hidden" name="keterangan" class="form-control" value="<?= $data->keterangan;?>" readonly>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <center>
              <button class="btn btn-primary" value="true">Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>

