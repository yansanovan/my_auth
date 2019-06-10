<section class="content">
  <div class="row">
    <div class="col-lg-12">
     <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('cek');?>
          <?= $this->session->flashdata('berhasil');?>
          <h1 align="center"><i class="fa fa-inbox" aria-hidden="true"></i> APL Masuk </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <center><th>No</th></center>
                <th>Nama Tersangka</th>
                <th>File Pengajuan APL</th>
                <th>User Pemohon</th>
                <th>Tanggal Posting</th>
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
                  <a href="<?= base_url('lapas/unduh/'.$value->file_apl);?>" onclick="return confirm('Mau download ?')" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-download-alt"></i> 
                  </a> <?= $value->file_apl;?>
                </td>
                <td><?= $value->username;?></td>
                <td><?= date('d M Y h:i:a', strtotime($value->tanggal_apl)); ?></td>
                <td>
                 <!--  <?php 
                  if ($value->status_balas == 1) { ?> -->
                    <a href="<?php echo base_url('lapas/form_balas/'.$value->id);?>" class="btn btn-success btn-xs"> 
                      <i class="fa fa-lock" aria-hidden="true"></i> Balas
                    </a>
                  <!-- <?php } else { ?> -->
                    <a href="<?php echo base_url('lapas/form_balas/'.$value->id);?>" class="btn btn-danger btn-xs"> 
                      <i class="fa fa-unlock" aria-hidden="true"></i> Balas
                    </a>
                  <!-- <?php } ?> -->
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

