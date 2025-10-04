$('#user_registration_form').validate({
    rules: {
        usertype:{
            required: true,
        },
        name:{
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
        }, 

        password:{
            required: true,
        },
         ConfirmPassword:{
            required: true,
            equalTo: '#password_u_r'
        },
    },
    messages: {
        usertype:{
            required: "This field is required",
        },
        name:{
            required: "This field is required",
        },
        email:{
            required: "This field is required",
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
    }
});


$('#lead_partner_registration_form').validate({
    rules: {
        name:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        confirm_email:{
            required: true,
            email: true,
            equalTo: '#lead_email'
        },
        phone:{
            required: true,
            minlength: 10,
            maxlength: 10,
        }, 

        password:{
            required: true,
        },
         ConfirmPassword:{
            required: true,
            equalTo: '#lead_password'
        },
    },
    messages: {
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
    }
});


$('#user-login-form').validate({
    rules: {
        email:{
            required: true,
        },
    },
    messages: {
        email:{
            required: "This field is required",
        },
        
    }
});


$('#lead-partner-login-form').validate({
    rules: {
        email:{
            required: true,
            email: true,
        },
        password:{
            required: true,
        },
    },
    messages: {
        email:{
            required: "This field is required",
        },
        password:{
            required: "This field is required",
        },
    }
});



$('#multi-step-1').validate({
    rules: {
        email:{
            required: true,
            email: true,
        },
        password:{
            required: true,
        },
    },
    messages: {
        email:{
            required: "This field is required",
        },
        password:{
            required: "This field is required",
        },
    }
});


$('#lead-partner-login-form').validate({
    rules: {
        email:{
            required: true,
            email: true,
        },
        password:{
            required: true,
        },
    },
    messages: {
        email:{
            required: "This field is required",
        },
        password:{
            required: "This field is required",
        },
    }
});


$('#change_user_password_form').validate({
    rules: {
        old_password:{
            required: true,
        },
        new_password:{
            required: true,
        },
        confirm_password:{
            required: true,
            equalTo: '#new_password'
        },
    },
    messages: {
        old_password:{
            required: "This field is required",
        },
        new_password:{
            required: "This field is required",
        },
        confirm_password:{
            required: "This field is required",
            equalTo: "Please enter same password again",
        },
    }
});


$('#change_lead_password_form').validate({
    rules: {
        lead_old_password:{
            required: true,
        },
        lead_new_password:{
            required: true,
        },
        lead_confirm_password:{
            required: true,
            equalTo: '#lead_new_password'
        },
    },
    messages: {
        lead_old_password:{
            required: "This field is required",
        },
        lead_new_password:{
            required: "This field is required",
        },
        lead_confirm_password:{
            required: "This field is required",
            equalTo: "Please enter same password again",
        },
    }
});


$('#quick_enquiry_form').validate({
    rules: {
        contact_name:{
            required: true,
        },
        contact_email:{
            required: true,
            email: true,
        },
        contact_number:{
            required: true,
            minlength: 10,
            maxlength: 10,
            digits:true
        },
        contact_subject:{
            required: true,
        },
        contact_msg:{
            required: true,
        },
    },
    messages: {
        lead_old_password:{
            required: "This field is required",
        },
        lead_new_password:{
            required: "This field is required",
        },
        lead_confirm_password:{
            required: "This field is required",
            equalTo: "Please enter same password again",
        },
    }
});

$('#get_in_touch').validate({
    rules: {
        phone:{
            required: true,
            minlength: 10,
            maxlength: 10,
            digits:true
        },
        email:{
            required: true,
            email: true,
        },
        message:{
            required: true,
        },
    },
    messages: {
        phone:{
            required: "This field is required",
        },
        email:{
            required: "This field is required",
        },
        message:{
            required: "This field is required",
        },
    }
});

$('#see_details_contact_form').validate({
    rules: {
        full_name:{
            required: true,
        },
        email:{
            required: true,
            email: true,
        },
        message:{
            required: true,
        },
    },
    messages: {
        phone:{
            required: "This field is required",
        },
        email:{
            required: "This field is required",
        },
        message:{
            required: "This field is required",
        },
    }
});

$('#property_review_rating_form').validate({
    rules: {
        review_title:{
            required: true,
        },
        review_msg:{
            required: true,
        },
    },
    messages: {
        review_title:{
            required: "This field is required",
        },
        review_msg:{
            required: "This field is required",
        },
    }
});


$('#see_details_enquiry_form').validate({
    rules: {
        user_name:{
            required: true,
        },
        user_phone:{
            required: true,
            minlength: 10,
            maxlength: 10,
            digits:true
        },
        user_email:{
            required: true,
            email: true,
        },
        user_message:{
            required: true,
        },
    },
    messages: {
        user_name:{
            required: "This field is required",
        },
        user_phone:{
            required: "This field is required",
        },
        user_email:{
            required: "This field is required",
        },
        user_message:{
            required: "This field is required",
        },
    }
});


$('#see_details_request_viewing').validate({
    rules: {
        request_date:{
            required: true,
        },
        request_time:{
            required: true,
        },
        requestor_name:{
            required: true,
        },
        request_message:{
            required: true,
        },
    },
    messages: {
        request_date:{
            required: "This field is required",
        },
        request_time:{
            required: "This field is required",
        },
        requestor_name:{
            required: "This field is required",
        },
        request_message:{
            required: "This field is required",
        },
    }
});



$('#lead-partner-forgot-password-form').validate({
    rules: {
        lead_email:{
            required: true,
            email: true,
        },
    },
});

$('#user-forgot-password-form').validate({
    rules: {
        user_forgot_email:{
            required: true,
            email: true,
        },
    },
});

$('#reset_user_password').validate({
    rules: {
        password:{
            required: true,
        },
        confirm_password:{
            required: true,
            equalTo: '#user_confirm_password'
        },
    },
});

$('#reset_lead_partner_password').validate({
    rules: {
        password:{
            required: true,
        },
        confirm_password:{
            required: true,
            equalTo: '#lead_partner_confirm_password'
        },
    },
});