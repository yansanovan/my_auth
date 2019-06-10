<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header">
          <?= $this->session->flashdata('terhapus');?>
          <h1 align="center"> Riwayat APL </h1>
          <a href="<?php echo base_url('apl/form_apl');?>" class="btn btn-success btn-xs"> 
            <span class="glyphicon glyphicon-edit"></span> Entry APl 
          </a><br>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="bon" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tersangka</th>
                  <th>File APL</th>
                  <th>Tanggal Permintaan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($data as $key => $value) { ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $value->nama_tersangka;?></td>
                  <td>
                    <a href="<?= base_url('apl/unduh/'.$value->file_apl);?>" class="btn btn-primary btn-xs">
                      <i class="glyphicon glyphicon-download-alt"></i> 
                    </a> <?= $value->file_apl;?>
                  </td>  
                  <td><?= $value->tanggal_apl;?></td>
                  <td>
                    <a href="<?= base_url('apl/hapus/'.$value->id);?>" class="btn btn-danger btn-xs" onclick="return confirm('Mau hapus Apl ini ?')"> 
                      <span class="glyphicon glyphicon-trash" ></span> Hapus
                    </a>             
                    <a href="<?= base_url('apl/edit/'. base64_encode($value->id));?>" class="btn btn-warning btn-xs"> 
                      <span class="glyphicon glyphicon-edit" ></span></i>Edit
                    </a>
                  </td>      
                </tr>
              <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



