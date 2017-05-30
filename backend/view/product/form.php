<?php 
require_once "model/Backend.php";
$model = new Backend;

$cateTypeArr = $model->getListCateType();
$manuArr = $model->getListManu();
$ageArr = $model->getListAge();

$back_url = "index.php?mod=product&act=list";
$detail = $arrCateTypeId = $arrCateId = $data = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $detail = $model->getDetailProduct($id);   
    $data = $detail['data'];          
}
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='<?php echo $back_url; ?>'">Back</button>
        <form method="post"  action="controller/Product.php">

        <div class="col-md-6">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> sản phẩm <?php echo (isset($id) && $id> 0) ? " : ".$data['product_name'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>

                <input type="hidden" value="<?php echo $id; ?>" name="product_id" />

                <?php } ?>

            </div><!-- /.box-header -->

            <div class="nav-tabs-custom">

                <div class="button">

                    <div class="row">

                        <div class="col-md-12" >
                            <!--
                            <div class="form-group">
                                <label>Mã sản phẩm <span class="required"> ( * ) </span></label>
                                <input type="text" name="product_code" id="product_code" class="form-control" value="<?php if(!empty($data)) echo $data['product_code']; ?>" />
                            </div>
                            -->
                            <div class="form-group">
                                <label>Tên sản phẩm <span class="required"> ( * ) </span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control" value="<?php if(!empty($data)) echo $data['product_name']; ?>" />
                            </div>                            
                            <input type="hidden" name="name_en" id="name_en" class="form-control" value="<?php if(!empty($data)) echo $data['name_en']; ?>" />
                           
                            <div class="form-group">
                                <label>Danh mục cha<span class="required"> ( * ) </span></label>
                                <select class="form-control" name="cate_type_id" id="cate_type_id">
                                    <option value="0">--Chon--</option>
                                    <?php if(!empty($cateTypeArr)){                                        
                                    foreach($cateTypeArr as $cateType){ 

                                        ?>
                                    <option <?php if(($data['cate_type_id'] > 0) && $data['cate_type_id']==$cateType['id']) echo "selected"; ?> value="<?php echo $cateType['id']; ?>"><?php echo $cateType['cate_type_name']; ?></option>
                                    <?php } } ?>
                                </select>                                
                            </div>
                            <div class="form-group">
                                <label>Danh mục con<span class="required"> ( * ) </span></label>
                                <select class="form-control" name="cate_id" id="cate_id">
                                    <option value="0">--Chọn--</option>                                   
                                </select>                                
                            </div>
							
                                <div class="form-group">                                
                                    <input type="checkbox" name="is_cata" id="is_cata" value="1" <?php if(!empty($data['is_cata']) && $data['is_cata']==1) echo "checked"; ?> />
                                    <label style="color:blue">Giá Catalogue</label>
                                </div>
                            
							<div class="cleafix"></div>
                            <input type="hidden" name="manu_id" value="1">                           
                             <div class="form-group">
                                <label>Giá sản phẩm <span class="required"> ( * ) </span></label>
                                <input type="text" name="price" id="price" class="form-control required number" value="<?php if(isset($data['price']) && $data['price']>0){ echo number_format($data['price']); }else{ echo $data['price']; }?>" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</span></label>
                                <textarea name="description" id="description" class="form-control" rows="5"><?php if(!empty($data)) echo $data['description']; ?></textarea>
                            </div>
                            <!--
                            <div class="form-group">
                                <label>Thông tin bảo hành</span></label>
                                <textarea name="guarantee" id="guarantee" class="form-control" rows="5"><?php if(!empty($data)) echo $data['guarantee']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>VIDEO URL</label>
                                <input type="text" name="video_url" id="video_url" class="form-control" value="<?php if(!empty($data)) echo $data['video_url']; ?>" />
                            </div>
                            -->
                            <input type="hidden" name="trangthai" value="1">

                            <div class="col-md-6">
                                <div class="form-group">                                
                                    <input type="checkbox" name="is_new" id="is_new" value="1" <?php if(!empty($data['is_new']) && $data['is_new']==1) echo "checked"; ?> />
                                    <label style="color:blue">SP MỚI</label>
                                </div>
                            </div>  
                          
                            <div class="col-md-6">
                                <div class="form-group">                                
                                    <input type="checkbox" name="is_hot" id="is_hot" value="1" <?php if(!empty($data['is_hot']) && $data['is_hot']==1) echo "checked"; ?> />
                                    <label style="color:blue">HOT (hiện ra trang chủ)</label>
                                </div>
                            </div>              
                            <input type="hidden" name="hidden" value="0">
                        </div>                   
                    </div>               
                </div>
            </div><!-- nav-tabs-custom -->

        </div><!-- /.col -->

        <div class="col-md-6">

            <!-- Custom Tabs -->
            <div style="clear:both;margin-bottom:30px"></div>
            <div class="box-header">
                
            </div><!-- /.box-header -->            
            <div class="nav-tabs-custom" style="margin-top:30px" >
                <input type="hidden" name="size" value="">
                        <input type="hidden" name="color" value="">      
                <div class="button">
                    <div class="col-md-12" >
                        <h4 class="box-title">SEO information</h4>
                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="meta_title" id="meta_title" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_title']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta keyword</label>
                            <textarea name="meta_keyword" id="meta_keyword" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_keyword']; ?></textarea>
                        </div>
                    </div>        
                </div>  
                <div style="clear:both"></div>
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

        <div class="col-md-12 nav-tabs-custom">
            <div class="row">
                <div class="form-group col-md-12" style="padding-top:5px">
                    <label>Hình ảnh <span style="color:red">( Size : Hình vuông kích thước  >= 300 x 300px)</span></label>
                    <br /><button class="btn btn-primary" type="button" id="btnUpload" style="margin-bottom:10px">Upload</button>                       
                    <div id="load_hinh">
                        
                    </div>
                    <?php if(isset($detail['images']) && $detail['images']){ ?>
                    <div id="images_post">
                        <?php foreach ($detail['images'] as $v) { 
                            $checked = $v['url'] == $data['image_url'] ? "checked='checked'" :  "";
                            ?>
                        <div class="col-md-2 image_upload" id="img_<?php echo $v['image_id']; ?>">
                            <img src="../<?php echo $v['url']; ?>" width="150"><br />
                            <p style="width:70%;float:left;margin-top:10px">
                                <input type="radio" <?php echo $checked; ?> name="image_url" value="<?php echo $v['url']; ?>" id="daidien_<?php echo $v['image_id']; ?>" /> Ảnh đại diện
                            </p>
                            <p style="width:30%;float:left;text-align:right;margin-top:10px">
                                <span class="del_img" style="cursor:pointer" data-value="<?php echo $v['image_id']; ?>">Xóa</span>
                            </p>
                        </div>
                        <?php } ?>
                    </div>                
                    <?php } ?>                    
                </div>               
                
            </div>
           <div class="col-md-12">
                <div class="form-group">
                    <label>Chi tiết</span></label>
                    <textarea name="content" id="content" class="form-control" rows="7"><?php if(!empty($data)) echo $data['content']; ?></textarea>
                </div>
            </div>
            <div class="button">
                <button class="btn btn-primary btnSaves" type="submit" onclick="return validateData();">Save</button>
                <button class="btn btn-primary" type="button"  onclick="location.href='<?php echo $back_url; ?>'">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<script src="js/form.js" type="text/javascript"></script>
<div id="div_upload" style="display:none">
    <div id="loading" style="display:none"><img src="img/loading.gif" width="470" /></div>
    <form id="upload_images" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax.php">
        <div style="margin: auto;">               
            <!---<img src="img/add.jpg" id="add_images" width="32" align="right" />           -->
            <div class="clear"></div>  
            <div id="wrapper_input_files">
                <input type="file" name="images[]" /><br />                
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
            </div>    
            <?php if($detail){ ?>        
                <input type="hidden" name="is_update" value="1" />
            <?php } ?>
            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" id="btn_upload_images">Upload</button>            
        </div>
        
    </form>
</div>
<div style="display: none" id="box_uploadimages">
    <div class="upload_wrapper block_auto">
        <div class="note" style="text-align:center;">Nhấn <strong>Ctrl</strong> để chọn nhiều hình.</div>
        <form id="upload_files_new" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax/upload.php"> 
            <fieldset style="width: 100%; margin-bottom: 10px; height: 47px; padding: 5px;">
                <legend><b>&nbsp;&nbsp;Chọn hình từ máy tính&nbsp;&nbsp;</b></legend>
                <input style="border-radius:2px;" type="file" id="myfile" name="myfile[]" multiple />
                <div class="clear"></div>
                <div class="progress_upload" style="text-align: center;border: 1px solid;border-radius: 3px;position: relative;display: none;">
                    <div class="bar_upload" style="background-color: grey;border-radius: 1px;height: 13px;width: 0%;"></div >
                    <div class="percent_upload" style="color: #FFFFFF;left: 140px;position: absolute;top: 1px;">0%</div >
                </div>
            </fieldset>
        </form>
    </div>
</div>
<style type="text/css">
#percent_deal{color:red;}
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    border-bottom: none;
}
</style>
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="static/js/ajaxupload.js"></script>

<script type="text/javascript">
function validateData(){
    var flag = true;


    if(flag == true){
        var product_name = $('#product_name').val();
        
        var cate_type_id = $('.cate-parent:checked').length;
        var cate_id = $('.cate-child:checked').length;        
        var cate_id = $('#cate_id').val();
        var price = $('#price').val();
        var manu_id = $('#manu_id').val();             
        if(product_name == '' ){
            alert('Vui lòng nhập tên sản phẩm!');
            return false;           
                
        }
        
        if(price == ''){
            alert('Vui lòng nhập giá sản phẩm!');
            return false;           
                
        }
         if(cate_type_id == 'undefined' || cate_id == 'undefined'){
             alert('Vui lòng chọn danh mục!');
            return false;                
                
        }                   
    }
   
    return flag;
}
$(function(){        
    $('.datetime').datetimepicker({
         step:5,
         format:'d-m-Y H:i'
    });
    $('.cate-child').click(function(){
        if($(this).prop('checked') == true){            
            var parent_id = $(this).attr('data-parent');
            $('#cate-parent-' + parent_id).prop('checked',true);
        }
    });
    $('#product_name').blur(function(){
        if($('#meta_title').val()==''){
            $('#meta_title').val($(this).val());
        }
        if($('#meta_keyword').val()==''){
            $('#meta_keyword').val($(this).val());
        }
        if($('#meta_description').val()==''){
            $('#meta_description').val($(this).val());
        }        
        if($('#name_en').val()==''){
            $.ajax({
                url: "ajax/Ajax.php",
                type: "POST",       
                data: {
                    'action' : 'ten-kd',
                    'name' : $('#product_name').val()
                },
                success: function(data){                         
                    $('#name_en').val(data);
                }
            });
        }
    });
    //$('#price').number(true,0);    
   
    $('span.del_img').click(function(){
        var img_id = $(this).attr('data-value');
        if($("#daidien_" + img_id).is(":checked")){
            alert("Chọn ảnh khác làm ảnh đại diện trước khi xóa ảnh này.");
            return false;
        }else{
            if(confirm("Chắc chắn xóa ảnh này?")){ 
                $.ajax({
                    url: "controller/Delete.php",
                    type: "POST",
                    async: true,
                    data: {
                        'id' : img_id,
                        'mod' : 'images'
                    },
                    success: function(data){                    
                        $('#img_' + img_id).remove();  
                    }
                });
                    

            }else{
                return false;
            }
        }
   });    
   $('#upload_images').ajaxForm({
            beforeSend: function() {                
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('#loading').show();  
                $('#upload_images').hide();          
            },
            complete: function(res) { 
                var data  = JSON.parse(res.responseText);                             
                //window.location.reload();                                   
                $( "#div_upload" ).dialog('close');  
                $('#btnSaveImage').show();  
                $('#load_hinh').html(data.html);
                $('#load_hinh').append(data.str_image);
                $('#loading').hide();  
                $('#upload_images').show();          
            }
        }); 
        $("#btnUpload").click(function(){
            $("#div_upload" ).dialog({
                modal: true,
                title: 'Upload images',
                width: 500,
                draggable: true,
                resizable: false,
                position: "center middle"
            });
        });
        $("#add_images").click(function(){
            $( "#wrapper_input_files" ).append("<input type='file' name='images[]' /><br />");
        });
        $("#btnXoa").click(function(){
        if(confirm('Bạn có chắc chắn xóa ảnh bìa này ?')){
            $("#url_image_old, #url_image" ).val('');
            $('#imgHinh').attr('src','');
            }
        });
});

</script>
<script type="text/javascript">
function getCateByCateType(cate_type_id,action){
    $.ajax({
        url: "ajax/Ajax.php",
        type: "POST",
        async: true,
        data: {                             
            'action' : action,
            'cate_type_id' : cate_type_id
        },
        success: function(data){                                                    
            $('#cate_id').html(data);

            <?php if($data['cate_id'] > 0){ ?>
                 $('#cate_id').val(<?php echo $data['cate_id']; ?>);
            <?php } ?>
        }
    }); 
}

$(function(){
    $('#cate_type_id').change(function(){
        getCateByCateType($(this).val(),"get-cate-by-type-product");        
    });
    <?php if($data['cate_type_id'] > 0){ ?>
        getCateByCateType(<?php echo $data['cate_type_id']; ?>,"get-cate-by-type-product");        
    <?php } ?>
    $('#cate_id').change(function(){
        var parent_id = $(this).find('option:selected').attr('data-parent');
        $('#parent_cate').val(parent_id);        
    });
});

function split(val) {
    return val.split(/;\s*/);
}

function extractLast(term) {
    return split(term).pop();
}
function BrowseServer( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails').attr('src','../' + fileUrl).show();
}
</script>
<script type="text/javascript">
configEditor['height'] = 300;
var editor = CKEDITOR.replace( 'content',configEditor);     
</script>
