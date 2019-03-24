<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center" class="modal-title" id="exampleModalLabel">Form Ganti Deskripsi</h2>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body" id="modal-edit">
        <?php echo form_open('kejaksaan/ubah_deskripsi');?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"></label>
            <input type="hidden" name="id_data" class="form-control" id="id_data">
            <input type="hidden" name="url" class="form-control" id="url">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi Perkara : </label>
            <input type="text" name="deskripsi" class="form-control" size="60"  id="deskripsi" required="required">
          </div>   
          <br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ganti Deskripsi</button>
          </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
