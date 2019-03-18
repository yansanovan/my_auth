<div class="content-wrapper" style="min-height: 460px;">
  <section class="content-header">
    <h1>Tambah jadwal</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header"><br>
            <?php if(!empty($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';}?>
            <?= validation_errors();?>
            <?= $this->session->flashdata('berhasil');?>
            <?= $this->session->flashdata('deskripsi');?>
            <?= $this->session->flashdata('uraian_pasal');?>
            <?= $this->session->flashdata('cerita_singkat');?>
            <?= $this->session->flashdata('gagal_simpan');?>
            <?= $this->session->flashdata('file_penangkapan');?>
            <?= $this->session->flashdata('file_ijin_sita');?>
            <?= $this->session->flashdata('file_ijin_geledah');?>
            <?= $this->session->flashdata('file_pelimpahan');?>
            <?= $this->session->flashdata('file_penahanan');?>
            <?= $this->session->flashdata('file_perpanjang_penahanan');?>
            <?=  form_open_multipart('kepolisian/simpan');?>
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi Perkara</label>
                <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi">
              </div>
            </div>
              <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                  <label for="exampleInputEmail1">Uraian Pasal</label>
                        <div class="box box-info">
                          <div class="box-header"><br>
                              <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse">
                                  <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                  title="Remove">
                                  <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body pad">
                             <textarea name="editor1" class="ckeditor"></textarea>
                             <script>
                                  CKEDITOR.replace('editor1');
                              </script>
                        </div>
                  </div>
              </div>
            </section>

             <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                  <label for="exampleInputEmail1">Cerita Singkat</label>
                        <div class="box box-info">
                          <div class="box-header"><br>
                              <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse">
                                  <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                  title="Remove">
                                  <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body pad">
                             <textarea name="editor2" class="ckeditor"></textarea>
                               <script>
                                  CKEDITOR.replace('editor2');
                              </script>
                        </div>
                  </div>
              </div>
            </section>
                           
            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="penangkapan" class="form-control">
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Penahanan">Penahanan</option>
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File Penangkapan</label>
                  <input type="file" name="file_penangkapan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Penangkapan</label>
                  <input type="date" name="tanggal_penangkapan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="ijin_sita" class="form-control">
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Penahanan">Penahanan</option>
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File Ijin Sita</label>
                  <input type="file" name="file_ijin_sita" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Ijin Sita</label>
                  <input type="date" name="tanggal_ijin_sita" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="ijin_geledah" class="form-control">
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Penahanan">Penahanan</option>
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File Ijin Geledah</label>
                  <input type="file" name="file_ijin_geledah" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Ijin Geledah</label>
                  <input type="date" name="tanggal_ijin_geledah" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>  
            </div>

            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="pelimpahan" class="form-control">
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Penahanan">Penahanan</option>
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File Pelimpahan</label>
                  <input type="file" name="file_pelimpahan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Pelimpahan</label>
                  <input type="date" name="tanggal_pelimpahan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>  
            </div>

            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="penahanan" class="form-control">
                    <option value="Penahanan" >Penahanan</option>
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File penahanan</label>
                  <input type="file" name="file_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>

              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Penahanan</label>
                  <input type="date" name="tanggal_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
            </div>


            <div class="col-md-12">
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Berkas</label>
                  <select name="perpanjang_penahanan" class="form-control">
                    <option value="Perpanjangan Penahanan">Perpanjangan Penahanan</option>
                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Ijin Sita">Ijin Sita</option>
                    <option value="Ijin Geledah">Ijin Geledah</option>
                    <option value="Pelimpahan">Pelimpahan</option>
                    <option value="Penahanan">Penahanan</option>
                  </select>
                  <!-- <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="masukan deskripsi"> -->
                  <br>
                </div>
              </div>
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">File perpanjang penahanan</label>
                  <input type="file" name="file_perpanjang_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
              
              <div class="col-md-4"><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Perpanjang Penahanan</label>
                  <input type="date" name="tanggal_perpanjang_penahanan" class="form-control" id="exampleInputEmail1" placeholder="pilih file">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <center>
                <button class="btn btn-primary">Submit</button>
              </center><br>
            </div>

          </div>
          <?= form_close();?>
        </div>
      </div>
    </div>
  </section>
</div>