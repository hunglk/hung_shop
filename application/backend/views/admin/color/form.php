
		<div class="span9 crud">
			<h1><?php echo($create ? 'New Color ' : 'Edit Color '); ?></h1>
			<!--Form-->
			<?php
			$attributes = array('class' => 'form-horizontal');
			echo form_open('color/' . ($create ? 'post_create' : 'post_edit'), $attributes);
			?>
			<? if (!$create): ?> <input type="hidden" name="id"
										value="<?php echo($create ? '' : $color[0]['color_id']); ?>"/> <? endif; ?>
			<fieldset>
				<legend></legend>
				<div class="control-group">
					<label class="control-label" for="user_list">Tên Màu:</label>

					<div class="controls">
						<input placeholder="Enter Color Name..." type="text" name="name" id="name"
							   value="<?php echo($create ? '' : $color[0]['name']); ?>">
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<a class="btn" href="<?php echo base_url(); ?>index.php/color">Quay lại</a>
				<input type="submit" class="btn btn-primary"
					   value="<?php echo($create ? 'Thêm mới' : 'Lưu thông tin') ?>"/>
			</div>
			<?php echo form_close(); ?><!--Form-->
		</div>

