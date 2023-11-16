let file=$('#create-file-id');
file.on("change",function(event){
    var x = URL.createObjectURL(event.target.files[0]);
    $('#create-image-id').attr("src",x);
    $('#create-image-id').css('display','block');
    $('.create-img-icon').hide();

})

$("#datepicker").flatpickr({
    dateFormat: "d-m-Y", // Date format
    // minDate: "today", // Minimum selectable date
    // maxDate: "2023-12-31", // Maximum selectable date
    defaultDate: "today", // Default date
    enableTime:true, // Enable time selection
    time_24hr: false // Use 24-hour format for time
    // Other options...
});

$("#addForm").validate({
    rules: {
        fname: {
            required: true,
            // minlength: 3
        },
     
        lname: {
            required: true,
            // minlength: 6
        },
        email:{
            required:true,
        },
        phone:{
            required:true,
        },
        country:{
            required:true
        }


    },
    messages: {
        fname:{
            required: "Please enter  firstname",
            minlength: "Username must be at least 3 characters long"
        },
    
        lname:{
            required: "Please enter  lastname",
            // minlength: "Password must be at least 8 characters long"
        },
        email:{
            required: "Please enter an email address"
        },
        phone:{
            required: "Please enter phone number"
        },
        country:{
            required: "Please enter country name"
        }
    },

    errorPlacement:function(error,element){
        // error.insertAfter(element);
        if(element.attr("name")=="fname")
        {   $('#error-fname').show();
            error.appendTo("#error-fname");
            
        }
        if(element.attr("name")=="lname")
        {   $('#error-lname').show();
            error.appendTo("#error-lname");
        }
        if(element.attr("name")=="email")
        {   
            $('#error-email').show();
            error.appendTo("#error-email");
        }
        if(element.attr("name")=="phone")
        {   
            $('#error-phone').show();
            error.appendTo("#error-phone");
        }
        if(element.attr("name")=="country")
        {   $('#error-country').show();
            error.appendTo("#error-country");
        }
    },

});