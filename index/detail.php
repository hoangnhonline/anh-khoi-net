<?php 
$id = $_GET['id'];
$data = $model->getDetailProduct($id);
//var_dump($data);
$detail = $data['data'];
$imageArr = $data['images'];
?>
<div class="row">
	<div class="container">
		<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 
			<span class="glyphicon glyphicon-menu-right"></span> 
			<a href="index.php?mod=cate&cate_type_id=<?php echo $detail['cate_type_id']; ?>"><?php echo $model->getNameById('cate_type', 'cate_type_name', $detail['cate_type_id']); ?></a> 
			<span class="glyphicon glyphicon-menu-right"></span> 
			<a href="index.php?mod=cate&cate_id=<?php echo $detail['cate_id']; ?>"><?php echo $model->getNameById('cate', 'cate_name', $detail['cate_id']); ?> </a> 			
					
			
			
		</h4>
	</div>	
<div class="">
	<div class="container">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="detail-img">
							<?php if(!empty($imageArr)){ ?>
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							  	<?php $i = 0; foreach ($imageArr as $key => $value) { ?>
							    <li data-target="#carousel-example-generic" data-slide-to="0" <?php if($i == 0) echo 'class="active"'; ?>></li>
							    <?php  $i++; } ?>							    
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							  	<?php $j = 0; foreach ($imageArr as $key => $value) { ?>
							    <div class="item <?php if($j == 0) echo "active"; ?>">
							      <img src="<?php echo $value['url']; ?>" alt="..." style="margin:auto">
							    </div>
							    <?php $j++; } ?>
							  </div>
						
							</div>
							<?php } ?>
						
							
						</div>
					</div>
				</div>
				<div class="col-md-6 " style="border-bottom: 1px solid #ebebeb">
					<h3><?php echo $detail['product_name']; ?></h3>
					<p style="color:#F5AB1F;font-weight:bold"> <?php								   
								   if($detail['is_cata'] == 1){
									   echo "Giá Catalogue ";
								   }?> <br /><?php echo $detail['price'] >= 0 ? number_format($detail['price']) : $detail['price']; ?></p>
					<p>Danh mục: <?php echo $model->getNameById('cate', 'cate_name', $detail['cate_id']); ?> - <?php echo $model->getNameById('cate_type', 'cate_type_name', $detail['cate_type_id']); ?></p>
				</div>
			</div>
			<div class="row">
				<div class="info">
					<ul class="nav nav-tabs" role="tablist" id="tab-product">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chi tiết Sản Phẩm</a></li>				    	
					</ul>

					<div class="tab">
						<div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="home">
					    	<div class="content-tab" style="padding:20px;overflow-x:scroll">
					    		<?php echo $detail['content']; ?>
					    	</div>
					    </div>					    
					  </div>
					</div>
					</div>
			</div>
		</div>
		<div class="col-md-3 product-like" style="padding:0px;">	
			<div class="cate-title">
				<span class="glyphicon glyphicon-tasks "> </span>&nbsp; Sản phẩm LIÊN QUAN
			</div>
			<?php 
			$sql = "SELECT * FROM product WHERE is_hot = 1 AND cate_type_id = ".$detail['cate_type_id']." ORDER BY RAND() LIMIT 0,5";
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