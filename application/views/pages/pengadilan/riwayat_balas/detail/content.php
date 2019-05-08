<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header">
          <h1 align="center"> Detail Balasan Surat Polisi </h1><br>         
            <div class="col-md-12">
              <a href="<?php echo base_url('pengadilan/riwayat_balas');?>" class="btn btn-success btn-sm"> 
                <i class="fa fa-undo" aria-hidden="true"></i>  Kembali
              </a><br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-5">Nama File</th>
                  <th class="col-sm-7">Form </th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>Nama Tersangka</td>
                  <td><?= $value->nama_tersangka ;?></td>
                </tr>
                
                <tr>
                  <td>Pasal</td>
                  <td><?= $value->pasal ;?></td>
                </tr>

                <tr>
                  <td>No Sprindik</td>
                  <td><?= $value->no_sprindik ;?></td>
                </tr>

                
                <tr>
                  <td>Penggeledahan</td>
                  <td>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Ijin Geledah</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $value->ijin_geledah_pn ;?></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Setuju Geledah</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $value->setuju_geledah_pn ;?></p>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>TAP Sita</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Khusus</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $value->khusus_pn;?></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Biasa</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $value->biasa_pn ;?></p>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td>Perpangjangan</td>
                  <td>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Pelimpahan</label>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-download-alt"></i> 
                        </a> <?= $value->pelimpahan ;?></p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

