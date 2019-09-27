<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	// insert data after submit button
	$(document).ready(function() {
		$('#submit').submit(function(e){
			// fetchTable();
			load_data(1);
			e.preventDefault();
			$.ajax({
				url:'<?php echo base_url("AjaxFormValidation/create");?>',
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					if(data.success){   
						// fetchTable();
						load_data(1);
						swal("Yes! ", data.success , "success");
						$("#title").html('');   
						$("#name").html('');   
						$("#email").html('');   
						$("#message").html('');
						$("#file").html(''); 
						$('#submit')[0].reset();

					}
					else
					{
						if (data.title !='') {
							$("#title").html(data.title);   
						}else{
								$("#title").html('');   
						}
						if (data.name !='') {
								$("#name").html(data.name);   
						}else{
								$("#name").html('');   
						}
						if (data.email !='') {
								$("#email").html(data.email);   
						}else{
								$("#email").html('');   
						}
						if (data.message !='') {
								$("#message").html(data.message);   
						}else{
								$("#message").html('');   
						}
						if (data.file !='') {
								$("#file").html(data.file);   
						}else{
								$("#file").html('');   
						}
						if (data.file2 !='') {
								$("#file2").html(data.file2);   
						}else{
								$("#file2").html('');   
						}
					}
				}
			});
		}); 
		
		// proccess pagination default
		load_data(1);
		
		function load_data(page, query)
		{
			$.ajax({
				url:"<?php echo base_url(); ?>AjaxFormValidation/load_data/"+page,
				method:"POST",
				dataType:"json",
				data:{query:query},
				success:function(data)
				{
					$('#tbody').html(data.tbody);
					// $('#count').html(data.count);
					$('#pagination_link').html(data.pagination_link);
				}
			});
		}
		$(document).on("click", ".pagination li a", function(event){
			event.preventDefault();
			var page = $(this).data("ci-pagination-page");
		  	load_data(page);
		});

		// show all data
		// fetchTable();
		// function fetchTable(query){
		// 	var url = '<?php //echo base_url(); ?>';
		// 	$.ajax({
		// 		method: 'POST',
		// 		url: url + 'AjaxFormValidation/fetch',
		// 		data:{query:query},
		// 		success: function(response){
		// 			$('#tbody').html(response);
		// 		}
		// 	});
		// }

		// searching ajax live

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
			  	load_data(1, search);
			}
			else
			{
			  	load_data(1, '');
			}
		});

		// onclick delete data
		$(document).on('click', '.delete', function(){  
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
						url:'<?php echo base_url("AjaxFormValidation/delete");?>', 
						method:"POST",  
						data:{id:id},  
						success:function(data)  
						{  
							swal("Yes! ", "Data has been deleted" , "success");
							// fetchTable();
							load_data(1);

						}  
					});  
				} 
			});
		});  

		// get data when users click btn update and show to modal
		$(document).on('click','.update', function()
	    {
	        var id         = $(this).data('id');
	        var title      = $(this).data('title');
	        var name   	   = $(this).data('name');
	        var email      = $(this).data('email');
	        var message    = $(this).data('message');
	        var file       = $(this).data('file');
	        var base_url   = '<?php echo base_url("asset/images/"); ?>';

	        $('#modal_edit [name="id"]').val(id);
	        $('#modal_edit [name="title"]').val(title);
	        $('#modal_edit [name="name"]').val(name);
	        $('#modal_edit [name="email"]').val(email);
	        $('#modal_edit [name="message"]').val(message);
	        $('#modal_edit [name="old_file"]').val(file);
	        $('#modal_edit #old_file').attr("src", base_url + file);
	    });

		// proses update data
		$('#submit_update').submit(function(e){
			// fetchTable();
			e.preventDefault();		
			$.ajax({
				url:'<?php echo base_url("AjaxFormValidation/update");?>',
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data) 
				{
					if(data.success){   
						// fetchTable();
					  	load_data(1);				
						swal("Yes! ", data.success , "success");
						$("#modal_edit #title").html('');   
						$("#modal_edit #name").html('');   
						$("#modal_edit #email").html('');   
						$("#modal_edit #message").html('');
				        $('#modal_edit #file').html('');
				        $('#modal_edit [name="file"]').val('');

						// close modal
						$('#modal_update').hide('modal');
						$(".modal-backdrop.in").hide();
					}
					else
					{
						if (data.title !='') {
							$("#modal_edit #title").html(data.title);   
						}else{
								$("#modal_edit #title").html('');   
						}
						if (data.name !='') {
								$("#modal_edit #name").html(data.name);   
						}else{
								$("#modal_edit #name ").html('');   
						}
						if (data.email !='') {
								$("#modal_edit #email").html(data.email);   
						}else{
								$("#modal_edit #email").html('');   
						}
						if (data.message !='') {
								$("#modal_edit #message").html(data.message);   
						}else{
								$("#modal_edit #message").html('');   
						}
						if (data.file !='') {
								$("#modal_edit #file").html(data.file);  
						}else{ 
								$("#modal_edit #file").html('');   
						}
					}
				}
			});
		}); 

		// add form style file images
		$('#file_browser').click(function(e){
				e.preventDefault();
				$('#images').click();
		});

		$('#images').change(function(){
				$('#file_path').val($(this).val().split('\\').pop());
		});

		$('#file_path').click(function(){
				$('#file_browser').click();
		});


		$('#file_browser2').click(function(e){
				e.preventDefault();
				$('#images2').click();
		});

		$('#images2').change(function(){
				$('#file_path2').val($(this).val().split('\\').pop());
		});

		$('#file_path2').click(function(){
				$('#file_browser2').click();
		});

		// update form style file images
		$('#file_browser1').click(function(e){
				e.preventDefault();
				$('#images1').click();
		});

		$('#images1').change(function(){
				$('#file_path1').val($(this).val().split('\\').pop());
		});

		$('#file_path1').click(function(){
				$('#file_browser1').click();
		});

		// onclick close modal remove validation when create new data
		$(document).on('click', '#close', function(){  
			$("#title").html('');   
			$("#name").html('');   
			$("#email").html('');   
			$("#message").html('');
			$("#file").html(''); 
			$('#submit')[0].reset();
		});

		// onclick close modal remove validation when update data
		$(document).on('click', '#close_update', function(){  
			$("#modal_edit #title").html('');   
			$("#modal_edit #name").html('');   
			$("#modal_edit #email").html('');   
			$("#modal_edit #message").html('');
			$("#modal_edit #file").html(''); 
	        $('#modal_edit [name="file"]').val('');
		});
	}); // end 
</script>

</body>
</html>