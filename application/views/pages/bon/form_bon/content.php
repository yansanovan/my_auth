<?php 

$id_bon             = "";
$nama_tersangka     = "";
$file_pengajuan_bon = "";
$keterangan         = "";

if ($action == "edit") 
{
  foreach ($data as $key => $value)  
  {
    $id_bon             = $value->id_bon;
    $nama_tersangka     = $value->nama_tersangka;
    $file_pengajuan_bon = $value->file_pengajuan_bon;
    $keterangan         = $value->keterangan;
  }
}
?>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>
          <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('terhapus');?>            
          <?= form_open_multipart('bon/simpan');?>
          <h1 align="center"> <i class="fa fa-pencil-square" aria-hidden="true"></i> Form <?= $page ;?> Bon </h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('bon/riwayat_bon');?>" class="btn btn-success btn-xs"> 
              <i class="fa fa-history"></i> Riwayat Bon
            </a><br><br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-3">Nama Tersangka</th>
                  <?php if ($action == "edit") {?>
                  <th class="col-sm-4">File Lama</th>
                  <?php } ?>
                  <th class="col-sm-3">File Pengajuan</th>
                  <th class="col-sm-2">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                  <td>
                    <div class="form-group">
                    <input type="hidden" name="id_bon" class="form-control"  value="<?= $id_bon;?>">
                    <input type="text" name="nama_tersangka" id="nama_tersangka" class="form-control" placeholder="nama tersangka" value="<?= $nama_tersangka;?>">
                    <?php echo form_error('nama_tersangka'); ?>
                    </div>
                  </td>
                  
                  <?php if ($action == "edit") { ?>
                  <td>
                    <div class="form-group">
                      <p class="form-control"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $file_pengajuan_bon;?> </p>
                    </div>
                  </td>
                  <?php } ?>

                  <td>
                    <div class="form-group">
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control" placeholder="Pilih file Bon">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="file_pengajuan_bon" value="<?= $file_pengajuan_bon;?>">
                    <?php echo form_error('file_pengajuan_bon'); ?>
                    </div>
                  </td>

                  <td>
                    <div class="form-group">
                      <?php if ($action == "edit") {?>
                      <select class="form-control" name="keterangan">
                        <option 
                          <?php if( $value->keterangan =='Bon'){echo "selected"; } ?> value="Bon">Bon
                        </option>
                        
                        <option 
                          <?php if( $value->keterangan =='Ijin Besuk'){echo "selected"; } ?> value="Ijin Besuk">Ijin Besuk</option>
                        <option 
                          <?php if( $value->keterangan =='Bon Hari Sidang (P-38)'){echo "selected"; } ?> value="Bon Hari Sidang (P-38)">Bon Hari Sidang (P-38)
                        </option>
                      </select>
                      <?php 
                      }
                      else 
                      {?>
                      <select class="form-control" name="keterangan">
                        <option value="Bon">Bon</option>
                        <option value="Ijin Besuk">Ijin Besuk</option>
                        <option value="Bon Hari Sidang (P-38)">Bon Hari Sidang (P-38)</option>
                      </select>
                      <?php
                      } 
                      ?>
                    </div>
                  </td>

                </tr>
              </tbody>
            </table>
            <center>
              <button class="btn btn-primary btn-sm" name="<?=$action;?>" value="true">Submit</button>
            </center><br><br><br>
          </div>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


