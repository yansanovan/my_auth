<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-body">
                <section class="content">
                <a href="<?php echo base_url('kepolisian/lihat_detail_jadwal/'.$this->uri->segment(3));?>" class="btn btn-info btn-sm"> 
                  <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                </a><br><br>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInputEmail1">Cerita Singkat</label>
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
                    <div class="box-body pad"><textarea name="editor1"><?= $data->cerita_singkat;?></textarea></div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>



