<div>
	<b>Name: </b><?php echo $product_detail[0]['name']; ?> <br/>
	<b>Price: </b><?php echo $product_detail[0]['price']; ?> <br/>
	<b>Description: </b><?php echo strip_tags($product_detail[0]['description']); ?><br/>
	<img src="<?php echo base_url() .'admin/'. $prod_img[0]['url']; ?>" alt="" width="230" height="300" />

</div>