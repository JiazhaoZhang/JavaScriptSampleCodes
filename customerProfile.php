<?php 
if(!isset($_SESSION['userpic'])||empty($_SESSION['userpic'])){
    $imgPath= URLROOT.'/public/customer/default/logo.jpg';
    //echo "img = ".$_SESSION['userpic'];
}else{
    //echo "file name =: ".$_SESSION['userpic'];
    $imgPath=$_SESSION['userpic'];
}
echo "<script type='text/javascript'> var pro_img_path = '".$_SESSION['userpic']."'; </script>";
?>
/*This web page is for customer profile where customers can update their personal information, subscribe shops, track their orders*/
<html>
	<head>
		<meta charset='utf-8'>
		<title>Customer Portal</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
		<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/shop/css/style.css">
	</head>
	<body>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-3">
				<h2 class="page-header">Profile</h2>
			</div>
			<div class="col-md-9">
				<h2 class="page-header">Main Content</h2>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<img alt="NO IMG" src="<?php echo $imgPath; ?>" style="height: 100px;width:100px;" id="profile_img"/><br/><br/>
				<input type="file" id='change_profile_img' /><br/><br/>
				<button id='upload_img' class="btn btn-primary">Upload Image</button><br/><br/>
				<!-- <button id='testbtn' class="btn btn-primary" name="test_btn">Test Button</button><br/><br/> -->
				<!--  <a href="#">Test Link</a> -->
				<a href="<?php echo URLROOT?>/customers/logout" class="btn btn-primary" >Log Out</a><br/><br/>
				<a href="<?php echo URLROOT?>" class="btn btn-primary" >Back to Homepage</a><br/><br/>
			</div>
			<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified" id='cus_info_tabs'>
					<li class="nav-item"><a class="nav-link active" href="#notice_board" data-toggle="tab" >Notice board</a></li>
					<li class="nav-item"><a class="nav-link" href="#personal_info" data-toggle="tab" >Personal Information</a></li>
					<li class="nav-item"><a class="nav-link" href="#sub_shop" data-toggle="tab" >My Subscribed Shops</a></li>
					<li class="nav-item"><a class="nav-link" href="#other" data-toggle="tab" >Other</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active " id="notice_board">
					<br/>
						This is notice board
					</div>
					<div class="tab-pane " id="personal_info">
						<br/>
						<label>Username &nbsp;:&nbsp;</label><span id="u_nm"></span><br/>
						<label>Email &nbsp;:&nbsp;</label><span id="c_email"></span><br/>
						<label>Firstname &nbsp;:&nbsp;</label><span id="c_fnm"></span><br/>
						<label>LastName &nbsp;:&nbsp;</label><span id="c_lnm"></span><br/>
						<label>Address &nbsp;:&nbsp;</label><span id="c_addr"></span><br/><br/>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit_personal_info_modal">Edit Your Personal Information</a><br/><br/>
						
						<div class="modal fade" id="edit_personal_info_modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Edit Your Personal Information</h3>
									<button class="close" data-dismiss='modal'>&times;</button>
									</div>
									<div class="modal-body">
										<label style="margin-top: 5px;"><strong>Email &nbsp;:&nbsp;</strong></label><input type="text" id="edit_email" /><br/>
										<label style="margin-top: 5px;"><strong>Firstname &nbsp;:&nbsp;</strong></label><input type="text" id="edit_firstname" /><br/>
										<label style="margin-top: 5px;"><strong>LastName &nbsp;:&nbsp;</strong></label><input type="text" id="edit_lastname" /><br/>
										<label style="margin-top: 5px;"><strong>Address &nbsp;:&nbsp;</strong></label><input type="text" id="edit_address" /><br/>
									</div>
									<div class="modal-footer">
									<button class="btn btn-primary" id="submit_edit_personal_info">Submit</button>&nbsp;&nbsp;
									<button data-dismiss='modal' class="btn btn-primary">Cancel</button>
									</div>
								</div>
							</div>
						</div>
						
						<form action="#" method="post">
							<label>Old Password &nbsp;:&nbsp;</label><input type="password" id="old_passwd"><br/>
							<label>New Password &nbsp;:&nbsp;</label><input type="password" id="passwd"><br/>
							<label>Re-enter New Password &nbsp;:&nbsp;</label><input type="password" id="re_passwd"><br/>
							<input type="button" id="confirm_passwd" value="Confirm" class="btn btn-primary"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="reset" value="Reset" class="btn btn-primary"/>
						</form>
					</div>
					<div class="tab-pane " id="sub_shop">
						<br/>
						<table id='subscribed_shops' class="table" style="text-align: center;">
							<thead><th>Shop Name</th><th>Operations</th></thead>
							<tbody>				
							</tbody>
						</table>
					</div>
					<div class="tab-pane " id="other">
					<br/>
						This is other
					</div>
			</div>
			</div>
		</div>
		
	</div>
	
	<!-- a self-defined window for notifying sucessful changes -->
	<div id="snackbar" style="z-index: 9999;" ><strong id="banner_type"></strong><p id="banner_message"></p></div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){

			var subscribedShops = new Array();
			
			$("#cus_info_tabs a").click(function(){
				
				//load customer personal information to personal information tab
				if($(this).attr("href")=="#personal_info"){
					$.ajax({
						url:"http://localhost/rent_company/customers/getCustomerInfoByUuid",
						success:function(response){
							let customer=$.parseJSON(response);
							//alert(response);
							//alert(customer.U_Nm);
							$("#u_nm").html(customer.U_Nm);
							$("#c_email").html(customer.C_Email);
							$("#c_fnm").html(customer.C_Fnm);
							$("#c_lnm").html(customer.C_Lnm);
							$("#c_addr").html(customer.C_Address);
							$("#edit_email").attr("value",customer.C_Email);
							$("#edit_firstname").attr("value",customer.C_Fnm);
							$("#edit_lastname").attr("value",customer.C_Lnm);
							$("#edit_address").attr("value",customer.C_Address);
						},
						error:function(){
							alert('error');
						}
					})
				}else if($(this).attr("href")=="#sub_shop"){  //load information about shops a customer subscribe to
					//alert($(this).attr("href")+"hhahaha");
					$.ajax({
						url:"http://localhost/rent_company/customers/getAllSubscribedShops",
						success:function(response){
							//alert(response);
							let shops = $.parseJSON(response);
							//alert('length='+shops.length);
							//alert(shops[0].SH_Name);
							$("#sub_shop tbody").empty();
							for(var i=0;i<shops.length;i++){
								operation_btns="<input type='button' class='btn btn-primary' id='btn-" +shops[i].SH_Name+"' value='unsubscribe' />&nbsp;&nbsp;<input type='button' class='btn btn-primary' value='mute_notification' />";
								//$("input[value='unsubscribe']").on("click",unsubscribeShops);
								subscribedShops[shops[i].SH_Name]=shops[i].SH_Uuid;
								$("#sub_shop tbody").append("<tr><td>"+shops[i].SH_Name+"</td><td>"+operation_btns+"</td></tr>");
							}
							$("input[value='unsubscribe']").on("click",sub_unsubShops);
							$("#subscribed_shops").dataTable();
						},
						error:function(){
							alert('error');
						}
					})
				}
			});

			$("#confirm_passwd").click(function(){

				if($("#passwd").val()==$("#re_passwd").val()&&$("#passwd").val()!=""&&$("#old_passwd").val()!=""){
					let old_passwd = $("#old_passwd").val();
					let new_passwd = $("#re_passwd").val();
					api_url = "http://localhost/rent_company/Customers/resetPasswordInPortal/"+old_passwd+"/"+new_passwd;
					$.ajax({
						url:api_url,
						success:function(response){
							//alert(response);
							if(response=='Password Updated'){
								showAlertInfo('Successful!',response,'success');
							}else{
								showAlertInfo('Failed!',response,'failed');
							}
						},
						error:function(){showAlertInfo('Failed!','Cannot Connect to Server','failed');}						
					})
				}else{
					//alert("Invalid Password");
					showAlertInfo('Failed','Invalid input','failed');
				}
			})

			$("#upload_img").click(function(){
				let uploaded_img =$("#change_profile_img")[0].files[0];
				let img_ext = uploaded_img.name.split(".").pop().toLowerCase();
				let valid_file_type=["jpg","jpeg","png","gif"];
				//alert("Filename = "+uploaded_img.name);
				//alert("Filesize = "+uploaded_img.size);
				//alert("Fileext = "+img_ext);
				if(jQuery.inArray(img_ext,valid_file_type)==-1||uploaded_img.size>100000){
					$("#change_profile_img").empty();
					$("#change_profile_img").val("");
					//alert("Invalid image file");
					showAlertInfo('Failed!',"Invalid image file",'failed');
				}else{
					let form_data = new FormData();
					form_data.append("img_file",uploaded_img);
					//alert('Img can be used');
					$.ajax({
						url:"http://localhost/rent_company/Customers/uploadProfileImg",
						method:"POST",
						data:form_data,
						contentType:false,
						cache:false,
						processData:false,
						success:function(response){
							//alert(response);
							pro_img_path = response.split("&").pop();
							//alert(pro_img_path);
							$("#profile_img").attr("src",pro_img_path);
							$("#change_profile_img").empty();
							$("#change_profile_img").val("");
						},
						error:function(){
							showAlertInfo('Failed!',"Failed to connect server",'failed');
						}
					});	
				}
			})
			
			$("#submit_edit_personal_info").click(function(){
				//alert("submit edition");
				c_email = $("#edit_email").val();
				c_fnm = $("#edit_firstname").val();
				c_lnm = $("#edit_lastname").val();
				c_addr = $("#edit_address").val();
				$.ajax({
					url:"http://localhost/rent_company/Customers/updateCustomerInfo/"+c_email+"/"+c_fnm+"/"+c_lnm+"/"+c_addr,
					success:function(response){
						if(jQuery.parseJSON(response)){
							showAlertInfo('Success','Updated information successfully','success');
						}else{
							showAlertInfo('Failed','Failed to update your personal information','failed');
						}
						$("#cus_info_tabs a[href='#personal_info']").trigger('click');
					},
					error:function(){showAlertInfo('Failed','Unable to connect server','failed');}
				})
			})
			
			//a function for dealing with subscribing or unsubscribing a shop
			function sub_unsubShops(){
				let shop_name = $(this).parent().prev().html();
				let shop_uuid = subscribedShops[shop_name];
				var isSub_Unsub = false;
				//alert('Shop is '+shop_name);
				//$(this).attr('value','subscribe');
				if($(this).attr("value")=='unsubscribe'){
					//alert('unsubscribe shop : '+shop_name+' UUID = '+shop_uuid);					
					$.post("<?php echo URLROOT ?>/customers/connectShop/", //url for controller and function
							{shop_uuid: shop_uuid, connect: false},         //data to be posted
							function (response, status){
								if(jQuery.parseJSON(response).isDone){
									showAlertInfo('Success','Unsubscribe successfully','success');
									$("input[id='btn-"+shop_name+"']").attr("value","subscribe");
								}else{showAlertInfo('Failed','Failed to unsubscribe','failed');}
							}					
					);
				}else if($(this).attr("value")=='subscribe'){
					//alert('subscribe shop : '+shop_name+' UUID = '+shop_uuid);
					$.post("<?php echo URLROOT ?>/customers/connectShop/", //url for controller and function
							{shop_uuid: shop_uuid, connect: true},         //data to be posted
							function (response, status){
								if(jQuery.parseJSON(response).isDone){
									showAlertInfo('Success','Subscribe successfully','success');
									$("input[id='btn-"+shop_name+"']").attr("value","unsubscribe");
								}
								 else{showAlertInfo('Failed','Failed to subscribe','failed');}
							}
					);	
				}
			}

			function showAlertInfo(title,content,type){
				 $("#banner_type").text(title);
	    		 $("#banner_message").text(content);

	    		 $("#snackbar").attr('class', 'show');
	    		 $("#snackbar").addClass(type);

				 setTimeout(function(){ $("#snackbar").attr('class', ''); }, 3000);
			}

		})
	</script>
	</body>
</html>