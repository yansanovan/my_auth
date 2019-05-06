<section class="content">
  <div class="row">
    <div class="col-xs-12">
     <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('berhasil');?>
          <?= $this->session->flashdata('cek');?>
          <h1 align="center"> Surat Polisi </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Tersangka</th>
                <th>Dikirim Oleh</th>
                <th>Status Balas</th>
                <th>Tanggal & Waktu Posting</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody> 
              <?php 
              $no = 1;
              foreach ($pengadilan as $key => $value) 
              {
              ?>
              <tr>
                <td><?= $no++;?></td>
                 <td style ="<?php if($value->nama_tersangka == null){echo 'background-color:red'; }else{echo ''; }?>">
                  <?= $value->nama_tersangka;?>
                </td>

                <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                  <?= $value->username;?>
                </td>
                
                <td>
                  <?php
                  if ($value->status_pn == 1){ ?>
                  <span class="label label-success"> 
                     Valid 
                  </span>
                  <?php } else { ?>
                  <span class="label label-danger">
                     Invalid
                  </span>
                  <?php } ?>
                </td>

                <td>
                   <?php echo date('d M Y h:i:a', strtotime($value->tanggal_posting)); ?>
                </td>

                <td>
                    <a href="<?php echo base_url('pengadilan/detail/'. $value->url);?>" class="btn btn-info btn-sm"> 
                      <span class="glyphicon glyphicon-eye-open"></span> Detail
                    </a>
                </td>

                <td>
                  <?php if ($value->status_pn == 1) { ?>
                    <a href="<?php echo base_url('pengadilan/form_balas/'.$value->id_data);?>" class="btn btn-success btn-sm"> <i class="fa fa-lock" aria-hidden="true"></i> Balas
                    </a>
                  <?php } else { ?>
                    <a href="<?php echo base_url('pengadilan/form_balas/'.$value->id_data);?>" class="btn btn-danger btn-sm"> 
                      <i class="fa fa-paper-plane" aria-hidden="true"></i> Balas
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
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>

