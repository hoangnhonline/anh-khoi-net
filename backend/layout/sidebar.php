<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo STATIC_URL; ?>img/avatar3.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, <?php echo $_SESSION['full_name']; ?></p>  
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <?php if($model->checkprivilege(11)){ ?>
        <li>
            <a href="<?php echo BASE_URL; ?>product&act=list">
                <i class="fa fa-th"></i> <span>Sản phẩm</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
        </li> 
        <?php } ?>
         <li>
            <a href="<?php echo BASE_URL; ?>articles&act=list">
                <i class="fa fa-th"></i> <span>Tin tức</span> <!--<small class="badge pull-right bg-green">new</small>-->
            </a>
        </li>   
        <?php if($model->checkprivilege(1)){ ?>
        <li class="active">
            <a href="<?php echo BASE_URL; ?>catetype&act=list">
                <i class="fa fa-th"></i> <span>Danh mục cha</span>
            </a>
        </li> 
        <?php } ?>
        <?php if($model->checkprivilege(5)){ ?>
        <li class="active">
            <a href="<?php echo BASE_URL; ?>cate&act=list&cate_type_id=2">
                <i class="fa fa-th"></i> <span>Danh mục con</span>
            </a>
        </li>  
        <?php } ?>
         <li>
            <a href="<?php echo BASE_URL; ?>page&act=list">
                <i class="fa fa-th"></i> <span>Trang nội dung</span> <!--<small class="badge pull-right bg-green">new</small>-->
            </a>
        </li>               

         <li>
            <a href="<?php echo BASE_URL; ?>contact&act=list">
                <i class="fa fa-th"></i> <span>Khách hàng liên hệ</span> <!--<small class="badge pull-right bg-green">new</small>-->
            </a>
        </li>
                    
      
           
        <li class="treeview <?php if(in_array($mod,array('banner','city','state','promotion_code','block','text','seo'))) echo "active"; ?>" >

            <a href="#">
                <i class="fa fa-edit"></i> <span>Quản lý chung</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="index.php?mod=banner&act=list&position_id=1"><i class="fa fa-angle-double-right"></i> Banner</a></li>
                <li><a href="<?php echo BASE_URL; ?>block&act=list"><i class="fa fa-angle-double-right"></i> Block footer</a></li>
                <li><a href="<?php echo BASE_URL; ?>text&act=list"><i class="fa fa-angle-double-right"></i> Text</a></li>
                <li><a href="<?php echo BASE_URL; ?>seo&act=list"><i class="fa fa-angle-double-right"></i> SEO</a></li>
            </ul>
        </li>
          
    </ul>
</section>
<!-- /.sidebar -->