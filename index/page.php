<?php 
$id = $_GET['id'];
$rs = mysql_query("SELECT * FROM pages WHERE id = $id");
$detail = mysql_fetch_assoc($rs);
?>
<div class="container">
	<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 		
		<span class="glyphicon glyphicon-menu-right"></span> 
		Download phần mềm</h4>
</div>
</div>
<div class="row">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 hidden-xs">
			<div class=" menu-left">
				<div class="cate-title">
					<span class="glyphicon glyphicon-tasks "> </span>&nbsp; Sản phẩm hot
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
				<div class="clearfix"></div>
			</div>
			
		</div>
		<div class="col-md-8">
			<h2 class="new-title-detail" style="margin-top:0px">
				<?php echo $detail['page_name']; ?>
			</h2>			
			<div id="content-news" style="padding-top:30px">
				<?php echo $detail['content']; ?>
			</div>
		</div>
		
	</div>	
</div>
</div>
<div class="col-md-12" id="content-page">
	
</div>