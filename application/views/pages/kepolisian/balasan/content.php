<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h1 align="center"><i class="fa fa-envelope-open-o"></i> Surat Balasan </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Tersangka</center></th>
                  <th><center>Pasal</center></th>
                  <th><center>No Sprindik</center></th>
                  <th><center>Status Balas (Kejaksaan)</center></th>
                  <th><center>Status Balas (Pengadilan)</center></th>
                  <th><center>Detail</center></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($data as $key => $value) : ?>
                  <tr align="center">
                    <td><?= $no++;?></td>
                    <td><?= $value['nama_tersangka'];?></td>
                    <td><?= $value['pasal'];?></td>
                    <td><?= $value['no_sprindik'];?></td>                    
                    <td>
                        <?php if ($value['status_kj'] == 0) {?><span class="label label-danger">Invalid</span>
                        <?php } else {?><span class="label label-success">Valid </span> <?php } ?> 
                    </td>
                    <td>
                        <?php if ($value['status_pn'] == 0) {?><span class="label label-danger"> Invalid</span> 
                        <?php } else {?> <span class="label label-success">Valid </span> <?php } ?> 
                    </td>
                    <td>
                        <a href="<?php echo base_url('kepolisian/detail_balas/'.$value['id_data']);?>" class="btn btn-info btn-xs"> 
                          <span class="glyphicon glyphicon-eye-open"></span> Detail
                        </a>
                    </td>
                  </tr>           
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
