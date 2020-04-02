<?= $this->session->flashdata('msgbox');?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-sign-in"></i> My auth</a></li>
    </ol>
</section>
	<a href="<?= base_url('admin/create_user');?>" class="btn btn-info btn-md"> Users</a>
	<a href="<?= base_url('admin/role');?>" class="btn btn-success btn-md"> Role</a>
	<div style="display: inline-block; margin-bottom: 20px; ">
		<?= form_open('login/logout');?>
			<button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Do you want logout?')">Logout</button>
		<?= form_close();?>
	</div>   
<div class="table-responsive">
    <table class="table table-bordered table-striped" style="margin-bottom: 50px">
        <thead style="background-color: rgb(59, 58, 82);">
            <tr style="color: white">
				<th>No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
	        <?php $no = 1;
			foreach ($data->result() as $key => $value) : ?>
				<tr>
					<td><?=  htmlspecialchars($no++,ENT_QUOTES,'UTF-8');?></td>
					<td><?=  htmlspecialchars($value->username,ENT_QUOTES,'UTF-8');?></td>
					<td><?=  htmlspecialchars($value->email,ENT_QUOTES,'UTF-8');?></td>
					<td><?=  htmlspecialchars($value->role,ENT_QUOTES,'UTF-8')?></td>
					<td>
						<?php if (htmlspecialchars($value->active,ENT_QUOTES,'UTF-8') == null): ?>
								<span  class="btn btn-success btn-xs">Active</span>
							<?php else :?>
								<span  class="btn btn-warning btn-xs">Deactive</span>
							<?php endif ?>
						</td>
					<td>
						<div style="display: inline-block;">
							<?= form_open('admin/delete_user/'. htmlspecialchars($value->id_users,ENT_QUOTES,'UTF-8'));?>
								<button type="submit"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure?')">Delete</button>
							<?= form_close();?>
						</div>
						<a href="<?= site_url('admin/edit_user/'. htmlspecialchars($value->id_users,ENT_QUOTES,'UTF-8'))?>" class="btn btn-info btn-xs" >Edit</a>
					</td>
				</tr>
			<?php endforeach ?>
        </tbody>
    </table>
</div> 
