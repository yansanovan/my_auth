<?= $this->session->flashdata('msgbox');?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-sign-in"></i> My auth</a></li>
    </ol>
</section>
	<a href="<?= base_url('admin/create_user');?>" class="btn btn-info btn-md"> Users</a><br>
	<a href="<?= base_url('admin/role');?>" class="btn btn-success btn-md"> Role</a><br>
	<?= form_open('login/logout/', ['class'=> 'inline']);?>
		<button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Do you want logout?')">Logout</button>
	<?= form_close();?>
	<br>   
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
					<td><?= $no++;?></td>
					<td><?= $value->username;?></td>
					<td><?= $value->email;?></td>
					<td><?= $value->role?></td>
					<td>
						<?php if ($value->active == null): ?>
								Active
							<?php else :?>
								Deactive
							<?php endif ?>
						</td>
						<td>
							<?= form_open('admin/delete_user/'.$value->id_users, ['class'=> 'inline']);?>
								<button type="submit"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure?')">Delete</button>
							<?= form_close();?>
							<a href="<?= site_url('admin/edit_user/'.$value->id_users)?>"  class="btn btn-info btn-xs" >Edit</a>
						</td>
					</tr>
			<?php endforeach ?>
        </tbody>
    </table>
</div> 

