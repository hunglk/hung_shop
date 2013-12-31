<!-- Meta -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shop Around</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css" type="text/css" media="all"/>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
		var root_url = '<?php echo base_url() ?>';
	</script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>public/menu/jMenu.jquery.js"></script>
	<!-- Run the plugin -->
	<script type="text/javascript">
		$(window).load(function () {
			$('#featured').orbit();
		});
	</script>
	<script src="<?php echo base_url(); ?>public/js/myjs.js"></script>

	<!-- Shell -->
<div class="shell">
	<!-- Header -->
	<?php echo $header; ?>

	<!-- Content -->
	<?php echo $content; ?>

	<!-- Footer -->
	<?php echo $footer; ?>

</div>
<!-- End Shell -->

</body>
</html>