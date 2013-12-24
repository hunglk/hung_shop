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
				if ($colors)
				{
				?>
				<table class="table table-striped table-bordered table-condensed">
					<thead>
					<tr>
						<th>Color_Id</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($colors as $color)
					{
						?>
						<tr>
							<td><?php echo $color['color_id']; ?></td>
							<td><?php echo htmlspecialchars($color['name']); ?></td>
							<td><a class="btn btn-primary"
								   href="<?php echo base_url(); ?>index.php/color/get_edit/<?php echo $color['color_id']; ?>">Sửa</a>
								<a class="delete_toggler btn btn-danger" rel="<?php echo $color['color_id']; ?>">Xóa</a>
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
				<a href="<?php echo base_url(); ?>index.php/color/get_create" class="btn btn-primary right">Thêm mới</a>
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
		<?php echo form_open('color/delete'); ?>
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
