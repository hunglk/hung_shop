
<?php
function show_cat($cats, $level)
{
	$str_space = insert_space($level);
	$level += 1;
	echo "<ul my_id='{$cats['cat_id']}' class='catloop' parent_id='{$cats['parent_id']}'>
    <li ><a href='" . base_url() . "index.php/browser/index/" . $cats['cat_id'] . "'>";
	echo $str_space . $cats['name'];
	echo "</a><span class='btn_toggle' style='float:right;margin-right:10px;'>-</span></li>";
	if ($cats['child_cats'] !== FALSE)
	{
		foreach ($cats['child_cats'] as $key => $cat)
		{
			show_cat($cat, $level);
		}
	}
	echo "</ul>";
}

function insert_space($count)
{
	$str = "";
	for ($i = 0; $i < $count; $i++)
	{
		$str .= "&nbsp;&nbsp;&nbsp;";
	}
	return $str;
}

?>

<div id="sidebar">
	<!-- Search -->
	<div class="box search">
		<div class="box-content">

			<h2>Filter by <span></span></h2>
			<p><label for="amount">Price range:</label>
				<input type="text" id="amount" name="amount"></p>
			<div id="slider-range"></div>
			<br/>
			<h2>Color <span></span></h2>
			<p><label for="amount">Choose color:</label>
				<?php
				foreach ($colors as $color) {
					?>
					<input type="checkbox" id="color_id" name="color_id[]" value="<?php echo $color['color_id']; ?>">
					<?php echo $color['name']; ?>
				<?php
				}
				?>
				<input type="submit" class="search-submit" name="btn_submit" value="Filter" />
		</div>
	</div>
	<!-- End Search -->
	<!-- Categories -->
	<div class="box categories">
		<h2>Categories <span></span></h2>

		<div class="box-content">
			<ul>
				<?php
				foreach ($cats as $key => $cat)
				{
					show_cat($cat, 0);
				}
				?>
			</ul>
		</div>
	</div>
	<!-- End Categories -->
</div>

