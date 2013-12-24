
<!-- Header -->
<?php $this->load->view('admin/inc/admin_header'); ?>
	<?php $this->load->view('admin/inc/menu'); ?>
<div class="container">

	<div class="row-fluid">

		<div class="span3"> <!-- Sidebar -->
			<?php $this->load->view('admin/inc/sidebar'); ?>
		</div>
		<!-- /Sidebar -->

		<div class="span9">
			<h1> Backend Dashboard</h1>

			<p> Hệ thống quản trị.</p>

			<p style="color:red"> <?php
				if (($this->session->flashdata('permision_error')))
				{
					echo 'You don not have permission to access on this module!';
				}
				?> </p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<p>You are logged in as: <?php echo $this->session->userdata('username'); ?></p>
		</div>
	</div>
</div>
<!-- /container -->
<!-- Footer -->
<?php $this->load->view('admin/inc/admin_footer'); ?>

