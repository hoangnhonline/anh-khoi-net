<?php 
$key = isset($_GET['key']) ? $model->processData($_GET['key']) : "";
?>
<div class="row">
	<div class="container">
		<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 	
		<span class="glyphicon glyphicon-menu-right"></span> 
		Tìm kiếm  </h4>
	</div>	
<div class="">
	<div class="container">
		<div class="col-md-9">
			<div class="row" style="margin-right:0px;">
				<div class="panel panel-default">
				  <div class="panel-heading">Tìm kiếm</div>
				  <div class="panel-body" style="text-align:center">
				    <form class="form-inline">
				    	<input type="hidden" name="mod" value="search">
				    	<div class='form-group'>
				    		<label>Tên sản phẩm</label>
				    		<input class="form-control" value="<?php echo $key; ?>" name="key" id="key" />				    		
				    	</div>				    	
				    	<button class="btn btn-warning">Tìm</button>
				    </form>
				  </div>
				</div>
			</div>
			<div class="row">
				 <?php 
				 if($key != ''){ 
				 $sql = "SELECT * FROM product WHERE product_name LIKE '%".$key."%'";
				$rs = mysql_query($sql);

		        while($product = mysql_fetch_assoc($rs)){
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
							<?php echo $product['price'] >= 0 ? number_format($product['price']) : $product['price']; ?></p> 
						</div>
						<div class="product-detail">
							<a href="index.php?mod=detail&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
						</div>
					</div>
				</div>	
				<?php } } ?>
			</div>
		</div>
		<div class="col-md-3 product-like" style="padding:0px;">	
			<div class="cate-title">
				<span class="glyphicon glyphicon-tasks "> </span>&nbsp; Sản phẩm HOT
			</div>
			<?php 
			$sql = "SELECT * FROM product WHERE is_hot = 1 ORDER BY RAND() LIMIT 0,5";
			$rs = mysql_query($sql);
			while($row = mysql_fetch_assoc($rs)){
			?>
			<div class="col-xs-12" style="margin-bottom:10px">
				<div class="col-xs-5" style="padding:0px">
					<a href="index.php?mod=detail&id=<?php echo $row['id']; ?>">
						<img src="<?php echo $row['image_url']; ?>" class="img-responsive" >
					</a>
				</div>					
				<div class="col-xs-7" style="padding:0px;padding-left:5px">
						<p></p>
						<a href="index.php?mod=detail&id=<?php echo $row['id']; ?>" style="color:#666"><?php echo $row['product_name']; ?></a>
						<p style="color:#f29f1f"><?php echo number_format($row['price']); ?> VND</p>
					
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</div>