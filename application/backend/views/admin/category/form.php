<?php

function show_cat($cats, $level, $selected, $current_id)
{
	$str_space = insert_space($level);
	$level += 1;
	if ($current_id !== $cats['cat_id'])
	{
		echo " <option value='" . $cats['cat_id'] . "' ";
		if ($selected === $cats['cat_id'])
		{
			echo 'selected';
		}
		echo " > ";
		echo $str_space . $cats['name'] . " </option>";
	}

	if ($cats['child_cats'] !== FALSE)
	{
		foreach ($cats['child_cats'] as $key => $cat)
		{
			show_cat($cat, $level, $selected, $current_id);
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

<div class="span9 crud">
	<?php echo validation_errors(); ?>
	<h2><?php echo($create ? 'Add Category ' : 'Edit Category '); ?> </h2>
	<?php
	$attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'name' => 'myform');
	echo form_open('category/save', $attributes);
	?>
	<? if (!$create): ?> <input type="hidden" name="id"
								value="<?php echo($create ? '' : $category[0]['cat_id']); ?>"/> <? endif; ?>
	<fieldset>
		<legend>Thông tin cơ bản</legend>

		<div class="control-group">
			<label for="name" class="control-label">Tên nhóm</label>

			<div class="controls">
				<input placeholder="Nhập tên nhóm..." type="text" name="name" id="name"
					   value="<?php echo($create ? '' : $category[0]['name']); ?>" required></div>
		</div>

		<div class="control-group">
			<label for="id_parent" class="control-label">Chọn nhóm</label>

			<div class="controls">
				<select id="parent_id" name="parent_id">
					<option value="0">Nhóm cha</option>
					<?php
					foreach ($cats as $key => $cat)
					{
						show_cat($cat, 0, $category[0]['parent_id'], $category[0]['cat_id']);
					}
					?>
				</select>
			</div>
		</div>

	</fieldset>
	<div class="form-actions">
		<a class="btn" href="<?php echo base_url(); ?>index.php/category">Quay lại</a>
		<input type="submit" class="btn btn-primary"
			   value="<?php echo($create ? 'Thêm mới' : 'Lưu thông tin') ?>"/>
	</div>
	<?php echo form_close(); ?><!--Form-->
</div>

<script type="text/javascript">
	$("#myform").validate({
		submitHandler: function (form) {
			$(form).submit();
		}
	});
</script>
