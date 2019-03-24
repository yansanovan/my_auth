<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 align="center"> Detail Data Jadwal Kejaksaan </h1>
               <table  width="300px">
             <?php 
              $no = 1;
              foreach ($data as $key => $value) 
              {
              ?>
                <tbody>
                    <tr>
                        <td>Status Data</td><td>:</td><td><?php if ($value->id_data == NULL || $value->id_users == NULL || $value->deskripsi == NULL || $value->file_pelimpahan_berkas == NULL || $value->file_tahap_I == NULL || $value->file_tahap_II == NULL || $value->file_pelimpahan == NULL || $value->file_penahanan == NULL || $value->file_perpanjang_penahanan == NULL || $value->file_eksekusi_putusan == NULL || $value->tanggal_pelimpahan_berkas == 0000-00-00 || $value->tanggal_tahap_I == 0000-00-00 || $value->tanggal_tahap_II == 0000-00-00 || $value->tanggal_pelimpahan == 0000-00-00 || $value->tanggal_penahanan == 0000-00-00 || $value->tanggal_perpanjang_penahanan == 0000-00-00 || $value->tanggal_eksekusi_putusan == 0000-00-00) 
                        {
                        ?>
                          <h5 style="color: red">Data Tidak Lengkap</h5>
                        <?php
                        }
                        else
                        {
                        ?>
                          <b><h5 style="color: green">Data Komplete</h5></b>
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                </tbody>
            </table>
            <br>   
              <a href="<?php echo base_url('kepolisian');?>" class="btn btn-info btn-sm"> 
                <span class="glyphicon glyphicon-arrow-left"></span> Kembali
              </a>

              <a id="uraian_tuntutan" class="btn btn-success btn-sm" data-uraian_tuntutan="<?= $value->uraian_tuntutan;?>" data-toggle="modal" data-target="#uraian_tuntutan_modal" data-whatever="@mdo"><span class="glyphicon glyphicon-file"></span></i>Uraian Tuntutan</a>

               <a id="uraian_dakwaan" class="btn btn-warning btn-sm" data-uraian_dakwaan="<?= $value->uraian_dakwaan;?>" data-toggle="modal" data-target="#uraian_dakwaan_modal" data-whatever="@mdo"><span class="glyphicon glyphicon-file"></span></i>Uraian Dakwaan</a>
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

                  <!-- Pelimpahan berkas & file Pelimpahan berkas & tanggal Pelimpahan berkas-->
                  
                  <tr>  
                    <td><?= $no++;?></td>
                    
                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>
                    
                    <td style ="<?php if($value->pelimpahan_berkas == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->pelimpahan_berkas;?>
                    </td>
                    
                    <td style ="<?php if($value->file_pelimpahan_berkas == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_pelimpahan_berkas;?>
                    </td>
                    
                    <td style ="<?php if($value->tanggal_pelimpahan_berkas == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_pelimpahan_berkas == 0000-00-00 || $value->tanggal_pelimpahan_berkas == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_pelimpahan_berkas); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_pelimpahan_berkas == null)
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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_pelimpahan_berkas);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <!-- Tahap I & file Tahap I & tanggal Tahap I-->

                   <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->tahap_I == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->tahap_I;?>
                    </td>

                    <td style ="<?php if($value->file_tahap_I == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_tahap_I;?>
                    </td>

                     <td style ="<?php if($value->tanggal_tahap_I == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_tahap_I == 0000-00-00 || $value->tanggal_tahap_I == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_tahap_I); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php 
                      if($value->file_tahap_I == null)
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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_tahap_I);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                  <!-- Tahap II & file Tahap II  & tanggal tahap II-->

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->tahap_II == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->tahap_II;?>
                    </td>

                    <td style ="<?php if($value->file_tahap_II == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_tahap_II;?>
                    </td>

                    <td style ="<?php if($value->tanggal_tahap_II == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_tahap_II == 0000-00-00 || $value->tanggal_tahap_II == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_tahap_II); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_tahap_II == null)
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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_tahap_II);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>

                  <!-- Pelimpahan & file pelimpahan  & tanggal pelimpahan -->

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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_pelimpahan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <!-- Penahanan  & file penahanan  & tanggal penahanan -->

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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_penahanan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>                          
                  </tr>

                  <!-- Perpanjang Penahanan  & file perpanjang penahanan  & tanggal perpanjang penahanan -->

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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_perpanjang_penahanan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>               
                    </td>
                  </tr>

                  <!-- eksekusi putusan & file eksekusi putusan & tanggal eksekusi putusan-->

                   <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->eksekusi_putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->eksekusi_putusan;?>
                    </td>
                    <td style ="<?php if($value->file_eksekusi_putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_eksekusi_putusan;?>
                    </td>
                    <td style ="<?php if($value->tanggal_eksekusi_putusan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_eksekusi_putusan == 0000-00-00 || $value->tanggal_eksekusi_putusan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_eksekusi_putusan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_eksekusi_putusan == null)
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
                        <a href="<?php echo base_url('kepolisian/unduh_kejaksaan/'.$value->file_eksekusi_putusan);?>" target="_blank" class="btn btn-success btn-sm"> 
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

<div class="modal fade" id="uraian_tuntutan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center" class="modal-title" id="exampleModalLabel">Uraian Tuntutan</h2>
      </div>
      <div class="modal-body" id="modal-tuntutan_modal">
          <div class="form-group">
            <p id="uraian_tuntutan"></p>
          </div>   
          <br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uraian_dakwaan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center" class="modal-title" id="exampleModalLabel">Uraian Dakwaan</h2>
      </div>
      <div class="modal-body" id="modal-dakwaan_modal">
          <div class="form-group">
            <p id="uraian_dakwaan"></p>
          </div>   
          <br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>
      </div>
    </div>
  </div>
</div>