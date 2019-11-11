	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.4.0
		</div>
		<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE </a>.</strong> All rights
		reserved. <?php echo $this->benchmark->elapsed_time();?>
	</footer>
</div>
<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
	crossorigin="anonymous"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- assets admin -->
<script src="<?php echo base_url('asset/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/dist/js/demo.js');?>"></script> 
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- sweeat alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- fancy box -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- pusher -->
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
		//tiny mce 
    	<?php $this->load->view('pages/template/tinymce/tinymce.js');?>

	    show_notification();

	    var table1;
	    var table2;
	    var table3;

        table1 = $('#table1').DataTable({ 
 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            "ajax": {
                "url": "<?php echo site_url('police/spdp')?>",
                "type": "POST",
                 "data": function ( data ) {
	                data.nama_tersangka = $('#nama_tersangka').val();
	            }
            },  
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        $('#btn-filter').click(function(){ //button filter event click
			table1.ajax.reload(null,false); //just reload table
		});
		$('#btn-reset').click(function(){ //button reset event click
		    $('#form-filter')[0].reset();
		    table1.ajax.reload(null,false);  //just reload table
		});
        table2 = $('#table2').DataTable({ 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            "ajax": {
                "url": "<?php echo site_url('inbox/get_data')?>",
                "type": "POST",
            },  
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        table3 = $('#tbl_replied_spdp').DataTable({ 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
			  // now write your ajax script 
            "ajax": {
                "url": "<?php echo site_url('spdp_replied')?>",
	            "dataType": "json",
                "type": "POST",    
            },  
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ], 
        });

        function reload_table()
		{
		    table1.ajax.reload(null,false); //reload datatable ajax 
		    table2.ajax.reload(null,false); //reload datatable ajax 
		    table3.ajax.reload(null,false); //reload datatable ajax 
		}

		Pusher.logToConsole = true;

		var pusher = new Pusher('30c7051b6b50d432b7b9', {
		  cluster: 'ap1',
		  forceTLS: true
		});
		var channel = pusher.subscribe('my-channel');
		channel.bind('my-event', function(data) {
			if (data.message == 'success' || data.message == 'deleted_spdp') 
			{
				show_notification();
				reload_table();
			}
			if (data.message == 'success_police') 
			{
				show_notification_police();
			}
		});

		<?php 
		if ($this->session->userdata('level') == 'kepolisian' AND $this->session->userdata('status') == 'logged' ) {?>
		show_notification_police();
		function show_notification_police(read = '')
		{
            $.ajax({
                url   : '<?= site_url("notification/police");?>',
                type  : 'POST',
                async : true,
                data  : {read:read},
                dataType : 'json',
                success : function(response){
            	  	var notification ='';
	               	var arr = response.data;
                    $.each(arr, function (index, value)
                    {
                    	if (value.type == 'reply spdp') 
                    	{
                    		var url = "<?= site_url()?>kepolisian/replied"
                    	}
                    	else
                    	{
                    		var url = "<?= site_url()?>dashboard"
                    	}
						notification += '<li>'+
						                    '<ul class="menu">'+
						                      	'<li>'+
						                        	'<a href="'+url+'">'+
							                          	'<i class="fa fa-bell-o"></i>'+ 
							                          	'<strong>'+value.type+'</strong><br>'+
							                            '<small>Message : '+value.message+'</small><br />'+
							                            '<small>Reply By : Judicary</small><br />'+
							                            '<small>Date sent : '+value.create_at+'</small><br />'+ 
						                        	'</a>'+
						                      	'</li>'+
						                    '</ul>'+
					                  	'</li>';
					});                
					$('#notify_to_police').html(notification);
					$('.count_police').html(response.count);
                }
            });
        } 
        $(document).on('click', '.read_notification_police', function(){
			 $('.count_police').html('');
			 show_notification_police('read');
		});
		<?php }?>


		function show_notification(read = '')
		{
            $.ajax({
                url   : '<?php echo site_url("notification/judicary");?>',
                type  : 'POST',
                async : true,
                data  : {read:read},
                dataType : 'json',
                success : function(response){
                    var notification = '';
                    var i;
                    var arr = response.data;
                    $.each(arr, function (index, value) 
                    {
                    	if (value.type == 'spdp') 
                    	{
                    		var url = "<?= site_url()?>inbox/spdp_inbox"
                    	}
                    	else if (value.type == 'perpanjangan penahanan') 
                    	{
                    		var url = "<?= site_url()?>inbox/spdp_inbox"
                    	}
                    	else
                    	{
                    		var url = "<?= site_url()?>dashboard"
                    	}
						notification += '<li>'+
						                    '<ul class="menu">'+
						                      	'<li>'+
							                        '<a href="'+url+'">'+
							                          	'<i class="fa fa-bell-o"></i>'+ 
							                          	'<strong>'+value.type+'</strong><br>'+
							                            '<small><i class="fa fa-time"></i>Message : '+value.message+'</small><br />'+
							                            '<small><i class="fa fa-time"></i>Send By : Police</small><br />'+
							                            '<small>Date sent : '+value.create_at+'</small><br />'+
							                        '</a>'+
						                      	'</li>'+
					                    	'</ul>'+
					                  	'</li>';
					});
					$('#notify_to_judicary').html(notification);
					$('.count_judiciary').html(response.count);
                }
            });
        } 

		$(document).on('click', '.read_notification_judicary', function(){
			$('.count_judiciary').html('');
			show_notification('read');
		});

		// create spdp
		$('#submit').submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'<?= base_url("create_spdp");?>',
				type:"post",
				data:new FormData(this), 
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					$('input[name="csrf_token"]').val(data.hash);

					if(data.success)
					{   
						$('input[name="csrf_token"]').val(data.newToken);
						swal("Yes! ", data.success , "success");
						$("#nama_tersangka").html('');   
						$("#file").html(''); 
						$("#rujukan").html('');
						$("#no_pol").html('');    
						$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
						$('.has_no_pol').removeClass('has-error').removeClass('has-success');
						$('.has_rujukan').removeClass('has-error').removeClass('has-success');
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

						if (data.no_pol !='') 
						{
							$('.has_no_pol').addClass('has-error').removeClass('has-success');
							$("#no_pol").html(data.no_pol);  
						}
						else
						{
							msg = 'Good!';
							$('.has_no_pol').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#no_pol').html('<i class="fa fa-check"></i>' + msg);
						}

						if (data.rujukan !='') 
						{
							$('.has_rujukan').addClass('has-error').removeClass('has-success');
							$("#rujukan").html(data.rujukan);  
						}
						else
						{
							msg = 'Good!';
							$('.has_rujukan').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#rujukan').html('<i class="fa fa-check"></i>' + msg);
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

		$(document).on('click', '.removed', function(){  
			 var id = $(this).attr("id");  
			 swal({
				title: "Are you sure?",
				text: "Your data and file will be removed!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
				$.ajax({  
						url:'<?php echo base_url("delete_spdp");?>', 
						method:"POST",  
						data:{id:id},  
						success:function(data)  
						{  
							swal("Yes! ", "Data has been deleted" , "success");
						}  
					});  
				} 
			});
		});  

		$(document).on('click','#check_status', function()
	    {
	        var status_reply = $(this).data('status_reply');
	    	if (status_reply == 1) 
	    	{
				swal("Opps! ", "Sorry, Data has been replied!" , "warning");
	    	}
	    });
		$(document).on('click','.reply_spdp', function()
	    {
	        var id         	   = $(this).data('id');
	        var id_police      = $(this).data('id_police');
	        $('#modal_reply [name="id_spdp"]').val(id);
	        $('#modal_reply [name="id_police"]').val(id_police);	  
	    });
		// create reply spdp
		$('#submit_reply_spdp').submit(function(e){
			e.preventDefault();		
			$.ajax({
				url:'<?php echo base_url("kejaksaan/create_reply_Spdp");?>',
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					$('input[name="csrf_token"]').val(data.hash);
					if(data.success)
					{   
						$('input[name="csrf_token"]').val(data.newToken);
						swal("Yes! ", data.success , "success");
						$("#reply_spdp").html('');   
						$("#file_reply_spdp").html(''); 
						$('.has_reply_spdp').removeClass('has-error').removeClass('has-success');
						$('.has_file_reply_spdp').removeClass('has-error').removeClass('has-success');
						$('#submit_reply_spdp')[0].reset();
						reload_table();
					}
					else
					{
						var msg = new Array();
						if (data.reply_spdp !='') 
						{
							$('.has_reply_spdp').addClass('has-error').removeClass('has-success');
							$("#reply_spdp").html(data.reply_spdp);  
						}
						else
						{
							msg = 'Good!';
							$('.has_reply_spdp').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#reply_spdp').html('<i class="fa fa-check"></i>' + msg);
						}
						if (data.file_reply_spdp !='') 
						{
							$('.has_file_reply_spdp').addClass('has-error').removeClass('has-success');
							$("#file_reply_spdp").html(data.file_reply_spdp);  
						}
						else
						{
							msg = 'Good!';
							$('.has_file_reply_spdp').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#file_reply_spdp').html('<i class="fa fa-check"></i>' + msg);
						}
					}
				}
			});
		}); 

		$('#submit_perpanjangan_penahanan').submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'<?php echo base_url("kepolisian/create_perpanjangan_penahanan");?>',
				type:"post",
				data:new FormData(this), 
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					$('input[name="csrf_token"]').val(data.hash);
					if(data.success)
					{   
						$('input[name="csrf_token"]').val(data.newToken);
						swal("Yes! ", data.success , "success");
						$("#perpanjangan_penahanan").html('');   
						$("#file_perpanjangan_penahanan").html(''); 
						$('.has_perpanjangan_penahanan').removeClass('has-error').removeClass('has-success');
						$('.has_file_perpanjangan_penahanan').removeClass('has-error').removeClass('has-success');
						$('#submit_perpanjangan_penahanan')[0].reset();
					}
					else
					{
						var msg = new Array();
						if (data.perpanjangan_penahanan !='') 
						{
							$('.has_perpanjangan_penahanan').addClass('has-error').removeClass('has-success');
							$("#perpanjangan_penahanan").html(data.perpanjangan_penahanan);  
						}
						else
						{
							msg = 'Good!';
							$('.has_perpanjangan_penahanan').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#perpanjangan_penahanan').html('<i class="fa fa-check"></i>' + msg);
						}
						if (data.file_perpanjangan_penahanan !='') 
						{
							$('.has_file_perpanjangan_penahanan').addClass('has-error').removeClass('has-success');
							$("#file_perpanjangan_penahanan").html(data.file_perpanjangan_penahanan);  
						}
						else
						{
							msg = 'Good!';
							$('.has_file_perpanjangan_penahanan').addClass('has-error')
							.removeClass('has-error')
							.addClass('has-success');
							$('#file_perpanjangan_penahanan').html('<i class="fa fa-check"></i>' + msg);
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
		$("#no_pol").html('');
		$("#rujukan").html('');
		$('.has_no_pol').removeClass('has-error').removeClass('has-success');
		$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
		$('.has_rujukan').removeClass('has-error').removeClass('has-success');
		$('.has_file').removeClass('has-error').removeClass('has-success');
		$('#submit')[0].reset();
	});

	$(document).on('click', '#reset', function(){  
		$("#nama_tersangka").html('');   
		$("#file").html(''); 
		$('.has_nama_tsk').removeClass('has-error').removeClass('has-success');
		$('.has_file').removeClass('has-error').removeClass('has-success');
	});
</script>
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

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){

        // Check all
        $("#checkall").change(function(){

           var checked = $(this).is(':checked');
           if(checked)
           {
              	$(".checkbox").each(function(){
                	$(this).prop("checked",true);
              	});
           }else
           {
              	$(".checkbox").each(function(){
                	$(this).prop("checked",false);
              	});
           }
        });

        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){
            if($(".checkbox").length == $(".checkbox:checked").length) 
            {
               $("#checkall").prop("checked", true);
            } 
            else 
            {
               $("#checkall").prop("checked",false);
            }
        });

        // Delete button clicked
        $('#delete').click(function(){

           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {

              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();

                  users_arr.push(userid);
              });

              // Array length
              var length = users_arr.length;

              if(length > 0){

                 // AJAX request
                 $.ajax({
                    url: '<?= base_url() ?>index.php/users/deleteUser',
                    type: 'post',
                    data: {user_ids: users_arr},
                    success: function(response){

                       // Remove <tr>
                       $(".checkbox:checked").each(function(){
                           var userid = $(this).val();

                           $('#tr_'+userid).remove();
                       });
                    }
                 });
              }
           } 

        });

      });
      </script>