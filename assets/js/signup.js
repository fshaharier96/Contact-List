
$("#signupForm").validate({
    rules: {
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
        username: {
            required: "Please enter a username",
            // minlength: "Username must be at least 3 characters long"
        },
    
        password: {
            required: "Please enter a password",
            // minlength: "Password must be at least 8 characters long"
        }
    }
});