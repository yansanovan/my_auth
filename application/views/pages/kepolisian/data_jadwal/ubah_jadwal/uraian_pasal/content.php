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
                <?= $this->session->flashdata('uraian_pasal_updated');?>
                <a href="<?php echo base_url('kepolisian/lihat_detail_jadwal/'.$this->uri->segment(3));?>" class="btn btn-info btn-sm"> 
                  <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                </a>
                  <br><br>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInputEmail1">Uraian Pasal</label>
                        <div class="box box-info">
                          <div class="box-header"><br>
                            <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                      </div>
                      <?= form_open('kepolisian/ubah_uraian_pasal/'.$this->uri->segment(3));?>
                      <input type="hidden" name="url" value="<?= $data->url;?>">
                      <input type="hidden" name="id_data" value="<?= $data->id_data;?>">
                      <div class="box-body pad">
                        <textarea name="editor3" class="ckeditor"> <?= $data->uraian_pasal;?></textarea>
                         <script>
                        CKEDITOR.replace( 'editor3' );
                        </script>
                      </div>
                    </div>
                      <center><button class="btn btn-info btn-sm" name="ubah_uraian"  value="true" type="submit">Update</button></center>
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



