<section class="content">
  <div class="row">
    <div class="col-xs-12">
     <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('cek');?>
          <?= $this->session->flashdata('berhasil');?>
          <h1 align="center"> Bon Masuk </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <center><th>No</th></center>
                <th>Nama Tersangka</th>
                <th>File Pengajuan</th>
                <th>User Pemohon</th>
                <th>Level</th>
                <th>Status Balas</th>
                <th>Tanggal Posting</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($data as $key => $value) : ?>
              <tr>
                <td><?= $no++;?></td>
                <td><?= $value->nama_tersangka;?></td>
                <td>
                  <a href="<?= base_url('lapas/unduh/'.$value->file_pengajuan_bon);?>" onclick="return confirm('Mau download ?')" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-download-alt"></i> 
                  </a> <?= $value->file_pengajuan_bon;?>
                </td>
                <td><?= $value->username;?></td>
                <td><?= $value->level;?></td>
                <td>
                    <?php if ($value->status_balas == 0) {?><span class="label label-danger">Invalid</span>
                    <?php } else {?><span class="label label-success">Valid </span> <?php } ?>
                </td>
                <td><?= date('d M Y h:i:a', strtotime($value->tanggal_posting)); ?></td>
                <td><?= $value->keterangan;?></td>
                <td>
                    <?php 
                    if ($value->status_balas == 1) 
                    {
                    ?>
                      <a href="<?php echo base_url('lapas/form_balas/'.$value->id_bon);?>" class="btn btn-success btn-sm"> 
                        <i class="fa fa-lock" aria-hidden="true"></i> Balas
                      </a>
                    <?php 
                    }
                    else
                    {
                    ?>
                      <a href="<?php echo base_url('lapas/form_balas/'.$value->id_bon);?>" class="btn btn-danger btn-sm"> 
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Balas
                      </a>
                    <?php  
                    }
                    ?>
                </td>   
              </tr>
              <?php endforeach;?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>

