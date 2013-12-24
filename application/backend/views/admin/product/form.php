<?php
function show_cat($cats, $level, $selected = NULL)
{
	$str_space = insert_space($level);
	$level += 1;
	echo "<label class='checkbox'>";
	echo "<input type='checkbox' name='cat_id[]'' value='" . $cats['cat_id'] . "' ";
	if ($selected != NULL)
	{
		if (in_array($cats['cat_id'], $selected))
		{
			echo 'checked';
		}
	}
	echo ">";
	echo $str_space . $cats['name'];
	echo "</label>";
	if ($cats['child_cats'] !== FALSE)
	{
		foreach ($cats['child_cats'] as $key => $cat)
		{
			show_cat($cat, $level, $selected);
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
			<h2><?php echo($create ? 'Add Product ' : 'Edit Product '); ?> </h2>
			<?php
			$attributes = array('class' => 'form-horizontal','id' => 'myform','name' => 'myform');
			echo form_open_multipart('product/' . ($create ? 'post_create' : 'post_edit'), $attributes);
			?>
			<? if (!$create): ?> <input type="hidden" name="id"
										value="<?php echo($create ? '' : $product[0]['pro_id']); ?>"/> <? endif; ?>
			<!--Upload -->
			<?php
			if (isset($images))
			{
				?>
				<fieldset>
					<legend>Ảnh chi tiết</legend>
					<?php
					foreach ($images as $img)
					{
						?>
						<div class="row">
							<div class="span12">
								<div class="control-group span6">
									<div class="controls">
										<img width="100px" height="100px" alt=""
											 src="<?php echo base_url() . $img['url'] ?>">
										<a rel="<?php echo $img['image_id'] ?>" class="delete_toggler btn btn-danger">Xóa</a>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</fieldset>
			<?php
			}
			?>
			<fieldset>
				<legend>Upload</legend>

				<input type="button" value="Thêm ảnh" id="flip" class="btn">
				<hr>
				<div style="display: none;" id="panel">

					<div class="row">
						<div class="span12">
							<div class="control-group span6">
								<label class="control-label" for="picture">Ảnh 1</label>

								<div class="controls">
									<input type="file" id="img1" name="img1"/>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="span12">
							<div class="control-group span6">
								<label class="control-label" for="picture">Ảnh 2</label>

								<div class="controls">
									<input type="file" id="img2" name="img2"/>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="span12">
							<div class="control-group span6">
								<label class="control-label" for="picture">Ảnh 3</label>

								<div class="controls">
									<input type="file" id="img3" name="img3"/>
								</div>
							</div>
						</div>
					</div>
					<!--end-->
				</div>
			</fieldset>

			<fieldset>
				<legend>Thông tin cơ bản</legend>

				<?php
				if (isset($product_category_id))
				{
					$pro_cat = array();
					foreach ($product_category_id as $pro_cat_id)
					{
						$pro_cat[] = $pro_cat_id['cat_id'];
					}
				}
				?>
				<div class="control-group">
					<label class="control-label" for="cat_id">Danh mục</label>

					<div class="controls">
						<?php
						foreach ($cats as $key => $cat)
						{
							show_cat($cat, 0, ($create ? '' : $pro_cat));
						}
						?>
					</div>

				</div>
				<div class="control-group">
					<label class="control-label" for="name">Tên sản phẩm</label>

					<div class="controls">
						<input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm..."
							   value="<?php echo($create ? '' : $product[0]['name']); ?>" required>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="price">Giá sản phẩm</label>

					<div class="controls">
						<input type="text" id="price" name="price" placeholder="Nhập giá sản phẩm..."
							   value="<?php echo($create ? '' : $product[0]['price']); ?>" required>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="price">Chọn màu</label>

					<div class="controls">
						<select id="color_id" name="color_id" required>
							<option value="">Chọn màu</option>
							<?php
							foreach ($colors as $color)
							{
								?>
								<option value="<?php echo $color['color_id']; ?>"
									<?php
									if (($create ? '' : $product[0]['color_id'] === $color['color_id']))
									{
										echo 'selected';
									}
									?>
									>
									<?php echo $color['name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="description">Mô tả chi tiết</label>

					<div class="controls">
						<textarea name="description" id="description"
								  value="" required><?php echo($create ? '' : $product[0]['description']); ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('description');</script>
					</div>
				</div>

			</fieldset>

			<div class="form-actions">
				<a class="btn" href="<?php echo base_url(); ?>index.php/product">Quay lại</a>
				<input type="submit" name="submit" class="btn btn-primary"
					   value="<?php echo($create ? 'Thêm mới' : 'Lưu thông tin') ?>"/>
			</div>
			<?php echo form_close(); ?><!--Form-->
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
		<?php echo form_open('product/delete_image'); ?>
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

<script>
	$(document).ready(function () {
		$("#flip").click(function () {
			$("#panel").slideToggle("slow");
		});
	});
</script>

<script type="text/javascript">
	$("#myform").validate({
		submitHandler: function(form) {
			$(form).submit();
		}
	});
</script>
