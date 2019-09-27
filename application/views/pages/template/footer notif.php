// notifikasi balasan dari kejaksaan & pengadilan ke polisi

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
 
 $(document).on('click', '.polisi', function(){
	$('.count').html('');
	load_notification_balasan('yes');
 });
});



// notifikasi dari polisi ke kejaksaan

$(document).ready(function(){
load_unseen_notification_kejaksaaan();
function load_unseen_notification_kejaksaaan(view = '')
{
	$.ajax({
	 url:"<?php echo site_url('notifikasi/kejaksaan');?>",
	 method:"POST",
	 data:{view:view},
	 dataType:"json",
	 success:function(data)
	 {
		$('#kepolisian_kj').html(data.notification);
		if(data.unseen_notification > 0)
		{
		 	$('.count').html(data.unseen_notification);
		}
	 }
	});
}
 
 $(document).on('click', '.kepolisian_kj', function(){
	$('.count').html('');
	load_unseen_notification_kejaksaaan('yes');
 });
 
 // setInterval(function(){ 
 //  load_unseen_notification();

 // }, 5000);
 
});


// notification balasan dari pengadilan ke kejaksaan

$(document).ready(function(){
surat_balasan_pengadilan_ke_kejaksaan();
function surat_balasan_pengadilan_ke_kejaksaan(view = '')
{
	$.ajax({
	 url:"<?php echo site_url('notifikasi/surat_balasan_pengadilan_ke_kejaksaan');?>",
	 method:"POST",
	 data:{view:view},
	 dataType:"json",
	 success:function(data){
		$('#surat_balasan_pengadilan').html(data.notification);
			if(data.unseen_notification > 0){
			 $('.count_surat_balasan_pengadilan').html(data.unseen_notification);
			}
	 }
	});
}
 
 $(document).on('click', '.surat_balasan_pengadilan', function(){
	$('.count_surat_balasan_pengadilan').html('');
	surat_balasan_pengadilan_ke_kejaksaan('yes');
 });
 
});

// notifikasi dari polisi ke pengadilan
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
 
// setInterval(function(){ 
//  load_unseen_notification_pn();

//  }, 3000);
});


// notifikasi dari polisi ke pengadilan
$(document).ready(function(){
function notifikasi_surat_pengadilan(view = '')
{
	$.ajax({
	 url:"<?php echo site_url('notifikasi/surat_pengadilan');?>",
	 method:"POST",
	 data:{view:view},
	 dataType:"json",
	 success:function(data){
		$('#surat_masuk_kejaksaan').html(data.notification);
			if(data.unseen_notification > 0){
			 $('.count_surat_masuk_kejaksaan').html(data.unseen_notification);
			}
	 }
	});
}
 
 notifikasi_surat_pengadilan();

 $(document).on('click', '.surat_masuk_kejaksaan', function(){
	$('.count_surat_masuk_kejaksaan').html('');
	notifikasi_surat_pengadilan('yes');
 });
 
// setInterval(function(){ 
//  load_unseen_notification_pn();

//  }, 3000);
});

// notification bon di lapas

$(document).ready(function(){
load_bon();
setTimeout(load_bon, 2000);
function load_bon(view = '')
{
	$.ajax({
	 url:"<?php echo site_url('notifikasi/lapas');?>",
	 method:"POST",
	 data:{view:view},
	 dataType:"json",
	 success:function(data){
		$('#bon_masuk').html(data.notification);
			if(data.unseen_notification > 0){
			 $('.count_bon_masuk').html(data.unseen_notification);
			}
	 }
	});
}
 
 $(document).on('click', '.bon_masuk', function(){
	$('.count_bon_masuk').html('');
	load_bon('yes');
 });
});


// bon balasan ke polisi, kejaksaan, pengadilan
$(document).ready(function(){
	load_bon_balasan();
	function load_bon_balasan(view = '')
	{
		$.ajax({
			url:"<?php echo site_url('notifikasi/bon_balasan');?>",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
			$('#bon_balasan').html(data.notification);
			if(data.unseen_notification > 0)
			{
				$('.count_bon_balasan').html(data.unseen_notification);
			}
		}
	});
	}
	$(document).on('click', '.bon_balasan', function(){
		$('.count_bon_balasan').html('');
		load_bon_balasan('yes');
	});
});

$(document).ready(function(){
notifikasi_apl();
function notifikasi_apl(view = '')
{
	$.ajax({
	 url:"<?php echo site_url('notifikasi/apl');?>",
	 method:"POST",
	 data:{view:view},
	 dataType:"json",
	 success:function(data){
		$('#apl_masuk').html(data.notification);
			if(data.unseen_notification > 0){
			 $('.count_apl').html(data.unseen_notification);
			}
	 }
	});
}
 
 $(document).on('click', '.apl_masuk', function(){
	$('.count_apl').html('');
	notifikasi_apl('yes');
 });
});

$(document).ready(function(){
	notifikasi_apl_balasan();
	function notifikasi_apl_balasan(view = '')
	{
		$.ajax({
			url:"<?php echo site_url('notifikasi/apl_balasan');?>",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
			$('#apl_balasan').html(data.notification);
			if(data.unseen_notification > 0)
			{
				$('.count_apl_balasan').html(data.unseen_notification);
			}
		}
	});
	}
	$(document).on('click', '.apl_balasan', function(){
		$('.count_apl_balasan').html('');
		notifikasi_apl_balasan('yes');
	});
});