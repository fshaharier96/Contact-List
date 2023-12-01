(function ($) {
    'use strict';



    // console.log("I am ready: before");

    $(document).ready(function () {

        // console.log("I am ready");

       var validator = $("#signupForm").validate({

            rules: {

                email:{
                    required:true,
                    email:true,
                },
                username: {
                    required: true,
                    maxlength:15,
                    minlength:5
                },

                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                confirm_password:{
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                agree_terms:{
                    required: true
                }

            },
            messages: {

                email:{
                    required:"Please enter your email",
                    email:"please enter a valid email address"
                },
                username: {
                    required: "Please enter a username",
                    maxlength: "character length exceeds maxlength",
                    minlength: "Too few character"
                },

                password: {
                    required: "Please enter a password",
                    maxlength: "character length exceeds maxlength",
                    minlength: "Too few character"
                    // minlength: "Password must be at least 8 characters long"
                },
                confirm_password: {
                    required: "Please enter a password",
                    maxlength: "character length exceeds maxlength",
                    minlength: "Too few character"
                },

                agree_terms:{
                    required:"Please check the box to agree to the terms and conditions"
                }
            },

           errorPlacement: function(error, element) {
               // if (element.attr('name') === 'agree_terms') {
               //     error.insertAfter('#check-label-id');
               //
               // }
               error.addClass("invalid-feedback");
               error.appendTo(element.parent()); // Place error message after the input element
           },

           errorClass: "is-invalid", // Apply Bootstrap class for invalid fields
           validClass: "is-valid", // Apply Bootstrap class for valid fields

           highlight: function(element, errorClass, validClass,error) {
               $(element).addClass(errorClass).removeClass(validClass)
           },

           unhighlight: function(element, errorClass, validClass) {
               $(element).removeClass(errorClass).addClass(validClass);

           },
           submitHandler: function(form) {
               form.submit(); // Example: submit the form
           }



            //errorClass: "invalid-feedback",
            // errorElement: "p"
        });
    });

}(jQuery));

