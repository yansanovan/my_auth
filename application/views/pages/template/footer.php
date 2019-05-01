

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Aplikasi terpadu</a>.</strong> All rights
    reserved.
  </footer>
  
</div>

<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>

<script src="<?php echo base_url('asset/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/dist/js/demo.js');?>"></script> 
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>

<!-- <script src="<?php //echo base_url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php //echo base_url('asset/bower_components/jquery-ui/jquery-ui.min.js');?>"></script> -->

<script type="text/javascript">


 $(document).ready(function(){
    $('#nama_tersangka').autocomplete({
        source: "<?php echo site_url('bon/get_autocomplete');?>",
        select: function(event, ui) 
        {
            $('[name="nama_tersangka"]').val(ui.item.label);
        }    
    });
  });


// spdp
$('#file_browser').click(function(e){
    e.preventDefault();
    $('#file').click();
});

$('#file').change(function(){
    $('#file_path').val($(this).val());
});

$('#file_path').click(function(){
    $('#file_browser').click();
});


//  ijin geledah 
$('#file_browser2').click(function(e){
    e.preventDefault();
    $('#file2').click();
});

$('#file2').change(function(){
    $('#file_path2').val($(this).val());
});

$('#file_path2').click(function(){
    $('#file_browser2').click();
});


// setuju geledah
$('#file_browser3').click(function(e){
    e.preventDefault();
    $('#file3').click();
});

$('#file3').change(function(){
    $('#file_path3').val($(this).val());
});

$('#file_path3').click(function(){
    $('#file_browser3').click();
});


// khusus
$('#file_browser4').click(function(e){
    e.preventDefault();
    $('#file4').click();
});

$('#file4').change(function(){
    $('#file_path4').val($(this).val());
});

$('#file_path4').click(function(){
    $('#file_browser4').click();
});


// biasa
$('#file_browser5').click(function(e){
    e.preventDefault();
    $('#file5').click();
});

$('#file5').change(function(){
    $('#file_path5').val($(this).val());
});

$('#file_path5').click(function(){
    $('#file_browser5').click();
});


// narkotika
$('#file_browser6').click(function(e){
    e.preventDefault();
    $('#file6').click();
});

$('#file6').change(function(){
    $('#file_path6').val($(this).val());
});

$('#file_path6').click(function(){
    $('#file_browser6').click();
});

// kejaksaan
$('#file_browser7').click(function(e){
    e.preventDefault();
    $('#file7').click();
});

$('#file7').change(function(){
    $('#file_path7').val($(this).val());
});

$('#file_path7').click(function(){
    $('#file_browser7').click();
});


// pengadilan
$('#file_browser8').click(function(e){
    e.preventDefault();
    $('#file8').click();
});

$('#file8').change(function(){
    $('#file_path8').val($(this).val());
});

$('#file_path8').click(function(){
    $('#file_browser8').click();
});


// p-18
$('#file_browser9').click(function(e){
    e.preventDefault();
    $('#file9').click();
});

$('#file9').change(function(){
    $('#file_path9').val($(this).val());
});

$('#file_path9').click(function(){
    $('#file_browser9').click();
});


// p-21
$('#file_browser10').click(function(e){
    e.preventDefault();
    $('#file10').click();
});

$('#file10').change(function(){
    $('#file_path10').val($(this).val());
});

$('#file_path10').click(function(){
    $('#file_browser10').click();
});


// pelimpahan
$('#file_browser11').click(function(e){
    e.preventDefault();
    $('#file11').click();
});

$('#file11').change(function(){
    $('#file_path11').val($(this).val());
});

$('#file_path11').click(function(){
    $('#file_browser11').click();
});


 $(function () {
    $('#example1').DataTable({
      responsive:true,
       "lengthMenu": [[10, 25, 50, -1], [7, 25, 50, "All"]]
    })
  });

$(function () {
    $('#example2').DataTable({
      responsive:true,
       "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    })
  });

$(function () {
    $('#example3').DataTable({
      responsive:true,
       "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    })
  });

$(function () {
    $('#bon').DataTable({
      responsive:true,
       "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
    })
  });


  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(400, function(){
          $(this).remove(); 
      });
  }, 3000);

  window.setTimeout(function() {
      $(".validate").fadeTo(500, 0).slideUp(700, function(){
          $(this).remove(); 
      });
  }, 3000);
  
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
    var url           = $(this).data('url');
    var deskripsi     = $(this).data('deskripsi'); 

    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #deskripsi").val(deskripsi);
    $("#modal-edit #url").val(url);
  });

</script>  

</body>
</html>
