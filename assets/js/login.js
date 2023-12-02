// $('#loginForm').validate({
//     errorPlacement:function(error,element){
//         error.insertAfter(element);
//     },
//     rules:{
//         name:"required",
//         email:"required",
//         focusCleanup: true,
//         validClass: "success",


//     }
// });

(function ($) {
    // 'use strict';
    $(document).ready(function () {

        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email:true

                },

                password: {
                    required: true,
                     minlength: 6,
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email:"Please enter a valid email"
                },

                password: {
                    required: "Please enter a password",
                     minlength: "Password must be at least 6 characters long",
                }
            },
            errorPlacement: function (error, element) {
                // if (element.attr('name') === 'agree_terms') {
                //     error.insertAfter('#check-label-id');
                //
                // }
                error.addClass("invalid-feedback");
                error.appendTo(element.parent()); // Place error message after the input element
            },
            success: function (label, element) {
                // Add a success message for each valid field
                $(element).addClass('valid');
                $(element).next('span').text('Looks good !').addClass('valid').css("color", "#198754");
            },

            submitHandler:function(form){
                $.ajax({
                    url: 'login_data.php', // Your PHP login script
                    type: 'POST',
                    data:$(form).serialize(),
                    success: function (response) {
                        if (response == 1) {
                            window.location = 'home.php'; // Redirect to dashboard on successful login
                        } else {
                            $('#error').text(response).addClass("alert alert-danger").css("text-align","center"); // Display error message
                        }
                    },
                    error:function(xhr,status,error){
                        if (xhr.status === 404) {
                            alert('Resource not found.');
                        } else if (status === 'timeout') {
                            alert('The request timed out.');
                        } else {
                            alert('An error occurred: ' + error);
                        }
                    }

                });
                return false;
            }

        });


        // $('#loginForm').submit(function (event) {
        //     event.preventDefault(); // Prevent the form from submitting normally
        //
        //     var formData = $(this).serialize(); // Serialize form data
        //
        //     $.ajax({
        //         url: 'login.php', // Your PHP login script
        //         type: 'POST',
        //         data: formData,
        //         success: function (response) {
        //             if (response == 1) {
        //                 window.location = 'home.php'; // Redirect to dashboard on successful login
        //             } else {
        //                 $('#error').text(response).addClass("alert alert-danger"); // Display error message
        //             }
        //         },
        //         error:function(xhr,status,error){
        //             if (xhr.status === 404) {
        //                 alert('Resource not found.');
        //             } else if (status === 'timeout') {
        //                 alert('The request timed out.');
        //             } else {
        //                 alert('An error occurred: ' + error);
        //             }
        //         }
        //
        //     });
        // });


    });

}(jQuery));


