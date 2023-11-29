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

        $('#loginForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: 'login.php', // Your PHP login script
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response == 1) {
                        window.location = 'home.php'; // Redirect to dashboard on successful login
                    } else {
                        $('#error').text(response); // Display error message
                    }
                }
            });
        });


$("#loginForm").validate({
    rules: {
        email: {
            required: true,
            // minlength: 3
        },
     
        password: {
            required: true,
            // minlength: 6
        }
    },
    messages: {
       email: {
            required: "Please use a valid email address",
            // minlength: "Username must be at least 3 characters long"
        },
    
        password: {
            required: "Please enter a password",
            // minlength: "Password must be at least 8 characters long"
        }
    }
});


});

}(jQuery));


