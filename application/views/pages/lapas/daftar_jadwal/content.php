<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h1 align="center"> Data Dari Kepolisian </h1>
              <table  width="200px">
                <tbody>
                    <tr>
                        <td><b>Jumlah Data Kepolisian</b></td>
                        <td width="20px">:</td>
                        <td><b><?php echo $data_kepolisian;?></b></td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <center><th>No</th></center>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </thead>
                  <tbody> 
                  <?php 
                  $no = 1;
                  foreach ($kepolisian as $key => $value) 
                  {
                  ?>
                  <tr>
                    <td><?= $no++;?></td>
                     <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php echo date('y F d', strtotime($value->tanggal_posting)); ?>
                    </td>

                    <td>
                        <a href="<?php echo base_url('lapas/detail_kepolisian/'. $value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                     <td>
                      <?php 
                      if ($value->id_data == NULL || $value->id_users == NULL || $value->deskripsi == NULL || $value->file_penangkapan == NULL || $value->file_ijin_sita == NULL || $value->file_ijin_geledah == NULL || $value->file_pelimpahan == NULL || $value->file_penahanan == NULL || $value->file_perpanjang_penahanan == NULL || $value->tanggal_penangkapan == 0000-00-00 || $value->tanggal_ijin_sita == 0000-00-00 || $value->tanggal_ijin_geledah == 0000-00-00 || $value->tanggal_pelimpahan == 0000-00-00 || $value->tanggal_penahanan == 0000-00-00 || $value->tanggal_perpanjang_penahanan == 0000-00-00 ) 
                        {
                        ?>
                          <button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Tidak Lengkap</button>
                        <?php
                        }
                        else
                        {
                        ?>
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Komplete</button>
                        <?php
                        }
                        ?>
                      </td>
                  </tr>           
                  <?php 
                  } 
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h1 align="center"> Data Dari kejaksaan </h1>
              <table  width="200px">
                <tbody>
                    <tr>
                        <td><b>Jumlah Data Kejaksaan</b></td>
                        <td width="20px">:</td>
                        <td><b><?php echo $data_kejaksaan;?></b></td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <center><th>No</th></center>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </thead>
                  <tbody> 
                  <?php 
                  $no = 1;
                  foreach ($kejaksaan as $key => $value) 
                  {
                  ?>
                  <tr>
                    <td><?= $no++;?></td>
                     <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php echo date('y F d', strtotime($value->tanggal_posting)); ?>
                    </td>

                    <td>
                        <a href="<?php echo base_url('lapas/detail_kejaksaan/'.$value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                    <td>
                      <?php 
                      if ($value->id_data == NULL || $value->id_users == NULL || $value->deskripsi == NULL || $value->file_pelimpahan_berkas == NULL || $value->file_tahap_I == NULL || $value->file_tahap_II == NULL || $value->file_pelimpahan == NULL || $value->file_penahanan == NULL || $value->file_perpanjang_penahanan == NULL || $value->file_eksekusi_putusan == NULL || $value->tanggal_pelimpahan_berkas == 0000-00-00 || $value->tanggal_tahap_I == 0000-00-00 || $value->tanggal_tahap_II == 0000-00-00 || $value->tanggal_pelimpahan == 0000-00-00 || $value->tanggal_penahanan == 0000-00-00 || $value->tanggal_perpanjang_penahanan == 0000-00-00 || $value->tanggal_eksekusi_putusan == 0000-00-00) 
                        {
                        ?>
                          <button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Tidak Lengkap</button>
                        <?php
                        }
                        else
                        {
                        ?>
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Komplete</button>
                        <?php
                        }
                        ?>
                    </td>
                  </tr>           
                  <?php 
                  } 
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h1 align="center"> Data Dari Pengadilan </h1>
              <table  width="200px">
                <tbody>
                    <tr>
                        <td><b>Jumlah Data Pengadilan</b></td>
                        <td width="20px">:</td>
                        <td><b><?php echo $data_pengadilan;?></b></td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
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
                     <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php echo date('y F d', strtotime($value->tanggal_posting)); ?>
                    </td>
                    
                    <td>
                        <a href="<?php echo base_url('lapas/detail_pengadilan/'. $value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                     <td>
                      <?php 
                      if ($value->file_pelimpahan_berkas == null OR $value->file_penetapan_hari_sidang == null  OR $value->file_penahanan == null OR $value->file_perpanjang_penahanan_I == null OR $value->file_perpanjang_penahanan_II == null OR $value->file_perpanjang_penahanan_III == null OR $value->file_putusan == null OR $value->tanggal_pelimpahan_berkas == 0000-00-00 OR $value->tanggal_penetapan_hari_sidang == 0000-00-00 OR $value->tanggal_penahanan == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_I == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_II == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_III == 0000-00-00 OR $value->tanggal_putusan == 0000-00-00) 
                        {
                        ?>
                          <button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Tidak Lengkap</button>
                        <?php
                        }
                        else
                        {
                        ?>
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Komplete</button>
                        <?php
                        }
                        ?>
                      </td>
                  </tr>           
                  <?php 
                  } 
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
                    <th>Tanggal Posting</th>
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </section>
  </div>
</div>

