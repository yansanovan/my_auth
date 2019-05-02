<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('cek');?>
          <?= $this->session->flashdata('berhasil');?>
          <h1 align="center"> Bon Balasan Lapas </h1>
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
                <th>Keterangan</th>
                <th>Tanggal Balas</th>
                <th>User Lapas</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              foreach ($data as $key => $value) { ?>
              <tr>
                <td><?= $no++;?></td>
                <td><?= $value->nama_tersangka;?></td>
                <td>
                  <a href="<?= base_url('lapas/unduh/'.$value->file_pengajuan_bon);?>" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-download-alt"></i> 
                  </a> <?= $value->file_pengajuan_bon;?>
                </td>
                <td><?= $value->keterangan;?></td>
                <td><?= date('d M Y h:i:a', strtotime($value->tanggal_balas_bon)); ?></td>
                <td><?= $value->username;?></td>
                
              </tr>
              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>

