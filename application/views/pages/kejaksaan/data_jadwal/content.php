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

              <?= $this->session->flashdata('file_penahanan');?>
              <?= $this->session->flashdata('file_ijin_sita');?>
              <?= $this->session->flashdata('file_ijin_geledah');?>
              <?= $this->session->flashdata('file_pelimpahan');?>
              <?= $this->session->flashdata('file_penahanan');?>
              <?= $this->session->flashdata('file_perpanjang_penahanan');?>



              <h1 align="center"> Data kejaksaan </h1>
              <a href="<?php echo base_url('kejaksaan/tambah_jadwal');?>" class="btn btn-success btn-sm"> 
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
                        <a href="<?php echo base_url('kejaksaan/lihat_detail_jadwal/'.$value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                     <td>
                        <a href="<?php echo base_url('kejaksaan/hapus_jadwal/'. $value->id_data);?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                        </a>

                         <?php $this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/deskripsi/content');?>
                         
                         <a id="ganti_deskripsi" class="btn btn-warning btn-sm" data-id_data="<?= $value->id_data;?>"  data-deskripsi="<?= $value->deskripsi;?>"data-toggle="modal" data-target="#editdata" data-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span></i>Ganti Deskripsi</a>
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
                          <button class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-file"></span> Data Lengkap</button>
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

