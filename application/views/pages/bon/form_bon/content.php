<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>
          <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('gagal_simpan');?>            
          <?= form_open_multipart('bon/simpan');?>
          <h1 align="center"> Form Bon </h1><br>
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-4">Nama Tersangka</th>
                  <th class="col-sm-3">File Pengajuan</th>
                  <th class="col-sm-3">Keterangan</th>
                  <th class="col-sm-2">Aksi</th>
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
                  <td>
                    <center>
                      <button class="btn btn-primary">Submit</button>
                    </center><br>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
        
          <?= form_close();?>
        </div>
  
        <div class="box-header">
          <h1 align="center"> Riwayat Bon </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="bon" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Tersangka</th>
                <th>File Pengajuan</th>
                <th>Tanggal Posting</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach ($data as $key => $value) { ?>
              <tr>
                <td><?= $no++;?></td>
                <td><?= $value->nama_tersangka;?></td>
                <td><?= $value->file_pengajuan_bon;?></td>  
                <td><?= $value->tanggal_posting;?></td>
                <td><?= $value->keterangan;?></td>
                <td><a href="" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit"></span> Edit</a></td>      
              </tr>
              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


