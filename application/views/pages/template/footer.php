

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Aplikasi terpadu</a>.</strong> All rights
    reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('asset/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>


<script src="<?php echo base_url('asset/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/dist/js/demo.js');?>"></script> 
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>



<script type="text/javascript">



 $(function () {
    $('#example1').DataTable({
      responsive:true,
       "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]
    })
  });

$(function () {
    $('#example2').DataTable({
      responsive:true,
       "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]
    })
  });

$(function () {
    $('#example3').DataTable({
      responsive:true,
       "lengthMenu": [[12, 25, 50, -1], [12, 25, 50, "All"]]
    })
  });



  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(300, function(){
          $(this).remove(); 
      });
  }, 3000);
  

</script>

<script type="text/javascript">

  //modal kepolisian
  $(document).on("click","#uraian_pasal", function()
  {
    var uraian_pasal  = $(this).data('uraian_pasal'); 
    $("#modal-uraian #uraian_pasal").html(uraian_pasal);
  });

  $(document).on("click","#cerita", function()
  {
    var cerita_singkat  = $(this).data('cerita_singkat'); 
    $("#modal-cerita #cerita_singkat").html(cerita_singkat);
  });

   //modal kejaksaan
  $(document).on("click","#uraian_tuntutan", function()
  {
    var uraian_tuntutan  = $(this).data('uraian_tuntutan'); 
    $("#modal-tuntutan_modal #uraian_tuntutan").html(uraian_tuntutan);
  });

  $(document).on("click","#uraian_dakwaan", function()
  {
    var uraian_dakwaan  = $(this).data('uraian_dakwaan'); 
    $("#modal-dakwaan_modal #uraian_dakwaan").html(uraian_dakwaan);
  });


  //modal pengadilan 
  $(document).on("click","#uraian_pokok", function()
  {
    var uraian_pokok  = $(this).data('uraian_pokok'); 
    $("#modal-uraian_pokok_modal #uraian_pokok").html(uraian_pokok);
  });

  $(document).on("click","#putusan_amar", function()
  {
    var putusan_amar  = $(this).data('putusan_amar'); 
    $("#modal-putusan_amar_modal #putusan_amar").html(putusan_amar);
  });



  $(document).on("click","#ganti_deskripsi", function()
  {
    var id_data       = $(this).data('id_data');
    var deskripsi     = $(this).data('deskripsi');
    var uraian_pasal  = $(this).data('uraian_pasal'); 


    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #deskripsi").val(deskripsi);
  });

</script>  

</body>
</html>
