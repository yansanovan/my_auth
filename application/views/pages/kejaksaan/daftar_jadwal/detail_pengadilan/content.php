<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 align="center"> Detail Data Jadwal Pengadilan </h1>
              <table  width="300px">
              <?php 
              $no = 1;
              foreach ($data as $key => $value) 
              {
              ?>
                <tbody>
                    <tr>
                        <td>Status Data</td><td>:</td><td><?php if ($value->file_pelimpahan_berkas == null OR $value->file_penetapan_hari_sidang == null  OR $value->file_penahanan == null OR $value->file_perpanjang_penahanan_I == null OR $value->file_perpanjang_penahanan_II == null OR $value->file_perpanjang_penahanan_III == null OR $value->file_putusan == null OR $value->tanggal_pelimpahan_berkas == 0000-00-00 OR $value->tanggal_penetapan_hari_sidang == 0000-00-00 OR $value->tanggal_penahanan == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_I == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_II == 0000-00-00 OR $value->tanggal_perpanjang_penahanan_III == 0000-00-00 OR $value->tanggal_putusan == 0000-00-00) 
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_pelimpahan_berkas);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <!-- Penetapan hari sidang-->

                   <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->penetapan_hari_sidang == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->penetapan_hari_sidang;?>
                    </td>

                    <td style ="<?php if($value->file_penetapan_hari_sidang == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_penetapan_hari_sidang;?>
                    </td>

                     <td style ="<?php if($value->tanggal_penetapan_hari_sidang == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_penetapan_hari_sidang == 0000-00-00 || $value->tanggal_penetapan_hari_sidang == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_penetapan_hari_sidang); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>

                    <td>
                      <?php 
                      if($value->file_penetapan_hari_sidang == null)
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_penetapan_hari_sidang);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>

                  </tr>

                  <!-- Penahanan -->

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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_penahanan);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>

                  </tr>

                  <!-- Perpanjang Penahanan I -->

                  <tr>
                    
                    <td><?= $no++;?></td>
                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->perpanjang_penahanan_I == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->perpanjang_penahanan_I;?>
                    </td>
                    <td style ="<?php if($value->file_perpanjang_penahanan_I == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_perpanjang_penahanan_I;?>
                    </td>
                    <td style ="<?php if($value->tanggal_perpanjang_penahanan_I == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_perpanjang_penahanan_I == 0000-00-00 || $value->tanggal_perpanjang_penahanan_I == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_perpanjang_penahanan_I); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_perpanjang_penahanan_I == null)
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_perpanjang_penahanan_I);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>

                  </tr>
                  
                  <!--Perpanjang penahanan II -->

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->perpanjang_penahanan_II == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->perpanjang_penahanan_II;?>
                    </td>
                    <td style ="<?php if($value->file_perpanjang_penahanan_II == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_perpanjang_penahanan_II;?>
                    </td>
                     <td style ="<?php if($value->tanggal_perpanjang_penahanan_II == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_perpanjang_penahanan_II == 0000-00-00 || $value->tanggal_perpanjang_penahanan_II == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_perpanjang_penahanan_II); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php 
                      if($value->file_perpanjang_penahanan_II == null)
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_perpanjang_penahanan_II);?>" target="_blank" class="btn btn-success btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Download
                        </a>
                      <?php 
                      }
                      ?>
                    </td>                    
                  </tr>

                  <!-- Perpanjang Penahanan III -->

                  <tr>
                    <td><?= $no++;?></td>

                    <td style ="<?php if($value->deskripsi == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->deskripsi;?>
                    </td>

                    <td style ="<?php if($value->perpanjang_penahanan_III == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->perpanjang_penahanan_III;?>
                    </td>
                    <td style ="<?php if($value->file_perpanjang_penahanan_III == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_perpanjang_penahanan_III;?>
                    </td>
                    <td style ="<?php if($value->tanggal_perpanjang_penahanan_III == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_perpanjang_penahanan_III == 0000-00-00 || $value->tanggal_perpanjang_penahanan_III == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_perpanjang_penahanan_III); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_perpanjang_penahanan_III == null)
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_perpanjang_penahanan_III);?>" target="_blank" class="btn btn-success btn-sm"> 
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

                    <td style ="<?php if($value->putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->putusan;?>
                    </td>
                    <td style ="<?php if($value->file_putusan == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->file_putusan;?>
                    </td>
                    <td style ="<?php if($value->tanggal_putusan == 0000-00-00){echo 'background-color:red'; }else{echo ''; }?>"> 
                      <?php if($value->tanggal_putusan == 0000-00-00 || $value->tanggal_putusan == null)
                      {
                        echo '';
                      }
                      else
                      {                         
                        $tanggal  = strtotime($value->tanggal_putusan); 
                        echo $dateformat    = date('d M Y', $tanggal);
                      }
                      ?>
                    </td>
                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    
                    <td>
                      <?php 
                      if($value->file_putusan == null)
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
                        <a href="<?php echo base_url('kejaksaan/unduh_pengadilan/'.$value->file_putusan);?>" target="_blank" class="btn btn-success btn-sm"> 
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

