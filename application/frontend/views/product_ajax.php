<!-- Main -->
<div id="main">
	<div id="sidebar">
		<!-- Filter -->

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
										 width=""
										 height=""/></a>

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
						echo "San pham dang duoc cap nhat!";
					}
					?>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
		</div>
		<!-- End Products -->
		<?php if (isset($current_price)) : ?> <input type="hidden" id="hiddent_current_price" value="<?php echo $current_price; ?>"/>
			<?php endif; ?>
		<?php if (isset($color_id)) :?> <input type="hidden" id="hiddent_color_id" value='<?php echo json_encode($color_id); ?>'/>
			<?php endif; ?>
	</div>
	<div class="cl">&nbsp;</div>
</div>
<!-- End Main -->