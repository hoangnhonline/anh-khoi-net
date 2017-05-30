<?php 
$article_id = $_GET['id'];
$rs = mysql_query("SELECT * FROM articles WHERE article_id = $article_id");
$detail = mysql_fetch_assoc($rs);
?>
<div class="container">
	<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 
		<span class="glyphicon glyphicon-menu-right"></span> 
		<a href="index.php?mod=news">Tin tức</a> 
		<span class="glyphicon glyphicon-menu-right"></span> 
		Chi tiết  </h4>
</div>
</div>
<div class="row">
<div class="container">
	
	<div class="row">
		
		<div class="col-md-8">
			<h1 class="new-title-detail" style="margin-top:0px">
				<?php echo $detail['article_title']; ?>
			</h1>
			<div class="new-desc-detail"><?php echo $detail['description']; ?></div>
			<div id="content-news">
				<?php echo $detail['content']; ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class=" menu-left">
				<div class="cate-title">
					<span class="glyphicon glyphicon-tasks "> </span> &nbsp;Tin tức khác
				</div>
				<ul id="tin-khac">
					<?php
					$rs = mysql_query("SELECT * FROM articles WHERE article_id <> $article_id ORDER BY RAND() LIMIT 0,8");
					while($row = mysql_fetch_assoc($rs)){
					?>
					<li>
						<a href="index.php?mod=news-detail&id=<?php echo $row['article_id']; ?>">
							<?php echo $row['article_title']; ;?>
						</a>
					</li>
					<?php } ?>
				</ul>
				
			</div>
			
		</div>
	</div>	
</div>
</div>