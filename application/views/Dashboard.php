<?= $this->session->flashdata('msgbox');?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-check"></i> Welcome To My auth</a></li>
    </ol>
</section>
	<div style="display: inline-block; margin-bottom: 20px; ">
		<?= form_open('login/logout');?>
			<button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Do you want logout?')">Logout</button>
		<?= form_close();?>
	</div>   
<div class="table-responsive">
    <table class="table table-bordered table-striped" style="margin-bottom: 50px">
        <thead style="background-color: rgb(59, 58, 82);">
            <tr style="color: white">
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Last Login</th>
            </tr>
        </thead>
        <tbody>
			<tr>
				<td><?=  htmlspecialchars($users['username'],ENT_QUOTES,'UTF-8');?></td>
				<td><?=  htmlspecialchars($users['email'],ENT_QUOTES,'UTF-8');?></td>
				<td><?=  htmlspecialchars($users['role'],ENT_QUOTES,'UTF-8')?></td>
				<td><?=  htmlspecialchars($users['last_login'],ENT_QUOTES,'UTF-8')?></td>
			</tr>
        </tbody>
    </table>
</div> 
