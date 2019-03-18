<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                <h1 align="center"> Data Dari Kejaksaan </h1>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Deskripsi Perkara</th>
                      <th>Dikirim Oleh</th>
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
                        <a href="<?php echo base_url('kepolisian/detail_kejaksaan/'.$value->url);?>" class="btn btn-info btn-sm"> 
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
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Lengkap</button>
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
                      <th>Lihat Detail Jadwal</th>
                      <th>Status Data</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- /.box-body -->
          </div><!-- /.box -->
   
          <div class="box">
            <div class="box-header">
              <h1 align="center"> Data Dari Pengadilan </h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Dikirim Oleh</th>
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
                        <a href="<?php echo base_url('kepolisian/detail_pengadilan/'. $value->url);?>" class="btn btn-info btn-sm"> 
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
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Lengkap</button>
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
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div><!-- /.box -->
          
          <div class="box">
            <div class="box-header">
              <h1 align="center"> Data Dari Lapas </h1>
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
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </thead>
                  <tbody> 
                 <?php 
                  $no = 1;
                  foreach ($lapas as $key => $value) 
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
                        <a href="<?php echo base_url('kepolisian/detail_lapas/'. $value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                     <td>
                      <?php 
                      if ($value->id_data == NULL || $value->id_users == NULL || $value->deskripsi == NULL || $value->file_eksekusi == NULL || $value->file_isi_putusan == NULL || $value->file_pembebasan_bersyarat == NULL || $value->file_remisi == NULL || $value->file_bebas == NULL || $value->tanggal_eksekusi == NULL || $value->tanggal_isi_putusan == 0000-00-00 || $value->tanggal_pembebasan_bersyarat == 0000-00-00 || $value->tanggal_remisi == 0000-00-00 || $value->tanggal_bebas == 0000-00-00) 
                        {
                        ?>
                          <button class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Tidak Lengkap</button>
                        <?php
                        }
                        else
                        {
                        ?>
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span>Data Lengkap</button>
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
                    <th>Lihat Detail Jadwal</th>
                    <th>Status Data</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section>
  </div>
</div>

