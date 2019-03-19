<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-body">
                <section class="content">
                <?= validation_errors();?>
                <?= $this->session->flashdata('putusan_amar');?>
                <a href="<?php echo base_url('pengadilan/lihat_detail_jadwal/'.$this->uri->segment(3));?>" class="btn btn-info btn-sm"> 
                  <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                </a><br><br>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInputEmail1">Cerita Singkat</label>
                      <?= form_open('pengadilan/ubah_putusan_amar/'.$this->uri->segment(3));?>
                      <div class="box-body pad">
                        <input type="hidden" name="url" value="<?= $data->url;?>">
                        <input type="hidden" name="id_data" value="<?= $data->id_data;?>">
                        <textarea name="putusan_amar" class="ckeditor"> <?= $data->putusan_amar;?></textarea>
                         <script>
                        CKEDITOR.replace( 'putusan_amar' );
                        </script>
                      </div>
                    </div>
                  <center><button class="btn btn-info btn-sm" type="submit">Update</button></center>
                  <?= form_close();?>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>



