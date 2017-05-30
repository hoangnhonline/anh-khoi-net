<div class="container">
	<h4 class="link-cate"> <a href="index.php">Trang chủ</a> 		
		<span class="glyphicon glyphicon-menu-right"></span> 
		Liên hệ</h4>
</div>
</div>
<div class="container">
	<h1 class="new-title-detail" style="margin-top:0px">
				Liên hệ
			</h1>
			 <form action='ajax/contact.php' method="post" id="contactForm">
		<div class="col-md-12" style="padding:0px">
			<div class="col-md-6 " style="padding:0px">
				<h1 style="    font-size: 25px;    padding-bottom: 10px;    border-bottom: 1px solid #ebebeb;    margin-bottom: 20px;">Gửi câu hỏi đến chúng tôi</h1>
				<div class="col-md-6 " style="padding:0px;padding-right:10px">
					<div class="form-group">
						<input class="form-control" placeholder="Họ tên" aria-required="true" required="required" name="full_name" id="full_name" aria-required="true" required="required" />						
					</div>
				</div>
				<div class="col-md-6 " style="padding:0px">
					<div class="form-group">
						<input class="form-control" placeholder="Email" name="email" id="email" aria-required="true" required="required"/>							
					</div>
				</div>
				<div class="col-md-12 " style="padding:0px">
					<div class="form-group">
						<input class="form-control" placeholder="Địa chỉ" name="address" id="address"/>							
					</div>
				</div>
				<div class="col-md-12 " style="padding:0px">
					<div class="form-group">
						<input class="form-control" placeholder="Điện thoại" name="mobile" id="mobile"/>							
					</div>
				</div>
				<div class="col-md-12 " style="padding:0px">
					<div class="form-group">
						<input class="form-control" placeholder="Tiêu đề" name="title" id="title" aria-required="true" required="required"/>							
					</div>
				</div>
				<div class="col-md-12 " style="padding:0px">
					<div class="form-group">
						<textarea class="form-control" placeholder="Nội dung" rows="10"  name="content" id="content" aria-required="true" required="required"></textarea>
					</div>
				</div>
				<div class="col-md-12 " style="padding:0px">
					<button class="btn btn-primary">Gửi</button>
				</div>


			</div>		
			<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.7104643815555!2d106.6157863!3d10.8334552!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bcd0abdb413%3A0x5683a8035c5816a7!2zQ8OUTkcgVFkgVE5ISCBUTSBDw5RORyBOR0jhu4YgQU5IIEtIw5RJ!5e0!3m2!1svi!2s!4v1449740819351" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			
		</div>
			</form> 
	</div>			
</div>

<style type="text/css">
label.error{
	color:red !important;
	font-style: italic;
}
</style>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweet.css">
<script type="text/javascript" src="js/sweet.js"></script>

<script type="text/javascript">
  $(function(){
    $('#contactForm').validate();
    $('#contactForm').ajaxForm({
            beforeSend: function() {                
            },
            uploadProgress: function(event, position, total, percentComplete) {              
            },
            complete: function(data) {  
              console.log(data);
              if($.trim(data.responseText)=='success'){           
                swal({   
                  title: "OK",   
                  text: "Gửi thông tin liên hệ thành công",   
                  type: "success",                
                  confirmButtonText: "OK",  
                   closeOnConfirm: false }, 
                   function(){   
                    window.location.reload();
                  });
                
              }else{    
                  swal('Error','Có lỗi xảy ra!','error');
                  $('#btnReset').click();
              }
            }
        });
    });
</script>
