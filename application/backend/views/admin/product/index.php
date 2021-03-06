<style>
	#jquery_link_product {
		margin-top: 5px;
	}
</style>

		<div class="span9">
			<div id="content">
				<h2>Sản phẩm</h2>

				<p><a href="<?php echo base_url(); ?>index.php/product/create" class="btn btn-primary">Thêm mới</a>
				</p>
				<?php
				if ($products)
				{
				?>
				<table class="table table-striped table-bordered table-condensed">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>Image</th>
						<th>Color</th>
						<th>Description</th>
						<th> Position</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($products as $pro)
					{
						?>
						<tr>
							<td><?php echo $pro['pro_id']; ?></td>
							<td><?php echo htmlspecialchars($pro['name']); ?></td>
							<td><?php echo round($pro['price'],2); ?></td>
							<td><a href="#"><img src="<?php echo base_url() . $pro['prod_img'][0]['url']; ?>"
												 width="70px" height="70px" alt=""></a></td>
							<td><?php echo $pro['prod_color'][0]['name']; ?> </td>
							<td><?php echo substr($pro['description'], 0, 20); ?></td>
							<td><?php if ($pro['selected_id'] != 0) echo $pro['selected_id']; ?></td>
							<td><a class="btn btn-primary"
								   href="<?php echo base_url(); ?>index.php/product/edit/<?php echo $pro['pro_id']; ?>">Sửa</a>
								<a class="delete_toggler btn btn-danger" rel="<?php echo $pro['pro_id']; ?>">Xóa</a>
							</td>
						</tr>
					<?php
					}
					?>
					<?php
					}
					else
					{
						echo '<div class="well">No item</div>';
					}
					?>
					</tbody>
				</table>
				<div id="jquery_link_product">
					Phân Trang
					<?php echo $pagination_product; ?>
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
		<?php echo form_open('product/delete'); ?>
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

