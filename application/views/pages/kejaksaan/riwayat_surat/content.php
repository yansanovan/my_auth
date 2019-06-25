<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('msgbox');?>
          <h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT SURAT  </h3>
          <a href="<?php echo base_url('kejaksaan_surat/form_entry');?>" class="btn btn-success btn-xs"> 
          <span class="glyphicon glyphicon-edit"></span> Entry Surat</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Tersangka</th>
                <th>Nama Jaksa Penuntut Umum</th>
                <th>P-16</th>
                <th>Tanggal Penahanan</th>
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
                <td style ="<?= $value->nama_jpu;?>">
                  <?= $value->nama_jpu;?>
                </td>
                <td style ="<?= $value->p_16;?>">
                  <?= $value->p_16;?>
                </td>
                <td>
                 <?= date('d-m-Y', strtotime($value->tanggal_penahanan)); ?>
                </td>
                   
                <td>
                    <a href="<?php echo base_url('kejaksaan_surat/detail/'.base64_encode($value->id_surat));?>" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-eye-open"></span> Detail
                    </a>
                    <a href="<?php echo base_url('kejaksaan_surat/hapus/'.base64_encode($value->id_surat));?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus surat Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                    </a>
                    <a href="<?php echo base_url('kejaksaan_surat/edit/'.base64_encode($value->id_surat));?>" class="btn btn-warning btn-xs"> 
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


