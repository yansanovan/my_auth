<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
              <?= $this->session->flashdata('terhapus');?>
              <?= $this->session->flashdata('berhasil');?>
              <?= $this->session->flashdata('deskripsi_diganti');?>
              <h1 align="center"> Riwayat Balas Surat Polisi</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <center><th>No</th></center>
                    <th>Nama Tersangka</th>
                    <th>Tanggal Posting</th>
                    <th>Detail</th>
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
                     <td style ="<?= $value->nama_tersangka;?>">
                      <?= $value->nama_tersangka;?>
                    </td>
                    <td>
                      <?php echo date('d M Y h:i:a', strtotime($value->tanggal_balas_pn)); ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('pengadilan/detail_balas/'.$value->id_surat_pn);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail
                        </a>
                    </td>
                    
                    <td>
                        <a href="<?php echo base_url('pengadilan/hapus_jadwal/'.$value->id_surat_pn);?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                        </a>
                        <a href="<?php echo base_url('pengadilan/edit/'.$value->id_surat_pn);?>" class="btn btn-warning btn-sm"> 
                          <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                  </tr>           
                  <?php 
                  } 
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Tersangka</th>
                    <th>Tanggal Posting</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
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

  </div>
</div>


