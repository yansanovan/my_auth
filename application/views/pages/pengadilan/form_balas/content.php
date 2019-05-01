<div class="content-wrapper" style="min-height: 460px;">
  <section class="content-header">
    <h1>Form Balas</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header"><br>         
            <?php echo form_open_multipart();?>

            <div class="col-md-12">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Nama File</th>
                    <th scope="col">Form </th>
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
                    <td>Penggeledahan</td>
                    <td>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ijin Geledah</label>
                        <input type="file" name="ijin_geledah" value="<?= set_value('ijin_geledah'); ?>" class="form-control" id="exampleInputEmail1" placeholder="ijin_geledah">
                        <?= form_error('ijin_geledah'); ?>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Setuju Geledah</label>
                        <input type="file" name="setuju_geledah" value="<?= set_value('setuju_geledah'); ?>" class="form-control" id="exampleInputEmail1" placeholder="setuju_geledah">
                        <?= form_error('setuju_geledah'); ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>TAP Sita</td>
                    <td>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Khusus</label>
                        <input type="file" name="khusus" value="<?= set_value('khusus'); ?>" class="form-control" id="exampleInputEmail1" placeholder="khusus">
                        <?= form_error('khusus'); ?>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Biasa</label>
                        <input type="file" name="biasa" value="<?= set_value('biasa'); ?>" class="form-control" id="exampleInputEmail1" placeholder="biasa">
                        <?= form_error('biasa'); ?>
                      </div>
                    </td>
                  </tr>
                
                  <tr>
                    <td>Perpangjangan</td>
                    <td>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pengadilan</label>
                        <input type="file" name="pengadilan" value="<?= set_value('pengadilan'); ?>" class="form-control" id="exampleInputEmail1" placeholder="pengadilan">
                        <?= form_error('pengadilan'); ?>
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
</div>

