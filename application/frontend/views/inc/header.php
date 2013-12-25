<div id="header">

	<h1 id="logo"><a href="#">shoparound</a></h1>
	<!-- Cart -->
	<div id="cart"><a href="#" class="cart-link">Your Shopping Cart</a>

		<div class="cl">&nbsp;</div>
		<span>Articles: <strong>4</strong></span> &nbsp;&nbsp; <span>Cost: <strong>$250.99</strong></span></div>
	<!-- End Cart -->
	<!-- Navigation -->
	<div id="navigation">
		<ul id="main-menu">
			<li><a href="<?php echo base_url(); ?>">Home</a></li>
			<li><a href="<?php echo base_url(); ?>product" class="active">Product</a></li>
			<li><a href="#">Support</a></li>
			<li><a href="#">My Account</a></li>
			<li><a href="#">The Store</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- End Navigation -->
</div>
<!-- Main -->
<div id="main">
	<div class="cl">&nbsp;</div>
	<!-- Content -->
	<div id="content">
		<!-- Content Slider -->
		<div id="sliderFrame">
			<div id="hung_slider">
				<?php
				if ($products)
				{
					foreach ($products as $pro)
					{
				?>
				<a href="<?php echo base_url(). 'product/detail/'. $pro['pro_id']; ?>">
				<img src="<?php echo base_url() .'admin/'. $pro['prod_img'][0]['url']; ?>"/></a>
				<?php
					}
				}
				?>
			</div>
			<!--nav bar-->
			<div style="text-align:center;padding:20px;z-index:20;">
				<a onclick="imageSlider.previous()" class="group2-Prev"></a>
				<a id='auto' onclick="switchAutoAdvance()"></a>
				<a onclick="imageSlider.next()" class="group2-Next"></a>
			</div>
		</div>
		<!-- End Content Slider -->