<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('cek');?>
          <?= $this->session->flashdata('berhasil');?>
          <h1 align="center"><i class="fa fa-inbox" aria-hidden="true"></i> APL Balasan</h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <center><th>No</th></center>
                <th>Nama Tersangka</th>
                <th>File Apl Balasan</th>
                <th>Tanggal dibalas</th>
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
                  <a href="<?= base_url('bon/unduh/'.$value->file_pengajuan_bon);?>" onclick="return confirm('mau download?')" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-download-alt"></i> 
                  </a> <?= $value->file_pengajuan_bon;?>
                </td>
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

