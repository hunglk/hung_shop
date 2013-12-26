
<style>
	#jquery_link {
		margin-top: 5px;
	}
</style>

<h1>CMS Users</h1>
<p>Use the table below to edit the users in the system.</p>
<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($users as $urs)
	{
		?>
		<tr>
			<td><?php echo $urs['user_id']; ?></td>
			<td><?php echo $urs['username']; ?></td>
			<td><?php echo $urs['email']; ?></td>
			<td><a class="btn btn-primary"
				   href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $urs['user_id']; ?>">Edit</a>
				<a class="delete_toggler btn btn-danger" rel="<?php echo $urs['user_id']; ?>">Delete</a></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<div id="jquery_link">
	Phân Trang
	<?php echo $pagination; ?>
</div>

<a href="<?php echo base_url(); ?>index.php/user/create" class="btn btn-primary right">New User</a>




    