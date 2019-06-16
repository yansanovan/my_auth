<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('msgbox');?>   
          <h1 align="center"><i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Bon </h1>
          <a href="<?php echo base_url('bon/form_bon');?>" class="btn btn-success btn-xs"> 
            <span class="glyphicon glyphicon-edit"></span> Entry Bon 
          </a><br>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="bon" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tersangka</th>
                  <th>File Pengajuan</th>
                  <th>Status Balas</th>
                  <th>Tanggal Permintaan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($data as $key => $value) { ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $value->nama_tersangka;?></td>
                  <td>
                    <a href="<?= base_url('kejaksaan/unduh/'.$value->file_pengajuan_bon);?>" class="btn btn-primary btn-xs">
                      <i class="glyphicon glyphicon-download-alt"></i> 
                    </a> <?= $value->file_pengajuan_bon;?>
                  </td>  
                  <td><?php if($value->status_balas == 1) {?> 
                      <span class="label label-success"> Valid</span> 
                      <?php } else {?>
                      <span class="label label-danger"> Invalid</span>
                      <?php } ?>
                  </td>
                  <td><?= $value->tanggal_posting;?></td>
                  <td><?= $value->keterangan;?></td>
                  <td>
                    <a href="<?= base_url('bon/hapus/'. $value->id_bon);?>" class="btn btn-danger btn-xs" onclick="return confirm('Mau hapus bon ini ?')"> 
                      <span class="glyphicon glyphicon-trash" ></span> Hapus
                    </a>             
                    <a href="<?= base_url('bon/edit/'.base64_encode($value->id_bon));?>" class="btn btn-warning btn-xs"> 
                      <span class="glyphicon glyphicon-edit" ></span></i>Edit
                    </a>
                  </td>      
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



