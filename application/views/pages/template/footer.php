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
<!-- sweeat alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		notification();
		// notification_police();
		function notification()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>notifikasi/get_notify",
			});
			// security csrf load to form crud 
			Pusher.logToConsole = true;

			var pusher = new Pusher('30c7051b6b50d432b7b9', {
			  cluster: 'ap1',
			  forceTLS: true
			});

			var channel = pusher.subscribe('aplikasi_terpadu');
			channel.bind('aplikasi_terpadu', function(data) {
				$('#notify_to_judicary').html(data.notification);
			 	$('.count_judiciary').html(data.count_notification);

			 	// notification for police
			 	$('#notify_to_police').html(data.notification_police);
			 	$('.count_police').html(data.count_notification_police);
			  // alert(JSON.stringify(data.message));
			});
		}
		
		// function notification_police()
		// {
		// 	$.ajax({
		// 		url:"<?php //echo base_url(); ?>notifikasi/notification_police",
		// 	});
		// 	// security csrf load to form crud 
		// 	Pusher.logToConsole = true;

		// 	var pusher = new Pusher('30c7051b6b50d432b7b9', {
		// 	  cluster: 'ap1',
		// 	  forceTLS: true
		// 	});

		// 	var channel = pusher.subscribe('police');
		// 	channel.bind('police', function(data) {
	 // 			$('#notify_to_police').html(data.notification_police);
		// 	 	$('.count_police').html(data.count_notification_police);
		// 	  // alert(JSON.stringify(data.message));
		// 	});
		// }
		// create data
		$('#submit').submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'<?php echo base_url("kepolisian/create");?>',
				type:"post",
				data:new FormData(this), 
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					$('input[name="csrf_token"]').val(data.hash);

					if(data.success){   
						notification();
						// notification_police();
						$('input[name="csrf_token"]').val(data.newToken);
						swal("Yes! ", data.success , "success");
						$("#nama_tersangka").html('');   
						$("#file").html(''); 
						$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
						$('.has_file').removeClass('has-error').removeClass('has-success');
						$('#submit')[0].reset();
					}
					else
					{
						var msg = new Array();
						if (data.nama_tersangka !='') 
						{
							$('.has_nama_tsk').addClass('has-error').removeClass('has-success');
							$("#nama_tersangka").html(data.nama_tersangka);  
						}
						else
						{
							msg = 'Good!';
							$('.has_nama_tsk').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#nama_tersangka').html('<i class="fa fa-check"></i>' + msg);
						}
						if (data.file !='') 
						{
							$('.has_file').addClass('has-error').removeClass('has-success');
							$("#file").html(data.file);  
						}
						else
						{
							msg = 'Good!';
							$('.has_file').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#file').html('<i class="fa fa-check"></i>' + msg);
						}
					}
				}
			});
		});
	}); 

	// onclick close modal remove validation when create new data
	$(document).on('click', '#close', function(){  
		$("#nama_tersangka").html('');   
		$("#file").html(''); 
		$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
		$('.has_file').removeClass('has-error').removeClass('has-success');
		$('#submit')[0].reset();
	});

	$(document).on('click', '#reset', function(){  
		$("#nama_tersangka").html('');   
		$("#file").html(''); 
		$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
		$('.has_file').removeClass('has-error').removeClass('has-success');
		// $('#submit')[0].reset();
	});
</script>
<script type="text/javascript">

 $(document).ready(function(){
		$('#nama_tersangka').autocomplete({
				source: "<?php echo site_url('bon/get_autocomplete');?>",
				select: function(event, ui) 
				{
					$('[name="nama_tersangka"]').val(ui.item.label);
					// $('#pasal').html(ui.item.pasal);
				}    
		});
	});

// spdp
$('#file_browser').click(function(e){
		e.preventDefault();
		$('#file').click();
});

$('#file').change(function(){
		$('#file_path').val($(this).val().split('\\').pop());
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
		$('#file_path2').val($(this).val().split('\\').pop());
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
		$('#file_path3').val($(this).val().split('\\').pop());
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
		$('#file_path4').val($(this).val().split('\\').pop());
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
		$('#file_path5').val($(this).val().split('\\').pop());
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
		$('#file_path6').val($(this).val().split('\\').pop());
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
		$('#file_path7').val($(this).val().split('\\').pop());
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
		$('#file_path8').val($(this).val().split('\\').pop());
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
		$('#file_path9').val($(this).val().split('\\').pop());
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
		$('#file_path10').val($(this).val().split('\\').pop());
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
		$('#file_path11').val($(this).val().split('\\').pop());

});

$('#file_path11').click(function(){
		$('#file_browser11').click();
});


 $(function () {
		$('#example1').DataTable({
			responsive:true,
			 "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],

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
	}, 5000);
	

</script>  

</body>
</html>
