<section class="content">
  <div class="row">
    <div class="col-lg-12">
     <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('cek');?>
          <?= $this->session->flashdata('berhasil');?>
          <h1 align="center"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Balas APL </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Tersangka</th>
                <th>File APL</th>
                <th>Dibalas Kepada</th>
                <th>Tanggal Balas APL</th>
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
                  <a href="<?= base_url('lapas_apl/unduh/'.$value->file_apl_balasan);?>" onclick="return confirm('Mau download ?')" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-download-alt"></i> 
                  </a> <?= $value->file_apl_balasan;?>
                </td>
                <td><?= $value->username;?></td>
                <td><?= date('d M Y h:i:a', strtotime($value->tanggal_apl_balasan)); ?></td>
                <td>
                  <a href="<?php echo base_url('lapas/form_balas/'.$value->id_apl);?>" class="btn btn-success btn-xs"> 
                    <i class="fa fa-lock" aria-hidden="true"></i> Hapus
                  </a>
                  <a href="<?php echo base_url('lapas/form_balas/'.$value->id_apl);?>" class="btn btn-danger btn-xs"> 
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Edit
                  </a>
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

