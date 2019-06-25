<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('msgbox');?>
          <h1 align="center"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Surat Kejaksaan </h1>
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
                  <a href="<?php echo base_url('pengadilan_surat/detail/'.base64_encode($value->id_surat));?>" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-eye-open"></span> Detail
                  </a>
                  <?php if ($value->status_balas == 1) { ?>
                    <a href="<?php echo base_url('pengadilan/form_balas/'.base64_encode($value->id_surat));?>" class="btn btn-success btn-xs"> 
                      <i class="fa fa-lock" aria-hidden="true"></i> Balas
                    </a>
                  <?php } else { ?>
                    <a href="<?php echo base_url('pengadilan/form_balas/'.base64_encode($value->id_surat));?>" class="btn btn-danger btn-xs"> 
                      <i class="fa fa-unlock" aria-hidden="true"></i> Balas
                    </a>
                  <?php } ?>
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


