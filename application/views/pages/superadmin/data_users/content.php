<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?= $this->session->flashdata('updated');?>
              <?= $this->session->flashdata('terhapus');?>
              <?= $this->session->flashdata('Backup_db');?>
              <?= $this->session->flashdata('Backup_files');?>

              <h1 align="center"> Data Users</h1>
              <a href="<?php echo base_url('superadmin/tambah_users');?>" class="btn btn-success btn-sm"> 
                <span class="glyphicon glyphicon-edit"></span> Tambah Users
              </a>
              <br>
              <br>

              <a href="<?php echo base_url('superadmin/db_backup');?>" class="btn btn-info btn-sm" onclick="return confirm('Mau Backup databas ini?')"> 
                <span class="glyphicon glyphicon-save"></span> Backup Database
              </a>
              <br>
              <br>
              <a href="<?php echo base_url('superadmin/project_backup');?>" onclick="return confirm('Yakin Mau Backup files ini?')" class="btn btn-warning btn-sm"> 
                <span class="glyphicon glyphicon-save"></span> Backup Project
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
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
                  	<td><?= $value->username;?></td>
                  	<td><?= $value->email;?></td>
                  	<td><?= $value->level;?></td>
                  	<td>
                      <div class="btn-group" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              <a href="<?php echo base_url('superadmin/hapus/'. $value->id);?>" onclick="return confirm('Yakin Mau Hapus users ini?')">Hapus Users</a>
                            </li>

                            <li><a href="<?php echo base_url('superadmin/edit/'.$value->id);?>">Ubah Users</a></li>
                          </ul>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php 
              	  } 
              	  ?>
                  </tbody>
                  <tfoot>
                  <tr>
	                <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
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

