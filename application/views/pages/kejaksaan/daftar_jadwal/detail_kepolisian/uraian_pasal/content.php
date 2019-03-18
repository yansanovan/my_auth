<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-body">
                <a href="<?php echo base_url('kejaksaan/detail_kepolisian/'.$data->url);?>" class="btn btn-info btn-sm"> 
                  <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                </a>
                <br><br>
                <label for="exampleInputEmail1">Uraian Pasal</label>
                <div class="box-body pad">
                  <textarea name="editor1" readonly="readonly" class="ckeditor"><?= $data->uraian_pasal;?></textarea>
                  <script>
                    CKEDITOR.replace('editor1');
                  </script>
                </div>                          
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>



