(function ($) {
    'use strict';



    // console.log("I am ready: before");

    $(document).ready(function () {

        // console.log("I am ready");

        $("#signupForm").validate({

            rules: {

                email:{
                    required:true
                },
                username: {
                    required: true,
                    // minlength: 3
                },

                password: {
                    required: true,
                    // minlength: 6
                }
            },
            messages: {

                email:{
                    required:"Please enter valid email"
                },
                username: {
                    required: "Please enter a username",
                    // minlength: "Username must be at least 3 characters long"
                },

                password: {
                    required: "Please enter a password",
                    // minlength: "Password must be at least 8 characters long"
                }
            },
            //errorClass: "invalid-feedback",
            // errorElement: "p"
        });
    });

}(jQuery));

