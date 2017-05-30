<div id="menu">
	<div class="container">
		<!-- Static navbar -->
		<div class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>		    
		  </div>
		  <div class="navbar-collapse collapse">

		    <!-- Left nav -->
		    <ul class="nav navbar-nav">
		      <li <?php if($mod=='') echo 'class="active"'; ?>><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
		      <li <?php if($mod=='cate' || $mod=="detail") echo 'class="active"'; ?>><a href="javascript:void(0)">Sản phẩm </a>
		        <ul class="dropdown-menu" style="width:200px !important;">
		          <?php 
					$cateTypeArr = $model->getList('cate_type');
					if(!empty($cateTypeArr)){
						foreach ($cateTypeArr as $key => $value) {

						$cate_type_id = $key;

						$arrCustom = array(
				            'cate_type_id' => $cate_type_id
				        );
				        
						$cateArr = $model->getList('cate', $arrCustom);

					?>
		          <li><a href="index.php?mod=cate&cate_type_id=<?php echo $value['id']; ?>"><?php echo $value['cate_type_name']; ?></a>
		            <?php if(!empty($cateArr)){ ?>
		            <ul class="dropdown-menu">
		            	<?php foreach ($cateArr as $cate_id => $cate) { ?>
						<li> <a href="index.php?mod=cate&cate_type_id=<?php echo $value['id']; ?>&cate_id=<?php echo $cate['id']; ?>"><?php echo $cate['cate_name'] ?></a> </li>					
						<?php } ?>		         
		            </ul>
		            <?php } ?>
		          </li>
		          <?php } } ?>
		        </ul>
		      </li>
		      <li <?php if($mod=='page') echo 'class="active"'; ?>><a href="index.php?mod=page&id=1">Download</a></li>		      
		      <li <?php if($mod=='contact') echo 'class="active"'; ?>><a href="index.php?mod=contact">Liên hệ</a></li>
		      <li <?php if($mod=='news' || $mod=="search") echo 'class="active"'; ?>><a href="index.php?mod=search">Tìm kiếm</a></li>
		      
		    </ul>	    

		  </div><!--/.nav-collapse -->
		</div>
	</div>
</div>