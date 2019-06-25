<?php 

$id_apl             = "";
$nama_tersangka     = "";
$file_apl           = "";

if ($action == "edit") 
{
  foreach ($data as $key => $value)  
  {
    $id_apl             = $value->id_apl;
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
          <?= $this->session->flashdata('msgbox');?>       
          <?= form_open_multipart('apl/proses');?>
          <h1 align="center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Form <?= $page ;?> APL </h1><br>
          <div class="col-md-12">
            <a href="<?= base_url('apl/riwayat_apl');?>" class="btn btn-warning btn-xs"> 
              <i class="fa fa-file-text"></i> Riwayat Apl
            </a><br><br>
            <table class="table table-bordered">
              <thead>
                 <tr bgcolor="#8e8d8d">
                  <th class="col-sm-3" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama Tersangka</th>
                  <?php if ($action == "edit") {?>
                  <th class="col-sm-3" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                  <?php } ?>
                  <th class="col-sm-3" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form File APL</th>
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
              <button class="btn btn-primary btn-sm" name="<?=$action;?>" value="true"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
            </center><br><br><br>
          </div>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


