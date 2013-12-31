<?php
if (isset($colors))
{
	foreach ($colors as $color)
	{
?>
		<input type="checkbox" id="color_id" name="color_id[]" value="<?php echo $color['color_id']; ?>">
		<?php echo $color['color_name'][0]['name']; ?>
<?php
	}
}
?>