<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 align="center"> Detail Data Jadwal Lapas </h1>
               <table  width="300px">
              <?php 
              $no = 1;
              foreach ($data as $key => $value) 
              {
              ?>
                <tbody>
                    <tr>
                        <td>Status Data</td><td>:</td><td><?php  if ($value->file_eksekusi == null OR $value->file_isi_putusan == null OR $value->file_pembebasan_bersyarat == null OR $value->file_remisi == null OR $value->file_bebas == null OR $value->tanggal_eksekusi == 0000-00-00 OR $value->tanggal_isi_putusan == 0000-00-00 OR $value->tanggal_pembebasan_bersyarat == 0000-00-00 OR $value->tanggal_remisi== 0000-00-00 OR $value->tanggal_bebas== 0000-00-00) 
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
              <a href="<?php echo base_url('kejaksaan');?>" class="btn btn-info btn-sm"> 
                <span class="glyphicon glyphicon-arrow-left"></span> Kembali
              </a>
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

                  <!-- Eksekusi & file Eksekusi & tanggal eksekusi-->
                  
                  <tr>  
                    <td><?= $no++;?></td>
                    
                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>
                    
                    <td style ="<?php if($value->eksekusi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->eksekusi;?>
                    </td>
                    
                    <td style ="<?php if($value->file_eksekusi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_eksekusi;?>
                    </td>
                    
                    <td style ="<?php if($value->tanggal_eksekusi == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_eksekusi == 0000-00-00 || $value->tanggal_eksekusi == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_eksekusi); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_eksekusi == null)
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
                        <a href="<?php echo base_url('pengadilan/unduh_lapas/'.$value->file_eksekusi);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <!-- Isi putusan & File Isi putusan & tanggal isi putusan-->

                   <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->isi_putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->isi_putusan;?>
                    </td>

                    <td style ="<?php if($value->file_isi_putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_isi_putusan;?>
                    </td>

                     <td style ="<?php if($value->tanggal_isi_putusan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_isi_putusan == 0000-00-00 || $value->tanggal_isi_putusan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_isi_putusan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php 
                      if($value->file_isi_putusan == null)
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
                        <a href="<?php echo base_url('pengadilan/unduh_lapas/'.$value->file_isi_putusan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                  <!-- pembebasan bersyarat & file pembebasan bersyarat & tanggal pembebasan bersyarat -->

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->pembebasan_bersyarat == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->pembebasan_bersyarat;?>
                    </td>

                    <td style ="<?php if($value->file_pembebasan_bersyarat == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_pembebasan_bersyarat;?>
                    </td>

                    <td style ="<?php if($value->tanggal_pembebasan_bersyarat == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_pembebasan_bersyarat == 0000-00-00 || $value->tanggal_pembebasan_bersyarat == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_pembebasan_bersyarat); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_pembebasan_bersyarat == null)
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
                        <a href="<?php echo base_url('pengadilan/unduh_lapas/'.$value->file_pembebasan_bersyarat);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                  <!-- remisi & file remisi & tanggal remisi -->

                  <tr>
                    
                    <td><?= $no++;?></td>
                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->remisi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->remisi;?>
                    </td>
                    <td style ="<?php if($value->file_remisi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_remisi;?>
                    </td>
                    <td style ="<?php if($value->tanggal_remisi == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_remisi == 0000-00-00 || $value->tanggal_remisi == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_remisi); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_remisi == null)
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
                        <a href="<?php echo base_url('pengadilan/unduh_lapas/'.$value->file_remisi);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <!-- bebas & file bebas & tanggal bebas -->

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->bebas == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->bebas;?>
                    </td>
                    <td style ="<?php if($value->file_bebas == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_bebas;?>
                    </td>
                     <td style ="<?php if($value->tanggal_bebas == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_bebas == 0000-00-00 || $value->tanggal_bebas == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_bebas); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_bebas == null)
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
                        <a href="<?php echo base_url('pengadilan/unduh_lapas/'.$value->file_bebas);?>" target="_blank" class="btn btn-success btn-sm"> 
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

