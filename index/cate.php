<div class="row">
	<div class="container">
		<h4 class="link-cate"> <a href="index.php">Trang chủ</a> <span class="glyphicon glyphicon-menu-right"></span> Sản phẩm </h4>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-3">	
			<?php include "blocks/menu-left.php"; ?>
		</div>
		<div class="col-md-9" style="padding-right: 0px;">					
			
				<h4 style="margin-top:0px;padding-bottom:10px;border-bottom:1px solid #ebebeb">
					<?php 
					if($cate_id_cate > 0){						
					$detailCate = $model->getDetail('cate', $cate_id_cate);
					echo $detailCate['cate_name'];
					}
					$detailCateType = $model->getDetail('cate_type', $cate_type_id_cate);
					echo " ".$detailCateType['cate_type_name'];
					?>
				</h4>	
			
			<br>
			<div class="row">
				 <?php  
		        if(!empty($arrListCate['data'])){
		        foreach ($arrListCate['data'] as $product) {   
		       	?>
				<div class="col-md-4 item-cate">
					<div class="item-product">
						<div class="product-img">
							<a href="index.php?mod=detail&id=<?php echo $product['id']; ?>">
								<img src="<?php echo $product['image_url']; ?>" width="80%" />
							</a>
						</div>
						<div class="product-info">
							<p class="product-name">
								<a href="index.php?mod=detail&id=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a>
							</p>
							<p class="product-price"> <?php	if($product['is_cata'] == 1){   echo "Giá Catalogue ";  } ?>
							<br />
							<?php echo $product['price'] >= 0 ? number_format($product['price']) : $product['price']; ?></p> 
						</div>
						<div class="product-detail">
							<a href="index.php?mod=detail&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
						</div>
					</div>
				</div>	
				<?php } }else{ ?>				
				<p style="padding-left:15px;font-style:italic">Chưa có sản phẩm nào.</p>
				<?php } ?>
			</div>													
		</div>
	</div>
</div>