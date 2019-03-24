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
              <?= $this->session->flashdata('berhasil_dirubah');?>

              <h1 align="center"> Data Lapas </h1>
              <a href="<?php echo base_url('lapas/tambah_jadwal');?>" class="btn btn-success btn-sm"> 
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
                        <a href="<?php echo base_url('lapas/lihat_detail_jadwal/'. $value->url);?>" class="btn btn-info btn-sm"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail Jadwal
                        </a>
                    </td>

                     <td>
                        <a href="<?php echo base_url('lapas/hapus_jadwal/'.$value->id_data.'/'.$value->url);?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Mau Hapus Jadwal Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                        </a>

                         <?php $this->load->view('pages/lapas/data_jadwal/ubah_jadwal/deskripsi/content');?>
                         
                         <a id="ganti_deskripsi" class="btn btn-warning btn-sm" data-id_data="<?= $value->id_data;?>" data-url="<?= $value->url;?>"  data-deskripsi="<?= $value->deskripsi;?>"data-toggle="modal" data-target="#editdata" data-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span></i>Ganti Deskripsi</a>
                    </td>

                     <td>
                      <?php 
                      if ($value->file_eksekusi == null OR $value->file_isi_putusan == null OR $value->file_pembebasan_bersyarat == null OR $value->file_remisi == null OR $value->file_bebas == null OR $value->tanggal_eksekusi == 0000-00-00 OR $value->tanggal_isi_putusan == 0000-00-00 OR $value->tanggal_pembebasan_bersyarat == 0000-00-00 OR $value->tanggal_remisi== 0000-00-00 OR $value->tanggal_bebas== 0000-00-00) 
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

