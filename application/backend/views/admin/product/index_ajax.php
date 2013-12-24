<!-- Phan Trang -->
<script>
	$(document).ready(function () {
		$("#jquery_link_product a").click(function () {
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
<!-- Search -->

<style>
	#jquery_link_product {
		margin-top: 5px;
	}
</style>
<h2>Sản phẩm</h2>
<p><a href="<?php echo base_url(); ?>index.php/product/get_create" class="btn btn-primary">Thêm mới</a></p>
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
			<td><?php echo $pro['name']; ?></td>
			<td><?php echo $pro['price']; ?></td>
			<td><a href="#"><img src="<?php echo base_url() . $pro['prod_img'][0]['url']; ?>" width="70px" height="70px"
								 alt=""></a></td>
			<td><?php echo $pro['prod_color'][0]['name']; ?> </td>
			<td><?php echo $pro['description']; ?></td>
			<td><a class="btn btn-primary"
				   href="<?php echo base_url(); ?>index.php/product/update_status/<?php echo $pro['pro_id']. "/". $pro['status']?>" >
					<?php if ($pro['status'] == 1)
						echo('Active');
					else
						echo 'No Active';
					?> </a>
				<a class="btn btn-primary"
				   href="<?php echo base_url(); ?>index.php/product/get_edit?id=<?php echo $pro['pro_id']; ?>">Sửa</a>
				<a class="delete_toggler btn btn-danger" rel="<?php echo $pro['pro_id']; ?>">Xóa</a></td>
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