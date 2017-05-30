<div id="all-product">
	<p class="title-all-product">Tất Cả Sản Phẩm</p>
	<div class="row">
		<div>
		  <div class="col-md-12">
		  	<ul class="nav nav-tabs" role="tablist" id="tab-product">
		  		<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Camera VDTECH</a></li>
			    <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Camera Global</a></li>			    
			    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Camera EYEWIDE</a></li>
			    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Báo cháy</a></li>
			    <li role="presentation"><a href="#settings2" aria-controls="settings" role="tab" data-toggle="tab">Báo động</a></li>
			  </ul>
		  </div>
		  <div class="tab-content">
		    
		    <div role="tabpanel" class="tab-pane active" id="profile">
		    	<div class="content-tab">
			    	<?php 
			    	$arrGlobal = $model->getListProduct(4, -1, -1, -1, 0, 6);
			    	if(!empty($arrGlobal['data'])){
			    		foreach ($arrGlobal['data'] as $key => $value) {		    			
			    	?>
			    	<div class="col-md-4">
						<div class="item-product">
							<div class="product-img">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>">
									<img src="<?php echo $value['image_url']; ?>" width="80%" />
								</a>
							</div>
							<div class="product-info">
								<p class="product-name">
									<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></a>
								</p>
								<p class="product-price"><?php								   
								   if($value['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   } ?><br /><?php echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p>
							</div>
							<div class="product-detail">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
							</div>
						</div>
					</div>
		    		<?php } } ?>	  
	    		</div>  	
		    </div>
		    <div role="tabpanel" class="tab-pane " id="home">
		    	<div class="content-tab">
			    	<?php 
			    	$arrGlobal = $model->getListProduct(9, -1, -1, -1, 0, 6);
			    	if(!empty($arrGlobal)){
			    		foreach ($arrGlobal['data'] as $key => $value) {		    			
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
								<p class="product-price"><?php								   
								   if($value['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   } ?><br /><?php echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p>
							</div>
							<div class="product-detail">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
							</div>
						</div>
					</div>
		    		<?php } } ?>	  
	    		</div>  		
		    </div>
		    <div role="tabpanel" class="tab-pane" id="messages">
		    	<div class="content-tab">
			    	<?php 
			    	$arrGlobal = $model->getListProduct(2, -1, -1, -1, 0, 6);
			    	if(!empty($arrGlobal['data'])){
			    		foreach ($arrGlobal['data'] as $key => $value) {		    			
			    	?>
			    	<div class="col-md-4">
						<div class="item-product">
							<div class="product-img">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>">
									<img src="<?php echo $value['image_url']; ?>" width="80%" />
								</a>
							</div>
							<div class="product-info">
								<p class="product-name">
									<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></a>
								</p>
								<p class="product-price"><?php								   
								   if($value['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   } ?><br /><?php echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p>
							</div>
							<div class="product-detail">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
							</div>
						</div>
					</div>
		    		<?php } } ?>	  
	    		</div>  	
		    </div>
		    <div role="tabpanel" class="tab-pane" id="settings">
		    	<div class="content-tab">
			    	<?php 
			    	$arrGlobal = $model->getListProduct(10, -1, -1, -1, 0, 6);
			    	if(!empty($arrGlobal['data'])){
			    		foreach ($arrGlobal['data'] as $key => $value) {		    			
			    	?>
			    	<div class="col-md-4">
						<div class="item-product">
							<div class="product-img">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>">
									<img src="<?php echo $value['image_url']; ?>" width="80%" />
								</a>
							</div>
							<div class="product-info">
								<p class="product-name">
									<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></a>
								</p>
								<p class="product-price"><?php								   
								   if($value['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   } ?><br /><?php echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p>
							</div>
							<div class="product-detail">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
							</div>
						</div>
					</div>
		    		<?php } } ?>	  
	    		</div>  	
		    </div>
		    <div role="tabpanel" class="tab-pane" id="settings2">
		    	<div class="content-tab">
			    	<?php 
			    	$arrGlobal = $model->getListProduct(11, -1, -1, -1, 0, 6);
			    	if(!empty($arrGlobal['data'])){
			    		foreach ($arrGlobal['data'] as $key => $value) {		    			
			    	?>
			    	<div class="col-md-4">
						<div class="item-product">
							<div class="product-img">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>">
									<img src="<?php echo $value['image_url']; ?>" width="80%" />
								</a>
							</div>
							<div class="product-info">
								<p class="product-name">
									<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></a>
								</p>
								<p class="product-price"> <?php		 if($value['is_cata'] == 1){ echo "Giá Catalogue "; }?><br />
								<?php						
								echo $value['price'] >= 0 ? number_format($value['price']) : $value['price']; ?></p>
							</div>
							<div class="product-detail">
								<a href="index.php?mod=detail&id=<?php echo $value['id']; ?>" class="btn btn-sm btn-detail"><span class="glyphicon glyphicon-shopping-cart "></span>Chi Tiết</a>
							</div>
						</div>
					</div>
		    		<?php } } ?>	  
	    		</div>  	
		    </div>
		  </div>

		</div>
	</div>
</div>
