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


