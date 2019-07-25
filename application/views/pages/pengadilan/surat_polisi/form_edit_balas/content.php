<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header"><br>         
                    <?= form_open_multipart();?>
                        <div class="col-md-12">
                            <?= $this->session->flashdata('msgbox');?>
                            <p>
                                <a href="<?= base_url('pengadilan/riwayat_balas');?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Kembali
                                </a>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 align="center" style="color: black">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> FORM EDIT
                                        </h3><br>
                                    </div>
                                    <div class="panel-body">
                                        <table  width="400px">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-user-o" aria-hidden="true"></i> Nama Tersangka</td>
                                                    <td width="10px">:</td>
                                                    <td width="250px"><?= $data->nama_tersangka?></td>
                                                </tr>
                                                <tr>
                                                    <td> <i class="fa fa-file-text-o"></i>  Pasal </td>
                                                    <td width="10px">:</td>
                                                    <td width="250px"><?= $data->pasal?></td>
                                                </tr>
                                                <tr>
                                                    <td> <i class="fa fa-file-text" aria-hidden="true"></i> No Sprindik </td>
                                                    <td width="10px">:</td>
                                                    <td width="250px"><?= $data->no_sprindik?></td>
                                                </tr>
                                                <tr>
                                                    <td> <i class="fa fa-address-book-o" aria-hidden="true"></i> No LP </td>
                                                    <td width="10px">:</td>
                                                    <td width="250px"><?= $data->no_lp?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <thead>
                                                    <tr bgcolor="#8e8d8d">
                                                        <th class="col-sm-4" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama File</th>
                                                        <th class="col-sm-4" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                                                        <th class="col-sm-4" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>Penggeledahan</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="file_path">Ijin Geledah</label>
                                                            <input type="hidden" name="id_surat_pn" value="<?= $data->id_surat_pn;?>">
                                                            <p>
                                                                <a href="<?= base_url('pengadilan/unduh/'.$data->ijin_geledah_pn);?>" class="btn btn-primary btn-xs">
                                                                    <i class="glyphicon glyphicon-download-alt"></i>  
                                                                </a> <?= $data->ijin_geledah_pn;?>
                                                            </p> 
                                                        </div><br>
                                                        <div class="form-group">
                                                            <label for="file_path">Setuju Geledah</label>
                                                            <p>
                                                                <a href="<?= base_url('pengadilan/unduh/'.$data->setuju_geledah_pn);?>" class="btn btn-primary btn-xs">
                                                                <i class="glyphicon glyphicon-download-alt"></i>  
                                                                </a> <?= $data->setuju_geledah_pn;?>
                                                            </p> 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="file_path">ijin geledah</label>
                                                            <div class="input-group">
                                                                <input type="text" id="file_path2" class="form-control" placeholder="Pilih Ijin geledah">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" id="file_browser2">
                                                                        <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <input type="hidden" name="old_ijin_geledah" value="<?= $data->ijin_geledah_pn;?>">
                                                            <input type="file" class="hidden" id="file2" name="ijin_geledah" value="<?= set_value('ijin_geledah'); ?>">
                                                            <?= form_error('ijin_geledah','<p class="validate" style="color:red;">','</p>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Setuju geledah</label>
                                                            <div class="input-group">
                                                                <input type="text" id="file_path3" class="form-control" placeholder="Pilih setuju geledah">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" id="file_browser3">
                                                                        <i class="fa fa-upload"></i></button>
                                                                </span>
                                                            </div>
                                                            <input type="hidden" name="old_setuju_geledah" value="<?= $data->setuju_geledah_pn;?>">
                                                            <input type="file" class="hidden" id="file3" name="setuju_geledah" value="<?= set_value('setuju_geledah'); ?>">
                                                            <?= form_error('setuju_geledah','<p class="validate" style="color:red;">','</p>'); ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TAP Sita</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="file_path">Khusus</label>
                                                            <p>
                                                                <a href="<?= base_url('pengadilan/unduh/'.$data->khusus_pn);?>" class="btn btn-primary btn-xs">
                                                                    <i class="glyphicon glyphicon-download-alt"></i>  
                                                                </a> <?= $data->khusus_pn;?>
                                                            </p> 
                                                        </div><br>
                                                        <div class="form-group">
                                                            <label for="file_path">Biasa</label>
                                                            <p>
                                                                <a href="<?= base_url('pengadilan/unduh/'.$data->biasa_pn);?>" class="btn btn-primary btn-xs">
                                                                    <i class="glyphicon glyphicon-download-alt"></i>  
                                                                </a> <?= $data->biasa_pn;?>
                                                            </p> 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Khusus</label>
                                                            <div class="input-group">
                                                                <input type="text" id="file_path4" class="form-control" placeholder="Pilih Khusus">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" id="file_browser4">
                                                                        <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <input type="hidden" name="old_khusus" value="<?= $data->khusus_pn;?>">
                                                            <input type="file" class="hidden" id="file4" name="khusus" value="<?= set_value('khusus');?>">
                                                            <?= form_error('khusus','<p class="validate" style="color:red;">','</p>'); ?>
                                                        </div>
                                                
                                                        <label for="exampleInputEmail1">Biasa</label>
                                                        <div class="input-group">
                                                            <input type="text" id="file_path5" class="form-control" placeholder="Pilih Biasa">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-success" type="button" id="file_browser5">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <input type="hidden" name="old_biasa" value="<?= $data->biasa_pn;?>">
                                                        <input type="file" class="hidden" id="file5" name="biasa" value="<?= set_value('biasa');?>">
                                                        <?= form_error('biasa','<p class="validate" style="color:red;">','</p>'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Perpangjangan</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="file_path">Pengadilan</label>
                                                            <p>
                                                                <a href="<?= base_url('pengadilan/unduh/'.$data->pengadilan_pn);?>" class="btn btn-primary btn-xs">
                                                                    <i class="glyphicon glyphicon-download-alt"></i>  
                                                                </a> <?= $data->pengadilan_pn;?>
                                                            </p> 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="exampleInputEmail1">Pengadilan</label>
                                                        <div class="input-group">
                                                            <input type="text" id="file_path8" class="form-control" placeholder="Pilih Pengadilan">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-success" type="button" id="file_browser8">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <input type="hidden" name="old_pengadilan" value="<?= $data->pengadilan_pn;?>">
                                                        <input type="file" class="hidden" id="file8" name="pengadilan" value="<?= set_value('pengadilan');?>">
                                                        <?= form_error('pengadilan','<p class="validate" style="color:red;">','</p>'); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <center>
                                        <button name="edit" value="true" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                                    </center><br>
                                </p>
                            </div>
                        </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>


