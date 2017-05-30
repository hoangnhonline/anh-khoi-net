<div class="container">
	<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 
		<span class="glyphicon glyphicon-menu-right"></span> 
		Tin tức  </h4>
</div>
</div>
<div class="row">
<div class="container">
	<h1 class="new-title-detail" style="margin-top:0px">
				Tin tức
			</h1>
	<?php 
$sql = "SELECT * FROM articles";
$rs = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_assoc($rs)){
	?>
	<div class="row item-news">
		<div class="col-md-3">
			<a href="index.php?mod=news-detail&id=<?php echo $row['article_id']; ?>">
				<img src="<?php echo $row['image_url']; ?>" class="img-responsive img-thumbnail" >
			</a>
		</div>
		<div class="col-md-9">
			<h2 class="new-title" style="margin-top:0px">
				<a href="index.php?mod=news-detail&id=<?php echo $row['article_id']; ?>"><?php echo $row['article_title']; ?></a>
			</h2>
			<div class="new-desc"><?php echo $row['description']; ?></div>
		</div>
	</div>	
	<?php } ?>
</div>
</div>