var ontario_cities=new Array('Ottawa','Toronto','Waterloo');
var quebec_cities=new Array('Montreal','Gatineu','Quebec City');

	$(document).ready(function(){
		
		 $("#address_province").change(function(){
			let province = $(this).children('option:selected').val();
			$("#address_city").empty();
			if(province=="Ontario"){
				//alert(province);
				$("#address_city").append("<option disabled='disabled' selected='selected'>Please select</option>");
				for(let i=0;i<ontario_cities.length;i++){
					$("#address_city").append("<option>"+ontario_cities[i]+"</option>");
				}
			}else if(province=="Quebec"){
				$("#address_city").append("<option disabled='disabled' selected='selected'>Please select</option>");
				for(let i=0;i<quebec_cities.length;i++){
					$("#address_city").append("<option>"+quebec_cities[i]+"</option>");
				}
			}
		 })
		
		$("input").focus(function(){
			$(this).css("background-color","#FFFFCC");
			$("input").css("border-color","");
			$("select").css("border-color","");
			$("#house_title_feedback").text("");
			$("#house_type_feedback").text("");
			$("#address_province_feedback").text("");
			$("#address_city_feedback").text("");
			$("#address_street_feedback").text("");
			$("#postal_code_feedback").text("");
		})
		
		$("select").click(function(){
			$(this).css("background-color","#FFFFCC");
			$("input").css("border-color","");
			$("select").css("border-color","");
			$("#house_title_feedback").text("");
			$("#house_type_feedback").text("");
			$("#address_province_feedback").text("");
			$("#address_city_feedback").text("");
			$("#address_street_feedback").text("");
			$("#postal_code_feedback").text("");
		})
		
		$("input").blur(function(){
			$(this).css("background-color","");
		})
		
		$("textarea").focus(function(){
			$(this).css("background-color","#FFFFCC");
		})
		$("textarea").blur(function(){
			$(this).css("background-color","");
		})
		 
		$("#num_bed").popover({trigger:'focus'});
		
		$("#num_bath").popover({trigger:'focus'}); 
		
		$("#num_park").popover({trigger:'focus'});
		
		$("#house_price").popover({trigger:'focus'});
		
		$("#house_size").popover({trigger:'focus'});
		
		$("#address_city").change(function(){
			alert($(this).children('option:selected').val());
		})
		
		$('#move_in_date').datepicker({
		      autoclose: true
		  });

		 $('#submit_house').click(function(){
			//house overview info
			let h_title = $("#house_title").val();
			let h_type = $("#house_type").val();
			let h_beds = $("#num_bed").val();
			let h_baths = $("#num_bath").val();
			let h_parkings = $("#num_park").val();
			let h_price = $("#house_price").val();
			let h_agreementType = $("#agreement_type").val();
			let h_moveindate = $("#move_in_date").val();
			let h_proimg_file = $("#house_profile")[0].files[0];
			let h_proimg = '';
			//alert("len="+$("#house_profile").length);
			if(h_proimg_file){
				//alert("house profile");
				h_proimg = h_proimg_file.name;
		        //form_data.append("h_proimg",h_proimg_file);
			}
			let h_video_file = $("#house_video")[0].files[0];
			let h_video = '';
			//alert("len="+$("#house_video").length);
			if(h_video_file){
				//alert("house video");
				h_video = h_video_file.name;
				//form_data.append("h_video",h_video_file);
			}
			let h_pets = $("input[name='pets_allow']:checked").val();
			let h_desc = $("#house_desc").val();
			let h_province = $("#address_province").val();
			let h_city = $("#address_city").val();
			let h_street = $("#address_street").val();
			let h_postalcode = $("#postal_code").val();
			 
			let utilities=new Array();
			let facilities = new Array();
			let h_size;
			let h_smoking;
			let appliances = new Array();
			let amenities = new Array();
			let outdoor = new Array();
			
			//alert("Submit "+h_type);
			 //get utilities setting
			$("input[name='utility']:checked").each(function(){
				let offeredUtilited = $(this).val();
				utilities.push(offeredUtilited);
			})
			 
			 //get facilities setting
			h_size=$("#house_size").val();
			$("input[name='facilities']:checked").each(function(){
				let offeredFacilities = $(this).val();
				facilities.push(offeredFacilities);
			})
			h_smoking=$("#HF_SmokePermission").val();
			 
			 //get appliances setting
			$("input[name='appliances']:checked").each(function(){
				 let offeredAppliances = $(this).val();
				 appliances.push(offeredAppliances);
			})
			 
			 //get amenities setting
			$("input[name='amenities']:checked").each(function(){
				let offeredAmenities = $(this).val();
				amenities.push(offeredAmenities);
			})
			 
			  //get outdoor setting
			$("input[name='outdoor']:checked").each(function(){
				let offeredOutdoor = $(this).val();
				outdoor.push(offeredOutdoor);
			})
			
			if(h_title==""||h_type==null||h_province==null||h_city==null||h_city==""||h_street==""||h_postalcode==""){
				showAlertInfo("Notice","Please provide required(*) information","failed");
				if(h_title==""){
					$("#house_title").css("border-color","red");
					$("#house_title_feedback").text("House title cannot be empty");
				}
				if(h_province==null){
					$("#address_province").css("border-color","red");
					$("#address_province_feedback").text("House province should be specified");
				}
				if(h_type==null){
					$("#house_type").css("border-color","red");
					$("#house_type_feedback").text("House type should be specified");
				}
				if(h_city==null||h_city==""){
					$("#address_city").css("border-color","red");
					$("#address_city_feedback").text("House city should be specified");
				}
				if(h_street==""){
					$("#address_street").css("border-color","red");
					$("#address_street_feedback").text("House street should be specified");
				}
				if(h_postalcode==""){
					$("#postal_code").css("border-color","red");
					$("#postal_code_feedback").text("House post code should be specified");
				}
				
			}else{
				let form_data = new FormData();
				form_data.append("h_title",h_title);
				form_data.append("h_type",h_type);
				form_data.append("h_beds",h_beds);
				form_data.append("h_baths",h_baths);
				form_data.append("h_parkings",h_parkings);
				form_data.append("h_pets",h_pets);
				form_data.append("h_price",h_price);
				form_data.append("h_agreementType",h_agreementType);
				form_data.append("h_moveindate",h_moveindate);
				form_data.append("h_proimg",h_proimg);
				form_data.append("h_video",h_video);
				form_data.append("h_desc",h_desc);
				form_data.append("h_province",h_province);
				form_data.append("h_city",h_city);
				form_data.append("h_street",h_street);
				form_data.append("h_size",h_size);
				form_data.append("h_smoking",h_smoking);
				form_data.append("h_postalcode",h_postalcode);
				form_data.append("utilities",utilities);
				form_data.append("facilities",facilities);
				form_data.append("appliances",appliances);
				form_data.append("amenities",amenities);
				form_data.append("outdoor",outdoor);
				form_data.append("h_proimg_file",h_proimg_file);
				form_data.append("h_video_file",h_video_file);
				$.ajax({
					url:"http://localhost/rent_company/Houses/postHouse/",
					type:"POST",
					data:form_data,
					cache:false,
					processData:false,
					contentType: false,
					success:function(response){
						showAlertInfo("Success","Post new house successfully","success");
						setTimeout(function(){location.href = "http://localhost/rent_company/shops/homeMain";},3000); 
					}
				})
			}
			
		 })
		
		 
		 $("#cancel_house").click(function(){

		 })
		 
		 function showAlertInfo(title,content,type){
			 $("#banner_type").text(title);
    		 $("#banner_message").text(content);

    		 $("#snackbar").attr('class', 'show');
    		 $("#snackbar").addClass(type);

			 setTimeout(function(){ $("#snackbar").attr('class', ''); }, 3000);
		}
	})