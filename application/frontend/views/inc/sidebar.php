<script>
	$(document).ready(function(){

		$('input[name="btn_submit"]').click(function(){
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url(); ?>index.php/product/filter",
				data: {
					amount: $( "#amount" ).val(),
					catid : $("#hiddent_cat_id").val(),
					color_id: $( "#color_id:checked" ).val(),
					datatype: 'html'
				},
				beforeSend: function(){
					$("#prod_content").html("");
				},
				success: function(kq) {
					$("#prod_content").html(kq);
				}
			}).done(function() {

				});

		});

	});
</script>

<script>
	$(function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 58, 300 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	});
</script>
<script>
	$(document).ready(function () {
		$(".btn_toggle").click(function () {
			var my_id = $(this).parent().parent().attr('my_id');

			$(".catloop").each(function () {
				var parent_id = $(this).attr('parent_id');
				if (parent_id === my_id) {
					$(this).toggle();
				}
			});
			//dd
			if ($(this).text() == "+") {
				$(this).text('-');
			}
			else {
				$(this).text('+');
			}

		});
	});

</script>
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
		<h2>Search by <span></span></h2>
		<div class="box-content">
				<label>Keyword</label>
				<input type="text" name="keyword" id="keyword" />
				<input type="submit" class="search-submit" name="submit" value="Search" />

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

