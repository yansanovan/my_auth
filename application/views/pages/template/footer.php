

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

  $(document).on("click","#ganti_deskripsi", function()
  {
    var id_data       = $(this).data('id_data');
    var deskripsi     = $(this).data('deskripsi'); 

    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #deskripsi").val(deskripsi);
  });

</script>  

</body>
</html>
