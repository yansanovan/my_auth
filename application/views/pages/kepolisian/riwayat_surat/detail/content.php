
<div class="content-wrapper"  style="min-height: 460px;">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box  box-info">
          <div class="box-header">
            <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
            <?= $this->session->flashdata('terhapus');?>
            <?= $this->session->flashdata('tanggal_berhasil_diubah');?>
    
            <h1 align="center"> Detail Surat Polisi </h1>
            <br>
            <div class="col-md-12">
            <a href="<?php echo base_url('kepolisian/riwayat_surat');?>" class="btn btn-success btn-sm"> 
               <i class="fa fa-undo" aria-hidden="true"></i> Kembali
            </a><br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-5">Nama File</th>
                  <th class="col-sm-7">Lampiran</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $value) { ?>
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
                        <label for="exampleInputEmail1">Spdp </label>
                          <p>
                            <a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i></a> 
                              <?= $value->spdp ;?>
                          </p>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>Penggeledahan</td>
                  <td>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Ijin Geledah </label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a> 
                          <?= $value->ijin_geledah;?></p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Setuju geledah </label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a>
                          <?= $value->setuju_geledah;?></p>  
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
                    <div class="form-group">
                          <label for="exampleInputEmail1">Khusus</label>
                          <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i></a>
                          <?=$value->khusus;?></p>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Biasa</label>
                          <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->biasa;?></p>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Narkotika</label>
                          <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->narkotika;?></p>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kejaksaan</label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a>
                          <?= $value->kejaksaan;?></p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pengadilan</label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a>
                          <?= $value->pengadilan;?></p>  
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>Pengiriman Berkas</td>
                  <td>
                    <div class="form-group">
                        <label for="exampleInputEmail1">P-18</label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a>
                          <?= $value->p_18;?></p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">P-21</label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a>
                          <?= $value->p_21;?></p>  
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pelimpahan</label>
                        <p><a href="" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download-alt"></i> </a> 
                          <?= $value->pelimpahan;?></p>  
                    </div>
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
</div>



