<div id="header">

	<h1 id="logo"><a href="<?php echo base_url(); ?>product">shoparound</a></h1>
	<!-- Cart -->
	<div id="cart"> <a href="#" class="cart-link">Your Shopping Cart</a>
		<div class="cl">&nbsp;</div>
		<span>Articles: </span> &nbsp;&nbsp; <span>Cost: </span> </div>
	<!-- End Cart -->
	<!-- Navigation -->
	<div id="navigation">
		<ul>
			<li><a href="<?php echo base_url(); ?>" class="">Home</a></li>
			<li><a href="<?php echo base_url(); ?>product">Product</a></li>
			<li><a href="#">Support</a></li>
			<li><a href="#">My Account</a></li>
			<li><a href="#">The Store</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- End Navigation -->
</div>
<div id="main">
	<div class="cl">&nbsp;</div>
	<!-- Content -->
	<div id="content"><!-- Content Slider -->
		<div id="sliderFrame">
			<div id="hung_slider">
				<?php
				if ($products)
				{
					foreach ($products as $pro)
					{
						?>
						<a href="<?php echo base_url(). 'product/detail/'. $pro['pro_id']; ?>">
							<img src="<?php echo base_url() .'admin/'. $pro['prod_img'][0]['url']; ?>" width="230" height="300"/></a>
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
