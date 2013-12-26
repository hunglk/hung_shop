<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<!-- styles -->
	<link href="<?php echo base_url(); ?>public/css/admin/bootstrap.css" rel="stylesheet">
	<style>
		body {
			padding-top: 60px;
		}
	</style>
	<link href="<?php echo base_url(); ?>public/css/admin/bootstrap-responsive.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>public/css/admin/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/css/admin/editor.css" rel="stylesheet">

	<!-- javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>public/js/admin/jquery-ui-custom.js"></script>
	<script src="<?php echo base_url(); ?>public/js/admin/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>public/js/admin/editor/editor.js"></script>
	<script>
		var root_url = '<?php echo base_url() ?>';
	</script>
	<script src="<?php echo base_url(); ?>public/js/admin/myjs.js"></script>

	<title>AdminCP</title>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo base_url(); ?>index.php/admin/dash">AdminCP</a>

			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dash">Home</a></li>

				</ul>
				<ul class="nav pull-right">
					<li><a href="http://shop.local/">Visit site</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/admin/logout">Logout Return To Site</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row-fluid">
		<div class="span3">
			<!-- Sidebar -->
			<?php $this->load->view('admin/inc/sidebar'); ?>
		</div>