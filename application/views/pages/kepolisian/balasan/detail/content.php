
<div class="content-wrapper"  style="min-height: 460px;">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box  box-info">
          <div class="box-header">
            <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
            <?= $this->session->flashdata('terhapus');?>
            <?= $this->session->flashdata('tanggal_berhasil_diubah');?>
    
            <h1 align="center"> Surat Balasan Kejaksaan & Pengadilan </h1>
            
            <br><br>
            <div class="col-md-12">
            <table  width="350px">
              <tbody>
                <tr>
                    <td><i class="fa fa-user" aria-hidden="true"></i> <b>Username Kejaksaan</b></td>
                    <td width="10px">:</td>
                    <td width="150px"><?php echo @$username_kj->username;?></td>
                </tr>
                <tr>
                    <td ><i class="fa fa-user" aria-hidden="true"></i><b> Username Pengadilan</b></td>
                    <td width="10px">:</td>
                    <td width="100px"> <?php echo @$username_pn->username;?></td>
                    
                </tr>
              </tbody>
            </table>
            <br><br>

            <?php foreach ($data as $key => $value) { ?>
            <a href="<?= base_url('kejaksaan');?>" class="btn btn-success btn-sm">
              <i class="fa fa-undo" aria-hidden="true"></i>  Kembali
            </a>
            <br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-sm-5">Nama File</th>
                  <th class="col-sm-7">Lampiran</th>
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
                      <label for="exampleInputEmail1">Spdp</label>
                      <?php if ($value->spdp_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->spdp_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->spdp_kj;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Penggeledahan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ijin Geledah</label>
                      <?php if ($value->ijin_geledah_pn == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->ijin_geledah_pn);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->ijin_geledah_pn;?>
                      </p>
                     <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Setuju Geledah</label>
                      <?php if ($value->setuju_geledah_pn == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->setuju_geledah_pn);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->setuju_geledah_pn;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Khusus</label>
                      <?php if ($value->khusus_pn == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->khusus_pn);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->khusus_pn;?>
                      </p>
                     <?php } ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Biasa</label>
                      <?php if ($value->biasa_pn == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->biasa_pn);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->biasa_pn;?>
                      </p>
                     <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Narkotika</label>
                      <?php if ($value->narkotika_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->narkotika_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->narkotika_kj;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kejaksaan</label>
                      <?php if ($value->kejaksaan_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->kejaksaan_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->kejaksaan_kj;?>
                      </p>
                     <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pengadilan</label>
                      <?php if ($value->pengadilan_pn == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->pengadilan_pn);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->pengadilan_pn;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Pengiriman Berkas</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-18</label>
                      <?php if ($value->p_18_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->p_18_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->p_18_kj;?>
                      </p>
                     <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">P-21</label>
                      <?php if ($value->p_21_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->p_21_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->p_21_kj;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pelimpahan</label>
                      <?php if ($value->pelimpahan_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->pelimpahan_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->pelimpahan_kj;?>
                      </p>
                     <?php } ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>P-17</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-17</label>
                      <?php if ($value->p_17_kj == NULL) { ?>
                      <p>
                        <a href="" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> 
                      </p>
                      <?php } else { ?>
                      <p>
                        <a href="<?= base_url('kejaksaan/unduh/'.$value->p_17_kj);?>" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-download-alt"></i></a> <?= $value->p_17_kj;?>
                      </p>
                     <?php } ?>
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



