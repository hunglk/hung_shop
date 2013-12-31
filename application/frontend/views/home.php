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

	<script src="<?php echo base_url();?>public/menu/jMenu.jquery.js"></script>
	<!-- Run the plugin -->
	<script type="text/javascript">
		$(window).load(function() {
			$('#featured').orbit();
		});
	</script>

	<script src="<?php echo base_url();?>public/js/myjs.js"></script>

	<!-- Shell -->
<div class="shell">
	<!-- Header -->
	<?php $this->load->view('inc/header'); ?>
	<!-- Content -->
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		<!-- Content -->
		<div id="content">
			<div id="featured">
				<?php
				if ($products)
				{
					foreach ($products as $pro)
					{
						?>
						<a href="<?php echo base_url() . 'product/detail/' . $pro['pro_id']; ?>">
							<img src="<?php echo base_url() . 'admin/' . $pro['prod_img'][0]['url']; ?>"/></a>
					<?php
					}
				}
				?>
			</div>
		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	<!-- End Header -->
	<?php $this->load->view('inc/footer'); ?>

</div>
<!-- End Shell -->

</body>
</html>