<?php 

$id_bon             = "";
$nama_tersangka     = "";
$file_pengajuan_bon = "";
$keterangan         = "";

if ($action == "edit") 
{
    foreach ($data as $key => $value)  
    {
        $id_bon             = $value->id_bon;
        $nama_tersangka     = $value->nama_tersangka;
        $file_pengajuan_bon = $value->file_pengajuan_bon;
        $keterangan         = $value->keterangan;
    }
}
?>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header"><br>
                    <div class="col-md-12">
                    <?= $this->session->flashdata('msgbox');?>   
                    <?= form_open_multipart('bon/simpan');?>
                    <nav class="navbar navbar-light" style="background-color:#e3f2fd;">
                        <h3 align="center"> <i class="fa fa-pencil-square" aria-hidden="true"></i> FORM <?= strtoupper($page) ;?> BON </h3><br>
                    </nav>
                        <a href="<?= base_url('bon/riwayat_bon');?>" class="btn btn-warning btn-xs"> 
                            <i class="fa fa-file-text"></i> Riwayat Bon
                        </a><br><br>
                         <table  width="400px">
                            <tbody>
                                <tr>
                                    <td> <i class="fa fa-university" aria-hidden="true"></i>  Pasal  </td>
                                    <td width="10px">:</td>
                                    <td width="250px" id="pasal"> </td>
                                </tr>
                                <tr>
                                    <td> <i class="fa fa-calendar" aria-hidden="true"></i>  Tanggal Permintaan  </td>
                                    <td width="10px">:</td>
                                    <td width="250px"><?= date('d-m-Y'); ?></td>
                                </tr>
                            </tbody>
                        </table><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr bgcolor="#8e8d8d">
                                    <th class="col-sm-3" style="color: white"><i class="fa fa-file-text" aria-hidden="true"></i> Nama Tersangka</th>
                                    <?php if ($action == "edit") {?>
                                    <th class="col-sm-3" style="color: white"><i class="fa fa-book" aria-hidden="true"></i> File Lama</th>
                                    <?php } ?>
                                    <th class="col-sm-3" style="color: white"><i class="fa fa-edit" aria-hidden="true"></i> Form File Pengajuan</th>
                                    <th class="col-sm-3" style="color: white"><i class="fa fa-info-circle" aria-hidden="true"></i> Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                        <input type="hidden" name="id_bon" class="form-control"  value="<?= $id_bon;?>">
                                        <input type="text" name="nama_tersangka" id="nama_tersangka" class="form-control" placeholder="nama tersangka" value="<?= $nama_tersangka;?>">
                                        <?php echo form_error('nama_tersangka'); ?>
                                        </div>
                                    </td>
                                    
                                    <?php if ($action == "edit") { ?>
                                    <td>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="old_bon" value="<?= $file_pengajuan_bon;?>">
                                            <p class="form-control"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $file_pengajuan_bon;?> </p>
                                        </div>
                                    </td>
                                    <?php } ?>

                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">
                                                    <input type="text" id="file_path" class="form-control" placeholder="Pilih file Bon">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="file_browser">
                                                            <i class="fa fa-search"></i> Browse</button>
                                                    </span>
                                            </div>
                                            <input type="file" class="hidden" id="file" name="file_pengajuan_bon" value="<?php echo set_value('file_pengajuan_bon')?>">
                                            <?php echo form_error('file_pengajuan_bon'); ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <?php if ($action == "edit") {?>
                                            <select class="form-control" name="keterangan">
                                                <option 
                                                    <?php if( $value->keterangan =='Bon'){echo "selected"; } ?> value="Bon">Bon
                                                </option>
                                                <option 
                                                    <?php if( $value->keterangan =='Ijin Besuk'){echo "selected"; } ?> value="Ijin Besuk">Ijin Besuk</option>
                                                <option 
                                                    <?php if( $value->keterangan =='Bon Hari Sidang (P-38)'){echo "selected"; } ?> value="Bon Hari Sidang (P-38)">Bon Hari Sidang (P-38)
                                                </option>
                                            </select>
                                            <?php 
                                            }
                                            else 
                                            {?>
                                            <select class="form-control" name="keterangan">
                                                <option value="Bon">Bon</option>
                                                <option value="Ijin Besuk">Ijin Besuk</option>
                                                <option value="Bon Hari Sidang (P-38)">Bon Hari Sidang (P-38)</option>
                                            </select>
                                            <?php
                                            } 
                                            ?>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <button class="btn btn-primary btn-sm" name="<?=$action;?>" value="true"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                        </center><br><br><br>
                    </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>


