<?php
if (isset($max) && isset($min))
{
	$min_price = $min[0]['price'];
	$max_price = $max[0]['price'];
}
?>
<script>
	function slider_product() {
		$( "#slider-range" ).slider({
			range: true,
			min: <?php echo $min_price; ?>,
			max: <?php echo $max_price; ?>,
			values: [ 0, 500 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				filter();
				load_filter_color();
		}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	}
</script>


<style>
	#jquery_home_product {
		margin-top: 5px;
	}
</style>

<!-- Main -->
<div id="main">
	<div id="sidebar">
		<!-- Filter -->
		<div class="box search">
			<div class="box-content">

				<h2>Filter by <span></span></h2>

				<p><label for="amount">Price range:</label>
					<input type="text" id="amount" name="amount"></p>

				<div id="slider-range"></div>
				<br/>

				<h2>Color <span></span></h2>

				<p><label for="amount">Choose color:</label>

				<div id="filter_color">
					<?php
					if (isset($colors))
					{
						foreach ($colors as $color)
						{
					?>
						<input type="checkbox" id="color_id" name="color_id[]" value="<?php echo $color['color_id']; ?>">
						<span><?php echo $color['name']; ?></span>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<!-- End Filter -->
	</div>

	<div id="content">
		<!-- Products -->
		<div class="products">
			<div id="prod_content">
				<div id="jquery_home_product">
					<?php echo $pagination_home_product; ?>
				</div>
				<div class="cl">&nbsp;</div>
				<ul>
					<?php
					if (isset($products))
					{
						$i = 0;
						foreach ($products as $pro)
						{
							$i++;
							?>
							<li <?php if ($i % 3 === 0) echo "class='last'"; ?> >
								<a href="<?php echo base_url() . 'product/detail/' . $pro['pro_id']; ?>">
									<img src="<?php echo base_url() . 'admin/' . $pro['prod_img'][0]['url']; ?>" alt=""
										 width="" height=""/></a>

								<div class="product-info">
									<h3>HungLK</h3>

									<div class="product-desc">
										<h4>CATEGORY</h4>

										<p><?php echo $pro['name']; ?><br/></p>
										<strong class="price">$<?php echo $pro['price']; ?></strong></div>
								</div>
							</li>
						<?php
						}
					}
					else
					{
						echo 'San pham dang duoc cap nhat!';
					}
					?>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
		</div>
		<!-- End Products -->
		<?php if (isset($catid)) : ?> <input type="hidden" id="hiddent_cat_id" value="<?php echo $catid; ?>"/>
			<?php endif; ?>
	</div>
	<div class="cl">&nbsp;</div>
</div>
<!-- End Main -->