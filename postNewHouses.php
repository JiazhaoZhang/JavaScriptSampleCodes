<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent Company | Post House</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/resources/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/resources/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="<?php echo URLROOT; ?>/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/shop/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        input[type='checkbox']{
            vertical-align: text-top;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!--    header   navbar and sidebar include  -->
    <?php require APPROOT . '/views/inc/employee/hearder.php'; ?>
    <!--    end of header     -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Post Your House
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo URLROOT ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo URLROOT; ?>/employees/main"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Post House</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<!-- Content of house overview -->
           <div class="box box-primary">
           		<div class="box-header with-border"><strong>House Overview</strong></div>
           		<div class="box-body">
           			<div class="row">
           				<div class="col-md-6">
               				<div class="form-group">
               					<label>House Title : <span style="color: red">*</span></label>
               					<input type="text" class="form-control" id="house_title" data-content="please give the title of your house" data-placement="top" />
               					<span style="color: red;" id="house_title_feedback"></span>
               				</div>
               				<div class="form-group">
               					<label>House Type : </label><span style="color: red">*</span>
               					<select class="form-control" id="house_type" data-content="please give the type of your house" data-placement="top" >
               						<option selected="selected" disabled="disabled">Please Select</option>
               						<option value=1 >Condo</option>
               						<option value=2>Apartment</option>
               						<option value=3>Bungalow</option>
               						<option value=4>Townhouse</option>
               						<option value=5>Single House</option>
               					</select>
               					<span style="color: red;" id="house_type_feedback"></span>
               				</div>
               				<div class="row">
               					<div class="col-md-4">
                       				<div class="form-group">
                       					<label>Number of bedroom : </label>
                       					<input type="text" class="form-control" id="num_bed" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" data-content="only numbers" data-placement="top" />
                       				</div>
                   				</div>
                   				<div class="col-md-4">
                       				<div class="form-group">
                       					<label>Number of bathrooms : </label>
                       					<input type="text" class="form-control" id="num_bath" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" data-content="only numbers" data-placement="top" />
                       				</div>
                   				</div>
                   				<div class="col-md-4">
                       				<div class="form-group">
                       					<label>Number of Parking : </label>
                       					<input type="text" class="form-control" id="num_park" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" data-content="only numbers" data-placement="top" />
                       				</div>
                   				</div>
                   			</div>
                   			<div class="form-group">
               					<label>Monthly rent: </label>
               					<input type="text" class="form-control" id="house_price" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" data-content="only numbers" data-placement="top" />
               				</div>
           				</div>
           				<div class="col-md-6">
               				<div class="form-group">
               					<label>Agreement type</label>
               					<input type="text" class="form-control" id="agreement_type" />
               				</div>
               				<div class="form-group">
               					<label>Move in date</label>
               					<div class="input-group date">
               						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
               						<input type="text" class="form-control pull-right" id="move_in_date"/>
               					</div>
               				</div>
               				<div class="form-group">
               					<label>Upload house profile</label>
               					<input type="file" class="form-control" id="house_profile" />
               				</div>
               				<div class="form-group">
               					<label>Upload house video</label>
               					<input type="file" class="form-control" id="house_video" />
               				</div><br/>
               				<div class="form-group">
               					<label>Pets friendly &nbsp;</label><input type="checkbox" name="pets_allow" value=1 />
               				</div>
           				</div>
           			</div>
				</div>
           		<div class="box-footer">This is the footer of house Overview</div>
           </div>
           <!-- /.end of content of house overview-->
           
           
           <div class="row">
            <!-- content house address detail-->
               <div class="col-md-6">
                   <div class="box box-primary">
                   		<div class="box-header with-border"><strong>House Address Detail</strong><span style="color: red">*</span></div>
                       	<div class="box-body">
                           	<label>Province : </label>
                           	<select class="form-control" id="address_province" data-content="please give the province of your house" data-placement="top" >
               					<option disabled="diasabled" selected="selected">Please select</option>
               					<option>Ontario</option>
               					<option>British Columbia</option>
               					<option>Quebec</option>
               					<option>Alberta</option>
               					<option>Manitoba</option>
               				</select>
               				<span style="color: red;" id="address_province_feedback"></span><br/>
							<label>City : </label>
                           	<select class="form-control" id="address_city" data-content="please give the city of your house" data-placement="top" >
                           	</select>
                           	<span style="color: red;" id="address_city_feedback"></span><br/>
                            <label>Street address : </label>
                            <input type="text" class="form-control" id="address_street" data-content="please give the street of your house" data-placement="top" />
                            <span style="color: red;" id="address_street_feedback"></span><br/>
                            <label>Postal code : </label>
                            <input type="text" class="form-control" id="postal_code" data-content="please give the postal code of your house" data-placement="top" />
                       		<span style="color: red;" id="postal_code_feedback"></span><br/>
                       	</div>
                       	<div class="box-footer">This is the footer of house Address</div>   	
                   </div>
                   <div class="box box-primary">
                   	<div class="box-header with-border"><strong>Descript Your House</strong></div>
                   	<div class="box-body">
                   		<textarea class="form-control" rows="5" id="house_desc"></textarea>
                   	</div>
                    </div>
                   	<div class="box box-primary">
            			<div class="box-body">
            				<button class="btn btn-primary" id="submit_house">Submit</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-warning" id="cancel_house">Cancel</button>
            			</div>
            		</div>
               </div>
            <!-- /.end of content of address -->
            <!-- content house condition-->
            	<div class="col-md-6">
            		<div class="box box-primary">
            			<div class="box-header with-border"><strong>House Condition</strong></div>
            			<div class="box-body">
            				<label>Utility : </label>
            				<div class="form-group">
            					<span>Hydro</span>&nbsp;<input type="checkbox" name="utility" value="HU_Hydro" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Heat</span>&nbsp;<input type="checkbox" name="utility" value="HU_Heat" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Water</span>&nbsp;<input type="checkbox" name="utility" value="HU_Water" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>television</span>&nbsp;<input type="checkbox" name="utility" value="HU_TV" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Internet</span>&nbsp;<input type="checkbox" name="utility" value="HU_Internet" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Landline</span>&nbsp;<input type="checkbox" name="utility" value="HU_Landline" />&nbsp;&nbsp;&nbsp;&nbsp;
            				</div>
            				<div class="form-group">
                				<label>Size : </label>
                				<input type="text" class="form-control" id="house_size" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" data-content="only numbers" data-placement="top" />
            				</div>
            				<label>Facilities: </label>
            				<div class="form-group">
            					<span>Furniture</span>&nbsp;<input type="checkbox" name="facilities" value="HF_Furnished" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Air Conditioning</span>&nbsp;<input type="checkbox" name="facilities" value="HF_AirConditioning" />&nbsp;&nbsp;&nbsp;&nbsp;
            					
            				</div>
            				<label>Appliances: </label>
            				<div class="form-group">
            					<span>Laundry in unit</span>&nbsp;<input type="checkbox" name="appliances" value="HA_LaundaryInUnit" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Laundry in Building</span>&nbsp;<input type="checkbox" name="appliances" value="HA_LaundaryInBuilding" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Dishwasher</span>&nbsp;<input type="checkbox" name="appliances" value="HA_DishWasher" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Fridge</span>&nbsp;<input type="checkbox" name="appliances" value="HA_Fridge" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Microwave</span>&nbsp;<input type="checkbox" name="appliances" value="HA_Microwave" />&nbsp;&nbsp;&nbsp;&nbsp;
            				</div>
            				<label>Amenities : </label>
            				<div class="form-group">
            					<span>Gym</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Gym" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Pool</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Pool" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Sauna</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Sauna" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Yoga room</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_YogaRoom" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Theatre</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Theatre" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Game room</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_GameRoom" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Party room</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_PartyRoom" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Conceige</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Conciege" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>24-hour security</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_24Security" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Bicycle Parking</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_BikeParking" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Storage Locker</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_StorageLocker" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Elevator</span>&nbsp;<input type="checkbox" name="amenities" value="HBA_Elevator" />&nbsp;&nbsp;&nbsp;&nbsp;
            				</div>
            				<label>Outdoor space : </label>
            				<div class="form-group">
            					<span>Yard</span>&nbsp;<input type="checkbox" name="outdoor" value="HOD_Yard" />&nbsp;&nbsp;&nbsp;&nbsp;
            					<span>Balcony</span>&nbsp;<input type="checkbox" name="outdoor" value="HOD_Balcony" />&nbsp;&nbsp;&nbsp;&nbsp;
            				</div>
            				<div class="form-group">
            					<label>Allow Smoking ?</label>
            					<select class="form-control" id="HF_SmokePermission">
            						<option>Not allow smoking</option>
            						<option>Allow smoking</option>
            						<option>Only allow smoking in outdoor space</option>
            					</select>
            				</div>
            			</div>
            		</div>
            	</div>
           </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <!--    footer -->
    <footer class="main-footer">
        <?php require APPROOT . '/views/inc/employee/footer.php'; ?>
    </footer>

    <!-- Control Sidebar -->
    <?php require APPROOT . '/views/inc/employee/control_sidebar.php'; ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- a self-defined window for notifying sucessful changes -->
	<div id="snackbar" style="z-index: 9999;" ><strong id="banner_type"></strong><p id="banner_message"></p></div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo URLROOT; ?>/resources/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo URLROOT; ?>/resources/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo URLROOT; ?>/resources/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo URLROOT; ?>/resources/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URLROOT; ?>/resources/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URLROOT; ?>/resources/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URLROOT; ?>/resources/dist/js/demo.js"></script>
<script src="<?php echo URLROOT; ?>/public/resources/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo URLROOT; ?>/public/shop/js/post_house.js"></script>

</body>
</html>
