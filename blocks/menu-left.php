<div class="row hidden-xs" >		
	<div class=" menu-left">
		<div class="cate-title">
			<span class="glyphicon glyphicon-tasks "> </span> &nbsp;Danh Mục
		</div>
		<?php 
		$cateTypeArr = $model->getList('cate_type');
		if(!empty($cateTypeArr)){
			foreach ($cateTypeArr as $key => $value) {
			
			$arrCustom = array(
	            'cate_type_id' => $key
	        );
	        
			$cateArr = $model->getList('cate', $arrCustom);

		?>
		<div class="hover-cate">
			<a href="index.php?mod=cate&cate_type_id=<?php echo $value['id']; ?>" class="a-cate-type">
				<div class="cate-type">
					<?php echo $value['cate_type_name']; ?>		
				</div>	
			</a>
			<?php if(!empty($cateArr)){ 				
				?>
			<div class="cate">
				<ul>
					<?php foreach ($cateArr as $k => $cate) { ?>
					<li > <a <?php if(isset($cate_id_cate) && $cate_id_cate == $cate['id'] ) echo 'class="active"'; ?> href="index.php?mod=cate&cate_type_id=<?php echo $value['id']; ?>&cate_id=<?php echo $cate['id']; ?>"><?php echo $cate['cate_name'] ?></a> </li>					
					<?php } ?>			
				</ul>
			</div>
			<?php } ?>

		</div>
		<?php } } //?>
		
	</div>
</div>
<br>
<?php if($mod != ''){ ?>
<div class="row hidden-xs">
	<div class="menu-left">
		<div class="cate-title">
			<span class="glyphicon glyphicon-tasks "> </span>&nbsp; Sản phẩm hot
		</div>
		<?php 
		$sql = "SELECT * FROM product WHERE is_hot = 1 AND cate_type_id = $cate_type_id_cate ORDER BY RAND() LIMIT 0,5";
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
		<div class="clearfix"></div>
	</div>

</div>
<?php } ?>
