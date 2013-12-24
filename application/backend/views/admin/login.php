<?php
if ($this->session->userdata('user_id'))
{
	redirect('admin/dash');
}
?>
<!-- Header -->
<?php $this->load->view('admin/inc/admin_header'); ?>

<div class="container loginwindow">
	<h1>Login To Admin Center</h1>
	<p style="color:red">
		<?php
		if (isset($login_error))
		{
			echo $login_error;
		}
		?>
	</p>
	<?php
	$attributes = array('id' => 'myform','name' => 'myform');
	echo form_open('admin/index', $attributes); ?>
	<div class="control-group">
		<label class="control-label" for="username">Username</label>

		<div class="controls">
			<input type="text" class="input-xlarge" id="username" name="username"
				   placeholder="Enter Your Username..." required>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>

		<div class="controls">
			<input type="password" class="input-xlarge" id="password" name="password"
				   placeholder="Enter Your Password..." required>
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="Login To Dashboard" name='btnLogin'/>
	<?php echo form_close(); ?>
</div>
<!-- /container -->
<!-- Footer -->
<?php $this->load->view('admin/inc/admin_footer'); ?>

<script type="text/javascript">
	$("#myform").validate({
		submitHandler: function(form) {
			$(form).submit();
		}
	});
</script>

