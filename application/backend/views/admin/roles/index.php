
<style>
	#jquery_link {
		margin-top: 5px;
	}
</style>

		<div class="span9">
			<div id="content">
				<h1>Quản lý quyền</h1>

				<p></p>
				<?php
				if ($roles)
				{
				?>
				<table class="table table-striped table-bordered table-condensed">
					<thead>
					<tr>
						<th>ID</th>
						<th>Role</th>
						<th>Role_module</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($roles as $role)
					{
						?>
						<tr>
							<td><?php echo $role['pm_id']; ?></td>
							<td><?php
								$model = new Groupuser_model();
								echo $model->get_groupuser_by_id($role['id_group_user'])[0]['name'];
								?></td>
							<td><?php
								$model = new Modules_model();
								echo $model->get_module_by_id($role['module_id'])[0]['name'];
								?></td>
							<td><a class="btn btn-primary"
								   href="<?php echo base_url(); ?>index.php/roles/get_edit?id=<?php echo $role['pm_id']; ?>">Sửa</a>
								<a class="delete_toggler btn btn-danger" rel="<?php echo $role['pm_id']; ?>">Xóa</a>
							</td>
						</tr>
					<?php } ?>
					<?php
					}
					else
					{
						echo '<div class="well">No item</div>';
					}
					?>
					</tbody>
				</table>
				<a href="<?php echo base_url(); ?>index.php/roles/get_create" class="btn btn-primary right">Thêm mới</a>
			</div>
		</div>


<div class="modal hide fade" id="delete_user">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>

		<h3>Are You Sure?</h3>
	</div>
	<div class="modal-body">
		<p>Are you sure you want to delete this user?</p>
	</div>
	<div class="modal-footer">
		<?php echo form_open('roles/delete'); ?>
		<a data-toggle="modal" href="#delete_user" class="btn">Keep</a>
		<input type="hidden" name="id" id="postvalue" value=""/>
		<input type="submit" class="btn btn-danger" value="Delete"/>
		<?php echo form_close(); ?>
	</div>
</div>


<script>
	$('#delete_user').modal({
		show: false
	}); // Start the modal

	// Populate the field with the right data for the modal when clicked
	$('.delete_toggler').each(function (index, elem) {
		$(elem).click(function () {
			$('#postvalue').attr('value', $(elem).attr('rel'));
			$('#delete_user').modal('show');
		});
	});
</script>
