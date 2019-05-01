<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header"><br>
            <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
            <?= $this->session->flashdata('gagal_simpan');?>            
            <?= form_open_multipart();?>
            <h1 align="center"> Form Balas Bon </h1><br>
            <div class="col-md-12">
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
                      <input type="text" name="nama_tersangka" value="<?= $data->nama_tersangka; ?>"  class="form-control" >
                      <?php echo form_error('nama_tersangka','<span class="span" style="color:red;">','</span>'); ?>
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
                      <?php echo form_error('file_pengajuan_bon','<span class="span" style="color:red;">','</span>'); ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <select class="form-control" name="keterangan">
                            <option 
                              <?php if( $data->keterangan =='Bon'){echo "selected"; } ?> >Bon
                            </option>
                          
                            <option 
                              <?php if( $data->keterangan =='Ijin Besuk'){echo "selected"; } ?>>Ijin Besuk
                            </option>
                          
                            <option 
                              <?php if( $data->keterangan =='Bon Hari Sidang (P-38)'){echo "selected"; } ?> value="Bon Hari Sidang (P-38)">Bon Hari Sidang (P-38)
                            </option>
                          </select>
                          <br>
                        </div>
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
</div>

