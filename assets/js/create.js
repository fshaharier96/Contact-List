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