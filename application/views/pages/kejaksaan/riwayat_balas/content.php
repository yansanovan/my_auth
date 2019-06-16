<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('terhapus');?>
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('deskripsi_diganti');?>
          <h1 align="center"><i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Balas Surat Polisi</h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <center><th>No</th></center>
                <th>Nama Tersangka</th>
                <th>Pasal</th>
                <th>No Sprindik</th>
                <th>Tanggal Balas</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody> 
              <?php 
              $no = 1;
              foreach ($data as $key => $value) 
              {
              ?>
              <tr>
                <td><?= $no++;?></td>
                <td>
                  <?= $value->nama_tersangka;?>
                </td>
                <td>
                  <?= $value->pasal;?>
                </td>
                <td>
                  <?= $value->no_sprindik;?>
                </td>
                <td>
                  <?php echo date('d M Y h:i:a', strtotime($value->tanggal_balas_kj)); ?>
                </td>
                <td>
                  <a href="<?php echo base_url('kejaksaan/hapus_balasan/'.$value->id_surat_kj);?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> 
                    <span class="glyphicon glyphicon-trash"></span> Hapus
                  </a>
                  <a href="<?php echo base_url('kejaksaan/edit_balas/'.base64_encode($value->id_surat_kj));?>" class="btn btn-warning btn-xs"> 
                    <span class="glyphicon glyphicon-edit"></span> Edit
                  </a>
                </td>
              </tr>           
              <?php 
              } 
              ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>


