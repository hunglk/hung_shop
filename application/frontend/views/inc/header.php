<div id="header">

	<h1 id="logo"><a href="<?php echo base_url(); ?>product">shoparound</a></h1>
	<!-- Cart -->
	<div id="cart"><a href="#" class="cart-link">Your Shopping Cart</a>

		<div class="cl">&nbsp;</div>
		<span>Articles: </span> &nbsp;&nbsp; <span>Cost: </span></div>
	<!-- End Cart -->
	<!-- Navigation -->
	<div id="navigation">
		<ul id="jMenu">
			<li><a href="<?php echo base_url(); ?>">Home</a></li>
			<li><a href="<?php echo base_url(); ?>product" class="">Product</a>
				<ul>
					<?php
					foreach ($cats as $key => $cat)
					{
						show_cat1($cat, 0);
					}
					?>
				</ul>
			</li>
			<li><a href="#">Support</a></li>
			<li><a href="#">My Account</a></li>
			<li><a href="#">The Store</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- End Navigation -->
</div>

<?php
function show_cat1($cats, $level)
{
	$str_space = insert_space1($level);
	$level += 1;
	echo "
    		<li ><a href='" . base_url() . "index.php/browser/index/" . $cats['cat_id'] . "'>";
	echo $str_space . $cats['name'];
	echo "</a>";
	if ($cats['child_cats'] !== FALSE)
	{
		echo "<ul>";
		foreach ($cats['child_cats'] as $key => $cat)
		{
			show_cat1($cat, $level);
		}
		echo "</ul>";
	}
	echo "</li>";
}

function insert_space1($count)
{
	$str = "";
	for ($i = 0; $i < $count; $i++)
	{
		$str .= "&nbsp;&nbsp;&nbsp;";
	}
	return $str;
}

?>


