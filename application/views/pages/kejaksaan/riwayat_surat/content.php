<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <?= $this->session->flashdata('msgbox');?>
                <nav class="navbar navbar-light" style="background-color:#e3f2fd;">
                    <h3 align="center"><i class="fa fa-envelope" aria-hidden="true"></i> RIWAYAT SURAT </h3><br>
                </nav>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tersangka</th>
                                <th>Nama Jaksa Penuntut Umum</th>
                                 <th>Status Balas</th>
                                <th>Tgl Mulai Penahanan</th>
                                <th>Tgl Habis Masa Penahanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $no = 1;
                            foreach ($data as $key => $value) :?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $value->nama_tersangka;?></td>
                                <td><?= $value->nama_jpu;?></td>
                                <td>
                                    <?php if ($value->status_balas == 1): ?>
                                        <span class="label label-success"> Sudah dibalas </span>
                                    <?php else : ?>
                                        <span class="label label-danger"> Belum dibalas</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    $tgl_posting    = new DateTime($value->tanggal_posting);
                                    $tgl_penahanan  = new DateTime($value->tanggal_penahanan);
                                    $difference     = $tgl_posting->diff($tgl_penahanan);?>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($value->tanggal_penahanan)); ?>  
                                   
                                </td> 
                                <td>
                                    <i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($value->tgl_jatuh_tempo)); ?>
                                    <?php 
                                     if ($value->selisih <= 10) {?>
                                        <span class="label label-warning"> <?= $value->selisih . ' Hari' ?></span>
                                    <?php } else {?>
                                        <span class="label label-success"> <?= $value->selisih . ' Hari' ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('kejaksaan_surat/hapus/'.base64_encode($value->id_surat));?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Hapus surat Ini')"> <span class="glyphicon glyphicon-trash"></span> Hapus
                                    </a>
                                    <a href="<?php echo base_url('kejaksaan_surat/edit/'.base64_encode($value->id_surat));?>" class="btn btn-warning btn-xs"> 
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                </td>
                            </tr>           
                            <?php endforeach ;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


