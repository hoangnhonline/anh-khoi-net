<div id="slider">
	<div class="container">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		  <?php 
		  $arrBanner = $model->getListBannerByPosition(1);
		  if(!empty($arrBanner)){
			  $ki = 0;
		  foreach($arrBanner as $banner){
			  
			  
			//  var_dump($banner);
		  ?>
			  <li data-target="#carousel-example-generic" data-slide-to="<?php echo $ki; ?>" <?php if($ki == 0){?> class="active" <?php } ?>></li>
		  <?php $ki++; } }  ?>		    
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		  <?php 
		  $arrBanner = $model->getListBannerByPosition(1);
		  if(!empty($arrBanner)){
			  $o = 0;
		  foreach($arrBanner as $banner){
			 // var_dump(is_file($banner['image_url']));
			  
				  
			  $o++;
			//  var_dump($banner);
		  ?>
		    <div class="item <?php if($o==1) echo "active"; ?>">
		      <img src="<?php echo $banner['image_url']; ?>" style="width:100%; height:300" alt="...">
		    </div>
		  <?php } } ?>
		  </div>
	
		</div>
	</div>
</div>