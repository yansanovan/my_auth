<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-12"><br>
                        <P> 
                            <a href="<?= base_url('pengadilan');?>" class="btn btn-warning btn-xs">
                               <i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Kembali
                            </a>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 align="center" style="color: black"><i class="fa fa-envelope" aria-hidden="true"></i> DETAIL SURAT KEJAKSAAN </h3><br>
                                </div>
                                <div class="panel-body">
                                    <?php foreach ($data as $key => $value) : ?>
                                    <table  width="450px">
                                      <tbody>
                                        <tr>
                                            <td><i class="fa fa-user-o" aria-hidden="true"></i> Dikirim Oleh</td>
                                            <td width="10px">:</td>
                                            <td width="250px"><?= $value->username?></td>
                                        </tr>
                                        <tr>
                                            <td> <i class="fa fa-calendar" aria-hidden="true"></i>  Tanggal Posting </td>
                                            <td width="10px">:</td>
                                            <td width="250px"><?= date('d-m-Y', strtotime($value->tanggal_posting)); ?></td>
                                        </tr>
                                      </tbody>
                                    </table><br>
                              
                                    <table class="table table-bordered">
                                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                                    <thead>
                                        <tr bgcolor="#8e8d8d">
                                        <th class="col-sm-5" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
                                        <th class="col-sm-7" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> Lampiran</th>
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
                                            <td>No LP</td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?= $value->no_lp; ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Spdp</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Spdp</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->spdp);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a> <?= $value->spdp ;?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Penggeledahan</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ijin Geledah </label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->ijin_geledah);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> </a> 
                                                            <?= $value->ijin_geledah;?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Setuju geledah </label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->setuju_geledah);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> </a>
                                                        <?= $value->setuju_geledah;?>
                                                    </p>  
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tap Sita</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Khusus</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->khusus);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                        </a>
                                                        <?=$value->khusus;?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Biasa</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->biasa);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')" >
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                        </a> <?= $value->biasa;?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Narkotika</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->narkotika);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                        </a> <?= $value->narkotika;?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Perpanjangan</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kejaksaan</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->kejaksaan);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>
                                                        <?= $value->kejaksaan;?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Pengadilan</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->pengadilan);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')"><i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>
                                                        <?= $value->pengadilan;?>
                                                    </p>  
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Pengiriman Berkas</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">P-18</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->p_18);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> 
                                                        </a>
                                                        <?= $value->p_18;?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">P-21</label>
                                                    <p>
                                                    <a href="<?= base_url('pengadilan/unduh/'.$value->p_21);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                        <i class="glyphicon glyphicon-download-alt"></i> </a>
                                                        <?= $value->p_21;?>
                                                    </p>  
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Pelimpahan</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Pelimpahan</label>
                                                    <p>
                                                        <a href="<?= base_url('pengadilan/unduh/'.$value->pelimpahan);?>" class="btn btn-primary btn-xs"  onclick="return confirm('Download file ini ?')">
                                                            <i class="glyphicon glyphicon-download-alt"></i> </a> 
                                                        <?= $value->pelimpahan;?>
                                                    </p>  
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




