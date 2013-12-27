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
	<div id="content">
		<div id="featured">
			<?php
			if ($products)
			{
				foreach ($products as $pro)
				{
			?>
					<a href="<?php echo base_url(). 'product/detail/'. $pro['pro_id']; ?>">
						<img src="<?php echo base_url() .'admin/'. $pro['prod_img'][0]['url']; ?>" /></a>
			<?php
				}
			}
			?>
		</div>
	</div>
	<!-- End Content -->
