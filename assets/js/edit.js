let file=$('#edit-file-id');
file.on("change",function(event){
    var x = URL.createObjectURL(event.target.files[0]);
    $('#edit-image-id').attr("src",x);
    $('#edit-image-id').css('display','block');
    $('.edit-img-icon').hide();

})

$("#edit-datepicker").flatpickr({
    dateFormat: "d-m-Y", // Date format
    // minDate: "today", // Minimum selectable date
    // maxDate: "2023-12-31", // Maximum selectable date
    defaultDate: "today", // Default date
    enableTime:true, // Enable time selection
    time_24hr: false // Use 24-hour format for time
    // Other options...
});

$("#editForm").validate({
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

/*js code for showing phone number with countrycode*/
  
  var phone_number = window.intlTelInput(document.querySelector("#phone"), {
    separateDialCode: true,
    showFlags:true,
    hiddenInput: "full",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
  });

    // var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
    // $("input[name='phone_number[full]'").val(full_number);

    

    /* country field*/

    
//    let arr=['bangladesh',"india",'pakistan'];
//    let countryList=$('#countryList');
//    console.log(arr)



let countryList= $('#countryList');
const allCountries = window.intlTelInputGlobals.getCountryData();

allCountries.forEach(function(country) {
// let select="";
// if(country.iso2=="bd"){
// select="selected";
// }else{
// select="";
// }
countryList.append(`<option value="${country.name}">${country.name}</option>`);

     });


// const phoneInputField = document.querySelector("#phone");
//    const phoneInput = window.intlTelInput(phoneInputField, {
//      utilsScript:
//        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//    });

//    $("#editForm").submit(function(event){
//     const phoneNumber = phoneInput.getNumber();
//     $("#phone").val(phoneNumber);
//     console.log(phoneNumber);
// });

// $('#phone').on('blur', function() {
//     let code_class=$(".iti__selected-dial-code")
//     let code_val=code_class.text();
//     $('#countryCode').val(code_val);
//     console.log()
// });
