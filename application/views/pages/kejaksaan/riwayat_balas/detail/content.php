<div class="content-wrapper" style="min-height: 460px;">
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h1 align="center"> Detail Balasan Surat Polisi </h1><br>         
              <div class="col-md-12">
                <a href="<?php echo base_url('kejaksaan/riwayat_balas');?>" class="btn btn-success btn-sm"> 
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
                    <td>Spdp</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Spdp</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->spdp_kj;?>
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>Tap Sita</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Narkotika</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->narkotika_kj ;?>
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>Perpanjangan</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kejaksaan</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->kejaksaan);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->kejaksaan_kj;?>
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>Pengiriman Berkas</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">P-18</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->p_18);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->p_18_kj;?>
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">P-21</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->p_21);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->p_21_kj;?>
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>
                
                  <tr>
                    <td>Pelimpahan</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pelimpahan</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->pelimpahan);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->pelimpahan_kj;?>
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>P-17</td>
                    <td>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="exampleInputEmail1">P-17</label>
                          <p>
                            <a href="<?= base_url('kejaksaan/unduh/'.$value->p_17_kj);?>" class="btn btn-primary btn-sm">
                              <i class="glyphicon glyphicon-download-alt"></i> 
                            </a> <?= $value->p_17_kj;?>
                          </p>
                        </div>
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
</div>

