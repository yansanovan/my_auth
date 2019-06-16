

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
    // $('#file_path').text($this.get(0).files.item(0).name);
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
       "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
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
      $(".alert").fadeTo(500, 0).slideUp(400, function(){
          $(this).remove(); 
      });
  }, 3000);

  window.setTimeout(function() {
      $(".validate").fadeTo(500, 0).slideUp(700, function(){
          $(this).remove(); 
      });
  }, 3000);
  
// notification balasan ke polisi jenis surat

$(document).ready(function(){
 

load_notification_balasan();


function load_notification_balasan(view = '')
{
  $.ajax({
   url:"<?php echo site_url('notifikasi/kepolisian');?>",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data){
    $('#notifikasi').html(data.notification);
      if(data.unseen_notification > 0){
       $('.count').html(data.unseen_notification);
      }
   }
  });
}
 
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_notification_balasan('yes');
 });
 
 // setInterval(function(){ 
 //  load_notification_balasan(); 
 // }, 5000);
 
});

// notification di kejaksaan

$(document).ready(function(){
  
load_unseen_notification();


function load_unseen_notification(view = '')
{
  $.ajax({
   url:"<?php echo site_url('notifikasi/kejaksaan');?>",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data){
    $('#kepolisian_kj').html(data.notification);
      if(data.unseen_notification > 0){
       $('.count').html(data.unseen_notification);
      }
   }
  });
}
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 // setInterval(function(){ 
 //  load_unseen_notification();

 // }, 5000);
 
});


//  notif di pengadilan
$(document).ready(function(){
 

function load_unseen_notification_pn(view = '')
{
  $.ajax({
   url:"<?php echo site_url('notifikasi/pengadilan');?>",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data){
    $('#kepolisian_pn').html(data.notification);
      if(data.unseen_notification > 0){
       $('.count').html(data.unseen_notification);
      }
   }
  });
}
 
 load_unseen_notification_pn();

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification_pn('yes');
 });
 
 // setTimeout(function(){ 
 //  load_unseen_notification_pn();; 
 // }, 5000);
 
});




</script>  

</body>
</html>
