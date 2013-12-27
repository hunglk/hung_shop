<!-- Meta -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shop Around</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	<link rel="stylesheet" href="<?php echo base_url();?>public/slideshow/orbit-1.2.3.css">
	<script src="<?php echo base_url();?>public/slideshow/jquery.orbit-1.2.3.min.js"></script>


	<!-- Run the plugin -->
	<script type="text/javascript">
		$(window).load(function() {
			$('#featured').orbit();
		});
	</script>

<!-- Shell -->
<div class="shell">
	<!-- Header -->
	<?php echo $header; ?>
	<!-- End Header -->

	<?php echo $content; ?>

	<!-- Footer -->
	<?php echo $footer; ?>
	<!-- End Footer -->
</div>
<!-- End Shell -->

</body>
</html>