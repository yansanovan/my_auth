<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header">
          <h1 align="center"> Riwayat Bon </h1>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="bon" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tersangka</th>
                  <th>File Pengajuan</th>
                  <th>Tanggal Posting</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($data as $key => $value) { ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $value->nama_tersangka;?></td>
                  <td><?= $value->file_pengajuan_bon;?></td>  
                  <td><?= $value->tanggal_posting;?></td>
                  <td><?= $value->keterangan;?></td>
                  <td>
                    <a href="<?= base_url('bon/hapus/'. $value->id_bon);?>" class="btn btn-danger btn-xs" onclick="return confirm('Mau hapus bon ini ?')"> <span class="glyphicon glyphicon-trash" ></span> Hapus</a>      
                           
                    <a href="<?= base_url('bon/edit/'.$value->id_bon);?>" class="btn btn-warning btn-xs"> 
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



