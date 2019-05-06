<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header"><br>         
          <?php echo form_open_multipart();?>
          <div class="col-md-12">
            <h1 align="center">Form Balas</h1><br>
            <a href="<?= base_url('kejaksaan/surat_polisi');?>" class="btn btn-success btn-sm">
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
                  <td>
                    <input type="hidden" name="id_surat" value="<?= $value->id_data;?>">
                    <input type="text" name="nama_tersangka" value="<?= $value->nama_tersangka; ?>" class="form-control" readonly>
                  </td>
                </tr>
                
                <tr>
                  <td>Pasal</td>
                  <td> 
                    <input type="text" name="pasal" value="<?= $value->pasal; ?>" class="form-control" readonly >
                  </td>
                </tr>

                <tr>
                  <td>No Sprindik</td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="no_sprindik" value="<?= $value->no_sprindik; ?>" class="form-control" readonly >
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Spdp</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Spdp</label>
                      <input type="file" name="spdp" value="<?= set_value('spdp'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Spdp">
                      <?= form_error('spdp'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Tap Sita</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">narkotika</label>
                      <input type="file" name="narkotika" value="<?= set_value('narkotika'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Spdp">
                      <?= form_error('narkotika'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Perpanjangan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">kejaksaan</label>
                      <input type="file" name="kejaksaan" value="<?= set_value('kejaksaan'); ?>" class="form-control" id="exampleInputEmail1" placeholder="kejaksaan">
                      <?= form_error('kejaksaan'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Pengiriman Berkas</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-18</label>
                      <input type="file" name="p_18" value="<?= set_value('p_18'); ?>" class="form-control" id="exampleInputEmail1" placeholder="p_18">
                      <?= form_error('p_18'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-21</label>
                      <input type="file" name="p_21" value="<?= set_value('p_21'); ?>" class="form-control" id="exampleInputEmail1" placeholder="p_21">
                      <?= form_error('p_21'); ?>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td>Pelimpahan</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pelimpahan</label>
                      <input type="file" name="pelimpahan" value="<?= set_value('pelimpahan'); ?>" class="form-control" id="exampleInputEmail1" placeholder="pelimpahan">
                      <?= form_error('pelimpahan'); ?>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>P-17</td>
                  <td>
                    <div class="form-group">
                      <label for="exampleInputEmail1">P-17</label>
                      <input type="file" name="p_17" value="<?= set_value('p_17'); ?>" class="form-control" id="exampleInputEmail1" placeholder="p_17">
                      <?= form_error('p_17'); ?>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
            </div>
        
            <center>
              <button name="submit" class="btn btn-primary">Submit</button>
            </center><br>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
</section>


