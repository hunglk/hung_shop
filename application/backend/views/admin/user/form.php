		<div class="span9 crud">
			<?php echo validation_errors(); ?>
			<h1><?php echo($create ? 'New User ' : 'Edit User '); ?></h1>
			<!--Form-->
			<?php
			$attributes = array('class' => 'form-horizontal','id' => 'myform','name' => 'myform');
			echo form_open('user/save', $attributes);
			?>
			<? if (!$create): ?> <input type="hidden" name="id"
										value="<?php echo($create ? '' : $user[0]['user_id']); ?>"/> <? endif; ?>
			<fieldset>
				<legend>Thông tin cơ bản</legend>

				<div class="control-group">
					<label for="username" class="control-label">Username</label>

					<div class="controls">
						<input placeholder="Enter Username..." type="text" name="username" id="username"
							   value="<?php echo($create ? '' : $user[0]['username']); ?>" required>
					</div>
				</div>

				<div class="control-group">
					<label for="email" class="control-label">Email Address</label>

					<div class="controls">
						<input placeholder="Enter Email Address..." type="text" name="email" id="email"
							   value="<?php echo($create ? '' : $user[0]['email']); ?>" required>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend></legend>
				<div class="control-group">
					<label for="password" class="control-label">Password</label>

					<div class="controls">
						<input placeholder="Enter New Password..." type="password" name="password" id="password" required>
						<? if (!$create): ?> <input type="hidden" name="oldpass"
						value="<?php echo($create ? '' : $user[0]['password']); ?>"/> <? endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="password_confirm" class="control-label">Password Confirmation</label>

					<div class="controls">
						<input placeholder="Confirm New Password..." type="password" name="password_confirm"
							   id="password_confirm" required>
					</div>
				</div>

			</fieldset>

			<fieldset>
				<legend>Phân quyền</legend>
				<div class="control-group">
					<label for="user_list" class="control-label">User Roles</label>

					<div class="controls">
						<select id="role_id" name="role_id">
							<option value="0">Chọn quyền</option>
							<?php
							foreach ($roles as $role)
							{
								?>
								<option value="<?php echo $role['group_user_id'] ?>"
									<?php
									if (($create ? '' : $user[0]['group_user_id']) === $role['group_user_id'])
									{
										echo 'selected';
									}
									?>
									>
									<?php echo $role['name'] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<a class="btn" href="<?php echo base_url(); ?>index.php/user">Quay lại</a>
				<input type="submit" class="btn btn-primary"
					   value="<?php echo($create ? 'Thêm mới' : 'Lưu thông tin') ?>"/>
			</div>
			<?php echo form_close(); ?><!--Form-->
		</div>

		<script type="text/javascript">
			$("#myform").validate({
				submitHandler: function(form) {
					$(form).submit();
				}
			});
		</script>
