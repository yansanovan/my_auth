<?php 

$id_apl             = "";
$nama_tersangka     = "";
$file_apl           = "";

if ($action == "edit") 
{
  foreach ($data as $key => $value)  
  {
    $id_apl             = $value->id;
    $nama_tersangka     = $value->nama_tersangka;
    $file_apl           = $value->file_apl;
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
          <?= form_open_multipart('apl/proses');?>
          <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form <?= $page ;?> APL </h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('apl/riwayat_apl');?>" class="btn btn-success btn-xs"> 
              <i class="fa fa-history"></i> Riwayat Apl
            </a><br><br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-3">Nama Tersangka</th>
                  <?php if ($action == "edit") {?>
                  <th class="col-sm-3">File Lama</th>
                  <?php } ?>
                  <th class="col-sm-3">File APL</th>
                </tr>
              </thead>
              <tbody>
                <tr>         
                  <td>
                    <div class="form-group">
                    <input type="hidden" name="id_apl" class="form-control"  value="<?= $id_apl;?>">
                    <input type="text" name="nama_tersangka" id="nama_tersangka" class="form-control" placeholder="nama tersangka" value="<?= $nama_tersangka;?>">
                    <?php echo form_error('nama_tersangka'); ?>
                    </div>
                  </td>
                  
                  <?php if ($action == "edit") { ?>
                  <td>
                    <div class="form-group">
                      <p class="form-control"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $file_apl;?> </p>
                    </div>
                  </td>
                  <?php } ?>

                  <td>
                    <div class="form-group">
                      <div class="input-group">
                          <input type="text" id="file_path" class="form-control" placeholder="Pilih file Apl">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="button" id="file_browser">
                              <i class="fa fa-search"></i> Browse</button>
                          </span>
                      </div>
                      <input type="file" class="hidden" id="file" name="file_apl" value="<?= $file_apl;?>">
                    <?php echo form_error('file_apl'); ?>
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


