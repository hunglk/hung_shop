<?php
function show_cat($cats, $level)
{
	$str_space = insert_space($level);
	$level += 1;
	echo '<tr>';
	echo '<td>' . $cats['cat_id'] . '</td>';
	echo "<td>" . $str_space . htmlspecialchars($cats['name']) . "</td>";
	echo "<td><a class='btn btn-primary' href='" . base_url();?>index.php/category/edit/<?php echo $cats['cat_id'] . "'> Sửa </a>
              <a class='delete_toggler btn btn-danger' rel='" . $cats['cat_id'] . "'>Xóa</a>
          </td>";
	echo '<tr>';
	if ($cats['child_cats'] !== FALSE)
	{
		foreach ($cats['child_cats'] as $key => $cat)
		{
			show_cat($cat, $level);
		}
	}
}

function insert_space($count)
{
	$str = "";
	for ($i = 0; $i < $count; $i++)
	{
		$str .= "&nbsp;&nbsp;&nbsp;";
	}
	return $str;
}

?>

<div class="span9">
	<div id="content">
		<h2>Categories</h2>

		<p><a href="<?php echo base_url(); ?>index.php/category/create" class="btn btn-primary">Thêm mới</a>
		</p>

		<table class="table table-striped table-bordered table-condensed">
			<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($cats as $key => $cat)
			{
				show_cat($cat, 0);
			}
			?>
			</tbody>
		</table>
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
		<?php echo form_open('category/delete'); ?>
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

