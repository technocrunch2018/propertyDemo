$('#residential_flat_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        phone:{
            required: true,
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        */
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        complex_society_building:{
            required: true,
        },
        /*
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },*/
        pincode:{
            required: true,
        },
        blockno:{
            required: true,
        },
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        /*
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        */
        flat_Room:{
            required: true,
        },
        flat_Balcony:{
            required: true,
        },
        /*
        flat_SuperBuildupArea:{
            required: true,
        },
        flat_SuperBuildupAreaUnit:{
            required: true,
        },
        flat_CarpetArea:{
            required: true,
        },
        flat_Carpet_Unit:{
            required: true,
        },
        flat_TotalFloor:{
            required: true,
        },
        */
        flat_Bathroom:{
            required: true,
        },
        flat_Kitchen:{
            required: true,
        },
        flat_BuildupArea:{
            required: true,
        },
        flat_BuildupArea_Unit:{
            required: true,
        },
        flat_Floor:{
            required: true,
        },
        /*
        flat_HeavyVehicleParkingUpto:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
    /*messages: {
        usertype:{
            required: "This field is required",
        },
        name:{
            required: "This field is required",
        },
        email:{
            required: "This field is required",
        },
        confirm_email:{
            required: "This field is required",
            equalTo: 'Please enter same email again'
        },
        phone:{
            required: "This field is required",
        }, 

        password:{
            required: "This field is required",
        },
         ConfirmPassword:{
            required: "This field is required",
            equalTo: "Please enter same password again",
        },
    }*/
});



$('#residential_house_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        complex_society_building:{
            required: true,
        },
        /*
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        blockno:{
            required: true,
        },
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        */
        house_Room:{
            required: true,
        },
        house_Balcony:{
            required: true,
        },
        /*
        house_SuperBuildupArea:{
            required: true,
        },
        house_SuperBuildupArea_Unit:{
            required: true,
        },
        house_CarpetArea:{
            required: true,
        },
        house_Carpet_Unit:{
            required: true,
        },
        house_TotalCoveredLandArea:{
            required: true,
        },
        house_TotalCoveredLandArea_unit:{
            required: true,
        },
        house_TotalFloor:{
            required: true,
        },
        */
        house_Bathroom:{
            required: true,
        },
        house_Kitchen:{
            required: true,
        },
        house_BuildupArea:{
            required: true,
        },
        house_BuildupAreaUnit:{
            required: true,
        },
        /*
        house_TotalLandArea:{
            required: true,
        },
        house_TotalLandArea_Unit:{
            required: true,
        },
        house_TotalUncoveredLandArea:{
            required: true,
        },
        house_TotalUncoveredLandArea_Unit:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
});





$('#residential_pent_house_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        complex_society_building:{
            required: true,
        },
        /*
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
           required: true,
        },
        blockno:{
            required: true,
        },
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        */
        pent_room:{
            required: true,
        },
        pent_balcony:{
            required: true,
        },
        /*
        pent_super_buildup_area:{
            required: true,
        },
        pent_super_buildup_area_Unit:{
            required: true,
        },
        pent_carpet_area:{
            required: true,
        },
        pent_carpet_unit:{
            required: true,
        },
        */
        pent_buildup_area:{
            required: true,
        },
        pent_buildup_area_Unit:{
            required: true,
        },
        pent_floor:{
            required: true,
        },
        pent_bathroom:{
            required: true,
        },
        pent_kitchen:{
            required: true,
        },
        /*
        open_terrace:{
            required: true,
        },
        pent_open_terrace_unit:{
            required: true,
        },
        total_floor:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
});




$('#residential_duplex_flat_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 

        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        complex_society_building:{
            required: true,
        },
        /*
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
             required: true,
        },
        blockno:{
            required: true,
        },
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        super_buildup_area:{
            required: true,
        },
        super_buildup_area_unit:{
            required: true,
        },
        carpet_area:{
            required: true,
        },
        carpet_unit:{
            required: true,
        },
        */
        buildup_area:{
            required: true,
        },
        buildup_area_Unit:{
            required: true,
        },
        /*
        upperfloorno:{
            required: true,
        },
        lower_floor_no:{
            required: true,
        },
        totalfloor:{
            required: true,
        },
        */
        room:{
            required: true,
        },
        balcony:{
            required: true,
        },
        bathroom:{
            required: true,
        },
        kitchen:{
            required: true,
        },
        /*
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
});



$('#residential_land_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 

        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        complex_society_building:{
            required: true,
        },
        /*
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        blockno:{
            required: true,
        },
        flatno:{
            required: true,
        },
        /*
        FurnishedStatus:{
            required: true,
        },
        */
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        LandArea:{
            required: true,
        },
        land_SuperBuildupArea_Unit:{
            required: true,
        },
        LandStatus:{
            required: true,
        },
        NatureofLand:{
            required: true,
        },
        PropertyTax:{
            required: true,
        },
        LandFacing:{
            required: true,
        },
        landCoveredArea:{
            required: true,
        },
        landCoveredAreaUnit:{
            required: true,
        },
        IstheExistingOwner:{
            required: true,
        },
        NoOfOwner:{
            required: true,
        },
        Mutation:{
            required: true,
        },
        LandRoadWide:{
            required: true,
        }, 
        
        LandRoadWideUnit:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
});



$('#commercial_land_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        /*
        complex_society_building:{
            required: true,
        },
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        /*
        blockno:{
            required: true,
        },
        */
        flatno:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        LandArea:{
            required: true,
        },
        land_SuperBuildupArea_Unit:{
            required: true,
        },
        LandStatus:{
            required: true,
        },
        NatureofLand:{
            required: true,
        },
        PropertyTax:{
            required: true,
        },
        LandFacing:{
            required: true,
        },
        landCoveredArea:{
            required: true,
        },
        landCoveredAreaUnit:{
            required: true,
        },
        IstheExistingOwner:{
            required: true,
        },
        NoOfOwner:{
            required: true,
        },
        Mutation:{
            required: true,
        },
        LandRoadWide:{
            required: true,
        }, 
        
        LandRoadWideUnit:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment1:{
            required: true,
        },
        */
        
    },
});



$('#commercial_office_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        /*
        complex_society_building:{
            required: true,
        },
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        /*
        blockno:{
            required: true,
        },
        */
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        officeNumberofCabin:{
            required: true,
        },
        officeSuperBuildupArea:{
            required: true,
        },
        officeSuperBuildupAreaUnit:{
            required: true,
        },
        officeCarpetArea:{
            required: true,
        },
        officeCarpetUnit:{
            required: true,
        },
        Flooroffice:{
            required: true,
        },
        Pentryoffice:{
            required: true,
        },
        PentryofficeUsedFor:{
            required: true,
        },
        officeNumberofWorkStation:{
            required: true,
        },
        */
        officeBuildupArea:{
            required: true,
        },
        officeBuildupAreaUnit:{
            required: true,
        },
        /*
        officeAC:{
            required: true,
        }, 
        
        officeTotalFloor:{
            required: true,
        },
        officeBathroom:{
            required: true,
        },
        BathroomofficeUsedFor:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment:{
            required: true,
        },
        */
        
    },
});


$('#commercial_shop_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        /*
        complex_society_building:{
            required: true,
        },
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        /*
        blockno:{
            required: true,
        },
        */
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        shoproof:{
            required: true,
        },
        shopSuperBuildupArea:{
            required: true,
        },
        shopSuperBuildupAreaUnit:{
            required: true,
        },
        shopCoveredArea:{
            required: true,
        },
        shopCoveredAreaUnit:{
            required: true,
        },
        */
        shopFloor:{
            required: true,
        },
        shopBuildupArea:{
            required: true,
        },
        shopBuildupAreaUnit:{
            required: true,
        },
        /*
        shopRoadWide:{
            required: true,
        },
        shopRoadWideUnit:{
            required: true,
        },
        shopFloor:{
            required: true,
        },
        shopBathroom:{
            required: true,
        },
        shopAvailableForBar:{
            required: true,
        }, 
        
        shopBathroomUnit:{
            required: true,
        },
        shopForResturant:{
            required: true,
        },
        shopFrontage:{
            required: true,
        },
        shopBuildupAreaUnit:{
            required: true,
        },
        shopOpenArea:{
            required: true,
        },
        shopOpenAreaUnit:{
            required: true,
        },
        shopTotalFloor:{
            required: true,
        },
        shopPentry:{
            required: true,
        },
        shopPentryUsedFor:{
            required: true,
        },
        shopElectricPower:{
            required: true,
        },
        shopElectricPowerUnit:{
            required: true,
        },
        shopHeavyVehicleParkingUpto:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment:{
            required: true,
        },
        */
        
    },
});


$('#commercial_warehouse_form').validate({
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        /*
        complex_society_building:{
            required: true,
        },
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        /*
        blockno:{
            required: true,
        },
        */
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        warehouseNumberofCabin:{
            required: true,
        },
        warehouseSuperBuildupArea:{
            required: true,
        },
        warehouseSuperBuildupAreaUnit:{
            required: true,
        },
        warehouseCoveredAreaUnit:{
            required: true,
        },
        warehouseFloor:{
            required: true,
        },
        warehouseroof:{
            required: true,
        },
        warehouseRoadWide:{
            required: true,
        },
        warehouseRoadWideUnit:{
            required: true,
        },
        warehouseHeavyVehicleParkingUpto:{
            required: true,
        },
        warehouseNumberofWorkStation:{
            required: true,
        },
        */
        warehouseBuildupArea:{
            required: true,
        },
        warehouseBuildupAreaUnit:{
            required: true,
        }, 
        /*
        warehouseOpenArea:{
            required: true,
        },
        warehouseOpenAreaUnit:{
            required: true,
        },
        warehouseTotalFloor:{
            required: true,
        },
        warehousePentry:{
            required: true,
        },
        warehousePentryUsedFor:{
            required: true,
        },
        warehouseBathroom:{
            required: true,
        },
        warehouseBathroomUsedFor:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment:{
            required: true,
        },
        */
        
    },
});



$('#commercial_factory_form').validate({
    onblur: true,
    rules: {
        
        name:{
            required: true,
        },
        mobile:{
            required: true,
        },
        /*
        mobile1:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        */
        phone:{
            minlength: 10,
            maxlength: 10,
            digits:true
        }, 
        state:{
            required: true,
        },
         city:{
            required: true,
        },
        location:{
            required: true,
        },
        /*
        complex_society_building:{
            required: true,
        },
        landmark:{
            required: true,
        },
        address:{
            required: true,
        },
        */
        pincode:{
            required: true,
        },
        /*
        blockno:{
            required: true,
        },
        */
        flatno:{
            required: true,
        },
        FurnishedStatus:{
            required: true,
        },
        /*
         security_deposite:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        */
        rentPerMonth:{
            required: ($('#rent_sell').val()=='Rent'),
        },
        net_amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        /*
        amount:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        */
        per_unit:{
            required: ($('#rent_sell').val()=='Sell'),
        },
        section:{
            required: true,
        },
        PossessionDate:{
            required: ($('#section').val()=='Possession From'),
        },
        /*
        PropertyType:{
            required: true,
        },
        OpenParking:{
            required: true,
        },
        CoveredParking:{
            required: true,
        },
        Basement:{
            required: true,
        },
        LiftParking:{
            required: true,
        },
         TwoWheeler:{
            required: true,
        },
         AgeofPropeety:{
            required: true,
        },
        factory_numberofcabin:{
            required: true,
        },
        factory_super_buildup_area:{
            required: true,
        },
        factory_super_buildup_area_unit:{
            required: true,
        },
        factory_carpet_area:{
            required: true,
        },
        factory_carpet_unit:{
            required: true,
        },
        */
        factory_floor:{
            required: true,
        },
        /*
        factory_pentry:{
            required: true,
        },
        factory_pentry_usedFor:{
            required: true,
        },
        factory_roadWide:{
            required: true,
        },
        factory_roadWide_unit:{
            required: true,
        },
        factory_ManufacturingType:{
            required: true,
        },
        factory_NumberofWorkStation:{
            required: true,
        }, 
        */
        factory_BuildupArea:{
            required: true,
        },
        factory_BuildupAreaUnit:{
            required: true,
        },
        /*
        factory_OpenArea:{
            required: true,
        },
        factory_OpenAreaUnit:{
            required: true,
        },
        factory_TotalFloor:{
            required: true,
        },
        factory_Bathroom:{
            required: true,
        },
        factory_Bathroom_UsedFor:{
            required: true,
        },
        factory_ElectricPower:{
            required: true,
        },
        factory_HeavyVehicleParkingUpto:{
            required: true,
        },
        UploadImages:{
            required: true,
        },
        UploadVideos:{
            required: true,
        },
         comment:{
            required: true,
        },
        */
        
    },
});



/*$('#send_link_form').validate({
    rules: {
        
        send_method:{
            required: true,
        },
        mobile_sms:{
            required: ($('input[name=send_method]:checked').val() == 'sms'),
            minlength: 10,
            maxlength: 10,
            digits:true
        },
        mobile_whatsapp:{
            required: ($('input[name=send_method]:checked').val() == 'whatsapp'),
            minlength: 10,
            maxlength: 10,
            digits:true
        },
        email_id:{
            required: ($('input[name=send_method]:checked').val() == 'email'),
            email: ($('input[name=send_method]:checked').val() == 'email'),
        },
        
    },
});*/

/*$('#interested_popup_form').validate({
    rules: {
        interested_status:{
            required: true,
        },
        interested_buyer:{
            required: {
                depends: function(element) {
                    if($("#interested_status").val() == "In Process"){
                        alert($("#interested_status").val());
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        },
        interested_amount:{
            required: ($('#interested_status').val() === 'In Process'),
        },
        interested_deposite:{
            required: ($('#interested_status').val() === 'In Process'),
        },
        interested_rent:{
            required: ($('#interested_status').val() === 'In Process'),
        },
        interested_expiry_date:{
            required: ($('#interested_status').val() === 'In Process'),
        },
        interested_commission:{
            required: ($('#interested_status').val() === 'In Process'),
        },
        
    },
});*/