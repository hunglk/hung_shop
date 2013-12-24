		<div class="span9 crud">
			<?php echo validation_errors(); ?>
			<h1><?php echo($create ? 'New Role ' : 'Edit Role '); ?></h1>
			<!--Form-->
			<?php
			$attributes = array('class' => 'form-horizontal');
			echo form_open('roles/' . ($create ? 'post_create' : 'post_edit'), $attributes);
			?>
			<? if (!$create): ?> <input type="hidden" name="id"
										value="<?php echo($create ? '' : $role[0]['pm_id']); ?>"/> <? endif; ?>
			<fieldset>
				<legend>Phân quyền</legend>

				<div class="control-group">
					<label for="user_list" class="control-label">Group Users</label>

					<div class="controls">
						<select id="group_user_id" name="group_user_id">
							<option value="0">Chọn quyền</option>
							<?php
							foreach ($groupusers as $group)
							{
								?>
								<option value="<?php echo $group['group_user_id']; ?>"
									<?php
									if (($create ? '' : $role[0]['id_group_user']) === $group['group_user_id'])
									{
										echo 'selected';
									}
									?>
									>
									<?php echo $group['name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="user_list">Modules</label>
					<?php
					foreach ($modules as $module)
					{
						?>
						<div class="controls">
							<label class="radio">
								<input type="radio" value="<?php echo $module['module_id']; ?>" name="module_id"
									<?php
									if (($create ? '' : $role[0]['module_id']) === $module['module_id'])
									{
										echo 'checked';
									}
									?>
									> <?php echo $module['name']; ?></label>
						</div>
					<?php
					}
					?>
				</div>
			</fieldset>
			<div class="form-actions">
				<a class="btn" href="<?php echo base_url(); ?>index.php/roles">Quay lại</a>
				<input type="submit" class="btn btn-primary"
					   value="<?php echo($create ? 'Thêm mới' : 'Lưu thông tin') ?>"/>
			</div>
			<?php echo form_close(); ?><!--Form-->
		</div>

