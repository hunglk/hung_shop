<!-- Phan Trang -->
<script>
	$(document).ready(function () {
		$("#jquery_link a").click(function () {
			var url = $(this).attr("href");
			$.ajax({
				type: "POST",
				url: url,
				data: "ajax=1",
				beforeSend: function () {
					$("#content").html("");
				},
				success: function (kq) {
					$("#content").html(kq);
				}
			})
			return false;
		});
	})
</script>

<style>
	#jquery_link {
		margin-top: 5px;
	}
</style>

<div class="span9">
	<div id="content">
		<h1>Thành Viên</h1>

		<p></p>

		<div>
			<div class="span6"></div>
			<div class="span6">
				<div class="right">
					<form action="" method="get">
						<label>Tìm kiếm: <input type="text" name="keyword" id="keyword" value=""></label>
					</form>
				</div>
			</div>
		</div>
		<?php
		if ($users)
		{
		?>
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
						   href="<?php echo base_url(); ?>index.php/user/get_edit/<?php echo $urs['user_id']; ?>">Sửa</a>
						<a class="delete_toggler btn btn-danger" rel="<?php echo $urs['user_id']; ?>">Xóa</a>
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
		<div id="jquery_link">
			Phân Trang
			<?php echo $pagination; ?>
		</div>
		<a href="<?php echo base_url(); ?>index.php/user/get_create" class="btn btn-primary right">Thêm mới</a>
	</div>
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
		<?php echo form_open('user/delete'); ?>
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

