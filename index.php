<?php  
//clearstatcache();
	require_once "backend/model/Frontend.php";
	$model = new Frontend;
	include "counter.php";
	$mod = isset($_GET['mod'])? $_GET['mod']: "";
	if($mod == "cate"){
		$cate_type_id_cate = isset($_GET['cate_type_id']) ? (int) $_GET['cate_type_id'] : -1;
		$cate_id_cate = isset($_GET['cate_id']) ? (int) $_GET['cate_id'] : -1;
		$page_show = 5;


		$arrTotalCate = $model->getListProduct($cate_type_id_cate, $cate_id_cate, -1, -1, -1, -1);
		$limit = 28;
		$page = isset($_GET['trang']) ? (int) $_GET['trang'] : 1;
		$total_page = ceil($arrTotalCate['total'] / $limit);
		$offset = $limit * ($page - 1);

		$arrListCate = $model->getListProduct($cate_type_id_cate, $cate_id_cate, -1,-1,$offset, $limit);
	}
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Viễn thông Anh Khôi</title>
	<link rel="icon" type="image/png" href="favicon.ico">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css?v=1.0" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox -->
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    
</head>
<body>
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="wrapper">
		<div class="container">
			<?php include "blocks/header.php"; ?>		
		</div>
			<?php include "blocks/menu.php"; ?>
			<?php 
				if($mod == ""){
					include "index/index.php";
				}else{
					include "index/".$mod.".php";
				}				
			?>			
		<?php include "blocks/footer.php"; ?>
	</div>
	<script src="js/jquery.smartmenus.js"></script>
    <script src="js/jquery.smartmenus.bootstrap.js"></script>	    
    <script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
	</script>
</body>
</html>