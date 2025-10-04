$(document).ready(function(){
var count=0; // to count blank fields

/*------------validation function-----------------*/
$(".submit_btn").click(function(event){
//fetching radio button by name
	var radio_check = $('.rad');
	
	//fetching all inputs with same class name text_field and an html tag textarea 
	var input_field = $('.text_field');
	var text_area = $('textarea');
	
	//validating radio button
	if(radio_check[0].checked== false && radio_check[1].checked== false){
	 var y = 0;
	}
	else{
	 var y = 1; 
	}
	
	//for loop to count blank inputs 
	for(var i=input_field.length;i>count;i--){
	if(input_field[i-1].value==''|| text_area.value=='')
		{
			count = count + 1;
		    
		}
	else{			
			count = 0;
		}
	}
	
	//Notifying validation 
		if(count!=0||y==0){
		
			alert("*All Fields are mandatory*");
			event.preventDefault();	
			}
			else{			
				return true;
			}
});

/*---------------------------------------------------------*/

$(".next_btn1").click(function(){           //Function runs on NEXT button click 
    if(validate_form1(this.id)){
        if(this.id != 'home-load-note' && this.id != 'post-requirement-other'){
            $(this).parent().next().fadeIn('slow');
        	$(this).parent().css({'display':'none'});
            // Adding class active to show steps forward;
        	$('.active').next().addClass('active');
        }
    }
});

	
	$(".next_btn").click(function(){           //Function runs on NEXT button click 
    	if(validate_form(this.id)){
    	    if(this.id != 'project-upload-file' && this.id != 'property-upload-files'){
        	    $(this).parent().next().fadeIn('slow');
            	$(this).parent().css({'display':'none'});
                // Adding class active to show steps forward;
            	$('.active').next().addClass('active');
    	    }
    	}
	});
	
	$(".pre_btn").click(function(){            //Function runs on PREVIOUS button click 
	$(this).parent().prev().fadeIn('slow');
	$(this).parent().css({'display':'none'});
//Removing class active to show steps backward;
	$('.active:last').removeClass('active');
	});
	
//validating all input and textarea fields	
	$(".submit_btn").click(function(e){	
	if($('input').val()=="" || $('textarea').val()==""){	
			alert("*All Fields are mandatory*");
			return false;
		}
		else{
			return true;
		}
	});
	
	
	function validate_form(btn_id){
	    var flag = false;
	    if(btn_id == 'project-property-type'){
	        if($('#PropertyStatus').val() == undefined || $('#PropertyStatus').val() == ''){
	            $('#PropertyStatus-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PropertyStatus-error').html('');
	            flag = true;
	        }
	        if($('#sizestartingfrom').val() == 'Size Starting From'){
	            $('#sizestartingfrom-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#sizestartingfrom-error').html('');
	            flag = true;
	        }
	        if($('#sizestartingfromUnit').val() == 'Unit'){
	            $('#sizestartingfromUnit-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#sizestartingfromUnit-error').html('');
	            flag = true;
	        }
	        if($('#bhk1').val() == '' || $('#bhk1').val() == 0){
	            $('#bhk1-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#bhk1-error').html('');
	            flag = true;
	        }
	        if($('#bhk2').val() == '' || $('#bhk2').val() == 0){
	            $('#bhk2-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#bhk2-error').html('');
	            flag = true;
	        }
	        if($('#propertyTypeRes').val() == 'Property Type (Resi.)'){
	            $('#propertyTypeRes-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#propertyTypeRes-error').html('');
	            flag = true;
	        }
	        if($('#sizeupto').val() == 'Size up to'){
	            $('#sizeupto-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#sizeupto-error').html('');
	            flag = true;
	        }
	        if($('#price').val() == ''){
	            $('#price-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#price-error').html('');
	            flag = true;
	        }
	        if($('#propertyTypeCom').val() == 'Property Type (Com.)'){
	            $('#propertyTypeCom-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#propertyTypeCom-error').html('');
	            flag = true;
	        }
	        if($('#sizeuptoUnit').val() == 'Unit'){
	            $('#sizeuptoUnit-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#sizeuptoUnit-error').html('');
	            flag = true;
	        }
	        if($('#priceUnit').val() == 'Onward / Per Sqft'){
	            $('#priceUnit-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#priceUnit-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'project-address-info'){
	        if($('#state').val() == ''){
	            $('#state-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#state-error').html('');
	            flag = true;
	        }
	        if($('#location').val() == ''){
	            $('#location-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#location-error').html('');
	            flag = true;
	        }
	        if($('#city').val() == ''){
	            $('#city-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#city-error').html('');
	            flag = true;
	        }
	        if($('#landmark').val() == ''){
	            $('#landmark-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#landmark-error').html('');
	            flag = true;
	        }
	        if($('#pincode').val() == ''){
	            $('#pincode-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#pincode-error').html('');
	            flag = true;
	        }
	        if($('#Marketingby').val() == ''){
	            $('#Marketingby-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#Marketingby-error').html('');
	            flag = true;
	        }
	        
	        if($('#project_name').val() == ''){
	            $('#project_name-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#project_name-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'project-other-info'){
	        if($('#section').val() == undefined){
	            $('#section-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#section-error').html('');
	            flag = true;
	        }
	        if($('#AgeofPropeety').val() == 'Age of Property' || $('#AgeofPropeety').val() == ''){
	            $('#AgeofPropeety-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#AgeofPropeety-error').html('');
	            flag = true;
	        }
	        if($('input[name=section]').val() == 'PossessionFrom'){
	            if($('#PossessionDate').val() == '' || $('#PossessionDate').val() == undefined){
    	            $('#PossessionDate-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#PossessionDate-error').html('');
    	            flag = true;
    	        }   
	        }
	        if($('#PropertyType').val() == 'Property Type'){
	            $('#PropertyType-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PropertyType-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'project-amenities'){
	        if($('#comment').val() == ''){
	            $('#comment-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#comment-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'project-upload-file'){
	        
	        /*if($('#UploadPdf').val() == undefined || $('#UploadPdf').val() == ''){
	            $('#UploadPdf-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadPdf-error').html('');
	            flag = true;
	        }*/
	        /*if($('#UploadImages').val() == undefined || $('#UploadImages').val() == ''){
	            $('#UploadImages-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadImages-error').html('');
	            flag = true;
	        }*/
	        if($('#UploadPdf').val() == undefined || $('#UploadPdf').val() == ''){
	            $('#UploadPdf-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadPdf-error').html('');
	            flag = true;
	        }
	        if($('#UploadImages').val() == undefined || $('#UploadImages').val() == ''){
	            $('#UploadImages-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadImages-error').html('');
	            $('#dvLoading').css('display', 'block');
	            $("#add_project").submit();
	            flag = true;
	        }
	        /*if($('#UploadVideo').val() == undefined || $('#UploadVideo').val() == ''){
	            $('#UploadVideo-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadVideo-error').html('');
	            flag = true;
	            
	            
	        }*/
	    }
	    if(btn_id == 'property-contact-form'){
	        if($('#name').val() == undefined || $('#name').val() == ''){
	            $('#name-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#name-error').html('');
	            flag = true;
	        }
	        if($('#mobile').val() == undefined || $('#mobile').val() == '' || $('#mobile').val().length != 10 ){
	            $('#mobile-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#mobile-error').html('');
	            flag = true;
	        }
	        if($('#phone').val() == undefined || $('#phone').val() == ''){
	            $('#phone-error').html('');
	            flag = false;
	        }else{
	            $('#phone-error').html('');
	            flag = true;
	        }
	        if($('#mobile1').val() == undefined || $('#mobile1').val() == ''){
	            $('#mobile1-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#mobile1-error').html('');
	            flag = true;
	        }
	        if($('#email').val() == undefined || $('#email').val() == ''){
	            $('#email-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#email-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'property-address-form'){
	        if($('#state').val() == undefined || $('#state').val() == ''){
	            $('#state-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#state-error').html('');
	            flag = true;
	        }
	        if($('#location').val() == undefined || $('#location').val() == ''){
	            $('#location-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#location-error').html('');
	            flag = true;
	        }
	        if($('#city').val() == undefined || $('#city').val() == ''){
	            $('#city-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#city-error').html('');
	            flag = true;
	        }
	        if($('#complex_society_building').val() == undefined || $('#complex_society_building').val() == ''){
	            $('#complex_society_building-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#complex_society_building-error').html('');
	            flag = true;
	        }
	        if($('#address').val() == undefined || $('#address').val() == ''){
	            $('#address-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#address-error').html('');
	            flag = true;
	        }
	        if($('#blockno').val() == undefined || $('#blockno').val() == ''){
	            $('#blockno-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#blockno-error').html('');
	            flag = true;
	        }
	        if($('#landmark').val() == undefined || $('#landmark').val() == ''){
	            $('#landmark-error').html('');
	            flag = false;
	        }else{
	            $('#landmark-error').html('');
	            flag = true;
	        }
	        if($('#flatno').val() == undefined || $('#flatno').val() == ''){
	            $('#flatno-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#flatno-error').html('');
	            flag = true;
	        }
	        if($('#pincode').val() == undefined || $('#pincode').val() == ''){
	            $('#pincode-error').html('');
	            flag = false;
	        }else{
	            $('#pincode-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'proprty-type-form'){
	        if($('#rent_sell').val() == '' || $('#rent_sell').val() == 'Rent / Sell'){
	            $('#rent_sell-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#rent_sell-error').html('');
	            flag = true;
	        } 
	        if($('#res_com').val() == '' || $('#res_com').val() == 'Residential / Commercial'){
	            $('#res_com-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#res_com-error').html('');
	            flag = true;
	        }
	       // alert($('input[name=FurnishedStatus]:checked').val());
	        if($('input[name=FurnishedStatus]:checked').val() == undefined || $('input[name=FurnishedStatus]:checked').val() == ''){
	            $('#FurnishedStatus-error').html('This filed is required');
	            flag = false;
	            return flag;
	        }else{
	            $('#FurnishedStatus-error').html('');
	            flag = true;
	        }
	        if($('input[name=residential]:checked').val() == undefined || $('input[name=residential]:checked').val() == ''){
	            $('#residential-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#residential-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'property-price-form'){
	        if($('#rent_sell').val() == 'Rent'){
	            if($('#security_deposite').val() == undefined || $('#security_deposite').val() == ''){
    	            $('#security_deposite-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#security_deposite-error').html('');
    	            flag = true;
    	        }
    	        if($('#rentPerMonth').val() == undefined || $('#rentPerMonth').val() == ''){
    	            $('#rentPerMonth-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#rentPerMonth-error').html('');
    	            flag = true;
    	        }
	        }
	        if($('#rent_sell').val() == 'Sell'){
	            if($('#net_amount').val() == undefined || $('#net_amount').val() == ''){
    	            $('#net_amount-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#net_amount-error').html('');
    	            flag = true;
    	        }
    	        
	        }
	        
	    }
	    if(btn_id == 'property-details-form'){
	        if($('input[name=residential]:checked').val() == 'DuplexFlat'){
	            if($('#room').val() == undefined || $('#room').val() == ''){
    	            $('#room-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#room-error').html('');
    	            flag = true;
    	        }if($('#balcony').val() == undefined || $('#balcony').val() == ''){
    	            $('#balcony-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#balcony-error').html('');
    	            flag = true;
    	        }if($('#super_buildup_area').val() == undefined || $('#super_buildup_area').val() == ''){
    	            $('#super_buildup_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#super_buildup_area-error').html('');
    	            flag = true;
    	        }if($('#carpet_area').val() == undefined || $('#carpet_area').val() == ''){
    	            $('#carpet_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#carpet_area-error').html('');
    	            flag = true;
    	        }if($('#super_buildup_area_unit').val() == undefined || $('#super_buildup_area_unit').val() == 'Unit'){
    	            $('#super_buildup_area_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#super_buildup_area_unit-error').html('');
    	            flag = true;
    	        }if($('#carpet_unit').val() == undefined || $('#carpet_unit').val() == 'Unit'){
    	            $('#carpet_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#carpet_unit-error').html('');
    	            flag = true;
    	        }if($('#upperfloorno').val() == undefined || $('#upperfloorno').val() == 'Upper Floor No'){
    	            $('#upperfloorno-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#upperfloorno-error').html('');
    	            flag = true;
    	        }if($('#bathroom').val() == undefined || $('#bathroom').val() == 'Bathroom'){
    	            $('#bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#bathroom-error').html('');
    	            flag = true;
    	        }if($('#kitchen').val() == undefined || $('#kitchen').val() == 'Kitchen'){
    	            $('#kitchen-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#kitchen-error').html('');
    	            flag = true;
    	        }if($('#buildup_area').val() == undefined || $('#buildup_area').val() == 'Kitchen'){
    	            $('#buildup_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#buildup_area-error').html('');
    	            flag = true;
    	        }if($('#buildup_area_Unit').val() == undefined || $('#buildup_area_Unit').val() == 'Unit'){
    	            $('#buildup_area_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#buildup_area_Unit-error').html('');
    	            flag = true;
    	        }if($('#lower_floor_no').val() == undefined || $('#lower_floor_no').val() == 'Lower Floor No'){
    	            $('#lower_floor_no-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#lower_floor_no-error').html('');
    	            flag = true;
    	        }if($('#totalfloor').val() == undefined || $('#totalfloor').val() == 'Total Floor'){
    	            $('#totalfloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#totalfloor-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'PentHouse'){
	            if($('#pent_room').val() == undefined || $('#pent_room').val() == ''){
    	            $('#pent_room-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_room-error').html('');
    	            flag = true;
    	        }
    	        if($('#pent_balcony').val() == undefined || $('#pent_balcony').val() == ''){
    	            $('#pent_balcony-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_balcony-error').html('');
    	            flag = true;
    	        }if($('#pent_super_buildup_area').val() == undefined || $('#pent_super_buildup_area').val() == ''){
    	            $('#pent_super_buildup_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_super_buildup_area-error').html('');
    	            flag = true;
    	        }if($('#pent_carpet_area').val() == undefined || $('#pent_carpet_area').val() == ''){
    	            $('#pent_carpet_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_carpet_area-error').html('');
    	            flag = true;
    	        }if($('#pent_super_buildup_area_Unit').val() == undefined || $('#pent_super_buildup_area_Unit').val() == 'Unit'){
    	            $('#pent_super_buildup_area_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_super_buildup_area_Unit-error').html('');
    	            flag = true;
    	        }if($('#pent_carpet_unit').val() == undefined || $('#pent_carpet_unit').val() == 'Unit'){
    	            $('#pent_carpet_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_carpet_unit-error').html('');
    	            flag = true;
    	        }if($('#pent_floor').val() == undefined || $('#pent_floor').val() == 'Floor'){
    	            $('#pent_floor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_floor-error').html('');
    	            flag = true;
    	        }if($('#pent_bathroom').val() == undefined || $('#pent_bathroom').val() == 'Bathroom'){
    	            $('#pent_bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_bathroom-error').html('');
    	            flag = true;
    	        }if($('#pent_kitchen').val() == undefined || $('#pent_kitchen').val() == 'Kitchen'){
    	            $('#pent_kitchen-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_kitchen-error').html('');
    	            flag = true;
    	        }if($('#pent_buildup_area').val() == undefined || $('#pent_buildup_area').val() == ''){
    	            $('#pent_buildup_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_buildup_area-error').html('');
    	            flag = true;
    	        }if($('#open_terrace').val() == undefined || $('#open_terrace').val() == ''){
    	            $('#open_terrace-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#open_terrace-error').html('');
    	            flag = true;
    	        }if($('#pent_buildup_area_Unit').val() == undefined || $('#pent_buildup_area_Unit').val() == 'Unit'){
    	            $('#pent_buildup_area_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_buildup_area_Unit-error').html('');
    	            flag = true;
    	        }if($('#pent_open_terrace_unit').val() == undefined || $('#pent_open_terrace_unit').val() == 'Unit'){
    	            $('#pent_open_terrace_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#pent_open_terrace_unit-error').html('');
    	            flag = true;
    	        }if($('#total_floor').val() == undefined || $('#total_floor').val() == 'Total Floor'){
    	            $('#total_floor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#total_floor-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'HouseorBanglow'){
	            if($('#house_Room').val() == undefined || $('#house_Room').val() == 'Room'){
    	            $('#house_Room-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_Room-error').html('');
    	            flag = true;
    	        }if($('#house_Balcony').val() == undefined || $('#house_Balcony').val() == 'Balcony'){
    	            $('#house_Balcony-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_Balcony-error').html('');
    	            flag = true;
    	        }if($('#house_SuperBuildupArea').val() == undefined || $('#house_SuperBuildupArea').val() == ''){
    	            $('#house_SuperBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_SuperBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#house_CarpetArea').val() == undefined || $('#house_CarpetArea').val() == ''){
    	            $('#house_CarpetArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_CarpetArea-error').html('');
    	            flag = true;
    	        }if($('#house_TotalCoveredLandArea').val() == undefined || $('#house_TotalCoveredLandArea').val() == ''){
    	            $('#house_TotalCoveredLandArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalCoveredLandArea-error').html('');
    	            flag = true;
    	        }if($('#house_SuperBuildupArea_Unit').val() == undefined || $('#house_SuperBuildupArea_Unit').val() == 'Unit'){
    	            $('#house_SuperBuildupArea_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_SuperBuildupArea_Unit-error').html('');
    	            flag = true;
    	        }if($('#house_Carpet_Unit').val() == undefined || $('#house_Carpet_Unit').val() == 'Unit'){
    	            $('#house_Carpet_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_Carpet_Unit-error').html('');
    	            flag = true;
    	        }if($('#house_TotalCoveredLandArea_unit').val() == undefined || $('#house_TotalCoveredLandArea_unit').val() == 'Unit'){
    	            $('#house_TotalCoveredLandArea_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalCoveredLandArea_unit-error').html('');
    	            flag = true;
    	        }if($('#house_TotalFloor').val() == undefined || $('#house_TotalFloor').val() == 'Total Floor'){
    	            $('#house_TotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalFloor-error').html('');
    	            flag = true;
    	        }if($('#house_Bathroom').val() == undefined || $('#house_Bathroom').val() == 'Bathroom'){
    	            $('#house_Bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_Bathroom-error').html('');
    	            flag = true;
    	        }if($('#house_Kitchen').val() == undefined || $('#house_Kitchen').val() == 'Kitchen'){
    	            $('#house_Kitchen-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_Kitchen-error').html('');
    	            flag = true;
    	        }if($('#house_BuildupArea').val() == undefined || $('#house_BuildupArea').val() == ''){
    	            $('#house_BuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_BuildupArea-error').html('');
    	            flag = true;
    	        }if($('#house_TotalLandArea').val() == undefined || $('#house_TotalLandArea').val() == ''){
    	            $('#house_TotalLandArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalLandArea-error').html('');
    	            flag = true;
    	        }if($('#house_TotalUncoveredLandArea').val() == undefined || $('#house_TotalUncoveredLandArea').val() == ''){
    	            $('#house_TotalUncoveredLandArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalUncoveredLandArea-error').html('');
    	            flag = true;
    	        }if($('#house_BuildupAreaUnit').val() == undefined || $('#house_BuildupAreaUnit').val() == 'Unit'){
    	            $('#house_BuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_BuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#house_TotalLandArea_Unit').val() == undefined || $('#house_TotalLandArea_Unit').val() == 'Unit'){
    	            $('#house_TotalLandArea_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalLandArea_Unit-error').html('');
    	            flag = true;
    	        }if($('#house_TotalUncoveredLandArea_Unit').val() == undefined || $('#house_TotalUncoveredLandArea_Unit').val() == 'Unit'){
    	            $('#house_TotalUncoveredLandArea_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#house_TotalUncoveredLandArea_Unit-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'Flat'){
	            if($('#flat_Room').val() == undefined || $('#flat_Room').val() == 'Room'){
    	            $('#flat_Room-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Room-error').html('');
    	            flag = true;
    	        }if($('#flat_Balcony').val() == undefined || $('#flat_Balcony').val() == 'Balcony'){
    	            $('#flat_Balcony-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Balcony-error').html('');
    	            flag = true;
    	        }if($('#flat_SuperBuildupArea').val() == undefined || $('#flat_SuperBuildupArea').val() == ''){
    	            $('#flat_SuperBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_SuperBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#flat_CarpetArea').val() == undefined || $('#flat_CarpetArea').val() == ''){
    	            $('#flat_CarpetArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_CarpetArea-error').html('');
    	            flag = true;
    	        }if($('#flat_SuperBuildupAreaUnit').val() == undefined || $('#flat_SuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#flat_SuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_SuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#flat_Carpet_Unit').val() == undefined || $('#flat_Carpet_Unit').val() == 'Unit'){
    	            $('#flat_Carpet_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Carpet_Unit-error').html('');
    	            flag = true;
    	        }if($('#flat_TotalFloor').val() == undefined || $('#flat_TotalFloor').val() == 'Total Floor'){
    	            $('#flat_TotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_TotalFloor-error').html('');
    	            flag = true;
    	        }if($('#flat_Bathroom').val() == undefined || $('#flat_Bathroom').val() == 'Bathroom'){
    	            $('#flat_Bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Bathroom-error').html('');
    	            flag = true;
    	        }if($('#flat_Kitchen').val() == undefined || $('#flat_Kitchen').val() == 'Kitchen'){
    	            $('#flat_Kitchen-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Kitchen-error').html('');
    	            flag = true;
    	        }if($('#flat_BuildupArea').val() == undefined || $('#flat_BuildupArea').val() == ''){
    	            $('#flat_BuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_BuildupArea-error').html('');
    	            flag = true;
    	        }if($('#flat_BuildupArea_Unit').val() == undefined || $('#flat_BuildupArea_Unit').val() == 'Unit'){
    	            $('#flat_BuildupArea_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_BuildupArea_Unit-error').html('');
    	            flag = true;
    	        }if($('#flat_Floor').val() == undefined || $('#flat_Floor').val() == 'Floor'){
    	            $('#flat_Floor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_Floor-error').html('');
    	            flag = true;
    	        }if($('#flat_HeavyVehicleParkingUpto').val() == undefined || $('#flat_HeavyVehicleParkingUpto').val() == 'Roof'){
    	            $('#flat_HeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#flat_HeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'Land' 
	        || $('input[name=residential]:checked').val() == 'Land2'){
	            if($('#LandArea').val() == undefined || $('#LandArea').val() == ''){
    	            $('#LandArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandArea-error').html('');
    	            flag = true;
    	        }if($('#land_SuperBuildupArea_Unit').val() == undefined || $('#land_SuperBuildupArea_Unit').val() == 'Unit'){
    	            $('#land_SuperBuildupArea_Unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#land_SuperBuildupArea_Unit-error').html('');
    	            flag = true;
    	        }if($('#LandStatus').val() == undefined || $('#LandStatus').val() == 'Land Status'){
    	            $('#LandStatus-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandStatus-error').html('');
    	            flag = true;
    	        }if($('#NatureofLand').val() == undefined || $('#NatureofLand').val() == 'Nature Of Land'){
    	            $('#NatureofLand-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#NatureofLand-error').html('');
    	            flag = true;
    	        }if($('#PropertyTax').val() == undefined || $('#PropertyTax').val() == 'Property Tax'){
    	            $('#PropertyTax-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#PropertyTax-error').html('');
    	            flag = true;
    	        }if($('#LandFacing').val() == undefined || $('#LandFacing').val() == 'Land Facing'){
    	            $('#LandFacing-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandFacing-error').html('');
    	            flag = true;
    	        }if($('#landCoveredArea').val() == undefined || $('#landCoveredArea').val() == ''){
    	            $('#landCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#landCoveredArea-error').html('');
    	            flag = true;
    	        }if($('#landCoveredAreaUnit').val() == undefined || $('#landCoveredAreaUnit').val() == 'Unit'){
    	            $('#landCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#landCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#IstheExistingOwner').val() == undefined || $('#IstheExistingOwner').val() == 'Is the Existing Owner'){
    	            $('#IstheExistingOwner-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#IstheExistingOwner-error').html('');
    	            flag = true;
    	        }if($('#NoOfOwner').val() == undefined || $('#NoOfOwner').val() == 'No Of Owner'){
    	            $('#NoOfOwner-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#NoOfOwner-error').html('');
    	            flag = true;
    	        }if($('#Mutation').val() == undefined || $('#Mutation').val() == 'Mutation'){
    	            $('#Mutation-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Mutation-error').html('');
    	            flag = true;
    	        }if($('#LandRoadWide').val() == undefined || $('#LandRoadWide').val() == ''){
    	            $('#LandRoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandRoadWide-error').html('');
    	            flag = true;
    	        }if($('#LandRoadWideUnit').val() == undefined || $('#LandRoadWideUnit').val() == 'Unit'){
    	            $('#LandRoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandRoadWideUnit-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'Office'){
	            if($('#officeNumberofCabin').val() == undefined || $('#officeNumberofCabin').val() == 'Number of Cabin'){
    	            $('#officeNumberofCabin-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeNumberofCabin-error').html('');
    	            flag = true;
    	        }if($('#officeSuperBuildupArea').val() == undefined || $('#officeSuperBuildupArea').val() == ''){
    	            $('#officeSuperBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeSuperBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#officeCarpetArea').val() == undefined || $('#officeCarpetArea').val() == ''){
    	            $('#officeCarpetArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeCarpetArea-error').html('');
    	            flag = true;
    	        }if($('#officeSuperBuildupAreaUnit').val() == undefined || $('#officeSuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#officeSuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeSuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#officeCarpetUnit').val() == undefined || $('#officeCarpetUnit').val() == 'Unit'){
    	            $('#officeCarpetUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeCarpetUnit-error').html('');
    	            flag = true;
    	        }if($('#Flooroffice').val() == undefined || $('#Flooroffice').val() == 'Floor'){
    	            $('#Flooroffice-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Flooroffice-error').html('');
    	            flag = true;
    	        }if($('#Pentryoffice').val() == undefined || $('#Pentryoffice').val() == ''){
    	            $('#Pentryoffice-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Pentryoffice-error').html('');
    	            flag = true;
    	        }if($('#PentryofficeUsedFor').val() == undefined || $('#PentryofficeUsedFor').val() == 'Used For'){
    	            $('#PentryofficeUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#PentryofficeUsedFor-error').html('');
    	            flag = true;
    	        }if($('#officeNumberofWorkStation').val() == undefined || $('#officeNumberofWorkStation').val() == 'Number of Work Station'){
    	            $('#officeNumberofWorkStation-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeNumberofWorkStation-error').html('');
    	            flag = true;
    	        }if($('#officeBuildupArea').val() == undefined || $('#officeBuildupArea').val() == 'Number of Work Station'){
    	            $('#officeBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#officeBuildupAreaUnit').val() == undefined || $('#officeBuildupAreaUnit').val() == 'Unit'){
    	            $('#officeBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#officeAC').val() == undefined || $('#officeAC').val() == 'AC'){
    	            $('#officeAC-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeAC-error').html('');
    	            flag = true;
    	        }if($('#officeTotalFloor').val() == undefined || $('#officeTotalFloor').val() == 'Total Floor'){
    	            $('#officeTotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeTotalFloor-error').html('');
    	            flag = true;
    	        }if($('#officeBathroom').val() == undefined || $('#officeBathroom').val() == ''){
    	            $('#officeBathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#officeBathroom-error').html('');
    	            flag = true;
    	        }if($('#BathroomofficeUsedFor').val() == undefined || $('#BathroomofficeUsedFor').val() == 'Used For'){
    	            $('#BathroomofficeUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#BathroomofficeUsedFor-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'ShopOrShowroom'){
	            if($('#shoproof').val() == undefined || $('#shoproof').val() == 'Roof'){
    	            $('#shoproof-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shoproof-error').html('');
    	            flag = true;
    	        }if($('#shopSuperBuildupArea').val() == undefined || $('#shopSuperBuildupArea').val() == ''){
    	            $('#shopSuperBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopSuperBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#shopCoveredArea').val() == undefined || $('#shopCoveredArea').val() == ''){
    	            $('#shopCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopCoveredArea-error').html('');
    	            flag = true;
    	        }if($('#shopSuperBuildupAreaUnit').val() == undefined || $('#shopSuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#shopSuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopSuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#shopCoveredAreaUnit').val() == undefined || $('#shopCoveredAreaUnit').val() == 'Unit'){
    	            $('#shopCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#shopFloor').val() == undefined || $('#shopFloor').val() == 'Floor'){
    	            $('#shopFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopFloor-error').html('');
    	            flag = true;
    	        }if($('#shopBathroom').val() == undefined || $('#shopBathroom').val() == 'Floor'){
    	            $('#shopBathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopBathroom-error').html('');
    	            flag = true;
    	        }if($('#shopRoadWide').val() == undefined || $('#shopRoadWide').val() == 'Floor'){
    	            $('#shopRoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopRoadWide-error').html('');
    	            flag = true;
    	        }if($('#shopAvailableForBar').val() == undefined || $('#shopAvailableForBar').val() == 'Floor'){
    	            $('#shopAvailableForBar-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopAvailableForBar-error').html('');
    	            flag = true;
    	        }if($('#shopBathroomUnit').val() == undefined || $('#shopBathroomUnit').val() == 'Used For'){
    	            $('#shopBathroomUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopBathroomUnit-error').html('');
    	            flag = true;
    	        }if($('#shopRoadWideUnit').val() == undefined || $('#shopRoadWideUnit').val() == 'Unit'){
    	            $('#shopRoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopRoadWideUnit-error').html('');
    	            flag = true;
    	        }if($('#shopForResturant').val() == undefined || $('#shopForResturant').val() == 'For Resturant'){
    	            $('#shopForResturant-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopForResturant-error').html('');
    	            flag = true;
    	        }if($('#shopFrontage').val() == undefined || $('#shopFrontage').val() == ''){
    	            $('#shopFrontage-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopFrontage-error').html('');
    	            flag = true;
    	        }if($('#shopBuildupArea').val() == undefined || $('#shopBuildupArea').val() == ''){
    	            $('#shopBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#shopOpenArea').val() == undefined || $('#shopOpenArea').val() == ''){
    	            $('#shopOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopOpenArea-error').html('');
    	            flag = true;
    	        }if($('#shopFrontageUnit').val() == undefined || $('#shopFrontageUnit').val() == 'Unit'){
    	            $('#shopFrontageUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopFrontageUnit-error').html('');
    	            flag = true;
    	        }if($('#shopBuildupAreaUnit').val() == undefined || $('#shopBuildupAreaUnit').val() == 'Unit'){
    	            $('#shopBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#shopOpenAreaUnit').val() == undefined || $('#shopOpenAreaUnit').val() == 'Unit'){
    	            $('#shopOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopOpenAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#shopTotalFloor').val() == undefined || $('#shopTotalFloor').val() == 'Total Floor'){
    	            $('#shopTotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopTotalFloor-error').html('');
    	            flag = true;
    	        }if($('#shopPentry').val() == undefined || $('#shopPentry').val() == ''){
    	            $('#shopPentry-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopPentry-error').html('');
    	            flag = true;
    	        }if($('#shopElectricPower').val() == undefined || $('#shopElectricPower').val() == ''){
    	            $('#shopElectricPower-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopElectricPower-error').html('');
    	            flag = true;
    	        }if($('#shopPentryUsedFor').val() == undefined || $('#shopPentryUsedFor').val() == ''){
    	            $('#shopPentryUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopPentryUsedFor-error').html('');
    	            flag = true;
    	        }if($('#shopElectricPowerUnit').val() == undefined || $('#shopElectricPowerUnit').val() == 'Unit'){
    	            $('#shopElectricPowerUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopElectricPowerUnit-error').html('');
    	            flag = true;
    	        }if($('#shopHeavyVehicleParkingUpto').val() == undefined || $('#shopHeavyVehicleParkingUpto').val() == 'Heavy Vehicle Parking Upto'){
    	            $('#shopHeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#shopHeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'Warehouse'){
	            if($('#warehouseNumberofCabin').val() == undefined || $('#warehouseNumberofCabin').val() == 'Number of Cabin'){
    	            $('#warehouseNumberofCabin-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseNumberofCabin-error').html('');
    	            flag = true;
    	        }if($('#warehouseSuperBuildupArea').val() == undefined || $('#warehouseSuperBuildupArea').val() == ''){
    	            $('#warehouseSuperBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseSuperBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#warehouseCoveredArea').val() == undefined || $('#warehouseCoveredArea').val() == ''){
    	            $('#warehouseCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseCoveredArea-error').html('');
    	            flag = true;
    	        }if($('#warehouseSuperBuildupAreaUnit').val() == undefined || $('#warehouseSuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#warehouseSuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseSuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#warehouseCoveredAreaUnit').val() == undefined || $('#warehouseCoveredAreaUnit').val() == 'Unit'){
    	            $('#warehouseCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#warehouseFloor').val() == undefined || $('#warehouseFloor').val() == 'Floor'){
    	            $('#warehouseFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseFloor-error').html('');
    	            flag = true;
    	        }if($('#warehouseroof').val() == undefined || $('#warehouseroof').val() == 'Roof'){
    	            $('#warehouseroof-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseroof-error').html('');
    	            flag = true;
    	        }if($('#warehouseRoadWide').val() == undefined || $('#warehouseRoadWide').val() == ''){
    	            $('#warehouseRoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseRoadWide-error').html('');
    	            flag = true;
    	        }if($('#warehouseRoadWideUnit').val() == undefined || $('#warehouseRoadWideUnit').val() == 'Unit'){
    	            $('#warehouseRoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseRoadWideUnit-error').html('');
    	            flag = true;
    	        }if($('#warehouseHeavyVehicleParkingUpto').val() == undefined || $('#warehouseHeavyVehicleParkingUpto').val() == 'Heavy Vehicle Parking Upto'){
    	            $('#warehouseHeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseHeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }if($('#warehouseNumberofWorkStation').val() == undefined || $('#warehouseNumberofWorkStation').val() == 'Number of Work Station'){
    	            $('#warehouseNumberofWorkStation-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseNumberofWorkStation-error').html('');
    	            flag = true;
    	        }if($('#warehouseBuildupArea').val() == undefined || $('#warehouseBuildupArea').val() == ''){
    	            $('#warehouseBuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseBuildupArea-error').html('');
    	            flag = true;
    	        }if($('#warehouseOpenArea').val() == undefined || $('#warehouseOpenArea').val() == ''){
    	            $('#warehouseOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseOpenArea-error').html('');
    	            flag = true;
    	        }if($('#warehouseBuildupAreaUnit').val() == undefined || $('#warehouseBuildupAreaUnit').val() == 'Unit'){
    	            $('#warehouseBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#warehouseOpenAreaUnit').val() == undefined || $('#warehouseOpenAreaUnit').val() == 'Unit'){
    	            $('#warehouseOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseOpenAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#warehouseTotalFloor').val() == undefined || $('#warehouseTotalFloor').val() == 'Total Floor'){
    	            $('#warehouseTotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseTotalFloor-error').html('');
    	            flag = true;
    	        }if($('#warehousePentry').val() == undefined || $('#warehousePentry').val() == ''){
    	            $('#warehousePentry-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehousePentry-error').html('');
    	            flag = true;
    	        }if($('#warehouseBathroom').val() == undefined || $('#warehouseBathroom').val() == ''){
    	            $('#warehouseBathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseBathroom-error').html('');
    	            flag = true;
    	        }if($('#warehousePentryUsedFor').val() == undefined || $('#warehousePentryUsedFor').val() == 'Used For'){
    	            $('#warehousePentryUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseBathroom-error').html('');
    	            flag = true;
    	        }if($('#warehouseBathroomUsedFor').val() == undefined || $('#warehouseBathroomUsedFor').val() == 'For Resturant'){
    	            $('#warehouseBathroomUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#warehouseBathroomUsedFor-error').html('');
    	            flag = true;
    	        }
	        }else if($('input[name=residential]:checked').val() == 'Factory'){
	            if($('#factory_numberofcabin').val() == undefined || $('#factory_numberofcabin').val() == 'Number of Cabin'){
    	            $('#factory_numberofcabin-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_numberofcabin-error').html('');
    	            flag = true;
    	        }
    	        if($('#factory_super_buildup_area').val() == undefined || $('#factory_super_buildup_area').val() == ''){
    	            $('#factory_super_buildup_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_super_buildup_area-error').html('');
    	            flag = true;
    	        }if($('#factory_carpet_area').val() == undefined || $('#factory_carpet_area').val() == ''){
    	            $('#factory_carpet_area-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_carpet_area-error').html('');
    	            flag = true;
    	        }if($('#factory_super_buildup_area_unit').val() == undefined || $('#factory_super_buildup_area_unit').val() == 'Unit'){
    	            $('#factory_super_buildup_area_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_super_buildup_area_unit-error').html('');
    	            flag = true;
    	        }if($('#factory_carpet_unit').val() == undefined || $('#factory_carpet_unit').val() == 'Unit'){
    	            $('#factory_carpet_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_carpet_unit-error').html('');
    	            flag = true;
    	        }if($('#factory_floor').val() == undefined || $('#factory_floor').val() == 'Floor'){
    	            $('#factory_floor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_floor-error').html('');
    	            flag = true;
    	        }if($('#factory_pentry').val() == undefined || $('#factory_pentry').val() == ''){
    	            $('#factory_pentry-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_pentry-error').html('');
    	            flag = true;
    	        }if($('#factory_roadWide').val() == undefined || $('#factory_roadWide').val() == ''){
    	            $('#factory_roadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_roadWide-error').html('');
    	            flag = true;
    	        }if($('#factory_pentry_usedFor').val() == undefined || $('#factory_pentry_usedFor').val() == ''){
    	            $('#factory_pentry_usedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_pentry_usedFor-error').html('');
    	            flag = true;
    	        }if($('#factory_roadWide_unit').val() == undefined || $('#factory_roadWide_unit').val() == 'Unit'){
    	            $('#factory_roadWide_unit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_roadWide_unit-error').html('');
    	            flag = true;
    	        }if($('#factory_roof').val() == undefined || $('#factory_roof').val() == 'Roof'){
    	            $('#factory_roof-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_roof-error').html('');
    	            flag = true;
    	        }if($('#factory_ManufacturingType').val() == undefined || $('#factory_ManufacturingType').val() == 'Roof'){
    	            $('#factory_ManufacturingType-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_ManufacturingType-error').html('');
    	            flag = true;
    	        }if($('#factory_NumberofWorkStation').val() == undefined || $('#factory_NumberofWorkStation').val() == 'Number of Work Station'){
    	            $('#factory_NumberofWorkStation-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_NumberofWorkStation-error').html('');
    	            flag = true;
    	        }if($('#factory_BuildupArea').val() == undefined || $('#factory_BuildupArea').val() == ''){
    	            $('#factory_BuildupArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_BuildupArea-error').html('');
    	            flag = true;
    	        }if($('#factory_OpenArea').val() == undefined || $('#factory_OpenArea').val() == ''){
    	            $('#factory_OpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_OpenArea-error').html('');
    	            flag = true;
    	        }if($('#factory_BuildupAreaUnit').val() == undefined || $('#factory_BuildupAreaUnit').val() == 'Unit'){
    	            $('#factory_BuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_BuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#factory_OpenAreaUnit').val() == undefined || $('#factory_OpenAreaUnit').val() == 'Unit'){
    	            $('#factory_OpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_OpenAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#factory_TotalFloor').val() == undefined || $('#factory_TotalFloor').val() == 'Total Floor'){
    	            $('#factory_TotalFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_TotalFloor-error').html('');
    	            flag = true;
    	        }if($('#factory_Bathroom').val() == undefined || $('#factory_Bathroom').val() == ''){
    	            $('#factory_Bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_Bathroom-error').html('');
    	            flag = true;
    	        }if($('#factory_ElectricPower').val() == undefined || $('#factory_ElectricPower').val() == ''){
    	            $('#factory_ElectricPower-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_ElectricPower-error').html('');
    	            flag = true;
    	        }if($('#factory_Bathroom_UsedFor').val() == undefined || $('#factory_Bathroom_UsedFor').val() == 'Used For'){
    	            $('#factory_Bathroom_UsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_Bathroom_UsedFor-error').html('');
    	            flag = true;
    	        }if($('#factory_HeavyVehicleParkingUpto').val() == undefined || $('#factory_HeavyVehicleParkingUpto').val() == 'Heavy Vehicle Parking Upto'){
    	            $('#factory_HeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#factory_HeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }
	        }
	    }
	    if(btn_id == 'property-other-info'){
	        if($('input[name=section]:checked').val() == undefined || $('input[name=section]:checked').val() == ''){
	            $('#section-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#section-error').html('');
	            flag = true;
	        }if($('#AgeofPropeety').val() == undefined || $('#AgeofPropeety').val() == 'Age of Propeety'){
	            $('#AgeofPropeety-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#AgeofPropeety-error').html('');
	            flag = true;
	        }if($('#PossessionDate').val() == undefined || $('#PossessionDate').val() == ''){
	            $('#PossessionDate-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PossessionDate-error').html('');
	            flag = true;
	        }if($('#PropertyType').val() == undefined || $('#PropertyType').val() == 'Property Type'){
	            $('#PropertyType-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PropertyType-error').html('');
	            flag = true;
	        }if($('#OpenParking').val() == undefined || $('#OpenParking').val() == ''){
	            $('#OpenParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#OpenParking-error').html('');
	            flag = true;
	        }if($('#CoveredParking').val() == undefined || $('#CoveredParking').val() == ''){
	            $('#CoveredParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#CoveredParking-error').html('');
	            flag = true;
	        }if($('#Basement').val() == undefined || $('#Basement').val() == ''){
	            $('#Basement-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#Basement-error').html('');
	            flag = true;
	        }if($('#LiftParking').val() == undefined || $('#LiftParking').val() == ''){
	            $('#LiftParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#LiftParking-error').html('');
	            flag = true;
	        }if($('#TwoWheeler').val() == undefined || $('#TwoWheeler').val() == ''){
	            $('#TwoWheeler-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#TwoWheeler-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'property-amenities-form'){
	        if($('#res_com').val() == 'Residential' ){
    	        if($('#comment1').val() == undefined || $('#comment1').val() == ''){
    	            $('#comment1-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#comment1-error').html('');
    	            flag = true;
    	        }
	        }else{
	            if($('#comment').val() == undefined || $('#comment').val() == ''){
    	            $('#comment-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#comment-error').html('');
    	            flag = true;
    	        }
	        }
	    }
	    if(btn_id == 'property-upload-files'){
	        /*if($('#UploadImages').val() == undefined || $('#UploadImages').val() == ''){
	            $('#UploadImages-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadImages-error').html('');
	            flag = true;
	        }*//*if($('#UploadVideos').val() == undefined || $('#UploadVideos').val() == ''){
	            $('#UploadVideos-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#UploadVideos-error').html('');
	            flag = true;
	        }*/
	        
	        if($('#UploadImages').val() == undefined || $('#UploadImages').val() == ''){
	            $('#UploadImages-error').html('This filed is required');
                flag = false;
            }else{
	            $('#UploadImages-error').html('');
	            flag = true;
	            $('#dvLoading').css('display', 'block');
	            $('#add_property_form').submit();
	        }
	        /*if($('#UploadVideos').val() == undefined || $('#UploadVideos').val() == ''){
	            $('#UploadVideos-error').html('This filed is required');
                flag = false;
            }else{
	            $('#UploadVideos-error').html('');
	            flag = true;
	        }*/
            
	    }
	    /*alert(flag);*/
	    return flag;
	}
	
	
	
	function validate_form1(btn_id){
	    var flag = false;
	    if(btn_id == 'home-loan-contact'){
	        if($('#name').val() == undefined || $('#name').val() == ''){
	            $('#name-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#name-error').html('');
	            flag = true;
	        }if($('#mobile').val() == undefined || $('#mobile').val() == ''){
	            $('#mobile-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#mobile-error').html('');
	            flag = true;
	        }if($('#email').val() == undefined || $('#email').val() == ''){
	            $('#email-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#email-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'home-loan-address'){
	        if($('#country').val() == undefined || $('#country').val() == ''){
	            $('#country-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#country-error').html('');
	            flag = true;
	        }if($('#city').val() == undefined || $('#city').val() == ''){
	            $('#city-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#city-error').html('');
	            flag = true;
	        }if($('#pincode').val() == undefined || $('#pincode').val() == ''){
	            $('#pincode-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#pincode-error').html('');
	            flag = true;
	        }if($('#state').val() == undefined || $('#state').val() == ''){
	            $('#state-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#state-error').html('');
	            flag = true;
	        }if($('#location').val() == undefined || $('#location').val() == ''){
	            $('#location-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#location-error').html('');
	            flag = true;
	        }if($('#Address').val() == undefined || $('#Address').val() == ''){
	            $('#Address-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#Address-error').html('');
	            flag = true;
	        }
	    }if(btn_id == 'home-loan-info'){
	        if($('#LoanRequiredUpto').val() == undefined || $('#LoanRequiredUpto').val() == ''|| $('#LoanRequiredUpto').val() == 'Select Loan Required Upto'){
	            $('#LoanRequiredUpto-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#LoanRequiredUpto-error').html('');
	            flag = true;
	        }if($('#companyname').val() == undefined || $('#companyname').val() == '' ){
	            $('#companyname-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#companyname-error').html('');
	            flag = true;
	        }if($('#bank').val() == undefined || $('#bank').val() == 'Select bank' ){
	            $('#bank-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#bank-error').html('');
	            flag = true;
	        }if($('#employmentType').val() == undefined || $('#employmentType').val() == 'Select Employment Type' ){
	            $('#employmentType-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#employmentType-error').html('');
	            flag = true;
	        }if($('#annualIncome').val() == undefined || $('#annualIncome').val() == '' ){
	            $('#annualIncome-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#annualIncome-error').html('');
	            flag = true;
	        }
	    }if(btn_id == 'home-load-note'){ 
	        if($('#comment').val() == undefined || $('#comment').val() == ''){
	            $('#comment-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#comment-error').html('');
	            flag = true;
	            $('#dvLoading').css('display', 'block');
	            $('#add_home_load').submit();
	        }
	    }
	    
	    if(btn_id == 'post-requirement-contact'){
	        if($('#mobile').val() == undefined || $('#mobile').val() == '' || ($('#mobile').val().length >10 || $('#mobile').val().length <10) ){
	            $('#mobile-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#mobile-error').html('');
	            flag = true;
	        }if($('#name').val() == undefined || $('#name').val() == ''){
	            $('#name-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#name-error').html('');
	            flag = true;
	        }if($('#phone').val() == undefined || $('#phone').val() == ''){
	            $('#phone-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#phone-error').html('');
	            flag = true;
	        }if($('#email').val() == undefined || $('#email').val() == ''){
	            $('#email-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#email-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'post-requirement-address'){
	        if($('#state').val() == undefined || $('#state').val() == ''){
	            $('#state-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#state-error').html('');
	            flag = true;
	        }if($('#location').val() == undefined || $('#location').val() == ''){
	            $('#location-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#location-error').html('');
	            flag = true;
	        }if($('#city').val() == undefined || $('#city').val() == ''){
	            $('#city-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#city-error').html('');
	            flag = true;
	        }if($('#ComplexSoceityBuilding').val() == undefined || $('#ComplexSoceityBuilding').val() == ''){
	            $('#ComplexSoceityBuilding-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#ComplexSoceityBuilding-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'post-requirement-type'){
	        if($('#rent_sell').val() == undefined || $('#rent_sell').val() == 'Rent / Sell'){
	            $('#rent_sell-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#rent_sell-error').html('');
	            flag = true;
	        }if($('#residential_commercial').val() == undefined || $('#residential_commercial').val() == 'Residential / Commercial'){
	            $('#residential_commercial-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#residential_commercial-error').html('');
	            flag = true;
	        }/*if($('#FurnishedStatus').val() == undefined || $('#FurnishedStatus').val() == 'Residential / Commercial'){
	            $('#FurnishedStatus-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#FurnishedStatus-error').html('');
	            flag = true;
	        }*/
	        /*if($('#residential').val() == undefined || $('#residential').val() == 'Residential / Commercial'){
	            $('#residential-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#residential-error').html('');
	            flag = true;
	        }*/
	    }
	    if(btn_id == 'post-requirement-price'){
	        if($('#MinimumRent').val() == undefined || $('#MinimumRent').val() == ''){
	            $('#MinimumRent-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#MinimumRent-error').html('');
	            flag = true;
	        }
	        if($('#MaximumRent').val() == undefined || $('#MaximumRent').val() == ''){
	            $('#MaximumRent-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#MaximumRent-error').html('');
	            flag = true;
	        }
	    }
	    if(btn_id == 'post-requirement-property'){
	        var residential = $("input[name=residential]:checked").val();
	        /*alert(residential);*/
	        if(residential == 'Flat' || residential == 'PentHouse' || residential == 'DuplexFlat'){
	            if($('#Room').val() == undefined || $('#Room').val() == 'Room'){
    	            $('#Room-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Room-error').html('');
    	            flag = true;
    	        }
    	        if($('#FlatMinimumAreaRequired').val() == undefined || $('#FlatMinimumAreaRequired').val() == ''){
    	            $('#FlatMinimumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#FlatMinimumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#SuperBuildupAreaUnit').val() == undefined || $('#SuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#SuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#SuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumFloorHeight').val() == undefined || $('#MinimumFloorHeight').val() == 'Minimum Floor Height'){
    	            $('#MinimumFloorHeight-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumFloorHeight-error').html('');
    	            flag = true;
    	        }
    	        if($('#Bathroom').val() == undefined || $('#Bathroom').val() == 'Bathroom'){
    	            $('#Bathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Bathroom-error').html('');
    	            flag = true;
    	        }
    	        if($('#FlatMaximumAreaRequired').val() == undefined || $('#FlatMaximumAreaRequired').val() == ''){
    	            $('#FlatMaximumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#FlatMaximumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#BuildupAreaUnit').val() == undefined || $('#BuildupAreaUnit').val() == 'Unit'){
    	            $('#BuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#BuildupAreaUnit -error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumFloorHeight').val() == undefined || $('#MaximumFloorHeight').val() == 'Maximum Floor Height'){
    	            $('#MaximumFloorHeight-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumFloorHeight -error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'Factory'){
	            if($('#MinimumOpenArea').val() == undefined || $('#MinimumOpenArea').val() == ''){
    	            $('#MinimumOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumOpenArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumOpenAreaUnit').val() == undefined || $('#MinimumOpenAreaUnit').val() == 'Unit'){
    	            $('#MinimumOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumOpenAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumCoveredArea').val() == undefined || $('#MinimumCoveredArea').val() == ''){
    	            $('#MinimumCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumCoveredArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumCoveredAreaUnit').val() == undefined || $('#MinimumCoveredAreaUnit').val() == 'Unit'){
    	            $('#MinimumCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#roof').val() == undefined || $('#roof').val() == 'Roof'){
    	            $('#roof-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#roof-error').html('');
    	            flag = true;
    	        }
    	        if($('#ElectricPower').val() == undefined || $('#ElectricPower').val() == ''){
    	            $('#ElectricPower-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ElectricPower-error').html('');
    	            flag = true;
    	        }
    	        if($('#ElectricPowerUnit').val() == undefined || $('#ElectricPowerUnit').val() == 'Unit'){
    	            $('#ElectricPowerUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ElectricPowerUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#NatureofBusiness').val() == undefined || $('#NatureofBusiness').val() == ''){
    	            $('#NatureofBusiness-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#NatureofBusiness-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumOpenArea').val() == undefined || $('#MaximumOpenArea').val() == ''){
    	            $('#MaximumOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumOpenArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumOpenAreaUnit').val() == undefined || $('#MaximumOpenAreaUnit').val() == 'Unit'){
    	            $('#MaximumOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumOpenAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumCoveredArea').val() == undefined || $('#MaximumCoveredArea').val() == ''){
    	            $('#MaximumCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumCoveredArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumCoveredAreaUnit').val() == undefined || $('#MaximumCoveredAreaUnit').val() == 'Unit'){
    	            $('#MaximumCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#RoadWide').val() == undefined || $('#RoadWide').val() == ''){
    	            $('#RoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#RoadWide-error').html('');
    	            flag = true;
    	        }
    	        if($('#RoadWideUnit').val() == undefined || $('#RoadWideUnit').val() == 'Unit'){
    	            $('#RoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#RoadWideUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#HeavyVehicleParkingUpto').val() == undefined || $('#HeavyVehicleParkingUpto').val() == 'Heavy Vehicle Parking Upto'){
    	            $('#HeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'HouseorBanglow'){
	            if($('#HouseRoom').val() == undefined || $('#HouseRoom').val() == 'Room'){
    	            $('#HouseRoom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HouseRoom-error').html('');
    	            flag = true;
    	        }
    	        if($('#HouseMinimumAreaRequired').val() == undefined || $('#HouseMinimumAreaRequired').val() == ''){
    	            $('#HouseMinimumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HouseMinimumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#StockMinimumAreaRequiredUnit').val() == undefined || $('#StockMinimumAreaRequiredUnit').val() == ''){
    	            $('#StockMinimumAreaRequiredUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#StockMinimumAreaRequiredUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#HouseBathroom').val() == undefined || $('#HouseBathroom').val() == 'Bathroom'){
    	            $('#HouseBathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HouseBathroom-error').html('');
    	            flag = true;
    	        }
    	        if($('#HouseMaximumAreaRequired').val() == undefined || $('#HouseMaximumAreaRequired').val() == ''){
    	            $('#HouseMaximumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HouseMaximumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#HouseMaximumOpenAreaUnit').val() == undefined || $('#HouseMaximumOpenAreaUnit').val() == 'Unit'){
    	            $('#HouseMaximumOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#HouseMaximumOpenAreaUnit-error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'Land'|| residential == 'Land2'){
	            if($('#LandMinimumAreaRequired').val() == undefined || $('#LandMinimumAreaRequired').val() == ''){
    	            $('#LandMinimumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandMinimumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#LandSuperBuildupAreaUnit').val() == undefined || $('#LandSuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#LandSuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandSuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#LandFacing').val() == undefined || $('#LandFacing').val() == 'Land Facing'){
    	            $('#LandFacing-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandFacing-error').html('');
    	            flag = true;
    	        }
    	        if($('#LandMaximumAreaRequired').val() == undefined || $('#LandMaximumAreaRequired').val() == ''){
    	            $('#LandMaximumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandMaximumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumAreaRequiredUnit').val() == undefined || $('#MaximumAreaRequiredUnit').val() == 'Unit'){
    	            $('#MaximumAreaRequiredUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumAreaRequiredUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#LandRoadWide').val() == undefined || $('#LandRoadWide').val() == ''){
    	            $('#LandRoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandRoadWide-error').html('');
    	            flag = true;
    	        }
    	        if($('#LandRoadWideUnit').val() == undefined || $('#LandRoadWideUnit').val() == 'Unit'){
    	            $('#LandRoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#LandRoadWideUnit-error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'Office'){
	            if($('#NumberofCabin').val() == undefined || $('#NumberofCabin').val() == ''){
    	            $('#NumberofCabin-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#NumberofCabin-error').html('');
    	            flag = true;
    	        }
    	        if($('#OfficeMinimumAreaRequired').val() == undefined || $('#OfficeMinimumAreaRequired').val() == ''){
    	            $('#OfficeMinimumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeMinimumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#OfficeSuperBuildupAreaUnit').val() == undefined || $('#OfficeSuperBuildupAreaUnit').val() == 'Unit'){
    	            $('#OfficeSuperBuildupAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeSuperBuildupAreaUnit-error').html('');
    	            flag = true;
    	        }if($('#OfficeMinimumFloorHeight').val() == undefined || $('#OfficeMinimumFloorHeight').val() == 'Minimum Floor Height'){
    	            $('#OfficeMinimumFloorHeight-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeMinimumFloorHeight-error').html('');
    	            flag = true;
    	        }if($('#Pentry').val() == undefined || $('#Pentry').val() == ''){
    	            $('#Pentry-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Pentry-error').html('');
    	            flag = true;
    	        }if($('#PentryUsedFor').val() == undefined || $('#PentryUsedFor').val() == 'Used For'){
    	            $('#PentryUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#PentryUsedFor-error').html('');
    	            flag = true;
    	        }if($('#AC').val() == undefined || $('#AC').val() == 'AC'){
    	            $('#AC-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#AC-error').html('');
    	            flag = true;
    	        }if($('#NumberofWorkStation').val() == undefined || $('#NumberofWorkStation').val() == 'Number of Work Station'){
    	            $('#NumberofWorkStation-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#NumberofWorkStation-error').html('');
    	            flag = true;
    	        }if($('#MaximumAreaRequired').val() == undefined || $('#MaximumAreaRequired').val() == ''){
    	            $('#MaximumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumAreaRequired-error').html('');
    	            flag = true;
    	        }if($('#OfficeMaximumAreaRequiredUnit').val() == undefined || $('#OfficeMaximumAreaRequiredUnit').val() == 'Unit'){
    	            $('#OfficeMaximumAreaRequiredUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeMaximumAreaRequiredUnit-error').html('');
    	            flag = true;
    	        }if($('#OfficeMaximumFloorHeight').val() == undefined || $('#OfficeMaximumFloorHeight').val() == 'Maximum Floor Height'){
    	            $('#OfficeMaximumFloorHeight-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeMaximumFloorHeight-error').html('');
    	            flag = true;
    	        }if($('#OfficeBathroom').val() == undefined || $('#OfficeBathroom').val() == ''){
    	            $('#OfficeBathroom-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeBathroom-error').html('');
    	            flag = true;
    	        }if($('#BathroomUsedFor').val() == undefined || $('#BathroomUsedFor').val() == 'Used For'){
    	            $('#BathroomUsedFor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#BathroomUsedFor-error').html('');
    	            flag = true;
    	        }if($('#OfficeNatureofBusiness').val() == undefined || $('#OfficeNatureofBusiness').val() == ''){
    	            $('#OfficeNatureofBusiness-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#OfficeNatureofBusiness-error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'ShoporShowroom'){
	            if($('#ShopNatureofBusiness').val() == undefined || $('#ShopNatureofBusiness').val() == ''){
    	            $('#ShopNatureofBusiness-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ShopNatureofBusiness-error').html('');
    	            flag = true;
    	        }
    	        if($('#ShopMinimumAreaRequired').val() == undefined || $('#ShopMinimumAreaRequired').val() == ''){
    	            $('#ShopMinimumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ShopMinimumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumAreaRequiredUnit').val() == undefined || $('#MinimumAreaRequiredUnit').val() == 'Unit'){
    	            $('#MinimumAreaRequiredUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumAreaRequiredUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#Frontage').val() == undefined || $('#Frontage').val() == ''){
    	            $('#Frontage-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#Frontage-error').html('');
    	            flag = true;
    	        }
    	        if($('#ShopMaximumAreaRequired').val() == undefined || $('#ShopMaximumAreaRequired').val() == ''){
    	            $('#ShopMaximumAreaRequired-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ShopMaximumAreaRequired-error').html('');
    	            flag = true;
    	        }
    	        if($('#FrontageUnit').val() == undefined || $('#FrontageUnit').val() == 'Unit'){
    	            $('#FrontageUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#FrontageUnit-error').html('');
    	            flag = true;
    	        }if($('#ShopMaximumAreaRequiredUnit').val() == undefined || $('#ShopMaximumAreaRequiredUnit').val() == 'Unit'){
    	            $('#ShopMaximumAreaRequiredUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#ShopMaximumAreaRequiredUnit-error').html('');
    	            flag = true;
    	        }
	        }
	        if(residential == 'Warehouse'){
	            if($('#WarehouseMinimumCoveredArea').val() == undefined || $('#WarehouseMinimumCoveredArea').val() == ''){
    	            $('#WarehouseMinimumCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMinimumCoveredArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMinimumOpenArea').val() == undefined || $('#WarehouseMinimumOpenArea').val() == ''){
    	            $('#WarehouseMinimumOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMinimumOpenArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMinimumCoveredAreaUnit').val() == undefined || $('#WarehouseMinimumCoveredAreaUnit').val() == 'Unit'){
    	            $('#WarehouseMinimumCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMinimumCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMinimumOpenAreaUnit').val() == undefined || $('#WarehouseMinimumOpenAreaUnit').val() == 'Unit'){
    	            $('#WarehouseMinimumOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMinimumOpenAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#MinimumFloor').val() == undefined || $('#MinimumFloor').val() == 'Minimum Floor'){
    	            $('#MinimumFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MinimumFloor-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseRoof').val() == undefined || $('#WarehouseRoof').val() == 'Roof'){
    	            $('#WarehouseRoof-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseRoof-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseHeavyVehicleParkingUpto').val() == undefined || $('#WarehouseHeavyVehicleParkingUpto').val() == 'Heavy Vehicle Parking Upto'){
    	            $('#WarehouseHeavyVehicleParkingUpto-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseHeavyVehicleParkingUpto-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMaximumCoveredArea').val() == undefined || $('#WarehouseMaximumCoveredArea').val() == ''){
    	            $('#WarehouseMaximumCoveredArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMaximumCoveredArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMaximumOpenArea').val() == undefined || $('#WarehouseMaximumOpenArea').val() == ''){
    	            $('#WarehouseMaximumOpenArea-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMaximumOpenArea-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMaximumCoveredAreaUnit').val() == undefined || $('#WarehouseMaximumCoveredAreaUnit').val() == 'Unit'){
    	            $('#WarehouseMaximumCoveredAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMaximumCoveredAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseMaximumOpenAreaUnit').val() == undefined || $('#WarehouseMaximumOpenAreaUnit').val() == 'Unit'){
    	            $('#WarehouseMaximumOpenAreaUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseMaximumOpenAreaUnit-error').html('');
    	            flag = true;
    	        }
    	        if($('#MaximumFloor').val() == undefined || $('#MaximumFloor').val() == 'Maximum Floor'){
    	            $('#MaximumFloor-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#MaximumFloor-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseRoadWide').val() == undefined || $('#WarehouseRoadWide').val() == ''){
    	            $('#WarehouseRoadWide-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseRoadWide-error').html('');
    	            flag = true;
    	        }
    	        if($('#WarehouseRoadWideUnit').val() == undefined || $('#WarehouseRoadWideUnit').val() == 'Unit'){
    	            $('#WarehouseRoadWideUnit-error').html('This filed is required');
    	            flag = false;
    	        }else{
    	            $('#WarehouseRoadWideUnit-error').html('');
    	            flag = true;
    	        }
	        }
	    }
	    if(btn_id == 'post-requirement-other'){
	        /*if($('#section').val() == undefined || $('#section').val() == ''){
	            $('#section-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#section-error').html('');
	            flag = true;
	        }*/
	        if($('#PossessionDate').val() == undefined || $('#PossessionDate').val() == ''){
	            $('#PossessionDate-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PossessionDate-error').html('');
	            flag = true;
	        }if($('#OpenParking').val() == undefined || $('#OpenParking').val() == ''){
	            $('#OpenParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#OpenParking-error').html('');
	            flag = true;
	        }if($('#CoveredParking').val() == undefined || $('#CoveredParking').val() == ''){
	            $('#CoveredParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#CoveredParking-error').html('');
	            flag = true;
	        }if($('#Basement').val() == undefined || $('#Basement').val() == ''){
	            $('#Basement-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#Basement-error').html('');
	            flag = true;
	        }if($('#LiftParking').val() == undefined || $('#LiftParking').val() == ''){
	            $('#LiftParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#LiftParking-error').html('');
	            flag = true;
	        }if($('#TwoWheeler').val() == undefined || $('#TwoWheeler').val() == ''){
	            $('#TwoWheeler-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#TwoWheeler-error').html('');
	            $('#dvLoading').css('display', 'block');
	            $('#add_requirement').submit();
	            flag = true;
	        }
	    }
	    /*if(btn_id == 'post-requirement-other'){
	        if($('#PossessionDate').val() == undefined || $('#PossessionDate').val() == ''){
	            $('#PossessionDate-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#PossessionDate-error').html('');
	            flag = true;
	        }if($('#OpenParking').val() == undefined || $('#OpenParking').val() == ''){
	            $('#OpenParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#OpenParking-error').html('');
	            flag = true;
	        }if($('#CoveredParking').val() == undefined || $('#CoveredParking').val() == ''){
	            $('#CoveredParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#CoveredParking-error').html('');
	            flag = true;
	        }if($('#Basement').val() == undefined || $('#Basement').val() == ''){
	            $('#Basement-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#Basement-error').html('');
	            flag = true;
	        }if($('#LiftParking').val() == undefined || $('#LiftParking').val() == ''){
	            $('#LiftParking-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#LiftParking-error').html('');
	            flag = true;
	        }if($('#TwoWheeler').val() == undefined || $('#TwoWheeler').val() == ''){
	            $('#TwoWheeler-error').html('This filed is required');
	            flag = false;
	        }else{
	            $('#TwoWheeler-error').html('');
	            flag = true;
	        }
	    }*/
	    return flag;
	}
});









