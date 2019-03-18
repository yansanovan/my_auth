<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">  
              <h1 align="center"> Detail Data Jadwal Kepolisian </h1>
               <table  width="300px">
             <?php 
              $no = 1;
              foreach ($data as $key => $value) 
              {
              ?>
                <tbody>
                    <tr>
                        <td>Status Data</td><td>:</td><td><?php if ($value->id_data == NULL || $value->id_users == NULL || $value->deskripsi == NULL || $value->file_penangkapan == NULL || $value->file_ijin_sita == NULL || $value->file_ijin_geledah == NULL || $value->file_pelimpahan == NULL || $value->file_penahanan == NULL || $value->file_perpanjang_penahanan == NULL || $value->tanggal_penangkapan == 0000-00-00 || $value->tanggal_ijin_sita == 0000-00-00 || $value->tanggal_ijin_geledah == 0000-00-00 || $value->tanggal_pelimpahan == 0000-00-00 || $value->tanggal_penahanan == 0000-00-00 || $value->tanggal_perpanjang_penahanan == 0000-00-00 ) 
                        {
                        ?>
                          <h5 style="color: red">Data Tidak Lengkap</h5>
                        <?php
                        }
                        else
                        {
                        ?>
                          <b><h5 style="color: green">Data Lengkap</h5></b>
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                </tbody>
            </table>
            <br>
              <a href="<?php echo base_url('lapas');?>" class="btn btn-info btn-sm"> 
              <span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            <?php 
            } 
            ?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Perkara</th>
                    <th>Nama Berkas</th>
                    <th>File Berkas</th>
                    <th>Tanggal Kirim</th>
                    <th>Dikirim Oleh</th>
                    <th>Download</th>
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
                     <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>
                    <td style ="<?php if($value->penangkapan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->penangkapan;?>
                    </td>
                    <td style ="<?php if($value->file_penangkapan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_penangkapan;?>
                    </td>
                     <td style ="<?php if($value->tanggal_penangkapan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_penangkapan == 0000-00-00 || $value->tanggal_ijin_sita == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_penangkapan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_penangkapan == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_penangkapan);?>" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                   <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->ijin_sita == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->ijin_sita;?>
                    </td>
                    <td style ="<?php if($value->file_ijin_sita == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_ijin_sita;?>
                    </td>
                    <td style ="<?php if($value->tanggal_ijin_sita == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_ijin_sita == 0000-00-00 || $value->tanggal_ijin_sita == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_ijin_sita); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_ijin_sita == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_ijin_sita);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>

                  </tr>

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->ijin_geledah == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->ijin_geledah;?>
                    </td>
                    <td style ="<?php if($value->file_ijin_geledah == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_ijin_geledah;?>
                    </td>
                    <td style ="<?php if($value->tanggal_ijin_geledah == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_ijin_geledah == 0000-00-00 || $value->tanggal_ijin_geledah == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_ijin_geledah); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_ijin_geledah == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_ijin_geledah);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td><?= $no++;?></td>

                   <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->pelimpahan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->pelimpahan;?>
                    </td>
                    <td style ="<?php if($value->file_pelimpahan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_pelimpahan;?>
                    </td>
                    <td style ="<?php if($value->tanggal_pelimpahan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_pelimpahan == 0000-00-00 || $value->tanggal_pelimpahan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_pelimpahan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_pelimpahan == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_pelimpahan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->penahanan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->penahanan;?>
                    </td>
                    <td style ="<?php if($value->file_penahanan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_penahanan;?>
                    </td>
                     <td style ="<?php if($value->tanggal_penahanan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_penahanan == 0000-00-00 || $value->tanggal_penahanan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_penahanan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_penahanan == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_penahanan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>               
                  </tr>
                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->perpanjang_penahanan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->perpanjang_penahanan;?>
                    </td>
                    <td style ="<?php if($value->file_perpanjang_penahanan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_perpanjang_penahanan;?>
                    </td>
                    <td style ="<?php if($value->tanggal_perpanjang_penahanan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_perpanjang_penahanan == 0000-00-00 || $value->tanggal_perpanjang_penahanan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_perpanjang_penahanan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_perpanjang_penahanan == null)
                      {
                      ?>
                          <a href="#" class="btn btn-danger btn-sm" disabled> 
                            <span class="glyphicon glyphicon-eye-open"></span> Tidak ada file
                          </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="<?php echo base_url('lapas/unduh_kepolisian/'.$value->file_perpanjang_penahanan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
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
                    <th>Nama Berkas</th>
                    <th>File Berkas</th>
                    <th>Tanggal Kirim</th>
                    <th>Dikirim Oleh</th>
                    <th>Download</th>
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

