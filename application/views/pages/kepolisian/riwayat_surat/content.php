<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <!-- <?php //if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?> -->
          <?= $this->session->flashdata('msgbox');?>
          <h1 align="center"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Riwayat Surat </h1>
          <a href="<?php echo base_url('kepolisian/form');?>" class="btn btn-success btn-xs"> 
          <span class="glyphicon glyphicon-edit"></span> Entry Data</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Tersangka</th>
                <th>No Sprindik</th>
                <th>Diposting Oleh</th>
                <th>Tanggal Posting</th>
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
                <td style ="<?= $value->no_sprindik;?>">
                  <?= $value->no_sprindik;?>
                </td>
                <td style ="<?= $value->username;?>">
                  <?= $value->username;?>
                </td>
                <td>
                  <?php echo date('d M Y h:i:a', strtotime($value->tanggal_posting)); ?>
                </td>
                <td>
                  <a href="<?php echo base_url('kepolisian/hapus/'.$value->id_data);?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> 
                    <span class="glyphicon glyphicon-trash"></span> Hapus
                  </a>
                  <a href="<?php echo base_url('kepolisian/edit/'.$value->id_data);?>" class="btn btn-warning btn-xs"> 
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



