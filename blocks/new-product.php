<?php 
$newArr = $model->getListProductNoiBat(0, 6);
?>
<div id="new-product">
	<p class="title-new-product">Sản Phẩm Mới</p>
	<div class="row">
		<?php if(!empty($newArr)){ 
			foreach ($newArr['data'] as $key => $value) {					
		?>
		<div class="col-md-4">
			<div class="item-product">
				<div class="product-img">
					<a class="fancybox" href="<?php echo $value['image_url']; ?>">
						<img src="<?php echo $value['image_url']; ?>" alt="" width="80%"/>
					</a>
				</div>
				<div class="product-info">
					<p class="product-name">
						<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></a>
					</p>
					<p class="product-price"> <?php								   
								   if($value['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   } ?><br /> <?php echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p> 
				</div>
				<div class="product-detail">
					<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
				</div>				
			</div>
		</div>
		<?php } } ?>			
	</div>	
</div>
