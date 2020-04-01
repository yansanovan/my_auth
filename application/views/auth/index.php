<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	<?= $this->session->flashdata('msgbox');?>

	<a href="<?= base_url('admin/create_user');?>"> Users</a><br>
	<a href="<?= base_url('admin/role');?>"> Role</a><br>
	<?= form_open('login/logout/', ['class'=> 'inline']);?>
		<button type="submit" onclick="return confirm('Do you want logout?')">Logout</button>
	<?= form_close();?>

	<table id="index">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody> 
			<?php 
			$no = 1;
			foreach ($data->result() as $key => $value) { ?>
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
							<button type="submit" onclick="return confirm('are you sure?')">Delete</button>
							<?= form_close();?>
							<a href="<?= site_url('admin/edit_user/'.$value->id_users)?>" >Edit</a>
						</td>
					</tr>
			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Email</th>
					<th>Role</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
			</tfoot>
	</table>
</body>
</html>