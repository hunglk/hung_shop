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

