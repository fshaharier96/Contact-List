let file=$('#create-file-id');
file.on("change",function(event){
    var x = URL.createObjectURL(event.target.files[0]);
    $('#create-image-id').attr("src",x);
    $('#create-image-id').css('display','block');
    $('.create-img-icon').hide();

})