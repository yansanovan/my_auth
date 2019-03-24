<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
              <?= $this->session->flashdata('terhapus');?>
              <?= $this->session->flashdata('berhasil');?>
              <?= $this->session->flashdata('deskripsi_diganti');?>
              <?= $this->session->flashdata('tidak_berubah');?>
              <?= $this->session->flashdata('berhasil_dirubah');?>

              <?= $this->session->flashdata('file_penahanan');?>
              <?= $this->session->flashdata('file_ijin_sita');?>
              <?= $this->session->flashdata('file_ijin_geledah');?>
              <?= $this->session->flashdata('file_pelimpahan');?>
              <?= $this->session->flashdata('file_penahanan');?>
              <?= $this->session->flashdata('file_perpanjang_penahanan');?>



              <h1 align="center"> Data Kepolisian </h1>
              <a href="<?php echo base_url('kepolisian/tambah_jadwal');?>" class="btn btn-success btn-sm"> 
              <span class="glyphicon glyphicon-edit"></span> Tambah Jadwal</a>
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
                    <th>Aksi</th>
                    <th>Status Data</th>
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

                    <td style ="<?php if($value->username == null){echo 'background-color:red'; }else{echo ''; }?>">
                      <?= $value->username;?>
                    </td>
                    <td>
                      <?php echo date('y F d', strtotime($value->tanggal_posting)); ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('kepolisian/lihat_detail_jadwal/'. $value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>
                    
                    <td>
                        <a href="<?php echo base_url('kepolisian/hapus_jadwal/'.$value->id_data.'/'.$value->url);?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                        </a>

                        <?php $this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/deskripsi/content');?>
                         
                         <a id="ganti_deskripsi" class="btn btn-warning btn-sm" data-id_data="<?= $value->id_data;?>" data-deskripsi="<?= $value->deskripsi;?>" data-url="<?= $value->url;?>" data-toggle="modal" data-target="#editdata" data-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span></i>Ganti Deskripsi</a>
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
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span> Data Komplete</button>
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
                    <th>Aksi</th>
                    <th>Status Data</th>
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


